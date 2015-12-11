<?php

/**
 * @package Atk
 */
class Atk {
	const ROLE_INVALID = 0;
	const ROLE_ACCEL_LABEL = 1;
	const ROLE_ALERT = 2;
	const ROLE_ANIMATION = 3;
	const ROLE_ARROW = 4;
	const ROLE_CALENDAR = 5;
	const ROLE_CANVAS = 6;
	const ROLE_CHECK_BOX = 7;
	const ROLE_CHECK_MENU_ITEM = 8;
	const ROLE_COLOR_CHOOSER = 9;
	const ROLE_COLUMN_HEADER = 10;
	const ROLE_COMBO_BOX = 11;
	const ROLE_DATE_EDITOR = 12;
	const ROLE_DESKTOP_ICON = 13;
	const ROLE_DESKTOP_FRAME = 14;
	const ROLE_DIAL = 15;
	const ROLE_DIALOG = 16;
	const ROLE_DIRECTORY_PANE = 17;
	const ROLE_DRAWING_AREA = 18;
	const ROLE_FILE_CHOOSER = 19;
	const ROLE_FILLER = 20;
	const ROLE_FONT_CHOOSER = 21;
	const ROLE_FRAME = 22;
	const ROLE_GLASS_PANE = 23;
	const ROLE_HTML_CONTAINER = 24;
	const ROLE_ICON = 25;
	const ROLE_IMAGE = 26;
	const ROLE_INTERNAL_FRAME = 27;
	const ROLE_LABEL = 28;
	const ROLE_LAYERED_PANE = 29;
	const ROLE_LIST = 30;
	const ROLE_LIST_ITEM = 31;
	const ROLE_MENU = 32;
	const ROLE_MENU_BAR = 33;
	const ROLE_MENU_ITEM = 34;
	const ROLE_OPTION_PANE = 35;
	const ROLE_PAGE_TAB = 36;
	const ROLE_PAGE_TAB_LIST = 37;
	const ROLE_PANEL = 38;
	const ROLE_PASSWORD_TEXT = 39;
	const ROLE_POPUP_MENU = 40;
	const ROLE_PROGRESS_BAR = 41;
	const ROLE_PUSH_BUTTON = 42;
	const ROLE_RADIO_BUTTON = 43;
	const ROLE_RADIO_MENU_ITEM = 44;
	const ROLE_ROOT_PANE = 45;
	const ROLE_ROW_HEADER = 46;
	const ROLE_SCROLL_BAR = 47;
	const ROLE_SCROLL_PANE = 48;
	const ROLE_SEPARATOR = 49;
	const ROLE_SLIDER = 50;
	const ROLE_SPLIT_PANE = 51;
	const ROLE_SPIN_BUTTON = 52;
	const ROLE_STATUSBAR = 53;
	const ROLE_TABLE = 54;
	const ROLE_TABLE_CELL = 55;
	const ROLE_TABLE_COLUMN_HEADER = 56;
	const ROLE_TABLE_ROW_HEADER = 57;
	const ROLE_TEAR_OFF_MENU_ITEM = 58;
	const ROLE_TERMINAL = 59;
	const ROLE_TEXT = 60;
	const ROLE_TOGGLE_BUTTON = 61;
	const ROLE_TOOL_BAR = 62;
	const ROLE_TOOL_TIP = 63;
	const ROLE_TREE = 64;
	const ROLE_TREE_TABLE = 65;
	const ROLE_UNKNOWN = 66;
	const ROLE_VIEWPORT = 67;
	const ROLE_WINDOW = 68;
	const ROLE_HEADER = 69;
	const ROLE_FOOTER = 70;
	const ROLE_PARAGRAPH = 71;
	const ROLE_RULER = 72;
	const ROLE_APPLICATION = 73;
	const ROLE_AUTOCOMPLETE = 74;
	const ROLE_EDITBAR = 75;
	const ROLE_EMBEDDED = 76;
	const ROLE_ENTRY = 77;
	const ROLE_CHART = 78;
	const ROLE_CAPTION = 79;
	const ROLE_DOCUMENT_FRAME = 80;
	const ROLE_HEADING = 81;
	const ROLE_PAGE = 82;
	const ROLE_SECTION = 83;
	const ROLE_REDUNDANT_OBJECT = 84;
	const ROLE_FORM = 85;
	const ROLE_LINK = 86;
	const ROLE_INPUT_METHOD_WINDOW = 87;
	const ROLE_LAST_DEFINED = 88;
	const LAYER_INVALID = 0;
	const LAYER_BACKGROUND = 1;
	const LAYER_CANVAS = 2;
	const LAYER_WIDGET = 3;
	const LAYER_MDI = 4;
	const LAYER_POPUP = 5;
	const LAYER_OVERLAY = 6;
	const LAYER_WINDOW = 7;
	const RELATION_NULL = 0;
	const RELATION_CONTROLLED_BY = 1;
	const RELATION_CONTROLLER_FOR = 2;
	const RELATION_LABEL_FOR = 3;
	const RELATION_LABELLED_BY = 4;
	const RELATION_MEMBER_OF = 5;
	const RELATION_NODE_CHILD_OF = 6;
	const RELATION_FLOWS_TO = 7;
	const RELATION_FLOWS_FROM = 8;
	const RELATION_SUBWINDOW_OF = 9;
	const RELATION_EMBEDS = 10;
	const RELATION_EMBEDDED_BY = 11;
	const RELATION_POPUP_FOR = 12;
	const RELATION_PARENT_WINDOW_OF = 13;
	const RELATION_DESCRIBED_BY = 14;
	const RELATION_DESCRIPTION_FOR = 15;
	const RELATION_NODE_PARENT_OF = 16;
	const RELATION_LAST_DEFINED = 17;
	const STATE_INVALID = 0;
	const STATE_ACTIVE = 1;
	const STATE_ARMED = 2;
	const STATE_BUSY = 3;
	const STATE_CHECKED = 4;
	const STATE_DEFUNCT = 5;
	const STATE_EDITABLE = 6;
	const STATE_ENABLED = 7;
	const STATE_EXPANDABLE = 8;
	const STATE_EXPANDED = 9;
	const STATE_FOCUSABLE = 10;
	const STATE_FOCUSED = 11;
	const STATE_HORIZONTAL = 12;
	const STATE_ICONIFIED = 13;
	const STATE_MODAL = 14;
	const STATE_MULTI_LINE = 15;
	const STATE_MULTISELECTABLE = 16;
	const STATE_OPAQUE = 17;
	const STATE_PRESSED = 18;
	const STATE_RESIZABLE = 19;
	const STATE_SELECTABLE = 20;
	const STATE_SELECTED = 21;
	const STATE_SENSITIVE = 22;
	const STATE_SHOWING = 23;
	const STATE_SINGLE_LINE = 24;
	const STATE_STALE = 25;
	const STATE_TRANSIENT = 26;
	const STATE_VERTICAL = 27;
	const STATE_VISIBLE = 28;
	const STATE_MANAGES_DESCENDANTS = 29;
	const STATE_INDETERMINATE = 30;
	const STATE_TRUNCATED = 31;
	const STATE_REQUIRED = 32;
	const STATE_INVALID_ENTRY = 33;
	const STATE_SUPPORTS_AUTOCOMPLETION = 34;
	const STATE_SELECTABLE_TEXT = 35;
	const STATE_DEFAULT = 36;
	const STATE_ANIMATED = 37;
	const STATE_VISITED = 38;
	const STATE_LAST_DEFINED = 39;
	const TEXT_ATTR_INVALID = 0;
	const TEXT_ATTR_LEFT_MARGIN = 1;
	const TEXT_ATTR_RIGHT_MARGIN = 2;
	const TEXT_ATTR_INDENT = 3;
	const TEXT_ATTR_INVISIBLE = 4;
	const TEXT_ATTR_EDITABLE = 5;
	const TEXT_ATTR_PIXELS_ABOVE_LINES = 6;
	const TEXT_ATTR_PIXELS_BELOW_LINES = 7;
	const TEXT_ATTR_PIXELS_INSIDE_WRAP = 8;
	const TEXT_ATTR_BG_FULL_HEIGHT = 9;
	const TEXT_ATTR_RISE = 10;
	const TEXT_ATTR_UNDERLINE = 11;
	const TEXT_ATTR_STRIKETHROUGH = 12;
	const TEXT_ATTR_SIZE = 13;
	const TEXT_ATTR_SCALE = 14;
	const TEXT_ATTR_WEIGHT = 15;
	const TEXT_ATTR_LANGUAGE = 16;
	const TEXT_ATTR_FAMILY_NAME = 17;
	const TEXT_ATTR_BG_COLOR = 18;
	const TEXT_ATTR_FG_COLOR = 19;
	const TEXT_ATTR_BG_STIPPLE = 20;
	const TEXT_ATTR_FG_STIPPLE = 21;
	const TEXT_ATTR_WRAP_MODE = 22;
	const TEXT_ATTR_DIRECTION = 23;
	const TEXT_ATTR_JUSTIFICATION = 24;
	const TEXT_ATTR_STRETCH = 25;
	const TEXT_ATTR_VARIANT = 26;
	const TEXT_ATTR_STYLE = 27;
	const TEXT_ATTR_LAST_DEFINED = 28;
	const TEXT_BOUNDARY_CHAR = 0;
	const TEXT_BOUNDARY_WORD_START = 1;
	const TEXT_BOUNDARY_WORD_END = 2;
	const TEXT_BOUNDARY_SENTENCE_START = 3;
	const TEXT_BOUNDARY_SENTENCE_END = 4;
	const TEXT_BOUNDARY_LINE_START = 5;
	const TEXT_BOUNDARY_LINE_END = 6;
	const KEY_EVENT_PRESS = 0;
	const KEY_EVENT_RELEASE = 1;
	const KEY_EVENT_LAST_DEFINED = 2;
	const XY_SCREEN = 0;
	const XY_WINDOW = 1;

