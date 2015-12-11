<?php

/**
 * Classe de extensão do GtkToolbar
 * 
 * @name Fabula::GtkToolbar()
 * @see GtkToolbar
 * @see http://gtk.php.net/manual/en/gtk.gtktoolbar.php
 * @package Fabula
 */
class FFWToolbar extends GtkToolbar {
	/**
	 * Armazena os widgets necessarios
	 * 
	 * @access private
	 * @property array $__widgets
	 */
	private $__widgets = array();
	
	/**
	 * Armazena o contador de itens no toolbar
	 * 
	 * @access private
	 * @property integer $__counter
	 */
	private $__counter = 0;
	
	/**
	 * Armazena o callback do click dos botões
	 * 
	 * @access private
	 * @property mixed $__buttons_callback
	 */
	private $__buttons_callback = NULL;
	
	/**
	 * Armazena os botões do toolbar
	 * 
	 * @access private
	 * @property array $__buttons
	 */
	private $__buttons = NULL;
	
	/**
	 * @name __construct
	 * @return GtkToolbar
	 */
	public function __construct() {
		// Cria o botão
		parent::__construct();
		
		parent::set_tooltips(TRUE);
	}
	
	/**
	 * Retorna os botões do toolbar
	 * 
	 * @name get_toolitems
	 * @return Array
	 */
	public function get_toolitems() {
		return $this->__buttons;
	}
	
	/**
	 * Retorna um botão do toolbar
	 * 
	 * @name get_toolitems
	 * @param int Index com a posição do item
	 * @return GtkToolButton
	 */
	public function get_toolitem($index) {
		return $this->__buttons[$index];
	}
	
	/**
	 * Adiciona um botão no final do toolbar apartir de um stockitem
	 * 
	 * @name append_button_from_stock($stock_id, $label=NULL, $tip=NULL) 
	 * @param GtkStockItem $stock_id Id do stock a ser adicionado
	 * @param string $label Label do botão caso não for usar o padrão
	 * @param string $tip String para mostrar como tooltip
	 * @return GtkToolButton
	 */
	public function append_button_from_stock($stock_id, $label=NULL, $tip=NULL) {
		// Cria o botão
		$toolbutton = GtkToolButton::new_from_stock($stock_id);
		
		// Verifica se existe label
		if($label != NULL) {
			$toolbutton->set_label($label);
		}
		
		// Verifica se existe tooltip
		if($tip != NULL) {
			// Adiciona o tooltip
			$toolbutton->set_tooltip_text($tip);
		}
		
		// Adiciona o callback do click
		$toolbutton->connect_simple("clicked", array($this, "__onclick"), ++$this->__counter);
		
		// Armazena o botão
		$this->__buttons[$this->__counter] = $toolbutton;
		
		// Adiciona o botão ao toolbar
		parent::insert($toolbutton, -1);
		
		// Retorna o botão
		return $toolbutton;
	}
	
	/**
	 * Adiciona um botão no final do toolbar apartir de um arquivo de imagem
	 * 
	 * @name append_button_from_image($imageFile, $label=NULL, $tip=NULL)
	 * @param string $imageFile Caminho do arquivo da imagem
	 * @param string $label Label do botão caso for usar um
	 * @param string $tip String para mostrar como tooltip
	 * @return GtkToolButton
	 */
	public function append_button_from_image($imageFile, $label=NULL, $tip=NULL) {
		// Cria o botão
		$toolbutton = new GtkToolButton();
		
		// Cria a imagem
		$imagebutton = GtkImage::new_from_file($imageFile);
		
		// Troca o icone pela imagem
		$iconWidget = $toolbutton->set_icon_widget($imagebutton);
		
		// Verifica se existe label
		if($label != NULL) {
			$toolbutton->set_label($label);
		}
		
		// Verifica se existe tooltip
		if($tip != NULL) {
			// Adiciona o tooltip
			$toolbutton->set_tooltip_text($tip);
		}
		
		// Adiciona o callback do click
		$toolbutton->connect_simple("clicked", array($this, "__onclick"), ++$this->__counter);
		
		// Armazena o botão
		$this->__buttons[$this->__counter] = $toolbutton;
		
		// Adiciona o botão ao toolbar
		parent::insert($toolbutton, -1);
		
		// Retorna o botão
		return $toolbutton;
	}
	
