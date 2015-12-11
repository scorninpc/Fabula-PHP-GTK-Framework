<?php

/**
 * Exemplo de utilização do DEMO
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
 * Classe de exemplo de utilização do DEMO
 * 
 * @name Demo
 * @package Fabula
 * @subpackage Demos
 */
class Demo
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
new Demo();
