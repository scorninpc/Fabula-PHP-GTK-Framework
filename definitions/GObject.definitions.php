<?php

/**
 * @package GObject
 */
class GType {
	private function __construct() {}
}

/**
 * @package GObject
 */
class GObject {
	const gtype = 80;
	const TYPE_INVALID = 0;
	const TYPE_NONE = 4;
	const TYPE_INTERFACE = 8;
	const TYPE_CHAR = 12;
	const TYPE_BOOLEAN = 20;
	const TYPE_LONG = 32;
	const TYPE_ENUM = 48;
	const TYPE_FLAGS = 52;
	const TYPE_DOUBLE = 60;
	const TYPE_STRING = 64;
	const TYPE_POINTER = 68;
	const TYPE_BOXED = 72;
	const TYPE_PARAM = 76;
	const TYPE_OBJECT = 80;
	const TYPE_PHP_VALUE = 157971928;
	const PRIORITY_HIGH = -100;
	const PRIORITY_DEFAULT = 0;
	const PRIORITY_HIGH_IDLE = 100;
	const PRIORITY_DEFAULT_IDLE = 200;
	const PRIORITY_LOW = 300;
	const IO_IN = 1;
	const IO_OUT = 4;
	const IO_PRI = 2;
	const IO_ERR = 8;
	const IO_HUP = 16;
	const IO_NVAL = 32;
	const SIGNAL_RUN_FIRST = 1;
	const SIGNAL_RUN_LAST = 2;
	const SIGNAL_RUN_CLEANUP = 4;
	const SIGNAL_NO_RECURSE = 8;
	const SIGNAL_DETAILED = 16;
	const SIGNAL_ACTION = 32;
	const SIGNAL_NO_HOOKS = 64;
	const PARAM_READABLE = 1;
	const PARAM_WRITABLE = 2;
	const PARAM_CONSTRUCT = 4;
	const PARAM_CONSTRUCT_ONLY = 8;
	const PARAM_LAX_VALIDATION = 16;
	const PARAM_READWRITE = 3;

	public function __construct() {}
	public function __tostring() {}
	public function connect($signal, $callback) {}
	public function connect_after($signal, $callback) {}
	public function connect_object($signal, $callback) {}
	public function connect_object_after($signal, $callback) {}
	public function connect_simple($signal, $callback) {}
	public function connect_simple_after($signal, $callback) {}
	public function notify($property_name) {}
	public function freeze_notify() {}
	public function thaw_notify() {}
	public function get_property($property_name) {}
	public function set_property($property_name, $value) {}
	public function get_data($key) {}
	public function set_data($key, $value) {}
	public function emit() {}
	public function block($handler_id) {}
	public function unblock($handler_id) {}
	public function disconnect($handler_id) {}
	public function is_connected($handler_id) {}
	static public function signal_query($signal, $gtype) {}
	public function stop_emission($signal) {}
	static public function register_type($class) {}
	static public function list_properties($gtype) {}
	static public function signal_list_ids($gtype) {}
	static public function signal_list_names($gtype) {}
	public function emit_stop_by_name($signal) {}
}

/**
 * @package GObject
 */
abstract class GBoxed {
	const gtype = 72;

	public function copy() {}
}

/**
 * @package GObject
 */
class GPointer {
	const gtype = 68;

	public function __construct() {}
}

/**
 * @package GObject
 */
class GParamSpec {
	private function __construct() {}
	public function __tostring() {}
}
