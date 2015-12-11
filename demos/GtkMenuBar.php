<?php

/**
 * Exemplo de utilização do Fabula::GtkMenuBar()
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
 * Classe de exemplo de utilização do Fabula::GtkMenuBar()
 * 
 * @name GtkMenuBarDemo
 * @package Fabula
 * @subpackage Demos
 */
class GtkMenuBarDemo
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
		$vbox = new GtkVBox();
		
		// Adiciona o menu
		$this->widgets['mnuBar'] = Fabula::GtkMenuBar();
		$vbox->pack_start($this->widgets['mnuBar'], FALSE, FALSE);
		
		// Arquivo
		$mnuFile = $this->widgets['mnuBar']->append_menu("_Arquivo");
		$mnuImportar = $mnuFile->append_menu("Importar");
		$mnuFile->append_item("Exportar");
		$mnuFile->append_separator();
		$mnuFile->append_item("Sair", array($this, "sair_onclick"));
		
		// Importar
		$mnuImportar->append_item("Arquivo 1");
		$mnuImportar->append_item("Arquivo 2");
		
		// Ajuda
		$mnuHelp = $this->widgets['mnuBar']->append_menu("Aju_da");
		$mnuHelp->append_item("Ajuda");
		$mnuHelp->append_item("Site na Web");
		$mnuHelp->append_separator();
		$mnuHelp->append_item("Sobre");
		
		// Cria a janela
		$this->widgets['frmDemo'] = new GtkWindow();
		$this->widgets['frmDemo']->set_size_request(500, 500);
		$this->widgets['frmDemo']->set_position(Gtk::WIN_POS_CENTER_ALWAYS);
		$this->widgets['frmDemo']->connect("destroy", array($this, "frmDemo_unload"));
		$this->widgets['frmDemo']->add($vbox);
		$vbox->pack_start(new GtkFixed(), TRUE, TRUE);
		
		// Inicia a aplicação
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
	 * Método do click do sair
	 * 
	 * @name sair_onclick()
	 */
	public function sair_onclick()
	{
		$this->frmDemo_unload();
	}
}

/**
 * Inicia o demo
 */
new GtkMenuBarDemo();
