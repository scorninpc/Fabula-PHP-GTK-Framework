<?php

/**
 * Classe do widget GtkWebCam
 *
 * @name Fabula::GtkWebCam()
 * @see GtkImage
 * @see http://gtk.php.net/manual/en/gtk.gtkimage.php
 * @package Fabula
 */
class FFWWebCam extends GtkImage {
	/**
	 * Armazena o diretório temporario
	 *
	 * @access private
	 * @property string $tmpDir
	 */
	private $tmpDir = "";

	/**
	 * Armazena resource do timer
	 *
	 * @access private
	 * @property resource $resTimer
	 */
	private $resTimer = NULL;

	/**
	 * Armazena o device
	 *
	 * @access private
	 * @property string $device
	 */
	private $device = "/dev/video0";

	/**
	 * Armazena o numero do frame corrent
	 *
	 * @access private
	 * @property int $currentFrame
	 */
	private $currentFrame = 0;

	/**
	 * Armazena o tamanho (rate) da imagem
	 *
	 * @access private
	 * @property string $frameSize
	 */
	private $frameSize = "160x120";

	/**
	 * Armazena a qualidade da imagem
	 *
	 * @access private
	 * @property string $frameQuality
	 */
	private $frameQuality = "60";

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

		// Gera o arquivo temporario
		$this->tmpDir = FABULA_TMP . "/" . md5(time() + microtime());

		// Verifica se o diretório temporario existe e o cria
		if(!is_dir($this->tmpDir)) {
			mkdir($this->tmpDir);
		}

		// Conecta o widget ao destrutor
		parent::connect_simple("destroy-event", array($this, "this_ondestroy"));
	}

	/**
	 * @name __destruct()
	 */
	public function __destruct() {
		// Remove o diretório temporario
		rrmdir($this->tmpDir);
	}

	/**
	 * Retorna o caminho da imagem do ultimo snapshot
	 *
	 * @name get_image()
	 * @return string
	 */
	public function get_image() {
		copy($this->tmpDir . "/" . ($this->currentFrame - 1) . ".jpeg", $this->tmpDir . "/snap.jpeg");
		return $this->tmpDir . "/snap.jpeg";
	}

	/**
	 * Seta o dispositivo da webcam
	 *
	 * @name set_device($value)
	 * @param string $value Caminho do dispositivo de video
	 */
	public function set_device($value) {
		$this->device = $value;
	}

	/**
	 * Seta a qualidade da imagem
	 *
	 * @name set_quality($value)
	 * @param string $value Qualidade em porcentagem 0-100
	 */
	public function set_quality($value) {
		$this->frameQuality = $value;
	}

	/**
	 * Seta o tamanho da imagem
	 *
	 * @name set_size($width, $height)
	 * @param int $width Largura da imagem
	 * @param int $height Altura da imagem
	 */
	public function set_size($width, $height) {
		$this->frameSize = $width . "x" . $height;
	}

	/**
	 * Para a captura (atualização) dos frames
	 *
	 * @name stop()
	 */
	public function stop() {
		Gtk::timeout_remove($this->resTimer);
		$this->resTimer = NULL;
	}

	/**
	 * Inicia a captura (atualização) dos frames
	 *
	 * @name start()
	 */
	public function start() {
		$this->make_snapshot();
		$this->resTimer = Gtk::timeout_add(600, array($this, "make_snapshot"));
	}

	/**
	 * Retorna o status da atualização dos frames
	 *
	 * @name get_status()
	 * @return bool
	 */
	public function get_status() {
		if($this->resTimer == NULL) {
			return FALSE;
		}
		else {
			return TRUE;
		}
	}

	/**
	 * Método que tira o snapshot e mostra no image
	 *
	 * @name make_snapshot()
	 * @return bool
	 */
	public function make_snapshot() {
		// Executa o snapshot usando a aplicação externa
		exec("streamer -q -c " . $this->device . " -s " . $this->frameSize . " -j " . $this->frameQuality . " -o " . $this->tmpDir . "/" . $this->currentFrame . ".jpeg");

		// Atualiza a imagem no GtkImage
		parent::set_from_file($this->tmpDir . "/" . $this->currentFrame . ".jpeg");

		// Verifica se existe imagem para remover
		if($this->currentFrame > 0) {
			unlink($this->tmpDir . "/" . ($this->currentFrame - 1) . ".jpeg");
		}

		// Soma o contador
		$this->currentFrame++;

		// Continua
		return TRUE;
	}
}
