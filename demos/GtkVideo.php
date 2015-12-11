<?php

/**
 * Exemplo de utilização do GtkVideo
 * 
 * @package Fabula
 * @subpackage Demos
 * @filesource
 */

/**
 * Seta a codificação do programa
 */
ini_set("php-gtk.codepage", "UTF-8");

/**
 * Inclui a classe fabula
 */
require_once("../Fabula.class.php");

/**
 * Seta as configurações do GTK
 */
$gtk = GtkSettings::get_default();
$gtk->set_long_property("gtk-button-images", TRUE, 0);

/**
 * Classe de exemplo de utilização do DEMO
 * 
 * @name GtkVideo
 * @package Fabula
 * @subpackage Demos
 */
class GtkVideoDemo
{
	/**
	 * Armazena os widgets necessarios
	 * 
	 * @access private
	 * @name $widgets
	 * @var array
	 */
	public $widgets = array();
	
	/**
	 * Armazena se o video esta em fullscreen
	 * 
	 * @access private
	 * @name $fullscreen
	 * @var integer
	 */
	private $fullscreen = 0;
	
	/**
	 * @name __construct()
	 * @return Demo
	 */
	public function __construct()
	{
		// Cria a janela
		$this->widgets['frmDemo'] = new GtkWindow();
		$this->widgets['frmDemo']->set_size_request(200, 200);
		$this->widgets['frmDemo']->set_position(Gtk::WIN_POS_CENTER_ALWAYS);
		$this->widgets['frmDemo']->connect("destroy", array($this, "frmDemo_unload"));
		$box = new GtkVBox();
		
		// Cria o video
		$this->widgets['vdoDemo'] = Fabula::GtkVideo();
		$this->widgets['vdoDemo']->set_auto_scalable(TRUE);
		$this->widgets['vdoDemo']->connect("button-press-event", array($this, "vdoDemo_button_pressed"));
		$this->widgets['vdoDemo']->connect("video-changed", array($this, "vdoDemo_onchange"));
		$this->widgets['vdoDemo']->connect("video-closed", array($this, "vdoDemo_onclose"));
		$box->pack_start($this->widgets['vdoDemo'], TRUE, TRUE);
		
		// Cria o progressbar
		$this->widgets['sclDemo'] = GtkHScale::new_with_range(0, 100, 1);
		$this->widgets['sclDemo']->set_draw_value(FALSE);
		$this->widgets['sclDemo']->connect("button-release-event", array($this, "sclDemo_button_pressed"));
		$box->pack_start($this->widgets['sclDemo'], FALSE, FALSE);
		
		// Cria o box dos botões
		$this->widgets['hbox'] = new GtkHBox();
		$box->pack_start($this->widgets['hbox'], FALSE, FALSE);
		
		// Cria o label do tempo
		$this->widgets['lblTime'] = Fabula::GtkLabel("");
		$this->widgets['lblTime']->set_alignment(1, 0.5);
		$this->widgets['hbox']->pack_end($this->widgets['lblTime']);
		
		// Adiciona os botões
		$this->widgets['btnOpen'] = Fabula::GtkButton(NULL, array($this, "btnOpen_click"));
		$this->widgets['btnOpen']->set_image(GtkImage::new_from_stock(Gtk::STOCK_OPEN, Gtk::ICON_SIZE_BUTTON));
		$this->widgets['hbox']->pack_start($this->widgets['btnOpen'], FALSE, FALSE);
		
		$this->widgets['btnPlay'] = Fabula::GtkButton(NULL, array($this, "btnPlay_click"));
		$this->widgets['btnPlay']->set_image(GtkImage::new_from_stock(Gtk::STOCK_MEDIA_PLAY, Gtk::ICON_SIZE_BUTTON));
		$this->widgets['hbox']->pack_start($this->widgets['btnPlay'], FALSE, FALSE);
		
		$this->widgets['btnPause'] = Fabula::GtkButton(NULL, array($this, "btnPause_click"));
		$this->widgets['btnPause']->set_image(GtkImage::new_from_stock(Gtk::STOCK_MEDIA_PAUSE, Gtk::ICON_SIZE_BUTTON));
		$this->widgets['hbox']->pack_start($this->widgets['btnPause'], FALSE, FALSE);
		
		$this->widgets['btnStop'] = Fabula::GtkButton(NULL, array($this, "btnStop_click"));
		$this->widgets['btnStop']->set_image(GtkImage::new_from_stock(Gtk::STOCK_MEDIA_STOP, Gtk::ICON_SIZE_BUTTON));
		$this->widgets['hbox']->pack_start($this->widgets['btnStop'], FALSE, FALSE);
		
		// Inicia a aplicação
		$this->widgets['frmDemo']->add($box);
		$this->frmDemo_onload();
	}
	
