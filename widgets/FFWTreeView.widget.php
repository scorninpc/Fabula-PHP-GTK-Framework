<?php

/**
 * Classe de extensão do GtkTreeView
 * 
 * @name Fabula::GtkTreeView()
 * @see GtkTreeView
 * @see http://gtk.php.net/manual/en/gtk.gtktreeview.php
 * @package Fabula
 */
class FFWTreeView extends GtkTreeView {
	/**
	 * Armazena o contador das colunas
	 * 
	 * @access private
	 * @property int $__columnCount
	 */
	private $__columnCount = 0;
	
	/**
	 * @name __construct
	 * @param GtkTreeModel $model Modelo a ser adicionado ao treeview
	 * @return GtkTreeView
	 */
	public function __construct($model)  {
		// Verifica se existe model
		if($model != NULL) {
			// Cria o treeview com o model passado
			parent::__construct($model);
		}
		else {
			// Cria o treeview sem model
			parent::__construct();
		}
	}
	
	/**
	 * Adiciona uma nova coluna ao treeview
	 * 
	 * @name add_column
	 * @param GtkCellRender $render O render da coluna
	 * @param string $title Titulo da coluna
	 * @param string $attribute Atributo da coluna
	 * @return GtkTreeViewColumn
	 */
	public function add_column($render, $title, $attribute) {
		// Cria a coluna
		$column = new GtkTreeViewColumn(
			$title, 
			$render, 
			$attribute, 
			$this->__columnCount
		);
		
		// Soma a quantidade de colunas
		$this->__columnCount++;
		
		// Adiciona a coluna ao treeview
		parent::append_column($column);
		
		// Retorna a coluna
		return $column;
	}
	
	/**
	 * Adiciona valores ao treeview
	 * 
	 * @name add_row
	 * @param array $values Vetor com os valores
	 */
	public function add_row($values) {
		// Busca o model do treeview
		$model = parent::get_model();
		
		// Adiciona os valores
		$model->append($values);
	}
	
	/**
	 * Deleta a linha indicada
	 * 
	 * @name remove_row
	 * @param array $paths Numero das linhas iniciandas por 0 (zero)
	 */
	public function remove_row($paths)  {
		// Veçrifica se é um fetor
		if(!is_array($paths)) {
			$paths = array($paths);
		}
		
		// Inverte o vetor para apagar de baixo para cima
		$paths = array_reverse($paths);
		
		// Busca o model 
		$model = parent::get_model();
		
		// Percorre a lista
		foreach($paths as $path) {
			// Busca o iter
			$iter = $model->get_iter($path);
			
			// Remove a linha
			$model->remove($iter);
		}
	}
	
	/**
	 * Adiciona valores ao treeview com node
	 * 
	 * @name add_node_row
	 * @param GtkIter $node Nó do item que será adicionado a linha
	 * @param array $values Vetor com os valores
	 * @return GtkIter
	 */
	public function add_node_row($node, $values) {
		// Busca o model do treeview
		$model = parent::get_model();
		
		// Adiciona os valores
		$iter = $model->append($node, $values);
		
		// $retorna o Node
		return $iter;
	}
	
	/**
	 * Modifica o tipo de seleção
	 * 
	 * @name set_selection_mode
	 * @param GtkSelectionMode $selectionMode Tipo da seleção
	 */
	public function set_selection_mode($selectionMode) {
		// Busca a seleção
		$selection = parent::get_selection();
		
		// Muda o tipo de seleção
		$selection->set_mode($selectionMode);
	}
	
	/**
	 * Busca os paths selecionados
	 * 
	 * @name get_selected_paths
	 * @return array|false
	 */
	public function get_selected_paths() {
		// Busca a seleção
		$selection = parent::get_selection();
		
		// Verifica se existe seleção
		if($selection->count_selected_rows() > 0) {
			// Busca o model e o iter
			list($model, $arPaths) = $selection->get_selected_rows();
			
			// Retorna o valor
			return $arPaths;
		}
		else {
			// Retorna FALSE para indicar que não à seleção
			return FALSE;
		}
	}
	
	/**
	 * Busca os valores selecionado
	 * 
	 * @name get_selected_values
	 * @return array|false
	 */
	public function get_selected_values() {
		// Busca a seleção
		$selection = parent::get_selection();
		
		// Verifica se existe seleção
		if($selection->count_selected_rows() > 0) {
			// Busca o model e o iter
			list($model, $iter) = $selection->get_selected();
			
			// Percorre as colunas
			$value = array();
			for($i=0; $i<$this->__columnCount; $i++) {
				// Armazena o valor
				$value[] = $model->get_value($iter, $i);
			}
			
			// Retorna o valor
			return $value;
		}
		else {
			// Retorna FALSE para indicar que não à seleção
			return FALSE;
		}
	}
	