	static public function focus_tracker_notify(AtkObject $object ) {}
	static public function get_default_registry() {}
	static public function get_root() {}
	static public function get_toolkit_name() {}
	static public function get_toolkit_version() {}
	static public function relation_type_for_name($name) {}
	static public function relation_type_register($name) {}
	static public function remove_focus_tracker($tracker_id) {}
	static public function remove_global_event_listener($listener_id) {}
	static public function remove_key_event_listener($listener_id) {}
	static public function role_for_name($name) {}
	static public function state_type_for_name($name) {}
	static public function text_attribute_get_name($attr) {}
	static public function text_attribute_get_value($attr, $index) {}
}

/**
 * @package Atk
 */
class AtkHyperlink extends GObject {
	const gtype = 167514168;

	public function get_end_index() {}
	public function get_n_anchors() {}
	public function get_object($i) {}
	public function get_start_index() {}
	public function get_uri($i) {}
	public function is_valid() {}
}

/**
 * @package Atk
 */
class AtkObject extends GObject {
	const gtype = 158564040;

	public function get_description() {}
	public function get_index_in_parent() {}
	public function get_layer() {}
	public function get_mdi_zorder() {}
	public function get_n_accessible_children() {}
	public function get_name() {}
	public function get_parent() {}
	public function get_role() {}
	public function ref_accessible_child($i) {}
	public function ref_relation_set() {}
	public function ref_state_set() {}
	public function remove_property_change_handler($handler_id) {}
	public function set_description($description) {}
	public function set_name($name) {}
	public function set_parent(AtkObject $parent ) {}
	public function set_role($role) {}
}

