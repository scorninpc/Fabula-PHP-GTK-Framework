<?php

/**
 * Classe do widget GtkVideo
 *
 * @name Fabula::GtkVideo()
 * @see GtkEventbox
 * @see http://gtk.php.net/manual/en/gtk.gtkeventbox.php
 * @package Fabula
 */
class FFWVideo extends GtkEventbox {
	/**
	 * Armazena o objeto PipeIO
	 *
	 * @access private
	 * @name $pipe
	 * @var PipeIO
	 */
	private $pipe = NULL;

	/**
	 * Armazena o estado do video
	 *
	 * @access private
	 * @name $video_state
	 * @var integer
	 */
	private $video_state = -1;

	/**
	 * Armazena o objeto GtkSocket
	 *
	 * @access private
	 * @name $socket
	 * @var GtkSocket
	 */
	private $socket = NULL;

	/**
	 * Armazena o caminho da imagem do background
	 *
	 * @access private
	 * @name $background_image
	 * @var string
	 */
	private $background_image = NULL;

	/**
	 * Armazena o caminho do mplayer
	 *
	 * @access private
	 * @name $render_path
	 * @var string
	 */
	private $render_path = "/usr/bin/mplayer";

	/**
	 * Armazena o arquivo
	 *
	 * @access private
	 * @name $render_file
	 * @var string
	 */
	private $render_file = "";

	/**
	 * Armazena as opções do mplayer
	 *
	 * @access private
	 * @name $render_options
	 * @var array
	 */
	private $render_options = array();

	/**
	 * Armazena o estado da requisição de informações do video
	 *
	 * @access private
	 * @name $getting_info
	 * @var boolean
	 */
	private $getting_info = FALSE;

	/**
	 * Armazena a informação do video
	 *
	 * @access private
	 * @name $info_data
	 * @var string
	 */
	private $info_data = "";

	/**
	 * Armazena o callback stdout do usuario
	 *
	 * @access private
	 * @name $callback_stdout
	 * @var string
	 */
	private $callback_stdout = NULL;

	/**
	 * Armazena o callback video-changed do usuario
	 *
	 * @access private
	 * @name $callback_video_changed
	 * @var string
	 */
	private $callback_video_changed = NULL;

	/**
	 * Armazena o id do timeout de atualização do sinal video-changed
	 *
	 * @access private
	 * @name $video_changed_timeout
	 * @var string
	 */
	private $video_changed_timeout = NULL;

	/**
	 * Armazena o callback video-closed do usuario
	 *
	 * @access private
	 * @name $callback_video_closed
	 * @var string
	 */
	private $callback_video_closed = NULL;

	/**
	 * @name __construct
	 * @return GtkImage
	 */
	public function __construct() {
		// Verifica se o sistema operacional é linux
		if(php_uname("s") != "Linux") {
			die("O widget GtkWebCam atualmente só é suportado por sistema Linux\n");
		}

		// Inicia o parente
		parent::__construct();

		// Inicia parado
		$this->video_state = -1;

		// Cria o socket
		$this->socket = new GtkSocket();
		$this->socket->set_size_request(5, 5);

		// Adiciona o socket ao parent
		parent::add($this->socket);
	}

	/**
	 * @name __destruct()
	 */
	public function __destruct() {
		// Verifica se o pipe foi criado
		if($this->pipe != NULL) {
			// Fecha o mplayer
			$this->__command("quit 0");
				
			// Fecha o pipe
			$this->pipe->terminate();
		}
	}

	/**
	 * Seta o caminho do arquivo
	 *
	 * @name set_filename
	 * @param string $path Caminho do arquivo à ser executado
	 */
	public function set_filename($path) {
		// Armazena o nome do arquivo
		$this->render_file = $path;
	}

	/**
	 * Seta o caminho do render de video
	 *
	 * @name set_render_path
	 * @param string $path Caminho do render de video
	 */
	public function set_render_path($path) {
		$this->render_path = $path;
	}