	/**
	 * Adiciona um separador ao final do toolbar
	 * 
	 * @name append_separator()
	 * @return GtkSeparatorToolItem
	 */
	public function append_separator() {
		// Cria o separador
		$toolseparator = new GtkSeparatorToolItem();
		
		// Adiciona o separador ao toolbar
		parent::insert($toolseparator, -1);
		
		// Retorna o separador
		return $toolseparator;
	}
	
	/**
	 * Adiciona um botão com menu no final do toolbar apartir de um arquivo de imagem
	 * 
	 * @name append_menu_from_image($menu, $imageFile, $label="", $tip=NULL)
	 * @param GtkMenu $menu Menu que será mostrado ao lado do botão
	 * @param string $imageFile Caminho do arquivo da imagem
	 * @param string $label Label do botão caso for usar um
	 * @param string $tip String para mostrar como tooltip
	 * @return GtkMenuToolButton
	 */
	public function append_menu_from_image($menu, $imageFile, $label="", $tip=NULL) {
		// Cria a imagem
		$imagebutton = GtkImage::new_from_file($imageFile);
		
		// Cria o botão
		$toolbutton = new GtkMenuToolButton($imagebutton, $label);
		
		// Adiciona o menu
		$toolbutton->set_menu($menu);
		
		// Verifica se existe tooltip
		if($tip != NULL) {
			// Adiciona o tooltip
			$toolbutton->set_tooltip_text($tip);
		}
		
		// Adiciona o callback do click
		$toolbutton->connect_simple("clicked", array($this, "__onclick"), ++$this->__counter);
		
		// Armazena o botão
		$this->__buttons[$this->__counter] = $toolbutton;
		
		// Adiciona o botão ao toolbar
		parent::insert($toolbutton, -1);
		
		// Retorna o botão
		return $toolbutton;
	}
	
	/**
	 * Adiciona um botão com menu no final do toolbar apartir de um stockitem
	 * 
	 * @name append_menu_from_image($menu, $stock_id, $label="", $tip=NULL)
	 * @param GtkMenu $menu Menu que será mostrado ao lado do botão
	 * @param GtkStockItem $stock_id Id do stock a ser adicionado
	 * @param string $label Label do botão caso for usar um
	 * @param string $tip String para mostrar como tooltip
	 * @return GtkMenuToolButton
	 */
	public function append_menu_from_stock($menu, $stock_id, $label="", $tip=NULL) {
		// Cria a imagem
		$imagebutton = GtkImage::new_from_stock($stock_id, Gtk::ICON_SIZE_INVALID);
		
		// Cria o botão
		$toolbutton = new GtkMenuToolButton($imagebutton, $label);
		
		// Adiciona o menu
		$toolbutton->set_menu($menu);
		
		// Verifica se existe tooltip
		if($tip != NULL) {
			// Adiciona o tooltip
			$toolbutton->set_tooltip_text($tip);
		}
		
		// Adiciona o callback do click
		$toolbutton->connect_simple("clicked", array($this, "__onclick"), ++$this->__counter);
		
		// Armazena o botão
		$this->__buttons[$this->__counter] = $toolbutton;
		
		// Adiciona o botão ao toolbar
		parent::insert($toolbutton, -1);
		
		// Retorna o botão
		return $toolbutton;
	}
	
	/**
	 * Adiciona um botão toggle menu no final do toolbar apartir de um arquivo de imagem
	 * 
	 * @name append_toggle_from_image($imageFile, $label="", $tip=NULL)
	 * @param string $imageFile Caminho do arquivo da imagem
	 * @param string $label Label do botão caso for usar um
	 * @param string $tip String para mostrar como tooltip
	 * @return GtkToggleToolButton
	 */
	public function append_toggle_from_image($imageFile, $label="", $tip=NULL) {
		// Cria o botão
		$toolbutton = new GtkToggleToolButton();
		
		// Cria a imagem
		$imagebutton = GtkImage::new_from_file($imageFile);
		
		// Troca o icone pela imagem
		$iconWidget = $toolbutton->set_icon_widget($imagebutton);
		
		// Verifica se existe label
		if($label != NULL) {
			$toolbutton->set_label($label);
		}
		
		// Verifica se existe tooltip
		if($tip != NULL) {
			// Adiciona o tooltip
			$toolbutton->set_tooltip_text($tip);
		}
		
		// Adiciona o callback do click
		$toolbutton->connect_simple("clicked", array($this, "__onclick"), ++$this->__counter);
		
		// Armazena o botão
		$this->__buttons[$this->__counter] = $toolbutton;
		
		// Adiciona o botão ao toolbar
		parent::insert($toolbutton, -1);
		
		// Retorna o botão
		return $toolbutton;
	}
	
