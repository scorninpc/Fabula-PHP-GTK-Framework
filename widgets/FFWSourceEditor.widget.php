<?php

/**
 * Classe do widget GtkSourceEditor
 * 
 * @name Fabula::GtkSourceEditor()
 * @see GtkSourceview
 * @example GtkSourceEditor.php
 * @package Fabula
 */
class FFWSourceEditor extends GtkSourceView {	
	/**
	 * Armazena os widgets necessarios
	 * 
	 * @access protected
	 * @property array $__widgets
	 */
	protected $__widgets = array();
	
	/**
	 * Armazena o token que está sendo digitado
	 * 
	 * @access protected
	 * @property string $__last_token
	 */
	protected $__last_token = "";
	
	/**
	 * Armazena a linguagem do código editado
	 * 
	 * @access protected
	 * @property GtkSourceviewLanguage $__language
	 */
	protected $__language = NULL;
	
	/**
	 * Cria o FFWEntry
	 * 
	 * @name __construct()
	 * @return GtkEntry
	 */
	public function __construct() {
		parent::__construct();
		
		// Cria o buffer do texto
		$this->__widgets['buffer'] = new GtkSourceBuffer();
		parent::set_buffer($this->__widgets['buffer']);

		$this->mime_lang = "application/x-php";
		$this->set_language($this->mime_lang);
		
		// Abilita o highlight
		$this->__widgets['buffer']->set_highlight(TRUE);
		
		// Connecta os eventos
		parent::connect("key-release-event", array($this, "__released_key"));
		parent::get_buffer()->connect("insert-text", array($this, "__inserted_text"));
		
		// Cria dialog do autocomplete
		$this->__widgets['autocomplete'] = new FFWSourceEditorAutocomplete(parent::get_parent_window());
	}
	
	/**
	 * Evento executado ao inserir um texto no editor
	 * 
	 * @name __inserted_text
	 * @param GtkTextBuff $widget GtkTextBuff do editor
	 * @param GtkTextIter $iter GtkTextIter do cursor
	 */
	public function __inserted_text($widget, $iter, $arg1, $arg2) {
		// Verifica se deve mostrar o autocomplete
		if(strlen($this->__last_token) >= 2) {
			// Busca a posição do cursor do texto em relação à janela
			$cursor_location = parent::get_iter_location($iter);
			$window_location = $this->get_window(GTK::TEXT_WINDOW_WIDGET)->get_origin();
			
			$x = $cursor_location->x + $window_location[0];
			$y = $cursor_location->y + $window_location[1] + 15;
			
			// Seta a posição do dialog e mostra
			$this->__widgets['autocomplete']->set_uposition($x, $y);
			$this->__widgets['autocomplete']->show();
			
			// Retorna o foco ao editor
			$window = parent::get_parent();
			while(strtolower(get_class($window)) != "gtkwindow") {
				$window = $window->get_parent();
			}
			$window->has_focus();
		}
	}
	
	/**
	 * Evento executado ao pressionar as teclas no texto no editor
	 * 
	 * @name __released_key
	 * @param GtkTextView $widget GtkTextView do editor
	 * @param GtkEvent $event Evento disparado
	 * @fix Ignorar o texto digitado e buscar o ultimo token digitado
	 */
	public function __released_key($widget, $event) {
		// Verifica se é um texto
		if(preg_match("/([a-z])/i", $event->string) === 0) {
			$this->__last_token = "";
			$this->__widgets['autocomplete']->hide();
		}
		else {
			$this->__last_token .= $event->string;
		}
	}
	
	/**
	 * Seta a linguagem do código
	 * 
	 * @name set_language
	 * @param string $mime_type String contendo o mime type do código editado
	 */
	public function set_language($mime_type) {
		// Cria o language manager
		$lang_manager = new GtkSourceLanguagesManager();
		
		// Busca a linguagem com base no mime type
		$this->__language = $lang_manager->get_language_from_mime_type($mime_type);
		
		// Seta a linguagem do editor
		$this->__widgets['buffer']->set_language($this->__language);
	}

	/**
	 * Carrega o arquivo no editor
	 * 
	 * @name load_file
	 * @param string $file Path do arquivo para ser carregado
	 */
	public function load_file($file) {
		// Verifica se o arquivo existe
		if(!file_exists($file)) {
			throw new Exception("Arquivo não encontrado");
		}

		// Busca o conteudo do arquivo
		$lines = file_get_contents($file);

		// Seta o arquivo no editor
		$this->__widgets['buffer']->begin_not_undoable_action();
		$this->__widgets['buffer']->set_text($lines);
		$this->__widgets['buffer']->end_not_undoable_action();
	}
}
