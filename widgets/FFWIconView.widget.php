<?php

/**
 * Classe de extensão do GtkIconView
 * 
 * @name Fabula::GtkIconView()
 * @see GtkIconView
 * @see http://gtk.php.net/manual/en/gtk.gtkiconview.php
 * @package Fabula
 */
class FFWIconView extends GtkIconView
{	
	/**
	 * Armazena o model do iconview
	 * 
	 * @access private
	 * @property GtkListStore $model
	 */
	private $model;
	
	/**
	 * Armazena a largura das imagens do iconview
	 * 
	 * @access private
	 * @property int $imageWidth
	 */
	private $imageWidth = 100;
	
	/**
	 * Armazena a altura das imagens do iconview
	 * 
	 * @access private
	 * @property int $imageHeight
	 */
	private $imageHeight = 110;
	
	/**
	 * Armazena a distancia da borda
	 * 
	 * @access private
	 * @property int $imageBorder
	 */
	private $imageBorder = 20;
	
	/**
	 * @name __construct() 
	 * @return GtkIconView
	 */
	public function __construct() 
	{
		// Cria o model
		$this->model = new GtkListStore(GdkPixbuf::gtype, GObject::TYPE_STRING);
		
		// Cria o parent
		parent::__construct($this->model);
		
		// Pré configura o iconview
		parent::set_pixbuf_column(0);
		parent::set_text_column(-1);
		parent::set_columns(0);
		parent::set_item_width(120);
	}
	
	/**
	 * Busca os itens selecionados
	 * 
	 * @name get_selected_items() 
	 */
	public function get_selected_items() 
	{
		// Busca os paths
		$path = parent::get_selected_items();
		
		// Verifica se existe algum selecionado
		if(sizeof($path) <= 0)
		{
			return -1;
		}
		
		// Retorna os itens selecionados
		return $path[0];
	}
	
	/**
	 * Busca o titulo do item selecionado
	 * 
	 * @name get_selected_title() 
	 */
	public function get_selected_title() 
	{
		// Busca os paths
		$path = parent::get_selected_items();
		
		// Verifica se existe algum selecionado
		if(sizeof($path) <= 0)
		{
			return FALSE;
		}
		
		// Busca o iter
		$iter = $this->model[$path[0][0]]->iter;
		
		// Retorna o titulo
		return $this->model->get_value($iter, 1);
	}
	
	/**
	 * Limpa o model do iconview
	 * 
	 * @name clear() 
	 */
	public function clear() 
	{
		// Cria o model
		$this->model->clear();
	}
	
	/**
	 * Adiciona uma imagem no icoview apartir de um arquivo
	 * 
	 * @name add_image_from_file($file, $title="")
	 * @param string $file Caminho da imagem a ser adicionada
	 * @param string $title Titulo da imagem 
	 */
	public function add_image_from_file($file, $title="")
	{
		// Carrega o pixbuf
		$pixBuf = GdkPixbuf::new_from_file($file);
		
		// Busca o tamanho da imagem
		$width	= $pixBuf->get_width();
		$height	= $pixBuf->get_height();
		
		// Verifica se a foto é paisagem ou não
		if($height > $width)
		{
			// Calcula o novo width
			if($height > $this->imageHeight) 
			{
				$newHeight	= $this->imageHeight;
				$newWidth	= $this->imageHeight * $width / $height;
			}
		}
		else
		{
			// Calcula o novo height
			if($width > $this->imageWidth) 
			{
				$newWidth	= $this->imageWidth;
				$newHeight	= $this->imageWidth * $height / $width;
			}
		}
		
		// Gera o thumb
		$pixBuf = $pixBuf->scale_simple($newWidth, $newHeight, Gdk::INTERP_HYPER);
		
		// Adiciona a imagem
		$this->model->append(array(
			$pixBuf, 
			$title
		));
	}
}