	/**
	 * Adiciona um botão toggle menu no final do toolbar apartir de um stockitem
	 * 
	 * @name append_toggle_from_stock($stock_id, $label="", $tip=NULL)
	 * @param GtkStockItem $stock_id Id do stock a ser adicionado
	 * @param string $label Label do botão caso for usar um
	 * @param string $tip String para mostrar como tooltip
	 * @return GtkToggleToolButton
	 */
	public function append_toggle_from_stock($stock_id, $label="", $tip=NULL) {
		// Cria o botão
		$toolbutton = GtkToggleToolButton::new_from_stock($stock_id);
		
		// Verifica se existe label
		if($label != NULL) {
			$toolbutton->set_label($label);
		}
		
		// Verifica se existe tooltip
		if($tip != NULL) {
			// Adiciona o tooltip
			$toolbutton->set_tooltip_text($tip);
		}
		
		// Adiciona o callback do click
		$toolbutton->connect_simple("clicked", array($this, "__onclick"), ++$this->__counter);
		
		// Armazena o botão
		$this->__buttons[$this->__counter] = $toolbutton;
		
		// Adiciona o botão ao toolbar
		parent::insert($toolbutton, -1);
		
		// Retorna o botão
		return $toolbutton;
	}
	
	/**
	 * Adiciona um botão com um container no final do toolbar apartir de um stockitem
	 * 
	 * @name append_container_from_stock($widget, $signal, $stock_id, $label=NULL, $tip=NULL) 
	 * @param GtkWidget $widget GtkWidget que ficará dentro do container
	 * @param string $signal Sinal que fechará o container
	 * @param GtkStockItem $stock_id Id do stock a ser adicionado
	 * @param string $label Label do botão caso não for usar o padrão
	 * @param string $tip String para mostrar como tooltip
	 * @return GtkToolButton
	 */
	public function append_container_from_stock($widget, $signal, $stock_id, $label=NULL, $tip=NULL) {
		// Cria o botão
		$toolbutton = new FFWToolContainer($widget, $signal, $stock_id);
		
		// Verifica se existe label
		if($label != NULL) {
			$toolbutton->set_label($label);
		}
		
		// Verifica se existe tooltip
		if($tip != NULL) {
			// Adiciona o tooltip
			$toolbutton->set_tooltip_text($tip);
		}
		
		// Adiciona o callback do click
		$toolbutton->connect_simple("clicked", array($this, "__onclick"), ++$this->__counter);
		
		// Armazena o botão
		$this->__buttons[$this->__counter] = $toolbutton;
		
		// Adiciona o botão ao toolbar
		parent::insert($toolbutton, -1);
		
		// Retorna o botão
		return $toolbutton;
	}
	
	/**
	 * Adiciona um widget no final do toolbar
	 * 
	 * @name append_toolitem($widget) 
	 * @param GtkWidget $widget GtkWidget à ser adicionado no toolitem
	 * @return GtkWidget
	 */
	public function append_toolitem($widget) {
		// Cria o botão
		$toolbutton = new GtkToolItem();
		$toolbutton->add($widget);
		
		// Adiciona o botão ao toolbar
		parent::insert($toolbutton, -1);
		
		// Adiciona o callback do click
		//$toolbutton->connect_simple("clicked", array($this, "__onclick"), ++$this->__counter);
		
		// Armazena o botão
		$this->__buttons[$this->__counter] = $toolbutton;
		
		// Retorna o widget
		return $widget;
	}
	
	/**
	 * Evento click dos botões do toolbar
	 * 
	 * @access private
	 * @name __onclick
	 */
	public function __onclick($index) {
		// Verifica se existe callback
		if($this->__buttons_callback != NULL) {
			// Chama o callback
			call_user_func($this->__buttons_callback, $this->__buttons[$index], $index);
		}
	}
	
	/**
	 * Adiciona eventos ao toolbar
	 * 
	 * @name connect
	 * @param GtkWidget $widget GtkWidget à ser adicionado no toolitem
	 * @return GtkWidget
	 */
	public function connect() {
		// Busca os argumentos
		$args = func_get_args();
		
		// Verifica o sinal
		if($args[0] == "clicked") {
			// Armazena o callback
			$this->__buttons_callback = $args[1];
		}
		else {
			// Adiciona o botão ao toolbar
			return parent::connect(eval($args));
		}
	}
}
