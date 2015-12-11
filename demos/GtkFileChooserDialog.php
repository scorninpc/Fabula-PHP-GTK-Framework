<?php

/**
 * Exemplo de utilização do Fabula::GtkFileChooserDialog()
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
 * Classe de exemplo de utilização do Fabula::GtkFileChooserDialog()
 * 
 * @name GtkFileChooserDialogDemo
 * @package Fabula
 * @subpackage Demos
 */
class GtkFileChooserDialogDemo
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
		
		// Cria o dialogo
		$file = Fabula::GtkFileChooserDialog("Abrir", $this->widgets['frmDemo'], FALSE);
		$file->set_select_multiple(TRUE);
		
		// Inicia o dialogo
		$files = $file->run();
		
		// Mostra no terminal os arquivos selecionados
		var_dump($files);
		
		// Mostra no terminal o diretorio
		echo $file->get_filepath();
		
		// Demo da utilização auto e filtro
		// Cria os filtros
		$filters = array(
			array(
				"name"		=> "Videos AVI",
				"mime_type"	=> "video/x-msvideo"
			),
			array(
				"name"		=> "Videos 3GP",
				"pattern"	=> "*.3gp"
			),
			array(
				"name"		=> "Todos Videos",
				"mime_type"	=> "video/*"
			),
		);
		
		$file = Fabula::GtkFileChooserDialog("Abrir", $this->widgets['frmDemo'], TRUE, Gtk::FILE_CHOOSER_ACTION_OPEN, $filters);
		
		// Mostra no terminal os arquivos selecionados
		var_dump($file->get_filenames());
		
		// Mostra no terminal o diretorio
		echo $file->get_filepath();
		
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
new GtkFileChooserDialogDemo();
