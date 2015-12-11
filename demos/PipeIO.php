<?php

/**
 * Exemplo de utilização do Fabula::PipeIO
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
 * Classe de exemplo de utilização do Fabula::PipeIO
 * 
 * @name DemoPipeIO
 * @package Fabula
 * @subpackage Demos
 */
class DemoPipeIO
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
		$this->widgets['frmDemo']->set_size_request(600, 300);
		$this->widgets['frmDemo']->set_position(Gtk::WIN_POS_CENTER_ALWAYS);
		$this->widgets['frmDemo']->connect("destroy", array($this, "frmDemo_unload"));
		$box = new GtkVBox();
		
		// Adiciona o textview do resultado
		$this->widgets['txtResult'] = Fabula::GtkTextView();
		$box->pack_start(Fabula::GtkViewPort($this->widgets['txtResult']), TRUE, TRUE);
		
		// Adiciona o textview dos comandos
		$this->widgets['txtCommands'] = Fabula::GtkEntry();
		$box->pack_start($this->widgets['txtCommands'], FALSE, FALSE);
		$this->widgets['txtCommands']->grab_focus();
		
		// Connecta o entry de comandos para capturar o botão enter
		$this->widgets['txtCommands']->connect("key-press-event", array($this, "txtCommands_onkeypress"));
		
		// Inicia o pipe
		$this->pipe = Fabula::PipeIO("/bin/sh", array());
		$this->pipe->set_callback("stdout", array($this, "on_pipe_io_stdout"));
		$this->pipe->run();
		
		// Inicia a aplicação
		$this->widgets['frmDemo']->add($box);
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
	 * Método que recebe retornos do comando
	 * 
	 * @name on_pipe_io_stdout()
	 */
	public function on_pipe_io_stdout($data)
	{
		$buffer = $this->widgets['txtResult']->get_buffer();
		
		$text = $this->widgets['txtResult']->get_text();
		$this->widgets['txtResult']->set_text($text . $data . "\n");
		
		// Roda o chat para o escrito
		$this->widgets['txtResult']->scroll_to_iter($buffer->get_iter_at_line($buffer->get_line_count() - 1), 0);
	}
	
	/**
	 * Método que captura as teclas pressionadas
	 *
	 * @name txtCommands_onkeypress()
	 */
	public function txtCommands_onkeypress($widget, $event)
	{
		// Verifica a tecla enter
		if(($event->keyval == Gdk::KEY_Return) || ($event->keyval == Gdk::KEY_KP_Enter))
		{
			// Busca o comando
			$cmd = $this->widgets['txtCommands']->get_text();
			
			// Adiciona o comando a lista
			$text = $this->widgets['txtResult']->get_text();
			$this->widgets['txtResult']->set_text($text . "$ " . $cmd . "\n");
			
			// Executa o comando
			$this->pipe->write($cmd . "\n");
			
			// Limpa o comando
			$this->widgets['txtCommands']->set_text("");
			
			// Verifica o comando executado
			if($cmd == "exit")
			{
				$this->frmDemo_unload();
			}
		}
	}
}

/**
 * Inicia o demo
 */
new DemoPipeIO();
