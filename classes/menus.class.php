<?php
	/**
	 * @author 		http://fabula.scorninpc.com/
	 * @package		Fabula IDE
	 * @subpackage	Menus
	 * @copyright	Copyright (C) 2010 Bruno Pitteli Gonçalves. All rights reserved.
	 * @license 	http://www.gnu.org/licenses/gpl.txt GNU/GPL version 3
	 * @version 	rev 1
	 */
	 
	// -----------------------------------------------------------------------------------------------------------------
	// Classe de tratamento de menus
	// @since rev 1
	class FMenus
	{
		// -------------------------------------------------------------------------------------------------------------
		// Cria um menubar a partir de um XML
		// @since rev 1
		public function menuLoadXML($file, $mainObject=NULL)
		{
			// Lê o XML
			// @since rev 1
			$xml = new SimpleXMLElement(file_get_contents($file));
			
			// Cria o vetor da barra
			// @since rev 1
			$barName = (string)$xml['name'];
			$obj['object'] = new GtkMenuBar();
			
			// Percorre os itens principais da barra
			// @since rev 1
			foreach($xml as $item)
			{
				// Armazena o nome
				// @since rev 1
				$name = (string)$item['name'];
				
				// Cria o item principal do menu
				$subObj = FMenus::menuCreate($item, $mainObject);
				$obj['object']->append($subObj['object']);
				$obj[$name] = $subObj;
			}
			
			// Retorna a vetor
			// @since rev 1
			return $obj;
		}
		
		// -------------------------------------------------------------------------------------------------------------
		// Cria os menus recursivamente do método menuLoadXML
		// @since rev 1
		public function menuCreate($xml, $mainObject)
		{
			// Cria o menu
			// @since rev 1
			$menu = new GtkMenu();
			
			// Cria o vetor
			// @since rev 1
			$obj = array();
			$obj['object'] = new GtkMenuItem((string)$xml['title']);
			$obj['object']->set_submenu($menu);
			
			// Percorre os itens
			// @since rev 1
			foreach($xml as $xmlItem)
			{
				// Guarda o nome do item
				// @since rev 1
				$name = (string)$xmlItem['name'];
				$title = (string)$xmlItem['title'];
				$onclick = (string)$xmlItem['onclick'];
				
				// Verifica se é um submenu, um item, um separador
				// @since rev 1
				if($xmlItem->getName() == "menu")
				{
					// Cria o submenu
					// @since rev 1
					$subObj = FMenus::menuCreate($xmlItem, $mainObject);
					$menu->append($subObj['object']);
					$obj[$name] = $subObj;
				}
				elseif($xmlItem->getName() == "separator")
				{
					$menu->append(new GtkSeparatorMenuItem());
				}
				else
				{
					// Verifica se possui sock icon
					// @since rev 1
					$stockicon = (string)$xmlItem['stockicon'];
					if(defined($stockicon))
					{
						$obj[$name] = new GtkImageMenuItem($title);
						$obj[$name]->set_image(GtkImage::new_from_stock(constant($stockicon), Gtk::ICON_SIZE_MENU));
					}
					else
					{
						$obj[$name] = new GtkMenuItem($title);
					}
					
					// Verifica se existe evento
					// @since rev 1
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
						$obj[$name]->connect_simple("activate", $function);
					}
					
					// Adiciona o item
					// @since rev 1
					$menu->append($obj[$name]);
				}
			}
			
			// Retorna o objeto
			// @since rev 1
			return $obj;
		}
		
		
	}
