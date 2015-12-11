<?php
	/**
	 * @author 		http://fabula.scorninpc.com/
	 * @package		Fabula IDE
	 * @subpackage	TreeViews
	 * @copyright	Copyright (C) 2010 Bruno Pitteli Gonçalves. All rights reserved.
	 * @license 	http://www.gnu.org/licenses/gpl.txt GNU/GPL version 3
	 * @version 	rev 1
	 */
	 
	// -----------------------------------------------------------------------------------------------------------------
	// Classe de treeviews
	// @since rev 1
	class FTreeViews
	{
		// -------------------------------------------------------------------------------------------------------------
		// Cria o efeito zebra em um treeview
		// @since rev 1
		public function treeviewHighLight($widget, $colorA, $colorB)
		{
			// Percorre as colunas do treeview
			// @since rev 1
			$columns = $widget->get_columns();
			foreach($columns as $column)
			{
				// Percorre as colunas do treeview
				// @since rev 1
				$renders = $column->get_cell_renderers();
				$column->set_cell_data_func($renders[0], array("FTreeViews", "treeviewHighLight_onRender"), $colorA, $colorB);
			}
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Callback do onRender do treeview
		// @since rev 1
		public function treeviewHighLight_onRender($column, $cell, $model, $iter, $colorA, $colorB)
		{
			// Busca a linha
			// @since rev 1
			$path = $model->get_path($iter);
			$row = $path[0];
			
			// Verifica a cor
			// @since rev 1
			if($row % 2 == 1)
			{
				$color = $colorA;
			}
			else
			{
				$color = $colorB;
			}
			
			// Pinta o fundo da linha
			// @since rev 1
			$cell->set_property("cell-background", $color);
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Cria o treeview apartir de um XML
		// @since rev 1
		public function treeviewLoadXML($file, $mainObject=NULL)
		{
			// Lê o XML
			// @since rev 1
			$xml = new SimpleXMLElement(file_get_contents($file));
			
			// Cria o frame, o scrool e o treeview
			// @since rev 1
			$treeviewName = (string)$xml['name'];
			$obj['treeview'] = new GtkTreeView();
			$scrolled = new GtkScrolledWindow();
			$scrolled->add($obj['treeview']);
			$obj['object'] = new GtkFrame();
			$obj['object']->add($scrolled);
			
			// Verifica o modo do scroll horizontal
			// @since rev 1
			switch(strtoupper((string)$xml['hscroll']))
			{
				case "TRUE":
					$hscroll = Gtk::POLICY_ALWAYS;
					break;
					
				case "FALSE":
					$hscroll = Gtk::POLICY_NEVER;
					break;
					
				case "AUTO":
				default:
					$hscroll = Gtk::POLICY_AUTOMATIC;
					break;
			}
			
			// Verifica o modo do scroll vertical
			// @since rev 1
			switch(strtoupper((string)$xml['vscroll']))
			{
				case "TRUE":
					$vscroll = Gtk::POLICY_ALWAYS;
					break;
					
				case "FALSE":
					$vscroll = Gtk::POLICY_NEVER;
					break;
					
				case "AUTO":
				default:
					$vscroll = Gtk::POLICY_AUTOMATIC;
					break;
			}
			
			// Configura os scrolls
			// @since rev 1
			$scrolled->set_policy($hscroll, $vscroll);
			
			// Configura o tamanho
			// @since rev 1
			$width = (isset($xml['width'])) ? (int)$xml['width'] : FALSE;
			$height = (isset($xml['height'])) ? (int)$xml['height'] : FALSE;
			$scrolled->set_size_request($width, $height);
			
			// Seta a coluna para a busca
			// @since rev 1
			$searchcolumn = (isset($xml['searchcolumn'])) ? (int)$xml['searchcolumn'] : 0;
			$obj['treeview']->set_search_column($searchcolumn);
			
			// Configura a visibilidade do header da coluna
			// @since rev 1
			switch(strtoupper((string)$xml['hvisible']))
			{
				case "FALSE":
					$hvisible = FALSE;
					break;
					
				case "TRUE":
				default:
					$hvisible = TRUE;
					break;
			}
			$obj['treeview']->set_headers_visible($hvisible);
			
			// Verifica se existe evento button-press-event
			// @since rev 1
			$buttonpressevent = (string)$xml['buttonpressevent'];
			if(strlen($buttonpressevent) > 0)
			{
				// Verifica se é orientado à objeto
				// @since rev 1
				if($mainObject != NULL)
				{
					$function = array($mainObject, $buttonpressevent);
				}
				else
				{
					$function = $buttonpressevent;
				}
				$obj['treeview']->connect("button-press-event", $function);
			}
			
			// Verifica se existe evento cursor-changed
			// @since rev 1
			$cursorchanged = (string)$xml['cursorchanged'];
			if(strlen($cursorchanged) > 0)
			{
				// Verifica se é orientado à objeto
				// @since rev 1
				if($mainObject != NULL)
				{
					$function = array($mainObject, $cursorchanged);
				}
				else
				{
					$function = $cursorchanged;
				}
				$obj['treeview']->connect("cursor-changed", $function);
			}
			
			// Percorre as configurações
			// @since rev 1
			foreach($xml as $configs)
			{
				// Verifica o tipo de configuração
				// @since rev 1
				if($configs->getName() == "columns")
				{
					// Percorre as colunas
					// @since rev 1
					$counter = 0;
					$columnModel = array();
					foreach($configs as $column)
					{
						// Busca as configurações
						$title = (string)$column['title'];
						$visible = (string)$column['visible'];
						
						// Cria a coluna
						// @since rev 1
						$modelType = Gobject::TYPE_STRING;
						if(strtoupper($visible) != "FALSE")
						{
							// Verifica o tipo e o render
							// @since rev 1
							switch(strtoupper((string)$column['type']))
							{
								// Toggle
								// @since rev 1
								case "TOGGLE":
									// Cria o render
									// @since rev 1
									$render = new GtkCellRendererToggle();
									$render->set_property("activatable", TRUE);
									
									// Verifica se deve usar o autocheck
									// @since rev 1
									switch(strtoupper((string)$column['autocheck']))
									{
										case "FALSE":
											break;
										case "TRUE":
										default:
											$render->connect("toggled", array("FTreeViews", "on_toggle"), $obj['treeview'], $counter);
											break;
									}
									
									// Verifica se existe evento onclick da coluna
									// @since rev 1
									$onclick = (string)$column['onclick'];
									if(strlen($onclick) > 0)
									{
										// Verifica se é orientado à objeto
										// @since rev 1
										if($mainObject != NULL)
										{
											$function = array($mainObject, $onclick);
										}
										else
										{
											$function = $onclick;
										}
										$render->connect("toggled", $function, $obj['treeview'], $counter);
									}
									
									// Armazena o atributo e o model
									// @since rev 1
									$attribute = "active";
									$modelType = Gobject::TYPE_BOOLEAN;
									break;
								
								// Texto
								// @since rev 1
								case "TEXT":
								default:
									$render = new GtkCellRendererText();
									
									// Verifica se a coluna é editavel
									// @since rev 1
									switch(strtoupper((string)$column['editable']))
									{
										case "TRUE":
											$render->set_property("editable", TRUE);
											break;
										case "FALSE":
										default:
											break;
									}
									
									// Verifica se existe sinal para edição
									// @since rev 1
									$onedited = (string)$column['onedited'];
									if(strlen($onedited) > 0)
									{
										// Verifica se é orientado à objeto
										// @since rev 1
										if($mainObject != NULL)
										{
											$function = array($mainObject, $onedited);
										}
										else
										{
											$function = $onedited;
										}
										
										$render->connect("edited", $function, $obj['treeview'], $counter);
									}
									
									$attribute = "text";
									$modelType = Gobject::TYPE_STRING;
							}
							// Cria a coluna
							// @since rev 1
							$trvColumn = new GtkTreeViewColumn($title, $render, $attribute, $counter);
							$obj['treeview']->append_column($trvColumn);
							
							// Verifica se existe parametrização do tamanho
							// @since rev 1
							if(isset($column['width']))
							{
								$trvColumn->set_fixed_width((int)$column['width']);
								$trvColumn->set_sizing(Gtk::TREE_VIEW_COLUMN_FIXED);
							}
							
							// Verifica se existe parametrização da formatação
							if(isset($column['onformat']))
							{
								$onformat = (string)$column['onformat'];
								
								// Verifica se é orientado à objeto
								if($mainObject != NULL)
								{
									$function = array($mainObject, $onformat);
								}
								else
								{
									$function = $onformat;
								}
								$trvColumn->set_cell_data_func($render, $function, $counter);
							}
							
						}
						
						// Armazena o model
						// @since rev 1
						$columnModel[$counter++] = $modelType;
					}
					
					// Seta o model
					// @since rev 1
					$model = new GtkTreeStore();
					$model->set_column_types($columnModel);
					$obj['treeview']->set_model($model);
				}
			}
			
			return $obj;
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Cria o efeito do toggle para o treeview
		// @since rev 1
		public function on_toggle($renderer, $row, $treeview, $col) 
		{
			$model = $treeview->get_model();
			$iter = $model->get_iter($row);
			$model->set($iter, $col, !$model->get_value($iter, $col));
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Cria o efeito da toggle no treeview
		// @since rev 1
		public function on_toggle_format($column, $cell, $model, $iter, $col, $trueimage, $falseimage)
		{
			echo "OK";
			
			$path = $model->get_path($iter);
			$row_num = $path[0];

			$value = $model->get_value($iter, $col);
			if($value == TRUE)
			{
				$pixbuf = GdkPixbuf::new_from_file($trueimage); 
			} 
			else 
			{
				$pixbuf = GdkPixbuf::new_from_file($falseimage); 
			}
			
			$cell->set_property("pixbuf", $pixbuf);
		}
	}
