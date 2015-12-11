<?php

/**
 * Classe de extensão do GtkMenu
 * 
 * @name Fabula::GtkMenu()
 * @see GtkMenu
 * @see http://gtk.php.net/manual/en/gtk.gtkmenu.php
 * @package Fabula
 */
class FFWMenu extends GtkMenu
{	
	/**
	 * @name __construct()
	 * @return $GtkMenu
	 */
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Cria um novo item
	 * 
	 * @name append_item($title, $callback=NULL)
	 * @param string $title Texto do item
	 * @param mixed $callback Função de callback
	 * @param GtkStockItem StockID do icone para aparecer
	 * @return GtkMenuItem
	 */
	public function append_item($title, $callback=NULL, $stock=NULL)
	{
		// Verifica o stock
		if($stock == NULL)
		{
			// Cria o item
			$menuitem = Fabula::GtkMenuItem($title);
		}
		else
		{
			// Cria o item com imagem
			$menuitem = new GtkImageMenuItem($title);
			$image = GtkImage::new_from_stock($stock, Gtk::ICON_SIZE_MENU);
			$menuitem->set_image($image);
		}
		
		// Adiciona o item ao menu
		$this->append($menuitem);
		
		// Atualiza o widget
		$this->show_all();
		
		// Verifica o callback
		if($callback !== NULL)
		{
			$menuitem->connect("activate", $callback);
		}
		
		// Retorna o menuitem
		return $menuitem;
	}
	
	/**
	 * Cria um novo separador
	 * 
	 * @name append_separator()
	 * @return GtkMenuSeparator
	 */
	public function append_separator()
	{
		// Cria o separador
		$menuseparator = new GtkSeparatorMenuItem();
		
		// Adiciona o separador ao menu
		$this->append($menuseparator);
		
		// Atualiza o widget
		$this->show_all();
		
		// Retorna o separador
		return $menuseparator;
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
		
		// Atualiza o widget
		$this->show_all();
		
		// Retorna o menu
		return $menu;
	}
}
