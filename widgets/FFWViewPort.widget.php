<?php

/**
 * Classe de extensão do GtkViewPort
 * 
 * @name Fabula::GtkViewPort()
 * @see GtkHBox
 * @see GtkScrolledWindow
 * @see http://gtk.php.net/manual/en/gtk.gtktreeview.php
 * @see http://gtk.php.net/manual/en/gtk.gtkscrolledwindow.php
 * @package Fabula
 */
class FFWViewPort extends GtkHBox
{	
	/**
	 * Armazena os widgets
	 * 
	 * @access private
	 * @property array $__widgets
	 */
	private $__widgets = array();
	
	/**
	 * @name __construct($widget)
	 * @param GtkWidget $widget Widget para colocar dentro do FFWViewPort
	 * @return GtkHBox
	 */
	public function __construct($widget) 
	{
		parent::__construct();
		
		// Cria o frame para criação da borda
		$this->__widgets['frame'] = new GtkFrame();
		
		// Cria o scrolledwindow para criação dos scrools
		$this->__widgets['scrolled'] = new GtkScrolledWindow();
		
		// Adiciona o scrolled dentro do frame
		$this->__widgets['frame']->add($this->__widgets['scrolled']);
		
		// Adiciona o widget ao scrolledwindow
		$this->__widgets['scrolled']->add($widget);
		
		// Configura os scrolls como automatico
		$this->__widgets['scrolled']->set_policy(Gtk::POLICY_AUTOMATIC, Gtk::POLICY_AUTOMATIC);
		
		// Adiciona o frame ao GtkHBox
		parent::pack_start($this->__widgets['frame']);
		parent::show_all();
	}
	
	/**
	 * Configura os scrolls
	 * 
	 * @name set_policy($hpolicy, $vpolicy)
	 * @param GtkPolicyType $hpolicy GtkPolicyType para configurar quando mostrar o scroll horizontal
	 * @param GtkPolicyType $vpolicy GtkPolicyType para configurar quando mostrar o scroll vertical
	 */
	public function set_policy($hpolicy, $vpolicy) 
	{
		// Configura os scrolls
		$this->__widgets['scrolled']->set_policy($hpolicy, $vpolicy);
	}
	
	/**
	 * Ativa o autoscroll
	 */
	public function autoscroll($mode=TRUE)
	{
		$a = $this->__widgets['scrolled']->get_vadjustment();
		$a->connect("changed", function($adj, $mode) {
			if($mode) {
				$a = $this->__widgets['scrolled']->get_child()->get_size_request();
				
				$adj->set_value($adj->upper-10-$a[1]);
				$this->__widgets['scrolled']->set_vadjustment($adj);
			}
		}, $mode);
		
		return $this;
	}
}
