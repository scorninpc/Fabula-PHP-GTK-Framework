<?php

/**
 * Classe para adicionar botões com containers dropdown
 * 
 * @name FFWToolContainer()
 * @see GtkToolButton
 * @see http://gtk.php.net/manual/en/gtk.gtktoolbutton.php
 * @package Fabula
 */
class FFWToolContainer extends GtkToolButton
{
	/**
	 * Armazena o widget interno do dialog
	 * 
	 * @access private
	 * @property array $widget
	 */
	private $widget = NULL;
	
	/**
	 * @name __construct($widget, $signal, $icon_widget=null, $label=null)
	 * @param GtkWidget $widget GtkWidget que ficará dentro do container
	 * @param string $signal Sinal do widget que fechará o dialogo
	 * @param GtkWidget $icon_widget GtkWidget entrará como imagem do botão
	 * @param string $label String do label do botão
	 * @return GtkToolButton
	 */
	public function __construct($widget, $signal, $icon_widget=null, $label=null)
	{
		// Constroi o parent
		parent::__construct();
		
		// Armazena o widget
		$this->widget = $widget;
		
		// Verifica se possui stock_id
		if($icon_widget != null)
		{
			parent::set_stock_id($icon_widget);
		}
		
		// Verifica se possui label
		if($label != null)
		{
			parent::set_label($label);
		}
		
		// Cria o dialogo
		$this->dialog = new GtkDialog(NULL, NULL, Gtk::DIALOG_NO_SEPARATOR);
		$this->dialog->set_decorated(FALSE);
		
		// Adiciona o widget ao dinalog
		$this->dialog->vbox->pack_start($this->widget, 0, 0);
		$this->dialog->action_area->set_size_request(-1, 0);
		
		// Adiciona os eventos para abertura
		parent::connect("clicked", array($this, "__openContainer"));
		
		// Adiciona os eventos para fechamento
		$this->widget->connect($signal, array($this, "__onlostfocusContainer"));
		$this->widget->connect("focus-out-event", array($this, "__onlostfocusContainer"));
	}
	
	/**
	 * Método de abertuda do container
	 * 
	 * @name __openContainer($widget)
	 * @access private
	 * @param GtkWidget $widget GtkWidget que esta sendo ativado pelo sinal
	 */
	public function __openContainer($widget)
	{
		// Busca a posição do botão
		$entryX = $widget->allocation->x;
		$entryY = $widget->allocation->y;
		
		// Busca a posição da janela parente
		$window  = $widget->get_parent_window();
		$win_pos = $window->get_position();
		$windowX = $win_pos[0];
		$windowY = $win_pos[1];
		
		// Faz o calculo da posicao final
		$finalX = $entryX + $windowX;
		$finalY = $widget->allocation->height + $entryY + $windowY;
		
		// Seta a posição do dialogo
		$this->dialog->set_uposition($finalX, $finalY);
		
		// Mostra o dialogo
		$this->dialog->show_all();
		$this->dialog->run();
	}
	
	/**
	 * Método de fechamento do container
	 * 
	 * @name __onlostfocusContainer($widget, $event)
	 * @access private
	 * @param GtkWidget $widget GtkWidget que esta sendo ativado pelo sinal
	 * @param GtkEvent $event Eventos que estão sendo emitidos
	 * @return bool
	 */
	public function __onlostfocusContainer($widget, $event)
	{
		// Fecha a janela o dialogo
		$this->dialog->hide();
		
		// Retorna confirmando o fechamento
		return FALSE;
	}
}
