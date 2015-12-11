<?php

/**
 * Exemplo de utilização do Fabula::GtkWebCam()
 * 
 * @package Fabula
 * @subpackage Demos
 * @filesource
 */

/**
 * Seta a codificação do programa
 */
ini_set("php-gtk.codepage", "UTF-8");

/**
 * Inclui a classe fabula
 */
require_once("../Fabula.class.php");

/**
 * Classe de exemplo de utilização do Fabula::GtkWebCam()
 * 
 * @name GtkWebCamDemo
 * @package Fabula
 * @subpackage Demos
 */
class GtkWebCamDemo
{
	/**
	 * Armazena os widgets necessarios
	 * 
	 * @access private
	 * @property array $widgets
	 */
	public $widgets = array();
	
	/**
	 * @name __construct()
	 * @return Demo
	 */
	public function __construct()
	{
		// Cria a janela
		$this->widgets['frmDemo'] = new GtkWindow();
		$this->widgets['frmDemo']->set_size_request(400, 400);
		$this->widgets['frmDemo']->set_position(Gtk::WIN_POS_CENTER_ALWAYS);
		$this->widgets['frmDemo']->connect("destroy", array($this, "frmDemo_unload"));
		$fix = new GtkFixed();
		
		// Cria o objeto webcam
		$this->widgets['webcam'] = Fabula::GtkWebCam();
		$this->widgets['webcam']->set_size(320, 240);
		$this->widgets['webcam']->set_quality(65);
		$this->widgets['webcam']->set_device("/dev/video0");
		
		// Inicia a captura
		$this->widgets['btnStartStop'] = new GtkButton("Iniciar");
		$this->widgets['btnStartStop']->connect_simple("clicked", array($this, "btnStartStop_onclick"));
		$fix->put($this->widgets['btnStartStop'], 8, 265);
		
		// Salva a imagem
		$this->widgets['btnSave'] = new GtkButton("Salvar");
		$this->widgets['btnSave']->connect_simple("clicked", array($this, "btnSave_onclick"));
		$fix->put($this->widgets['btnSave'], 8, 300);
		
		// Adiciona o frame da webcam
		$frame = new GtkFrame();
		$frame->add($this->widgets['webcam']);
		$frame->set_size_request(331, 251);
		$fix->put($frame, 8, 8);
		
		// Inicia a aplicação
		$this->widgets['frmDemo']->add($fix);
		$this->frmDemo_onload();
	}
	
	/**
	 * Método do carregamento do formulario
	 * 
	 * @name frmDemo_onload()
	 */
	public function frmDemo_onload()
	{
		// Inicia a aplicação
		$this->widgets['frmDemo']->show_all();
		Gtk::main();
	}
	
	/**
	 * Método do descarregamento do formulario
	 * 
	 * @name frmDemo_unload()
	 */
	public function frmDemo_unload()
	{
		// Encerra a aplicação
		Gtk::main_quit();
	}
	
	/**
	 * Método para salvar a imagem
	 * 
	 * @name btnSave_onclick()
	 */
	public function btnSave_onclick()
	{
		$image = $this->widgets['webcam']->get_image();
		
		$result = Fabula::GtkFileChooserDialog("Abrir", $this->widgets['frmDemo'], TRUE, Gtk::FILE_CHOOSER_ACTION_SAVE);
		
		$path = $result->get_filenames();
		if($path[0] !== FALSE)
		{
			copy($image, $path[0]);
		}
	}
	
	/**
	 * Método para parar e continuar a captura dos frames
	 * 
	 * @name btnStartStop_onclick()
	 */
	public function btnStartStop_onclick()
	{
		if($this->widgets['webcam']->get_status())
		{
			$this->widgets['webcam']->stop();
			$this->widgets['btnStartStop']->set_label("Iniciar");
		}
		else
		{
			$this->widgets['webcam']->start();
			$this->widgets['btnStartStop']->set_label("Parar");
		}
	}
}

/**
 * Inicia o demo
 */
new GtkWebCamDemo();
