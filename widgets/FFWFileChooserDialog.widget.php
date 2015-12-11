<?php

/**
 * Classe de extensão do GtkFileChooserDialog
 * 
 * @name Fabula::GtkFileChooserDialog()
 * @see GtkFileChooserDialog
 * @see http://gtk.php.net/manual/en/gtk.gtkfilechooserdialog.php
 * @package Fabula
 */
class FFWFileChooserDialog extends GtkFileChooserDialog
{	
	/**
	 * Armazena os widgets necessarios
	 * 
	 * @access private
	 * @property array $__widgets
	 */
	private $__widgets = array();
	
	/**
	 * Armazena o caminho do arquivo
	 * 
	 * @access private
	 * @property array|bool $__filenames
	 */
	private $__filenames = FALSE;
	
	/**
	 * Armazena o caminho do diretorio
	 * 
	 * @access private
	 * @property array|bool $__filenames
	 */
	private $__filepath = FALSE;	
	
	/**
	 * @name __construct($title, $window, $autorun=FALSE, $type=Gtk::FILE_CHOOSER_ACTION_OPEN, $filters=array()) 
	 * @param string $title Texto à ser mostrado no titulo do dialogo
	 * @param GtkWindow $window Janela à qual o dialogo é transistent
	 * @param bool $autorun Opção para auto executar o dialogo ao construir o objeto
	 * @param GtkFileChooserAction $type Tipo do dialogo
	 * @param array $filter Vetor com as opções de filtro
	 * @return GtkFileChooserDialog
	 */
	public function __construct($title, $window, $autorun=FALSE, $type=Gtk::FILE_CHOOSER_ACTION_OPEN, $filters=array()) 
	{
		// Constroi o dialogo
		parent::__construct(
			$title, 
			$window, 
			$type, 
			array(
				Gtk::STOCK_OK, Gtk::RESPONSE_OK, 
				Gtk::STOCK_CANCEL, Gtk::RESPONSE_CANCEL
			)
		);
		
		// Adiciona os filtros
		if($filters != NULL)
		{
			// Percorre os filtros
			foreach($filters as $filter)
			{
				// Cria o filtro
				$fileFilter = new GtkFileFilter();
				
				// Percorre as propriedades
				foreach($filter as $property => $value)
				{
					// Verifica o tipo da propriedade do filtro
					switch($property) 
					{
						case "name":
							$fileFilter->set_name($value);
							break;
						case "mime_type":
							$fileFilter->add_mime_type($value);
							break;
						case "pattern":
							$fileFilter->add_pattern($value);
							break;
					}
				}
				
				// Adiciona o filtro
				parent::add_filter($fileFilter);
			}
		}
		
		// Verifica se é auto executavel
		if($autorun)
		{
			// Inicia o dialogo
			if(parent::run() == Gtk::RESPONSE_OK)
			{			
				// Armazena os filenames
				$this->__filenames = parent::get_filenames();
			}
			else
			{
				// Armazena os filenames
				$this->__filenames = FALSE;
			}
			
			// Destroi o dialogo
			parent::destroy();
		}
	}
	
	/**
	 * Retorna o caminho completo dos arquivos selecionados
	 * 
	 * @name get_filenames() 
	 * @param bool $bool Paramtro necessario para implementar polimorfismo, sem utilidade
	 * @return array|bool
	 */
	public function get_filenames($bool=FALSE)
	{
		return $this->__filenames;
	}
	
	/**
	 * Retorna o caminho completo do diretório dos arquivos selecionados
	 * 
	 * @name get_filepath() 
	 * @return string
	 */
	public function get_filepath()
	{
		// Verifica se existe arquivo selecionado
		if($this->__filenames !== FALSE)
		{
			$this->__filepath = dirname($this->__filenames[0]);
		}
		else
		{
			$this->__filepath = FALSE;
		}
		
		return $this->__filepath;
	}
	
	/**
	 * Inicia o dialogo para seleção de arquivos
	 * 
	 * @name run() 
	 * @return array|bool
	 */
	public function run()
	{
		// Inicia o dialogo
		if(parent::run() == Gtk::RESPONSE_OK)
		{			
			
			// Armazena os filenames
			$this->__filenames = parent::get_filenames();
		}
		else
		{
			// Armazena os filenames
			$this->__filenames = FALSE;
		}
		
		// Destroi o dialogo
		parent::destroy();
		
		// Retorna os filenames
		return $this->__filenames;
	}
}