/**
 * @package Atk
 */
class AtkNoOpObject extends AtkObject {
	const gtype = 167537504;

	public function __construct(GObject $obj ) {}
}

/**
 * @package Atk
 */
class AtkObjectFactory extends GObject {
	const gtype = 167560032;

	public function create_accessible(GObject $obj ) {}
	public function invalidate() {}
}

/**
 * @package Atk
 */
class AtkNoOpObjectFactory extends AtkObjectFactory {
	const gtype = 167569624;

	public function __construct() {}
}

/**
 * @package Atk
 */
class AtkRegistry extends GObject {
	const gtype = 167579216;

	public function get_factory(GType $type ) {}
	public function get_factory_type(GType $type ) {}
	public function set_factory_type(GType $type , GType $factory_type ) {}
}

/**
 * @package Atk
 */
class AtkRelation extends GObject {
	const gtype = 167588984;

	public function __construct($targets, $relationship) {}
	public function get_relation_type() {}
}

/**
 * @package Atk
 */
class AtkRelationSet extends GObject {
	const gtype = 167598328;

	public function __construct() {}
	public function add(AtkRelation $relation ) {}
	public function add_relation_by_type($relationship, AtkObject $target ) {}
	public function contains($relationship) {}
	public function get_n_relations() {}
	public function get_relation($i) {}
	public function get_relation_by_type($relationship) {}
	public function remove(AtkRelation $relation ) {}
}

/**
 * @package Atk
 */
class AtkStateSet extends GObject {
	const gtype = 167609128;

	public function __construct() {}
	public function add_state($type) {}
	public function and_sets(AtkStateSet $compare_set ) {}
	public function clear_states() {}
	public function contains_state($type) {}
	public function is_empty() {}
	public function or_sets(AtkStateSet $compare_set ) {}
	public function remove_state($type) {}
	public function xor_sets(AtkStateSet $compare_set ) {}
}

/**
 * @package Atk
 */
class AtkUtil extends GObject {
	const gtype = 167620072;

}
