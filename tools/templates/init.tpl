<?php

// Seta a codificação do programa
ini_set("php-gtk.codepage", "UTF-8");

// Cria o caminho absoluto do projeto
define("APPLICATION_PATH", dirname(__FILE__) . "/");

// Inclui a classe fabula
require_once(APPLICATION_PATH . "library/fabulafw/Fabula.class.php");

// Auto load
function autoLoader($name) {
	// Verifica se é um form
	if(substr($name, 0, 3) == "frm") {
		// Cria os caminhos
		$file_interface = APPLICATION_PATH . "interfaces/" . $name. ".interface.php";
		$file_form = APPLICATION_PATH . $name . ".php";
		
		// Inclui a interface
		require_once($file_interface);
		
		// Inclui o arquivo
		require_once($file_form);
	}
}
spl_autoload_register("autoLoader");

// Seta as configurações do GTK
$gtk = GtkSettings::get_default();
$gtk->set_long_property("gtk-button-images", TRUE, 0);

// Inicia o formMain
new frmMain();