	/**
	 * Busca os valores selecionados
	 * 
	 * @name get_selected_rows
	 * @return array|false
	 */
	public function get_selected_rows() {
		// Busca a seleção
		$selection = parent::get_selection();
		
		// Verifica se existe seleção
		if($selection->count_selected_rows() > 0) {
			// Busca o model e o iter
			list($model, $paths) = $selection->get_selected_rows();
			
			// Busca a quantidade de colunas do model
			$columnCount = $model->get_n_columns();
			
			// Percorre as linhas
			$rows = array();
			foreach ($paths as $path)  {
				// Busca o iter
				$iter = $model->get_iter($path);

				// Percorre as colunas
				$value = array();
				for($i=0; $i<$columnCount; $i++) {
					// Armazena o valor
					$value[] = $model->get_value($iter, $i);
				}
				
				// Adiciona a linha ao model
				$rows[] = $value;
			}
			
			// Retorna o valor
			return $rows;
		}
		else {
			// Retorna FALSE para indicar que não à seleção
			return FALSE;
		}
	}
	
	/**
	 * Cria o estilo zebra
	 * 
	 * @name set_highlight
	 * @param string $colorA Cor das linhas impares em hexadecimal
	 * @param string $colorB Cor das linhas pares em hexadecimal
	 */
	public function set_highlight($colorA, $colorB) {
		// Percorre as colunas do treeview
		$columns = parent::get_columns();
		foreach($columns as $column) {
			// Recupera o render
			$renders = $column->get_cell_renderers();
			
			// Adiciona o callback com as cores
			$column->set_cell_data_func(
				$renders[0], 
				array($this, "__highlight_onRender"), 
				$colorA, 
				$colorB
			);
		}
	}
	
	/**
	 * Limpa o treeview
	 * 
	 * @name clear
	 */
	public function clear() {
		// Busca o model
		$model = parent::get_model();
		
		// Limpa o model
		$model->clear();
	}
	
