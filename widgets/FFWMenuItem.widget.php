<?php

/**
 * Classe de extensão do GtkMenuItem
 * 
 * @name Fabula::GtkMenuItem()
 * @see GtkMenuItem
 * @see http://gtk.php.net/manual/en/gtk.gtkmenuitem.php
 * @package Fabula
 */
class FFWMenuItem extends GtkMenuItem
{	
	/**
	 * @name __construct($label="")
	 * @param string $label Texto do menuitem
	 * @return GtkMenuItem
	 */
	public function __construct($label="")
	{
		parent::__construct($label);
	}
}
