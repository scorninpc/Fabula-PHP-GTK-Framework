<?php

/**
 * Exemplo de utilização do Fabula::GtkToolbar()
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
 * Classe de exemplo de utilização do Fabula::GtkToolbar()
 * 
 * @name GtkToolbar
 * @package Fabula
 * @subpackage Demos
 */
class GtkToolbarDemo {
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
	public function __construct() {
		// Cria a janela
		$this->widgets['frmDemo'] = new GtkWindow();
		$this->widgets['frmDemo']->set_size_request(280, 280);
		$this->widgets['frmDemo']->set_position(Gtk::WIN_POS_CENTER_ALWAYS);
		$this->widgets['frmDemo']->connect("destroy", array($this, "frmDemo_unload"));
		$box = new GtkVBox();
		
		// Toolbar
		$this->widgets['tlbDemo'] = Fabula::GtkToolbar();
		$box->pack_start($this->widgets['tlbDemo'], FALSE, FALSE);
		
		// Adiciona o evento click
		$this->widgets['tlbDemo']->connect("clicked", array($this, "tlbDemo_onclick"));
		
		// Menu
		$menu = Fabula::GtkMenu();
		$menu->append_item("Link 1");
		$menu->append_item("Link 2");
		$menu->append_item("Link 3");
		$btnMySQL = $this->widgets['tlbDemo']->append_menu_from_stock($menu, Gtk::STOCK_ADD, NULL, "Novo");
		
		// Botão do stock
		$this->widgets['tlbDemo']->append_button_from_stock(Gtk::STOCK_OPEN, NULL, "Abrir");
		
		// Botão da imagem
		$this->widgets['tlbDemo']->append_button_from_image("GtkToolbar.png", "MySQL", "MySQL");
		
		// Toggle
		$this->widgets['tlbDemo']->append_toggle_from_stock(Gtk::STOCK_CONNECT, NULL, "Conectar");
		
		// Container
		$scale = new GtkVScale();
		$scale->set_range(0, 100);
		$scale->set_draw_value(FALSE);
		$scale->set_size_request(28, 150);
		$btnContainer = $this->widgets['tlbDemo']->append_container_from_stock($scale, "button-release-event", Gtk::STOCK_ABOUT, NULL, "Container");
		
		// Inicia a aplicação
		$box->pack_start(Fabula::GtkTextView());
		$this->widgets['frmDemo']->add($box);
		$this->frmDemo_onload();
	}
	
	/**
	 * Método do carregamento do formulario
	 * 
	 * @name frmDemo_onload()
	 */
	public function frmDemo_onload() {
		// Inicia a aplicação
		$this->widgets['frmDemo']->show_all();
		Gtk::main();
	}
	
	/**
	 * Método do descarregamento do formulario
	 * 
	 * @name frmDemo_unload()
	 */
	public function frmDemo_unload() {
		// Encerra a aplicação
		Gtk::main_quit();
	}
	
	/**
	 * Método do evento click do toolbar
	 * 
	 * @name tlbDemo_onclick
	 * @param mixed $button Objeto do botão, comunmente um GtkToolButton
	 * @param integer $index Index do botão pressionado
	 */
	public function tlbDemo_onclick($button, $index) {
		echo "Botão " . $index . " pressionado\n";
	}
}

/**
 * Inicia o demo
 */
new GtkToolbarDemo();
