<?php

/**
 * Classe de extensão do GtkVBox
 * 
 * @name Fabula::GtkVBox()
 * @see GtkVBox
 * @see http://gtk.php.net/manual/en/gtk.gtkvbox.php
 * @package Fabula
 */
class FFWProStatusBar extends GtkVBox
{	
	/**
	 * Armazena o texto mostrado
	 * 
	 * @access private
	 * @property string $label
	 */
	private $label;
	
	/**
	 * Armazena os widgets necessarios
	 * 
	 * @access private
	 * @property GtkHBox $hbox
	 */
	private $hbox;

	/**
	 * @name __construct()
	 * @return GtkVBox
	 */
	public function __construct()
	{
		parent::__construct();

		// Cria a parte de baixo horizontal
		$this->hbox = new GtkHBox();

		// Cria um label
		$this->label = new GtkLabel("");
		$this->label->set_alignment(0, 1);
	
		// Adiciona o label
		$this->hbox->pack_start($this->label, TRUE);

		// Adiciona o separador e o hbox no vbox
		$this->pack_start(new GtkHSeparator(), FALSE);
		$this->pack_start($this->hbox, TRUE, TRUE);
	}

	/**
	 * Adiciona um widget ao statusbar
	 * 
	 * @name add($child)
	 * @param GtkWidget $child Widget à ser adicionado ao statusbar
	 */
	public function add($child)
	{
		// Adiciona o widget ao statusbar
		$this->hbox->pack_start($child, FALSE);
	}
	
	/**
	 * Seta o texto ao statusbar
	 * 
	 * @name set_text($text)
	 * @param string $text Texto à ser exibido no statusbar
	 */
	public function set_text($text)
	{
		// Seta o texto no statusbar
		$this->label->set_text($text);
	}
}
