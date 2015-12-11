<?php

/**
 * Classe de extensão do GtkEntry
 * 
 * @name Fabula::GtkEntry()
 * @see GtkEntry
 * @see http://gtk.php.net/manual/en/gtk.gtkentry.php
 * @example GtkEntry.php
 * @package Fabula
 */
class FFWEntry extends GtkEntry
{	
	/**
	 * Armazena os widgets necessarios
	 * 
	 * @access private
	 * @property array $__widgets
	 */
	private $__widgets = array();
	
	/**
	 * Armazena a conexão do evento click do entry para mostrar o calendario
	 * 
	 * @access private
	 * @property resource $__calendarConnection
	 */
	private $__calendarConnection = NULL;
	
	/**
	 * Armazena a conexão do evento change do entry para mascarar
	 * 
	 * @access private
	 * @property resource $__maskConnection
	 */
	private $__maskConnection = NULL;
	
	/**
	 * Armazena os caracteres de separação para mascara
	 * 
	 * @access private
	 * @property array $__maskChars
	 */
	private $__maskChars = NULL;
	
	/**
	 * Armazena a mascara
	 * 
	 * @access private
	 * @property string $__maskString
	 */
	private $__maskString = NULL;
	
	/**
	 * Cria o FFWEntry
	 * 
	 * @name __construct()
	 * @return GtkEntry
	 */
	public function __construct() 
	{
		parent::__construct();
		
		// Seta os caracteres de separação
		$this->__maskChars = array("-", "_", ".", ",", "/", "\\", ":", "|", "(", ")", "[", "]", "{", "}", " ");
	}
	
	/**
	 * Método que seta mascara no GtkEntry
	 * 
	 * @name set_mask($mask)
	 * @param string $mask Formato da mascara à aplicar ao GtkEntry
	 */
	public function set_mask($mask)
	{
		// Seta o tamanho máximo do campo
		parent::set_max_length(strlen(trim($mask)));
		
		// Armazena a mascara
		$this->__maskString = $mask;
		
		// Conecta o sinal de mudança do entry
		$this->__maskConnection = parent::connect("changed", array($this, "__changeMask"));
	}
	
	/**
	 * Método que seta o GtkEntry como calendario
	 * 
	 * @name set_calendar($value)
	 * @param bool $value Valor booleano para habilitar ou não o calendario ao clicar no GtkEntry
	 */
	public function set_calendar($value)
	{
		// Verifica se é calendario ou não
		if($value)
		{
			// Faz as conexões do click do botão
			$this->__calendarConnection = parent::connect("button-release-event", array($this, "__openCalendar"));
		}
		else
		{
			// Desconecta o evento do click
			parent::disconnect($this->__calendarConnection);
		}
	}
	
	/**
	 * Método change do entry ao mascarar
	 * 
	 * @name __changeMask()
	 * @access private
	 * @author Pablo Dall'Oglio
	 */
	public function __changeMask()
	{
		// Armazena o texto do entry
		$text = parent::get_text();

		// Remove os separadores
		$text = $this->__unMask($text);

		// Aplica a máscara
		$newText = $this->__reMask($text);

		// Agendando a colocação do novo conteúdo
		Gtk::timeout_add(1, array($this, "__setMask"), $newText);
		Gtk::timeout_add(1, array($this, "__valMask"));
	}
	
	/**
	 * Método do click do GtkEntry em modo calendario
	 * 
	 * @name __openCalendar($widget, $event)
	 * @access private
	 * @param GtkWidget $widget GtkWidget emissor do sinal
	 * @param GtkEvent $event GtkEvent emitito pelo sinal
	 * @author Erick Eden Fróes
	 */
	public function __openCalendar($widget, $event)
	{
		// Busca a posição do entry
		$entryX = $widget->allocation->x;
		$entryY = $widget->allocation->y;
		
		// Busca a posição da janela parente
		$window  = $widget->get_parent_window();
		$win_pos = $window->get_position();
		$windowX = $win_pos[0];
		$windowY = $win_pos[1];
		
		// Faz o calculo da posicao final
		$finalX = $entryX + $windowX;
		$finalY = $widget->allocation->height + $entryY + $windowY;
		
		// Cria o dialogo para o calendario
		$dialog = new GtkDialog(NULL, NULL, Gtk::DIALOG_MODAL|Gtk::DIALOG_NO_SEPARATOR);
		$dialog->set_decorated(FALSE);
		$dialog->set_uposition($finalX, $finalY);
		
		// Cria o calendario e o coloca dentro do dialogo
		$calendar = new GtkCalendar();
		$dialog->vbox->pack_start($calendar, 0, 0);
		$dialog->action_area->set_size_request(-1, 0);
		
		// Busca o dia do entry
		$text = $widget->get_text();
		if(strlen($text) > 0)
		{
			// Separa as datas
			$date = explode("/", $text);
			
			// Marca o dia do entry no calendario
			$calendar->select_day($date[0]);
			$calendar->select_month($date[1]-1, $date[2]);
		}
		
		// Faz as conexões do calendario
		$calendar->connect("day-selected", array($this, "__changedayCalendar"), $dialog);
		$calendar->connect("focus-out-event", array($this, "__onlostfocusCalendar"), $dialog);

		// Mostra o calendario
		$dialog->show_all();
		$dialog->run();
	}
	
