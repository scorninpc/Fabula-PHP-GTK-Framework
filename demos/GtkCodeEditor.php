<?php

/**
 * Exemplo de utilização do GtkCodeEditor
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
 * Classe de exemplo de utilização do GtkSourceEditor
 * 
 * @name Demo
 * @package Fabula
 * @subpackage Demos
 */
class GtkCodeEditorDemo {
	/**
	 * Armazena os widgets necessarios
	 * 
	 * @access private
	 * @property array $widgets
	 */
	public $widgets = array();
	
	/**
	 * @name __construct()
	 */
	public function __construct() {
		// Cria a janela
		$this->widgets['frmDemo'] = new GtkWindow();
		$this->widgets['frmDemo']->set_size_request(800, 350);
		$this->widgets['frmDemo']->set_position(Gtk::WIN_POS_CENTER_ALWAYS);
		$this->widgets['frmDemo']->connect("destroy", array($this, "frmDemo_unload"));
		
		// Cria o editor
		$source = Fabula::GtkCodeEditor($this->widgets['frmDemo']);
		
		// Carrega o arquivo
		$source->load_file(__FILE__);
		
		// Risco para marcar a coluna
		$source->set_margin(80);
		$source->set_show_margin(TRUE);
		
		// Mostra o numero da linha
		$source->set_show_line_numbers(TRUE);
		
		// Habilita o uso de marcadores
		$source->set_show_line_markers(TRUE);
		
		// Tamanho do tab
		$source->set_tabs_width(8);
		
		// Ao quebrar a linha, manter posição ou voltar ao inicio da linha
		$source->set_auto_indent(TRUE);
		
		// Marcar a linha selecionada
		$source->set_highlight_current_line(TRUE);
		
		// Inicia a aplicação
		$this->widgets['frmDemo']->add(Fabula::GtkViewPort($source));
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
}

/**
 * Inicia o demo
 */
new GtkCodeEditorDemo();

