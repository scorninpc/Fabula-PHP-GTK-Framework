<?php

/**
 * Classe de extensão do GtkLabel
 * 
 * @name Fabula::GtkLabel()
 * @see GtkLabel
 * @see http://gtk.php.net/manual/en/gtk.gtklabel.php
 * @package Fabula
 */
class FFWLabel extends GtkLabel
{	
	/**
	 * Armazena os widgets necessarios
	 * 
	 * @access private
	 * @property array $__widgets
	 */
	private $__widgets = array();
	
	/**
	 * @name __construct($text) 
	 * @param string $text Texto à ser mostrado no GtkLabel
	 * @return GtkLabel
	 */
	public function __construct($text) 
	{
		parent::__construct($text);
		
		// Alinha o texto ao meio e à esquerda
		parent::set_alignment(0, 1);
	}
}
