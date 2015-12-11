<?php

/**
 * Classe de extensão do GtkTextView
 * 
 * @name Fabula::GtkTextView()
 * @see GtkTextView
 * @see http://gtk.php.net/manual/en/gtk.gtktextview.php
 * @example GtkTreeView.php
 * @package Fabula
 */
class FFWTextView extends GtkTextView
{	
	/**
	 * Armazena os widgets necessarios
	 * 
	 * @access private
	 * @property array $__widgets
	 */
	private $__widgets = array();
	
	/**
	 * @name __construct
	 * @return GtkTextView
	 */
	public function __construct() 
	{
		parent::__construct();
		
		// Configura o modo da quebra de linha
		parent::set_wrap_mode(Gtk::WRAP_WORD_CHAR);
	}
	
	/**
	 * Seta o texto do textview
	 * 
	 * @name set_text($text)
	 * @param string $text Texto à ser inserido no textview
	 */
	public function set_text($text) 
	{
		// Busca o buffer
		$buffer = parent::get_buffer();
		
		// Seta o texto no buffer
		$buffer->set_text($text);
	}
	
	/**
	 * Busca o texto do textview
	 * 
	 * @name get_text()
	 * @return string $text Texto escrito no textview
	 */
	public function get_text() 
	{
		// Busca o buffer
		$buffer = parent::get_buffer();
		
		// Busca o inicio e fim do text
		$start = $buffer->get_start_iter();
		$end   = $buffer->get_end_iter();
		
		// Retorna o texto
		return $buffer->get_text($start, $end);
	}
}