	/**
	 * Método do carregamento do formulario
	 * 
	 * @name frmDemo_onload()
	 */
	public function frmDemo_onload()
	{
		// Inicia a aplicação
		$this->widgets['frmDemo']->show_all();
		Gtk::main();
	}
	
	/**
	 * Método do descarregamento do formulario
	 * 
	 * @name frmDemo_unload()
	 */
	public function frmDemo_unload()
	{
		// Encerra a aplicação
		Gtk::main_quit();
	}
	
	/**
	 * Métood click do btnOpen
	 * 
	 * @name btnOpen_click
	 */
	public function btnOpen_click() {
		// Cria os filtros
		$filters = array(
			array(
				"name"		=> "Videos AVI",
				"mime_type"	=> "video/x-msvideo"
			),
			array(
				"name"		=> "Videos 3GP",
				"pattern"	=> "*.3gp"
			),
			array(
				"name"		=> "Todos Videos",
				"mime_type"	=> "video/*"
			),
		);
		
		// Busca o arquivo
		$files = Fabula::GtkFileChooserDialog("Abrir", $this->widgets['frmDemo'], TRUE, Gtk::FILE_CHOOSER_ACTION_OPEN, $filters);
		
		// Seta o nome do arquivo
		$file = $files->get_filenames();
		$this->widgets['vdoDemo']->set_filename($file[0]);
	}
	
	/**
	 * Método click do btnPlay
	 * 
	 * @name btnPlay_click
	 */
	public function btnPlay_click() {
		$ret = $this->widgets['vdoDemo']->play();
		
		// Verifica se iniciou
		if($ret == FALSE) {
			Fabula::GtkMessageDialog(
				$this->widgets['frmDemo'], 
				Gtk::DIALOG_MODAL,
				Gtk::MESSAGE_INFO,
				Gtk::BUTTONS_OK,
				"O video precisa de um arquivo pra ser iniciado!",
				TRUE
			);
		}
	}
	
	/**
	 * Método click do btnPause
	 * 
	 * @name btnPause_click
	 */
	public function btnPause_click() {
		$this->widgets['vdoDemo']->pause();
	}
	
	/**
	 * Método click do btnStop
	 * 
	 * @name btnStop_click
	 */
	public function btnStop_click() {
		$this->widgets['vdoDemo']->stop();
	}
	
	/**
	 * Evento da mudança do valor do scale
	 * 
	 * @name sclDemo_button_pressed
	 */
	public function sclDemo_button_pressed($widget, $event) {
		// Busca o valor
		$value = $widget->get_value();
		
		// Seta a posição do video
		$this->widgets['vdoDemo']->set_position($value);
	}
	
	/**
	 * Método click do socket
	 * 
	 * @name vdoDemo_button_pressed
	 */
	public function vdoDemo_button_pressed($widget, $event) {
		// Verifica se é click duplo
		if($event->type = 5) {
			echo "OK";
			// Verifica se está em fullscreen
			if($this->fullscreen == 1) {
				$this->widgets['frmDemo']->unfullscreen();
				$this->fullscreen = 0;
				$this->widgets['hbox']->set_visible(TRUE);
			}
			else {
				$this->widgets['frmDemo']->fullscreen();
				$this->fullscreen = 1;
				$this->widgets['hbox']->set_visible(FALSE);
			}
		}
	}
	
	/**
	 * Método executado quando o video termina
	 * 
	 * @name vdoDemo_onclose
	 */
	public function vdoDemo_onclose() {
		// Verifica se video esta em fullscreen
		if($this->fullscreen == 1) {
			$this->widgets['frmDemo']->unfullscreen();
			$this->fullscreen = 0;
			$this->widgets['hbox']->set_visible(TRUE);
		}
	}
	
	/**
	 * Método executado quando o video muda
	 * 
	 * @name vdoDemo_onchange
	 */
	public function vdoDemo_onchange($porcent, $time) {
		// Seta o tempo
		$this->widgets['lblTime']->set_label($time);
		
		// Seta o progressbar
		$this->widgets['sclDemo']->set_value($porcent);
		echo $porcent . "\n";
	}
}

/**
 * Inicia o demo
 */
new GtkVideoDemo();
