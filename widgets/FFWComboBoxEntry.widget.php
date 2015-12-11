<?php

/**
 * Classe de extensão do GtkComboBoxEntry
 * 
 * @name Fabula::GtkComboBoxEntry()
 * @see GtkComboBoxEntry
 * @see http://gtk.php.net/manual/en/gtk.gtkcomboboxentry.php
 * @package Fabula
 */
class FFWComboBoxEntry extends GtkComboBoxEntry
{	
	/**
	 * Armazena os widgets necessarios
	 * 
	 * @access private
	 * @property array $__widgets
	 */
	private $__widgets = array();
	
	/**
	 * @name __construct()
	 * @return GtkComboBoxEntry
	 */
	public function __construct() 
	{
		// Cria o model
		$this->__widgets['model'] = new GtkListStore(Gobject::TYPE_PHP_VALUE, Gobject::TYPE_STRING);
		
		// Cria o combo
		parent::__construct();
		
		// Cria o render
		//$this->__widgets['render'] = new GtkCellRendererText();
		parent::set_model($this->__widgets['model']);
		parent::set_text_column(1);
		//parent::pack_start($this->__widgets['render']);
	}
	
	/**
	 * Adiciona valores ao final do combo
	 * 
	 * @name append($value, $description)
	 * @param int $value Código do valor adicionado
	 * @param string $description String com o texto visivel no combo
	 */
	public function append($value, $description)
	{
		$this->__widgets['model']->append(array($value, $description));
	}
	
	/**
	 * Busca o index selecionado
	 * 
	 * @name get_path()
	 * @return int
	 */
	public function get_path()
	{
		// Busca o iter e o model
		$iter = $this->get_active_iter();
		if($iter === NULL)
		{
			return FALSE;
		}
		
		// Busca o path
		$path = $this->__widgets['model']->get_path($iter);
		
		// Retorna o index
		return $path[0];
	}
	
	/**
	 * Busca a descrição da seleção
	 * 
	 * @name get_selected_description()
	 * @return string
	 */
	public function get_selected_description()
	{
		// Busca o iter
		$iter = parent::get_active_iter();
		if($iter === NULL)
		{
			return FALSE;
		}
		
		// Busca o path
		$description = $this->__widgets['model']->get_value($iter, 1);
		
		// Retorna o valor
		return $description;
	}
	
	/**
	 * Busca o valor da seleção
	 * 
	 * @name get_selected_value()
	 * @return int
	 */
	public function get_selected_value()
	{
		// Busca o item selecionado
		$iter = parent::get_active_iter();
		if($iter === NULL)
		{
			return FALSE;
		}
		
		// Busca o path
		$value = $this->__widgets['model']->get_value($iter, 0);
		
		// Retorna o valor
		return $value;
	}
	
	/**
	 * Limpa os valores do combobox
	 * 
	 * @name clear()
	 */
	public function clear()
	{
		$this->__widgets['model']->clear();
	}
	
	/**
	 * Seta o valor selecionado no combobox
	 * 
	 * @name set_selected_value($value)
	 * @return int
	 */
	public function set_selected_value($value)
	{
		$index = 0;
		
		// Percorre os valores
		foreach($this->__widgets['model'] as $row)
		{
			// Busca o iter
			$iter = $row->iter;
			
			// Verifica se o valor é igual o iter
			if($value == $this->__widgets['model']->get_value($iter, 0))
			{
				// Seleciona o combo
				//parent::set_active($index);
				parent::set_active_iter($iter);
				return $index;
			}
			
			// Incrementa o index
			$index++;
		}
		
		// Retorna falso
		return FALSE;
	}
}
