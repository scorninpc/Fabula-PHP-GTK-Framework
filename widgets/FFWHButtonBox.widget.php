<?php

/**
 * Classe de extensão do GtkHButtonBox
 * 
 * @name Fabula::GtkHButtonBox()
 * @see GtkHButtonBox
 * @see http://gtk.php.net/manual/en/gtk.gtkhbuttonbox.php
 * @package Fabula
 */
class FFWHButtonBox extends GtkHButtonBox
{
	/**
	 * @name __construct()
	 * @param string $layout Disposição dos botões
	 * @param int $spacing Espaço entre os botões
	 * @param int $border_with Espaço das bordas
	 * @return GtkHButtonBox
	 */
	public function __construct($layout, $spacing, $border_width)
	{
		// Constroi o parente
		parent::__construct();

		// Disposição dos botoes
		parent::set_layout($layout);

		// Espaço entre os botões
		parent::set_spacing($spacing);

		// Borda do ButtonBox
		parent::set_border_width($border_width);
	}

	/**
	 * Adiciona um botão no final do box apartir de um stockitem
	 * 
	 * @name add_button_from_stock($stock_id)
	 * @param GtkStockItem $stock_id Id do stock a ser adicionado
	 * @return GtkButton
	 */
	public function add_button_from_stock($stock_id)
	{
		// Cria o botão
		$button = GtkButton::new_from_stock($stock_id);

		// Adiciona o botão
		parent::add($button);

		// Retorna o botão
		return $button;
	}

	/**
	 * Adiciona um botão no final do box
	 * 
	 * @name add_button_from_widget($button)
	 * @param GtkButton $button Widget a ser adicionado ao final do box
	 * @return GtkButton
	 */
	public function add_button_from_widget($button)
	{
		// Adiciona o botão
		parent::add($button);

		// Retorna o botão
		return $button;
	}
}