	/**
	 * Seta o widget como auto-escalavel, ajustando o video ao tamanho do widget
	 *
	 * @name set_auto_scalable
	 * @param boolean $value Seta se é escalavel ou não
	 */
	public function set_auto_scalable($value) {
		// Verifica se coloca ou remove a opção
		if($value) {
			$this->render_options[] = "-zoom";
		}
		else {
			// Busca o index do vetor
			$key = array_search("-zoom", $this->render_options);
				
			// Verifica se foi encontrado
			if($key !== FALSE) {
				// Remove do vetor
				unset($this->render_options[$key]);
			}
		}
	}

	/**
	 * Seta a posição do video
	 *
	 * @name set_position
	 * @param float $position Seta a posição do video em porcentagem
	 */
	public function set_position($position) {
		// Verifica se o video ja foi iniciado
		if($this->video_state != -1) {
			// Envia a posição do video
			$this->__command("seek " . $position . " 1");
		}
	}

	/**
	 * Inicia o video
	 *
	 * @name play
	 * @return boolean
	 */
	public function play() {
		// Verifica se o video ja foi iniciado
		if($this->video_state == -1) {
			// Verifica se existe arquivo
			if(!file_exists($this->render_file)) {
				return FALSE;
			}
				
			// Verifica se o caminho do render existe
			if(!file_exists($this->render_path)) {
				echo "Não foi possivle encontrar " . $this->render_path;
				return FALSE;
			}
				
			// Adiciona os ultimos parametros
			$options = array_merge(
			$this->render_options,
				array("-slave", "-quiet", "-menu", "-wid", $this->socket->get_id(), escapeshellarg($this->render_file))
			);
				
			// Cria o pipe
			$this->pipe = Fabula::PipeIO($this->render_path, $options);
				
			// Cria o callback do stdout
			$this->pipe->set_callback("stdout", array($this, "stdout"));
				
			// Cria o callback do final do video
			$this->pipe->set_callback("hup", array($this, "io_hup"));
				
			// Inicia o video
			$this->pipe->run();
				
			// Muda o estado do video
			$this->video_state = 1;
				
			// Adiciona o timeout
			$this->video_changed_timeout = Gtk::timeout_add(500, array($this, "video_changed"));

			// Retorna verdadeiro
			return TRUE;
		}
		else {
			// Retorna a falha
			return FALSE;
		}
	}

	/**
	 * Pausa ou não o video
	 *
	 * @name pause
	 */
	public function pause() {
		// Verifica se está em execução
		if($this->video_state != -1) {
			// Adiciona o comando ao pipe
			$this->__command("pause");
				
			// Muda o estado do video
			$this->video_state = 0;
		}
	}

	/**
	 * Para o video
	 *
	 * @name stop
	 */
	public function stop() {
		// Verifica se está em execução
		if($this->video_state != -1) {
			// Remve o timeout
			Gtk::timeout_remove($this->video_changed_timeout);
			$this->video_changed_timeout = NULL;

			// Adiciona o comando ao pipe
			$this->__command("stop");
				
			// Fecha o pipe
			$this->pipe->terminate();
				
			// Muda o estado do video
			$this->video_state = -1;
		}
	}

	/**
	 * Adiciona ou remove o OSD
	 *
	 * @name osd
	 */
	public function osd() {
		// Verifica se está em execução
		if($this->video_state != -1) {
			// Seta o OSD
			$this->__command("osd");
		}
	}

	/**new GtkFixed()
	 * Retorna o estado de execuçao do video
	 *
	 * @name get_state
	 * @return integer
	 */
	public function get_state() {
		// Retorna o estado
		return $this->video_state;
	}

	/**
	 * Callback executado quando o video é modificado
	 *
	 * @name video_changed
	 * @return boolean
	 */
	public function video_changed() {
		// Verifica se o video está em execução
		if($this->video_state == 1) {
			// Busca a porcentagem do video
			$porcent = $this->__get_info("get_percent_pos", "/ANS_PERCENT_POSITION=(.+?)$/", 0);
				
			// Busca e formata o tempo do video
			$time = $this->__get_info("get_time_pos", "/ANS_TIME_POSITION=(.+?)$/", 0);
			$h = intval($time / 3600);
			$m = intval($time / 60) % 60;
			$s = $time % 60;
			$time = sprintf("%02d:%02d:%02d", $h, $m, $s);
				
			// Verifica se existe callback
			if($this->callback_video_changed != NULL) {
				// Mostra a saida para o usuario
				call_user_func($this->callback_video_changed, $porcent, $time);
			}
				
			// Verifica se é o final do video
			if($porcent == "100") {
				$this->stop();
			}
		}

		// Retorna verdadeiro para continuar o timer
		return TRUE;
	}

