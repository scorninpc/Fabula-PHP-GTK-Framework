<?php

/**
 * Classe de extensão do GtkMenuBar
 * 
 * @name Fabula::GtkMenuBar()
 * @see GtkMenuBar
 * @see http://gtk.php.net/manual/en/gtk.gtkmenubar.php
 * @example GtkMenuBar.php
 * @package Fabula
 */
class FFWMenuBar extends GtkMenuBar
{	
	/**
	 * @name __construct()
	 * @return GtkMenuBar
	 */
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Cria um novo menu
	 * 
	 * @name append_menu($title)
	 * @param string $title Texto do item
	 * @return GtkMenu
	 */
	public function append_menu($title)
	{
		// Cria o item
		$menuitem = Fabula::GtkMenuItem($title);
		
		// Adiciona o item ao menubar
		$this->append($menuitem);
		
		// Cria o menu
		$menu = Fabula::GtkMenu();
		
		// Adiciona o menu ao item
		$menuitem->set_submenu($menu);
		
		// Retorna o menu
		return $menu;
	}
}
