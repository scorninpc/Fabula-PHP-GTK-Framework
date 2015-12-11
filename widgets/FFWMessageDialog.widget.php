<?php

/**
 * Classe de extensão do GtkMessageDialog
 * 
 * @name Fabula::GtkMessageDialog()
 * @see GtkMessageDialog
 * @see http://gtk.php.net/manual/en/gtk.gtkmessagedialog.php
 * @see http://gtk.php.net/manual/en/gtk.gtkdialog.php
 * @package Fabula
 */
class FFWMessageDialog extends GtkMessageDialog
{	
	/**
	 * Armazena o retorno do dialogo
	 * 
	 * @access private
	 * @property int $__return
	 */
	private $__return = NULL;
	
	/**
	 * @name __construct($parent, $flags, $type, $buttons, $message, $autorun=FALSE) 
	 * @param GtkWindow $parent Janela à qual o dialogo é transistent
	 * @param GtkDialogFlags $flags Opções do dialogo
	 * @param GtkMessageType $type Opções do icone do dialogo
	 * @param GtkButtonsType $buttons Botões do dialogo
	 * @param string $message Mensagem do dialogo
	 * @param bool $autorun Opção para auto executar o dialogo ao construir o objeto
	 * @return GtkMessageDialog
	 */
	public function __construct($parent, $flags, $type, $buttons, $message, $autorun=FALSE) 
	{
		// Constroi o dialogo
		parent::__construct($parent, $flags, $type, $buttons, $message);
		
		// Verifica se é auto executavel
		if($autorun)
		{
			// Inicia o dialogo
			$this->__return = parent::run();
			
			// Destroi o dialogo
			parent::destroy();
		}
	}
	
	/**
	 * Inicia o dialogo
	 * 
	 * @name run() 
	 * @return int
	 */
	public function run()
	{
		// Inicia o dialogo
		$this->__return = parent::run();
		
		// Destroi o dialogo
		parent::destroy();
		
		// Retorna o retorno do dialogo
		return $this->__return;
	}
	
	/**
	 * Busca o retorno do dialogo
	 * 
	 * @name get_return() 
	 * @return int
	 */
	public function get_return()
	{
		// Retorna o retorno do dialogo
		return $this->__return;
	}
}
