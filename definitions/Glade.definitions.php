<?php

/**
 * @package Glade
 */
class Glade {
	static public function get_widget_name(GtkWidget $widget ) {}
	static public function get_widget_tree(GtkWidget $widget ) {}
}

/**
 * @package Glade
 */
class GladeXML extends GObject {
	const gtype = 168066976;

	public function __construct($filename) {}
	static public function new_from_buffer($buffer) {}
	public function get_widget($name) {}
	public function get_widget_prefix($prefix) {}
	public function relative_file($filename) {}
	public function signal_autoconnect() {}
	public function signal_autoconnect_instance($object) {}
	public function signal_connect() {}
}
