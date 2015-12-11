<?php

/**
 * Cria dialogos no canto da janela
 * 
 * @name Fabula::GtkDeskAlert()
 * @package Fabula
 */
class FFWDeskAlert
{
	/**
	 * Armazena a janela do dialogo
	 * 
	 * @access public
	 * @property GtkWindow $window
	 */
	public $window;
	
	/**
	 * Armazena o tamanho da janela
	 * 
	 * @access private
	 * @property array $size
	 */
	private $size;
	
	/**
	 * Armazena a posição da janela
	 * 
	 * @access private
	 * @property array $position
	 */
	private $position;
	
	/**
	 * Armazena o estado da janela
	 * 
	 * @access public
	 * @property int $initial
	 */
	public $initial = 0;
	
	/**
	 * Armazena o tamanho total do alert
	 * 
	 * @access private
	 * @property int $totalHeight
	 */
	private $totalHeight = 0 ;
	
	/**
	 * @name __construct()
	 * @return FFWDeskAlert
	 */
	public function __construct()
	{
		// Cria a janela
		$this->window = new GtkWindow(Gtk::WINDOW_POPUP);
		
		// Inicia o tamanho
		$this->set_size_request(100, 80);
		$this->window->set_skip_taskbar_hint(TRUE);
		
		// Busca a posição atual
		$this->position = $this->window->get_screen();
	}
	
	/**
	 * Mostra a janela
	 * 
	 * @name show()
	 */
	public function show()
	{
		// Configura o tamanho
		$this->window->set_size_request(
			$this->size['width'], 
			$this->size['height']
		);
		
		// Mostra a janela
		$this->window->show_all();
		
		// Move a janela para o estado inicial
		$this->window->move(
			$this->position->width(),
			$this->position->height() - $this->initial
		);
		
		// Inicia o looping para movimentação
		Gtk::timeout_add(20, array($this, "__showStep"));
	}
	
	/**
	 * Esconde a janela
	 * 
	 * @name hide()
	 */
	public function hide()
	{
		// Inicia o looping para movimentação
		Gtk::timeout_add(20, array($this, "__hideStep"));
	}
	
	/**
	 * Muda o tamanho da janela
	 * 
	 * @name set_size_request()
	 * @param int $width Seta a largura do dialogo
	 * @param int $height Seta a altura do dialogo
	 */
	public function set_size_request($width, $height)
	{
		$this->size['width'] = $width;
		$this->size['height'] = $height;
	}
	
	/**
	 * Moniventação para mostrar janela
	 * 
	 * @name __showStep()
	 * @access private
	 */
	public function __showStep()
	{
		// Aumenta a posição da janela
		$this->totalHeight += 10;
		
		// Move a janela
		$this->window->move(
			$this->position->width() - $this->size['width'],
			$this->position->height() - $this->totalHeight - $this->initial
		);
		
		// Verifica se ja precisa terminar o looping
		if($this->totalHeight < $this->size['height'])
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	/**
	 * Moniventação para esconder janela
	 * 
	 * @name __hideStep()
	 * @access private
	 */
	public function __hideStep()
	{
		// Diminui a posição da janela
		$this->totalHeight -= 10;
		
		// Move a janela
		$this->window->move(
			$this->position->width() - $this->size['width'],
			$this->position->height() - $this->totalHeight - $this->initial
		);
		
		// Verifica se ja precisa parar a looping
		if($this->totalHeight > 0)
		{
			return TRUE;
		}
		else
		{
			$this->window->hide();
			return FALSE;
		}
	}
}
