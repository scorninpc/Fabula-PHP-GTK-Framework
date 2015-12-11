<?php

/**
 * Exemplo de utilização do Fabula::ADOdbConnection()
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
 * Classe de exemplo de utilização do Fabula::ADOdbConnection()
 * 
 * @name ADOdbConnectionDemo
 * @package Fabula
 * @subpackage Demos
 */
class ADOdbConnectionDemo
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
		$this->widgets['frmDemo']->set_size_request(500, 500);
		$this->widgets['frmDemo']->set_position(Gtk::WIN_POS_CENTER_ALWAYS);
		$this->widgets['frmDemo']->connect("destroy", array($this, "frmDemo_unload"));
		
		// Cria um TreeModel
		$model = new GtkListStore(GObject::TYPE_STRING, GObject::TYPE_STRING);
		
		// Cria um GtkTreeView
		$this->widgets['trvDemo'] = Fabula::GtkTreeView($model);
		$this->widgets['trvDemo']->set_size_request(484, 484);
		
		// Adiciona as colunas
		$this->widgets['trvDemo']->add_column(new GtkCellRendererText(), "#", "text");
		$this->widgets['trvDemo']->add_column(new GtkCellRendererText(), "Nome", "text");
		
		// Adiciona o treeview à janela	
		$this->widgets['frmDemo']->add($this->widgets['trvDemo']);
		
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
		// Carrega o treeview
		$this->__load_trvDemo();
		
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
	 * Método que carrega o treeview
	 * 
	 * @name __load_trvDemo()
	 */
	private function __load_trvDemo()
	{
		// Cria o objeto do tipo PDO
		$db = Fabula::ADOdbConnection("pdo");
		
		// Conecta ao banco
		$db->Connect("sqlite:ADOdbConnection.sqlite");
		
		// Executa a query
		$query = "SELECT * FROM mos_clients";
		$result = $db->Execute($query);
		
		// Percorre os registro
		while (!$result->EOF)
		{
			// Adiciona a linha
			$this->widgets['trvDemo']->add_row(
				array($result->fields[0], $result->fields['name'])
			);
			
			// Move para o proximo registro
			$result->MoveNext(); 
		}
		
		/*
		 * 
		 * MySQL SAMPLE
		 * 
		 * // Cria o objeto do tipo PDO
		 * $db = NewADOConnection("mysql");
		 * 
		 * // Conecta ao banco
		 * $db->Connect("localhost", "root", "", "databasetest").
		 * 
		 * // Executa a query
		 * $query = "SELECT * FROM mos_clients";
		 * $result = $db->Execute($query);
		 * 
		 * // Percorre os registro
		 * while (!$result->EOF)
		 * {
		 * 		// Adiciona a linha
		 * 		$this->widgets['trvDemo']->add_row(
		 *  		array($result->fields[0], $result->fields['name'])
		 * 		);
		 * 
		 * 		// Move para o proximo registro
		 * 		$result->MoveNext(); 
		 * }
		 * 
		 */
	}
}

// Inicia o Demo
new ADOdbConnectionDemo();
