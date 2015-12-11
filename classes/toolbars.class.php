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
	// Classe de caixas de texto
	// @since rev 1
	class FToolbars
	{
		// -------------------------------------------------------------------------------------------------------------
		// Cria o toolbar apartir de um XML
		// @since rev 1
		public function toolbarLoadXML($file, $mainObject=NULL)
		{
			// Lê o XML
			// @since rev 1
			$xml = new SimpleXMLElement(file_get_contents($file));
			
			// Cria o frame, o scrool e o treeview
			// @since rev 1
			$obj['object'] = new GtkToolBar();
			$toolbarName = (string)$xml['name'];
			$obj['object']->set_tooltips(TRUE);
			
			$clicked = (string)$xml['clicked'];
			
			// Percorre as configurações
			// @since rev 1
			$counter = 0;
			foreach($xml as $toolitems)
			{
				// Verifica o tipo de configuração
				// @since rev 1
				if($toolitems->getName() == "stockitem")
				{
					// Ajusta as informações
					// @since rev 1
					$toolitems = $toolitems[0];
					
					// Busca as configurações
					// @since rev 1
					$title = (string)$toolitems['title'];
					$name = (string)$toolitems['name'];
					$stock = (string)$toolitems['stock'];
					
					// Cria o botao
					// @since rev 1
					$obj[$name] =  GtkToolButton::new_from_stock(constant($stock));
					$obj['object']->insert($obj[$name], $counter);
					
					// Adiciona o evento se houver
					// @since rev 1
					if(strlen($clicked) > 0)
					{
						// Verifica se é orientado à objeto
						// @since rev 1
						if($mainObject != NULL)
						{
							$function = array($mainObject, $clicked);
						}
						else
						{
							$function = $clicked;
						}
						$obj[$name]->connect("clicked", $function, $name);
					}
					
					// Verifica se esta desabilitado
					// @since rev 1
					switch(strtoupper((string)$toolitems['enabled']))
					{
						case "FALSE":
							$enabled = FALSE;
							break;
							
						case "TRUE":
						default:
							$enabled = TRUE;
							break;
					}
					$obj[$name]->set_sensitive($enabled);
					
					// Verifica se possui tooltip
					// @since rev 
					if(isset($toolitems['tooltip']))
					{
						$tt = new GtkTooltips();
						$tt->set_tip(
							$obj[$name],
							(string)$toolitems['tooltip']
						);
						unset($tt);
					}
				}
				else if($toolitems->getName() == "separator")
				{
					$obj['object']->insert(new GtkSeparatorToolItem(), $counter);
				}
				else if($toolitems->getName() == "toolitem")
				{
					// Busca o nome do item
					$name = (string)$toolitems['name'];
					
					// Cria o item
					$obj[$name] = new GtkToolItem();
					
					// Adiciona o item ao toolbar
					$obj['object']->insert($obj[$name], $counter);
				}
				
				// Soma o contador
				// @since rev 1
				$counter++;
			}
			
			// Retorna o toolbar
			// @since rev 1
			return $obj;
		}
	}
