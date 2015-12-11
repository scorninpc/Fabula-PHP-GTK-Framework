<?php

/**
 * Classe de extensão do GtkWindow
 * 
 * @name Fabula::GtkWindow()
 * @see GtkWindow
 * @see http://gtk.php.net/manual/en/gtk.gtkwindow.php
 * @package Fabula
 */
class FFWWindow extends GtkWindow
{	
	/**
	 * Armazena os widgets necessarios
	 * 
	 * @access private
	 * @property array $__widgets
	 */
	private $__widgets = array();
	
	/**
	 * @name __construct($type=Gtk::WINDOW_TOPLEVEL) 
	 * @param GtkWindowType $type tipo da janela a ser criada
	 * @return GtkWindow
	 */
	public function __construct($type=Gtk::WINDOW_TOPLEVEL) 
	{
		parent::__construct($type);
	}
	
	/**
	 * Cria a janela no modo splash
	 * 
	 * @name set_splash_image($image)
	 * @param string $image Caminho para a imagem do splash
	 * @return GtkFixed
	 */
	public function set_splash_image($image)
	{
		// Carrega a imagem 
		$pixbuf = GdkPixbuf::new_from_file($image);
		
		// Modifica as propriedades da janela
		parent::set_type_hint(Gdk::WINDOW_TYPE_HINT_SPLASHSCREEN);
		parent::set_size_request($pixbuf->get_width(), $pixbuf->get_height());
		parent::set_position(GTK::WIN_POS_CENTER);
		parent::realize();
		
		// Adiciona a imagem no fundo do GtkWindow
		list($pixmap, $mask) = $pixbuf->render_pixmap_and_mask(255);
		$style = parent::get_style();
		$style = $style->copy();
		$style->bg_pixmap[Gtk::STATE_NORMAL] = $pixmap;
		parent::set_style($style);

		// Adiciona um fixed para futuros widgets
		$fixed = new GtkFixed();
		parent::add($fixed);
		
		// Mostra o splash
		parent::show_all();
		
		// Retorna o fixed para adição de widgets
		return $fixed;
	}
}
