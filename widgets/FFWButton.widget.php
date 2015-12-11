<?php

/**
 * Classe de extensão do GtkButton
 * 
 * @name Fabula::GtkButton()
 * @see GtkButton
 * @see http://gtk.php.net/manual/en/gtk.gtkbutton.php
 * @package Fabula
 */
class FFWButton extends GtkButton
{	
	/**
	 * Armazena os widgets necessarios
	 * 
	 * @access private
	 * @property array $__widgets
	 */
	private $__widgets = array();
	
	/**
	 * Cria o FFWButton
	 * 
	 * @name __construct($label="")
	 * @param string $label Texto do botão
	 * @param mixed $callback Função de callback
	 * @return GtkButton
	 */
	public function __construct($label="", $callback=NULL) 
	{
		// Cria o botão
		parent::__construct($label);
		
		// Verifica o callback
		if($callback !== NULL)
		{
			parent::connect_simple("clicked", $callback);
		}
	}
	
	/**
	 * Seta um tooltip ao botão
	 * 
	 * @name set_tooltip($tip, $description="")
	 * @param string $tip String para o tooltip
	 * @param string $description String para a descrição longa
	 */
	public function set_tooltip($tip, $description="") 
	{
		// Cria o tooltip
		$tt = new GtkTooltips();
		
		// Configura o tooltip
		$tt->set_tip($this, $tip, $description);
	}
}