	/**
	 * Intercepta o método connect do widget
	 *
	 * @name connect
	 * @param func_get_args()
	 * @return resource
	 */
	public function connect() {
		// Armazena as informações dos parametros
		$argc = func_num_args();
		$argv = func_get_args();

		// Verifica o primeiro
		switch($argv[0]) {
			// Armazena o método para stdout
			case "stdout":
				$this->callback_stdout = $argv[1];
				break;
					
				// Verifica se é o sinal video-changed
			case "video-changed":
				// Armazena o nome do método
				$this->callback_video_changed = $argv[1];
				break;

				// Verifica se é o sinal video-closed
			case "video-closed":
				$this->callback_video_closed = $argv[1];
				break;

				// Se não for personalizado
			default:
				return call_user_func_array(array("parent", "connect"), $argv);
		}
	}

	/**
	 * Executa comandos interativos ao mplayer
	 *
	 * @access private
	 * @name __command
	 * @param string $command Comando à ser executado no mplayer
	 */
	private function __command($command) {
		// Verifica se o pipe foi criado
		if($this->pipe != NULL) {
			// Escreve no pipe
			$this->pipe->write($command . "\n");
			$this->pipe->flush();
		}
	}

	/**
	 * Intercepta a saida do mplayer
	 *
	 * @access private
	 * @name stdout
	 * @param resource $pipe Pipe do shell
	 * @return boolean
	 */
	public function stdout($stdout) {
		static $data = "";

		// Busca a saida
		$data .= $stdout;

		// Verifica se é o final do retorno
		if(strstr($data, "\n")) {
			// Quebra em linhas
			$list = preg_split("/\n/", $data);
				
			//  Verifica se esta buscando propriedades
			if($this->getting_info && preg_match("/^ANS/", $list[0])) {
				// Armazena a query
				$this->info_data = $list[0];

				// Termina o looping
				Gtk::main_quit();
			}
			elseif($this->callback_stdout !== NULL) {
				// Mostra a saida para o usuario
				call_user_func($this->callback_stdout, $data);
			}
				
			// Limpa a data
			$data = "";
		}

		// Retorna o sucesso
		return TRUE;
	}

	/**
	 * Callback ao fechar o pipe
	 *
	 * @name io_hup
	 */
	public function io_hup() {
		// Finaliza o video
		$this->stop();

		// Verifica se existe callback
		if($this->callback_video_closed != NULL) {
			// Chama o callback
			call_user_func($this->callback_video_closed);
		}
	}

	/**
	 * Executa a requisição da informação
	 *
	 * @access private
	 * @name __request_info
	 * @param string $command Comando para buscar a informação
	 * @return mixed
	 */
	private function __request_info($command) {
		// Faz a requisição da informação
		$this->__command($command);
		$this->getting_info = TRUE;

		// Inicia um looping até que a informação seja retornada
		Gtk::main();

		// Retorna a informação
		$this->getting_info = FALSE;
		return trim($this->info_data);
	}

	/**
	 * Retorna as informações do video
	 *
	 * @access private
	 * @name __get_info
	 * @param string $command Comando para buscar a informação
	 * @param string $expression Expressão regular para buscar a informação
	 * @param mixed $default Valor padrão caso não ache o valor
	 * @return mixed
	 */
	private function __get_info($command, $expression, $default=0) {
		// Verifica se o video ja foi iniciado
		if($this->video_state == -1) {
			return FALSE;
		}

		// Faz a requisição da informação
		$value =  $this->__request_info($command);

		// Busca a informação na string
		if(preg_match($expression, $value, $values)) {
			// Retorna o valor encontrado
			return $values[1];
		}
		else {
			// Retorna o padrão caso não encontrou a informação
			return $default;
		}
	}
}
