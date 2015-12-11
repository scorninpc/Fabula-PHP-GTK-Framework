<?php

/**
 * Exemplo de utilização do Fabula::GtkWindow()
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
 * Classe de exemplo de utilização do Fabula::GtkWindow()
 * 
 * @name GtkWindowDemo
 * @package Fabula
 * @subpackage Demos
 */
class GtkWindowDemo
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
		// Cria o splash
		$this->widgets['frmSplash'] = Fabula::GtkWindow();
		$GtkFixed = $this->widgets['frmSplash']->set_splash_image("GtkWindow.png");
		
		// Simula um processamento qualquer
		for($i=0; $i<=900000; $i++)
		{
			Fabula::DoEvents();
			sleep(0.5);
		}
		
		// Esconde e destroy o splash
		$this->widgets['frmSplash']->hide();
		unset($this->widgets['frmSplash']);
		
		// Cria a janela principal
		$this->widgets['frmDemo'] = Fabula::GtkWindow();
		$this->widgets['frmDemo']->set_size_request(200, 200);
		$this->widgets['frmDemo']->set_position(Gtk::WIN_POS_CENTER_ALWAYS);
		$this->widgets['frmDemo']->connect("destroy", array($this, "frmDemo_unload"));
		$fix = new GtkFixed();
		
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
}

/**
 * Inicia o demo
 */
new GtkWindowDemo();