	/**
	 * Cria o treeview apartir de um XML
	 * 
	 * @name treeviewLoadXML
	 * @param string $file Caminho do arquivo XML com as definições do treeview
	 * @param object $mainObject Objeto onde está os métodos callback do treeview 
	 */
	public function treeviewLoadXML($file, $mainObject=NULL) {
		// Lê o XML
		$xml = new SimpleXMLElement(file_get_contents($file));
		
		// Seta a coluna para a busca
		$searchcolumn = (isset($xml['searchcolumn'])) ? (int)$xml['searchcolumn'] : 0;
		parent::set_search_column($searchcolumn);
		
		// Configura a visibilidade do header da coluna
		switch(strtoupper((string)$xml['hvisible'])) {
			case "FALSE":
				$hvisible = FALSE;
				break;
				
			case "TRUE":
			default:
				$hvisible = TRUE;
				break;
		}
		parent::set_headers_visible($hvisible);
		
		// Verifica se existe evento button-press-event
		$buttonpressevent = (string)$xml['buttonpressevent'];
		if(strlen($buttonpressevent) > 0) {
			// Verifica se é orientado à objeto
			if($mainObject != NULL)
			{
				// Cria o método callback
				$function = array($mainObject, $buttonpressevent);
			}
			else {
				// Cria a função callback
				$function = $buttonpressevent;
			}
			parent::connect("button-press-event", $function);
		}
		
		// Verifica se existe evento cursor-changed
		$cursorchanged = (string)$xml['cursorchanged'];
		if(strlen($cursorchanged) > 0) {
			// Verifica se é orientado à objeto
			if($mainObject != NULL) {
				// Cria o método callback
				$function = array($mainObject, $cursorchanged);
			}
			else {
				// Cria a função callback
				$function = $cursorchanged;
			}
			parent::connect("cursor-changed", $function);
		}
		
		// Percorre as configurações
		foreach($xml as $configs) {
			// Verifica se são as configurações das colunas
			if($configs->getName() == "columns") {
				// Percorre as colunas
				$counter = 0;
				$columnModel = array();
				foreach($configs as $column) {
					// Busca as configurações
					$title = (string)$column['title'];
					$visible = (string)$column['visible'];
					
					// Cria a coluna
					$modelType = Gobject::TYPE_STRING;
					if(strtoupper($visible) != "FALSE") {
						// Verifica o tipo e o render
						switch(strtoupper((string)$column['type'])) {
							// Toggle
							case "TOGGLE":
								// Cria o render
								$render = new GtkCellRendererToggle();
								$render->set_property("activatable", TRUE);
								
								// Verifica se deve usar o autocheck
								switch(strtoupper((string)$column['autocheck'])) {
									case "FALSE":
										break;
									case "TRUE":
									default:
										$render->connect("toggled", array($this, "__onToggle"), $counter);
										break;
								}
								
								// Verifica se existe evento onclick da coluna
								$onclick = (string)$column['onclick'];
								if(strlen($onclick) > 0) {
									// Verifica se é orientado à objeto
									if($mainObject != NULL) {
										// Cria o método callback
										$function = array($mainObject, $onclick);
									}
									else {
										// Cria a função callback
										$function = $onclick;
									}
									
									// Conecta o callback de check
									$render->connect("toggled", $function, $counter);
								}
								
								// Armazena o atributo e o model
								$attribute = "active";
								$modelType = Gobject::TYPE_BOOLEAN;
								break;
							
							// Texto
							case "TEXT":
							default:
								$render = new GtkCellRendererText();
								
								// Verifica se a coluna é editavel
								switch(strtoupper((string)$column['editable'])) {
									case "TRUE":
										$render->set_property("editable", TRUE);
										break;
									case "FALSE":
									default:
										break;
								}
								
								// Verifica se existe sinal para edição
								$onedited = (string)$column['onedited'];
								if(strlen($onedited) > 0) {
									// Verifica se é orientado à objeto
									if($mainObject != NULL) {
										// Cria o método callback
										$function = array($mainObject, $onedited);
									}
									else {
										// Cria a função callback
										$function = $onedited;
									}
									
									// Conecta a coluna ao callback 
									$render->connect("edited", $function, $this, $counter);
								}
								
								// Armazena os atributos
								$attribute = "text";
								$modelType = Gobject::TYPE_STRING;
						}
						
						// Cria a coluna com as configurações
						$trvColumn = new GtkTreeViewColumn($title, $render, $attribute, $counter);
						parent::append_column($trvColumn);
						
						// Verifica se existe parametrização do tamanho da coluna
						if(isset($column['width'])) {
							$trvColumn->set_fixed_width((int)$column['width']);
							$trvColumn->set_sizing(Gtk::TREE_VIEW_COLUMN_FIXED);
						}
						
						// Verifica se existe parametrização da formatação
						if(isset($column['onformat'])) {
							$onformat = (string)$column['onformat'];
							
							// Verifica se é orientado à objeto
							if($mainObject != NULL) {
								// Cria o método callback
								$function = array($mainObject, $onformat);
							}
							else {
								// Cria a função callback
								$function = $onformat;
							}
							
							// Conecta o callback de renderização
							$trvColumn->set_cell_data_func($render, $function, $counter);
						}
						
					}
					
					// Armazena o model
					$columnModel[$counter++] = $modelType;
				}
				
				// Seta o model
				$model = new GtkTreeStore();
				$model->set_column_types($columnModel);
				parent::set_model($model);
			}
		}
	}

	/**
	 * Callback do onRender do treeview para highlight
	 * 
	 * @name __highlight_onRender
	 * @access private
	 * @param GtkCellLayout $column Coluna que esta sendo renderizada
	 * @param GtkCellRenderer $cell Render da coluna
	 * @param GtkTreeModel $model Modelo do treeview
	 * @param GtkTreeIter $iter Iter que esta sendo renderizado
	 * @param string $colorA Cor das linhas impares em hexadecimal
	 * @param string $colorB Cor das linhas pares em hexadecimal
	 */
	public function __highlight_onRender($column, $cell, $model, $iter, $colorA, $colorB) {
		// Busca a linha
		$path = $model->get_path($iter);
		$row = $path[0];
		
		// Verifica se a linha é par ou impar
		if($row % 2 == 1) {
			$color = $colorA;
		}
		else {
			$color = $colorB;
		}
		
		// Pinta o fundo da linha
		$cell->set_property("cell-background", $color);
	}
	
	/**
	 * Cria o efeito do toggle para o treeview
	 * 
	 * @name __onToggle
	 * @access private
	 * @param GtkCellRendererToggle $renderer Render a ser checkado
	 * @param string $path Path que foi clicado
	 * @param int $col Index da coluna clicada
	 */
	public function __onToggle($renderer, $path, $col)  {
		$model = parent::get_model();
		$iter = $model->get_iter($row);
		$model->set($iter, $col, !$model->get_value($iter, $col));
	}
}
