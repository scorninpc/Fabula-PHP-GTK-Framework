<?php

/**
 * Classe do widget GtkSourceEditor
 * 
 * @name Fabula::GtkSourceEditor()
 * @see GtkSourceview
 * @example GtkSourceEditor.php
 * @package Fabula
 */
class FFWSourceEditorAutocomplete extends GtkDialog {	
	public function __construct($window) {
		parent::__construct(Gtk::WINDOW_TOPLEVEL, $window, Gtk::DIALOG_NO_SEPARATOR);
		parent::set_decorated(FALSE);
		parent::set_size_request(150, 250);
		parent::set_skip_taskbar_hint(TRUE);
		parent::connect("delete-event", array($this, "autocomplete_window_destroy"));
	}
	
	public function autocomplete_window_destroy() {
		parent::hide();
		return TRUE;
	}
}
