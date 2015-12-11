<?php

/**
 * Exemplo de utilização do Fabula::GtkTreeView()
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
 * Classe de exemplo de utilização do Fabula::GtkTreeView()
 * 
 * @name GtkTreeViewDemo
 * @package Fabula
 * @subpackage Demos
 */
class GtkTreeViewDemo {
	/**
	 * Armazena os widgets necessarios
	 * 
	 * @access private
	 * @property array $widgets
	 */
	public $widgets = array();
	
	/**
	 * @name __construct
	 * @return Demo
	 */
	public function __construct() {
		// Cria a janela
		$this->widgets['frmDemo'] = new GtkWindow();
		$this->widgets['frmDemo']->set_size_request(500, 500);
		$this->widgets['frmDemo']->set_position(Gtk::WIN_POS_CENTER_ALWAYS);
		$this->widgets['frmDemo']->connect("destroy", array($this, "frmDemo_unload"));
		
		// Cria um TreeModel
		$model = new GtkListStore(GObject::TYPE_STRING, GObject::TYPE_STRING);
		
		// Cria um GtkTreeView
		$this->widgets['trvDemo'] = Fabula::GtkTreeView($model);
						//now, get the selection object of that view
						$selection = $this->widgets['trvDemo']->get_selection();
						 
						//we want to be able to select multiple rows
						$selection->set_mode(Gtk::SELECTION_MULTIPLE);
		$this->widgets['trvDemo']->set_size_request(484, 484);
		
		// Adiciona as colunas
		$this->widgets['trvDemo']->add_column(new GtkCellRendererText(), "Coluna 1", "text");
		$this->widgets['trvDemo']->add_column(new GtkCellRendererText(), "Coluna 2", "text");
		
		// Adiciona o highlight
		$this->widgets['trvDemo']->set_highlight("#C4C4FF", "#CEFFCE");
		
		// Popula o model
		$this->widgets['trvDemo']->add_row(array("1x1", "1x2"));
		$this->widgets['trvDemo']->add_row(array("2x1", "2x2"));
		$this->widgets['trvDemo']->add_row(array("3x1", "3x2"));

		// Adiciona o container à janela
		$vbox = new GtkVBox();
		$this->widgets['frmDemo']->add($vbox);
		
		// Adiciona o treeview ao container
		$vbox->pack_start(Fabula::GtkViewPort($this->widgets['trvDemo']), TRUE, TRUE);
		
		// Adiciona o container dos botões
		$hbox = new GtkHBox();
		$vbox->pack_start($hbox, FALSE, FALSE);
		
		// Adiciona o botão para buscar o item selecionado
		$this->widgets['btnSelected'] = new GtkButton("Selecionado");
		$this->widgets['btnSelected']->connect_simple("clicked", array($this, "btnSelected_onClick"));
		$hbox->pack_start($this->widgets['btnSelected']);
		
		// Adiciona o botão para remover o item selecionado
		$this->widgets['btnRemove'] = new GtkButton("Remove");
		$this->widgets['btnRemove']->connect_simple("clicked", array($this, "btnRemove_onClick"));
		$hbox->pack_start($this->widgets['btnRemove']);
		
		// Inicia a aplicação
		$this->frmDemo_onload();
	}
	
	/**
	 * Método do carregamento do formulario
	 * 
	 * @name frmDemo_onload
	 */
	public function frmDemo_onload() {
		// Inicia a aplicação
		$this->widgets['frmDemo']->show_all();
		Gtk::main();
	}
	
	/**
	 * Método do descarregamento do formulario
	 * 
	 * @name frmDemo_unload
	 */
	public function frmDemo_unload() {
		// Encerra a aplicação
		Gtk::main_quit();
	}
	
	/**
	 * Método do click do botão btnSelected
	 * 
	 * @name btnSelected_onClick
	 */
	public function btnSelected_onClick() {
		// Busca o valor da primeira coluna
		$values = $this->widgets['trvDemo']->get_selected_values();
		
		// Mostra o alerta com os valores
		Fabula::Alert(
			"Coluna 1: " . $values[0] . "\n".
			"Coluna 2: " . $values[1] . "",
			 "Alerta"
		);
	}
	
	/**
	 * Método do click o botão btnRemove_onClick
	 * 
	 * @name btnRemove_onClick
	 */
	public function btnRemove_onClick() {
		// Busca o valor da primeira coluna
		$values = $this->widgets['trvDemo']->get_selected_paths();
		
		// Remove os itens
		$this->widgets['trvDemo']->remove_row($values);
	}
}

/**
 * Inicia o demo
 */
new GtkTreeViewDemo();
