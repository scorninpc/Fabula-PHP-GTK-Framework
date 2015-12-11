<?php
	/**
	 * @author 		http://fabula.scorninpc.com/
	 * @package		Fabula IDE
	 * @subpackage	minimizablePanel
	 * @license 	http://www.gnu.org/licenses/gpl.txt GNU/GPL version 3
	 * @version 	rev 1
	 */
	
	// -----------------------------------------------------------------------------------------------------------------
	// Classe do painel minimizado
	// @since rev 1
	class minimizablePanel extends GtkVBox
	{
		// -------------------------------------------------------------------------------------------------------------
		// Armazena o container com os botoes
		// @since rev 1
		private $minimize;
		
		// Armazena a imagem inicial do botão de minimizar
		// @since rev 1
		private $minimizeImage;
		
		// Armazena os labels
		// @since rev 1
		private $labels = array();
		
		// Armazena os widgets filhos das abas
		// @since rev 1
		private $widget = array();
		
		// Armazena os containers para facilitar a remoção dos widgets
		// @since rev 1
		private $containers = array();
		
		// Armazena os connects das abas
		// @since rev 1
		private $connects = array();
		
		// Armazena a posição das abas quanod minimizadas
		// @since rev 1
		private $minimizedPosition = Gtk::POS_LEFT;
		
		// -------------------------------------------------------------------------------------------------------------
		// Construtor do widget
		// @since rev 1
		public function __construct()
		{
			parent::__construct();
			$this->minimizeImage = FABULA_PATH . "/images/130a.png";
			
			// Cria o notebook
			// @since rev 1
			$this->notebook = New GtkNoteBook();
			$this->notebook->set_tab_pos(Gtk::POS_TOP);
			$this->notebook->set_scrollable(TRUE);
			
			// Cria o painel
			// @since rev 1
			$this->panel = new GtkVBox();
			parent::pack_start($this->panel);
			
			// Title
			// @since rev 1
			$hbox = new GtkHBox();
			$this->panel->pack_start($hbox, FALSE, FALSE);
			$box = new GtkEventBox();
			$box->set_size_request(150, 10);
			$hbox->pack_start($box, TRUE, TRUE);
			
			// Botão Minimizar
			// @since rev 1
			$this->minimize = new GtkEventBox();
			$this->minimize->set_size_request(10, 10);
			$hbox->pack_start($this->minimize, FALSE, FALSE);
			$this->minimize->connect(
				"expose_event", 
				array($this, "minimize_onprint")
			);
			$this->minimize->connect(
				"event", 
				array($this, "minimize_onevent")
			);
			
			// GtkNoteBook
			// @since rev 1
			$this->panel->pack_start($this->notebook);
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Método que indica a posição do painel
		// @since rev 1
		public function set_tab_pos($position = Gtk::POS_LEFT)
		{
			$this->minimizedPosition = $position;
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Método de inserção de abas
		// @since rev 1
		public function insert($widget, $label)
		{
			$event = new GtkEventBox();
			$event->set_visible_window(FALSE);
			$event->add($label);
			$this->notebook->insert_page($container = new GtkEventBox(), $event);
			
			$container->add($widget);
			$label->show();
			
			$this->containers[] = $container;
			$this->labels[] = $label;
			$this->abas[] = $widget;
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Método que pinta a imagem do botão no eventbox
		// @since rev 1
		public function minimize_onprint($widget, $event)
		{
			$pixbuf = GdkPixbuf::new_from_file($this->minimizeImage);
			
			$w = $pixbuf->get_width();
			$h = $pixbuf->get_height();
			$x = $widget->allocation->width - $w;
			$y = 0;
			$widget->window->draw_pixbuf(
				$widget->style->bg_gc[Gtk::STATE_NORMAL], 
				$pixbuf, 
				0, 
				0, 
				$x, 
				$y
			);

			return TRUE;
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Eventos do eventbox do botão minimizar
		// @since rev 1
		public function minimize_onevent($widget, $event)
		{
			switch($event->type)
			{
				// On Mouse Up
				// @since rev 1
				case 7:
					// Remove o notebook do painel
					// @since rev 1
					$this->panel->remove($this->notebook);
					
					// Remove o painel
					// @since rev 1
					parent::remove($this->panel);
					
					// Muda o estilo do gtknotebook
					// @since rev 1
					switch($this->minimizedPosition)
					{
						case Gtk::POS_LEFT;
							$angle = 90;
							break;
							
						case Gtk::POS_RIGHT;
							$angle = 270;
							break;
							
						case Gtk::POS_BOTTOM:
						case Gtk::POS_TOP:
							$angle = 360;
							$this->minimizedPosition = Gtk::POS_TOP;
							break;
					}
					$this->notebook->set_tab_pos($this->minimizedPosition);
					
					// Percorre os labels 
					// @since rev 1
					foreach($this->labels as $key => $lbl)
					{
						// Muda o angulo do label
						// @since rev 1 
						$lbl->set_angle($angle);
						
						// Conecta as abas ao click
						// @since rev 1
						$this->connects[] = $lbl->parent->connect("button-press-event", array($this, "notebook_onclick"), $key);
					}
					
					// Percorre os widgets filhos
					// @since rev 1
					foreach($this->containers as $key => $container)
					{
						// Remove o widget de dentro da aba
						// @since rev 1
						$container->remove($this->abas[$key]);
						
						// Adiciona um GtkFixed à aba
						// @since rev 1
						$container->add(new GtkFixed());
					}
					
					// Adiciona a aba diretamente ao container
					// @since rev 1
					parent::pack_start($this->notebook, TRUE, TRUE);
					break;
					
				// On Mouse Over
				// @since rev 1 
				case 10:
					// Muda a imagem
					// @since rev 1 
					$this->minimizeImage = FABULA_PATH . "/images/130b.png";
					$this->minimize->queue_draw();
					
					// Muda o cursor
					// @since rev 1 
					$cursor = new GdkCursor(Gdk::HAND2);
					$widget->window->set_cursor($cursor);
					break;
					
				// On Mouse Out
				// @since rev 1 
				case 11:
					// Muda a imagem
					// @since rev 1 
					$this->minimizeImage = FABULA_PATH . "/images/130a.png";
					$this->minimize->queue_draw();
					break;
			}
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Método de onclick da aba quando esta minimizada
		// @since rev 1
		public function notebook_onclick($notebook, $tab, $page)
		{
			// Remove o notebook do container
			// @since rev 1 
			parent::remove($this->notebook);
			
			// Remove o painel
			// @since rev 1 
			$this->panel->pack_end($this->notebook);
			
			// Muda o estilo do GtkNoteBook
			// @since rev 1 
			$this->notebook->set_tab_pos(Gtk::POS_TOP);
			foreach($this->labels as $key => $lbl)
			{
				// Muda o angulo do Label
				// @since rev 1 
				$lbl->set_angle(0);
				
				// Disconecta o event click das abas
				// @since rev 1 
				$lbl->parent->disconnect($this->connects[$key]);
			}
			$this->connects = array();
			
			// Percorre os widgets filhos
			// @since rev 1
			foreach($this->containers as $key => $container)
			{
				// Remove o widget de dentro da aba
				// @since rev 1
				$container->remove($container->get_child());
				
				// Adiciona um GtkFixed à aba
				// @since rev 1
				$container->add($this->abas[$key]);
			}
			
			// Adiciona o painel todo ao container
			// @since rev 1 
			parent::pack_start($this->panel, TRUE, TRUE);
			
			// Seleciona a aba clicada
			// @since rev 1 
			$this->notebook->set_current_page($page);
		}
	}
