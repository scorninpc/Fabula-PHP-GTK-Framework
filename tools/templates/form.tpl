<?php

/**
 * Classe de ações do formulario %FORM_NAME%
 *
 * @name %FORM_NAME%
 */
class %FORM_NAME% extends I%FORM_NAME% {
	/**
	 * @name __construct()
	 */
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * Método do carregamento do formulario
	 * 
	 * @name %FORM_NAME%_onload()
	 */
	public function %FORM_NAME%_onload() {
		// Inicia a aplicação
		$this->widgets['%FORM_NAME%']->show_all();
		Gtk::main();
	}
	
	/**
	 * Método do descarregamento do formulario
	 * 
	 * @name %FORM_NAME%_unload()
	 */
	public function %FORM_NAME%_unload() {
		// Encerra a aplicação
		Gtk::main_quit();
	}
}