	/**
	 * Método disparado ao mudar a data do calendario
	 * 
	 * @name __changedayCalendar($widget, $dialog)
	 * @access private
	 * @author Erick Eden Fróes
	 * @param GtkCalendar $widget Calendario passado pelo sinal
	 * @param GtkDialog $dialog Container onde está o calendario
	 * @return bool
	 */
	public function __changedayCalendar($widget, $dialog) 
	{
		// Busca o calendario
		$date = $widget->get_date();
		
		// Formata a data
		$date[2] = sprintf("%02d", $date[2]);
		$date[1] = sprintf("%02d", $date[1]+1);
		$formatedDate = implode("/", array_reverse($date));
		
		// Coloca a data no GtkEntry
		parent::set_text($formatedDate);
		
		// Remove o dialog
		return FALSE;
	}
	
	/**
	 * Método ao tirar o foco do calendario
	 * 
	 * @name __onlostfocusCalendar($widget, $event, $dialog)
	 * @access private
	 * @param GtkCalendar $widget Calendario passado pelo sinal
	 * @param GtkEvents $event Eventos disparados externamente
	 * @param GtkDialog $dialog Container onde está o calendario
	 * @return bool
	 */
	public function __onlostfocusCalendar($widget, $event, $dialog) 
	{
		// Fecha a janela do calendario
		$dialog->destroy();
		return FALSE;
	}
	
	/**
	 * Método que valida o conteudo GtkEntry
	 * 
	 * @name __valMask()
	 * @access private
	 * @author Pablo Dall'Oglio
	 */
	public function __valMask() 
	{

		// Armazena texto do entry
		$text = parent::get_text();

		// Busca o ultimo char do texto e da mascara
		$text_char = substr($text, strlen($text)-1, 1);
		$mask_char = substr($this->__maskString, strlen($text)-1, 1);

		// Compara os caracteres digitados com a máscara
		if($mask_char == '9')
		{
			$valid = ereg('([0-9])', $text_char);
		}
		elseif($mask_char == 'a')
		{
			$valid = ereg('([a-z])', $text_char);
		}
		elseif($mask_char == 'A')
		{
			$valid = ereg('([A-Z])', $text_char);
		}
		elseif($mask_char == 'X')
		{
			$valid = (ereg('([a-z])', $text_char) or ereg('([A-Z])', $text_char) or ereg('([0-9])', $text_char));
		}
		
		// Caracteres que não se aplicam no escopo da máscara são removidos
		if(!$valid) 
		{
			$this->__setMask(substr($text, 0, -1));
		}
	}
	
	/**
	 * Método que seta o valor no campo
	 * 
	 * @name __setMask($text)
	 * @access private
	 * @author Pablo Dall'Oglio
	 * @param string $text Texto da mascará a ser setado
	 */
	public function __setMask($text) 
	{

		// Desconectando o sinal changed
		parent::disconnect($this->__maskConnection);

		// Seta o texto do entry
		parent::set_text($text);

		// Posiciona o cursor no final do texto
		parent::select_region(-1,-1);

		// Reconecta changed
		$this->__maskConnection = parent::connect_after("changed", array($this, "__changeMask"));
	}
	
	/**
	 * Método helper que remove a mascara
	 * 
	 * @name __unMask($text)
	 * @access private
	 * @author Pablo Dall'Oglio
	 * @param string $text Texto do conteudo do GtkEntry
	 * @return string
	 */
	private function __unMask($text) 
	{
		$result = "";
		
		// Percorre o conteudo
		for($n=0; $n <= strlen($text); $n++) 
		{
			// Busca o char corrente
			$char = substr($text, $n, 1);
			
			// Verifica se é separador
			if(!in_array($char, $this->__maskChars)) 
			{
				$result .= $char;
			}
		}
		
		// Retorna o valor limpo
		return $result;
	}
	
	/**
	 * Método helper que mascara o conteudo do texto
	 * 
	 * @name __reMask($text)
	 * @access private
	 * @author Pablo Dall'Oglio
	 * @param string $text Texto do conteudo do GtkEntry
	 * @return string
	 */
	public function __reMask($text)
	{
		$z = 0;
		$result = "";
		
		// Percorre entre os caracteres da mascara
		for($n=0; $n < strlen($this->__maskString); $n++) 
		{
			// Busca o char do texto e da mascara
			$mask_char = substr($this->__maskString, $n, 1);
			$text_char = substr($text, $z, 1);
			
			// Verifica se esta na posição de um separador
			if(in_array($mask_char, $this->__maskChars)) 
			{
				// Verifica se precisa colocar a mascara nesta posição
				if($z < strlen($text)) 
				{
					$result .= $mask_char;
				}
			} 
			else 
			{
				// Adiciona o texto ao conteudo
				$result .= $text_char;
				$z++;
			}
		}
		
		// Retorna o texto mascarado
		return $result;
	}
}
