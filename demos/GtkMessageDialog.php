<?php

/**
 * Exemplo de utilização do Fabula::GtkMessageDialog()
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
 * Classe de exemplo de utilização do Fabula::GtkMessageDialog()
 * 
 * @name GtkMessageDialog
 * @package Fabula
 * @subpackage Demos
 */
class GtkMessageDialogDemo
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
		
		// Cria o botão 1
		$this->widgets['btnDemo1'] = new GtkButton("Demo 1");
		$fix->put($this->widgets['btnDemo1'], 8, 8);
		$this->widgets['btnDemo1']->connect_simple("clicked", array($this, "btnDemo1_onclick"));
		
		// Cria o botão 1
		$this->widgets['btnDemo2'] = new GtkButton("Demo 2");
		$fix->put($this->widgets['btnDemo2'], 80, 8);
		$this->widgets['btnDemo2']->connect_simple("clicked", array($this, "btnDemo2_onclick"));
		
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
	 * Método click do botão Demo 1
	 * 
	 * @name btnDemo1_onclick()
	 */
	public function btnDemo1_onclick()
	{
		// Inicia o dialogo auto run
		$dialog = Fabula::GtkMessageDialog(
			$this->widgets['frmDemo'], 
			Gtk::DIALOG_MODAL,
			Gtk::MESSAGE_QUESTION,
			Gtk::BUTTONS_YES_NO,
			"Deseja substituir o arquivo?",
			TRUE
		);
		
		// Busca o retorno
		$ret = $dialog->get_return();
		
		// Verifica o retorno
		if($ret == Gtk::RESPONSE_NO)
		{
			echo "Não\n";
		}
		elseif($ret == Gtk::RESPONSE_YES)
		{
			echo "Sim\n";
		}
	}
	
	/**
	 * Método click do botão Demo 2
	 * 
	 * @name btnDemo2_onclick()
	 */
	public function btnDemo2_onclick()
	{
		// Inicia o dialogo auto run
		$dialog = Fabula::GtkMessageDialog(
			$this->widgets['frmDemo'], 
			Gtk::DIALOG_MODAL,
			Gtk::MESSAGE_INFO,
			Gtk::BUTTONS_OK,
			"Este é um alerta simples!",
			TRUE
		);
		
		// Mostra a saida
		echo "ok\n";
	}
}

/**
 * Inicia o demo
 */
new GtkMessageDialogDemo();
