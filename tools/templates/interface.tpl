<?php

/**
 * Classe da interface formulario %FORM_NAME%
 *
 * @name I%FORM_NAME%
 */
abstract class I%FORM_NAME% {
	/**
	 * Armazena os widgets necessarios
	 * 
	 * @access private
	 * @name $widgets
	 * @var array
	 */
	public $widgets = array();
	
	/**
	 * @name __construct()
	 */
	public function __construct() {
		// Cria a janela
		$this->widgets['%FORM_NAME%'] = new GtkWindow();
		$box = new GtkVBox();
		
		// Inicia a aplicação
		$this->widgets['%FORM_NAME%']->add($box);
		$this->_signals();
		$this->%FORM_NAME%_onload();
	}
	
	/**
	 * Conecta os sinais dos widgets
	 *
	 * @name _signals
	 */
	private function _signals() {
		$this->widgets['%FORM_NAME%']->connect("destroy", array($this, "%FORM_NAME%_unload"));
	}
}
