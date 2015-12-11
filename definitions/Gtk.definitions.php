<?php

/**
 * @package Gtk
 */
interface GtkToolShell {
	function get_ellipsize_mode();
	function get_icon_size();
	function get_orientation();
	function get_relief_style();
	function get_style();
	function get_text_alignment();
	function get_text_orientation();
	function get_text_size_group();
	function rebuild_menu();
}

/**
 * @package Gtk
 */
interface GtkBuildable {
	function add_child(GtkBuilder $builder , GObject $child, $type);
	function construct_child(GtkBuilder $builder, $name);
	function get_internal_child(GtkBuilder $builder, $childname);
	function get_name();
	function parser_finished(GtkBuilder $builder );
	function set_name($name);
}

/**
 * @package Gtk
 */
interface GtkPrintOperationPreview {
	function end_preview();
	function is_selected($page_nr);
	function render_page($page_nr);
}

/**
 * @package Gtk
 */
interface GtkRecentChooser {
	function add_filter(GtkRecentFilter $filter );
	function get_current_item();
	function get_current_uri();
	function get_filter();
	function get_items();
	function get_limit();
	function get_local_only();
	function get_select_multiple();
	function get_show_icons();
	function get_show_not_found();
	function get_show_numbers();
	function get_show_private();
	function get_show_tips();
	function get_sort_type();
	function get_uris();
	function list_filters();
	function remove_filter(GtkRecentFilter $filter );
	function select_all();
	function select_uri($uri, $error);
	function set_current_uri($uri, $error);
	function set_filter(GtkRecentFilter $filter );
	function set_limit($limit);
	function set_local_only($local_only);
	function set_select_multiple($select_multiple);
	function set_show_icons($show_icons);
	function set_show_not_found($show_not_found);
	function set_show_numbers($show_numbers);
	function set_show_private($show_private);
	function set_show_tips($show_tips);
	function set_sort_func($callback);
	function set_sort_type($sort_type);
	function unselect_all();
	function unselect_uri($uri);
}

/**
 * @package Gtk
 */
interface GtkCellEditable {
	function editing_done();
	function remove_widget();
	function start_editing(GdkEvent $event );
}

/**
 * @package Gtk
 */
interface GtkCellLayout {
	function add_attribute(GtkCellRenderer $cell, $attribute, $column);
	function clear();
	function clear_attributes(GtkCellRenderer $cell );
	function pack_end(GtkCellRenderer $cell );
	function pack_start(GtkCellRenderer $cell );
	function reorder(GtkCellRenderer $cell, $position);
	function set_attributes($cell);
	function set_cell_data_func(GtkCellRenderer $cellrenderer, $callback);
}

/**
 * @package Gtk
 */
interface GtkEditable {
	function copy_clipboard();
	function cut_clipboard();
	function delete_selection();
	function delete_text($start_pos, $end_pos);
	function get_chars($start_pos, $end_pos);
	function get_editable();
	function get_position();
	function get_selection_bounds();
	function insert_text($text, $position);
	function paste_clipboard();
	function select_region($start, $end);
	function set_editable($is_editable);
	function set_position($position);
}

/**
 * @package Gtk
 */
interface GtkFileChooser {
	function add_filter(GtkFileFilter $filter );
	function add_shortcut_folder($folder, $error);
	function add_shortcut_folder_uri($uri, $error);
	function get_action();
	function get_create_folders();
	function get_current_folder();
	function get_current_folder_uri();
	function get_do_overwrite_confirmation();
	function get_extra_widget();
	function get_filename();
	function get_filenames();
	function get_filter();
	function get_local_only();
	function get_preview_filename();
	function get_preview_uri();
	function get_preview_widget();
	function get_preview_widget_active();
	function get_select_multiple();
	function get_show_hidden();
	function get_uri();
	function get_uris();
	function get_use_preview_label();
	function list_filters();
	function list_shortcut_folder_uris();
	function list_shortcut_folders();
	function remove_filter(GtkFileFilter $filter );
	function remove_shortcut_folder($folder, $error);
	function remove_shortcut_folder_uri($uri, $error);
	function select_all();
	function select_filename($filename);
	function select_uri($uri);
	function set_action($action);
	function set_create_folders($create_folders);
	function set_current_folder($filename);
	function set_current_folder_uri($uri);
	function set_current_name($name);
	function set_do_overwrite_confirmation($do_overwrite_confirmation);
	function set_extra_widget(GtkWidget $extra_widget );
	function set_filename($filename);
	function set_filter(GtkFileFilter $filter );
	function set_local_only($local_only);
	function set_preview_widget(GtkWidget $preview_widget );
	function set_preview_widget_active($active);
	function set_select_multiple($select_multiple);
	function set_show_hidden($show_hidden);
	function set_uri($uri);
	function set_use_preview_label($use_label);
	function unselect_all();
	function unselect_filename($filename);
	function unselect_uri($uri);
}

/**
 * @package Gtk
 */
interface GtkTreeDragDest {
	function drag_data_received($dest, GtkSelectionData $selection_data );
	function row_drop_possible($dest_path, GtkSelectionData $selection_data );
}

/**
 * @package Gtk
 */
interface GtkTreeDragSource {
	function drag_data_delete($path);
	function drag_data_get($path, GtkSelectionData $selection_data );
	function row_draggable($path);
}

/**
 * @package Gtk
 */
interface GtkTreeModel {
	function for_each($callback);
	function get();
	function get_column_type($index);
	function get_flags();
	function get_iter($treepath);
	function get_iter_first();
	function get_iter_from_string($path);
	function get_iter_root();
	function get_n_columns();
	function get_path(GtkTreeIter $iter );
	function get_string_from_iter(GtkTreeIter $iter );
	function get_value(GtkTreeIter $iter, $column);
	function iter_children(GtkTreeIter $parent_iter );
	function iter_has_child(GtkTreeIter $iter );
	function iter_n_children(GtkTreeIter $iter );
	function iter_next(GtkTreeIter $iter );
	function iter_nth_child(GtkTreeIter $parent_iter, $n);
	function iter_parent(GtkTreeIter $iter = NULL);
	function ref_node(GtkTreeIter $iter );
	function row_changed($path, GtkTreeIter $iter );
	function row_deleted($path);
	function row_has_child_toggled($path, GtkTreeIter $iter );
	function row_inserted($path, GtkTreeIter $iter );
	function rows_reordered();
	function unref_node(GtkTreeIter $iter );
}

/**
 * @package Gtk
 */
interface GtkTreeSortable {
	function get_sort_column_id();
	function has_default_sort_func();
	function set_default_sort_func($callback);
	function set_sort_column_id($sort_column_id, $order);
	function set_sort_func($column, $callback);
	function sort_column_changed();
}

/**
 * @package Gtk
 */
interface GtkActivatable {
	function do_set_related_action(GtkAction $action );
	function get_related_action();
	function get_use_action_appearance();
	function set_related_action(GtkAction $action );
	function set_use_action_appearance($use_appearance);
	function sync_action_properties(GtkAction $action = NULL);
}

/**
 * @package Gtk
 */
interface GtkOrientable {
	function get_orientation();
	function set_orientation($orientation);
}

/**
 * @package Gtk
 */
class PhpGtkException extends Exception {}

/**
 * @package Gtk
 */
class PhpGtkConstructException extends PhpGtkException {}

/**
 * @package Gtk
 */
class PhpGtkTypeException extends PhpGtkException {}

/**
 * @package Gtk
 */
class PhpGtkGErrorException extends PhpGtkException {}

/**
 * @package Gtk
 */
class Gtk {
	const NUMBER_UP_LAYOUT_LEFT_TO_RIGHT_TOP_TO_BOTTOM = 0;
	const NUMBER_UP_LAYOUT_LEFT_TO_RIGHT_BOTTOM_TO_TOP = 1;
	const NUMBER_UP_LAYOUT_RIGHT_TO_LEFT_TOP_TO_BOTTOM = 2;
	const NUMBER_UP_LAYOUT_RIGHT_TO_LEFT_BOTTOM_TO_TOP = 3;
	const NUMBER_UP_LAYOUT_TOP_TO_BOTTOM_LEFT_TO_RIGHT = 4;
	const NUMBER_UP_LAYOUT_TOP_TO_BOTTOM_RIGHT_TO_LEFT = 5;
	const NUMBER_UP_LAYOUT_BOTTOM_TO_TOP_LEFT_TO_RIGHT = 6;
	const NUMBER_UP_LAYOUT_BOTTOM_TO_TOP_RIGHT_TO_LEFT = 7;
	const BUILDER_ERROR_INVALID_TYPE_FUNCTION = 0;
	const BUILDER_ERROR_UNHANDLED_TAG = 1;
	const BUILDER_ERROR_MISSING_ATTRIBUTE = 2;
	const BUILDER_ERROR_INVALID_ATTRIBUTE = 3;
	const BUILDER_ERROR_INVALID_TAG = 4;
	const BUILDER_ERROR_MISSING_PROPERTY_VALUE = 5;
	const BUILDER_ERROR_INVALID_VALUE = 6;
	const BUILDER_ERROR_VERSION_MISMATCH = 7;
	const BUILDER_ERROR_DUPLICATE_ID = 8;
	const ASSISTANT_PAGE_CONTENT = 0;
	const ASSISTANT_PAGE_INTRO = 1;
	const ASSISTANT_PAGE_CONFIRM = 2;
	const ASSISTANT_PAGE_SUMMARY = 3;
	const ASSISTANT_PAGE_PROGRESS = 4;
	const CELL_RENDERER_ACCEL_MODE_GTK = 0;
	const CELL_RENDERER_ACCEL_MODE_OTHER = 1;
	const PAGE_ORIENTATION_PORTRAIT = 0;
	const PAGE_ORIENTATION_LANDSCAPE = 1;
	const PAGE_ORIENTATION_REVERSE_PORTRAIT = 2;
	const PAGE_ORIENTATION_REVERSE_LANDSCAPE = 3;
	const PAGE_SET_ALL = 0;
	const PAGE_SET_EVEN = 1;
	const PAGE_SET_ODD = 2;
	const PRINT_DUPLEX_SIMPLEX = 0;
	const PRINT_DUPLEX_HORIZONTAL = 1;
	const PRINT_DUPLEX_VERTICAL = 2;
	const PRINT_ERROR_GENERAL = 0;
	const PRINT_ERROR_INTERNAL_ERROR = 1;
	const PRINT_ERROR_NOMEM = 2;
	const PRINT_ERROR_INVALID_FILE = 3;
	const PRINT_OPERATION_ACTION_PRINT_DIALOG = 0;
	const PRINT_OPERATION_ACTION_PRINT = 1;
	const PRINT_OPERATION_ACTION_PREVIEW = 2;
	const PRINT_OPERATION_ACTION_EXPORT = 3;
	const PRINT_OPERATION_RESULT_ERROR = 0;
	const PRINT_OPERATION_RESULT_APPLY = 1;
	const PRINT_OPERATION_RESULT_CANCEL = 2;
	const PRINT_OPERATION_RESULT_IN_PROGRESS = 3;
	const PRINT_PAGES_ALL = 0;
	const PRINT_PAGES_CURRENT = 1;
	const PRINT_PAGES_RANGES = 2;
	const PRINT_PAGES_SELECTION = 3;
	const PRINT_QUALITY_LOW = 0;
	const PRINT_QUALITY_NORMAL = 1;
	const PRINT_QUALITY_HIGH = 2;
	const PRINT_QUALITY_DRAFT = 3;
	const PRINT_STATUS_INITIAL = 0;
	const PRINT_STATUS_PREPARING = 1;
	const PRINT_STATUS_GENERATING_DATA = 2;
	const PRINT_STATUS_SENDING_DATA = 3;
	const PRINT_STATUS_PENDING = 4;
	const PRINT_STATUS_PENDING_ISSUE = 5;
	const PRINT_STATUS_PRINTING = 6;
	const PRINT_STATUS_FINISHED = 7;
	const PRINT_STATUS_FINISHED_ABORTED = 8;
	const RECENT_CHOOSER_ERROR_NOT_FOUND = 0;
	const RECENT_CHOOSER_ERROR_INVALID_URI = 1;
	const RECENT_MANAGER_ERROR_NOT_FOUND = 0;
	const RECENT_MANAGER_ERROR_INVALID_URI = 1;
	const RECENT_MANAGER_ERROR_INVALID_ENCODING = 2;
	const RECENT_MANAGER_ERROR_NOT_REGISTERED = 3;
	const RECENT_MANAGER_ERROR_READ = 4;
	const RECENT_MANAGER_ERROR_WRITE = 5;
	const RECENT_MANAGER_ERROR_UNKNOWN = 6;
	const RECENT_SORT_NONE = 0;
	const RECENT_SORT_MRU = 1;
	const RECENT_SORT_LRU = 2;
	const RECENT_SORT_CUSTOM = 3;
	const SENSITIVITY_AUTO = 0;
	const SENSITIVITY_ON = 1;
	const SENSITIVITY_OFF = 2;
	const TEXT_BUFFER_TARGET_INFO_BUFFER_CONTENTS = -1;
	const TEXT_BUFFER_TARGET_INFO_RICH_TEXT = -2;
	const TEXT_BUFFER_TARGET_INFO_TEXT = -3;
	const TREE_VIEW_GRID_LINES_NONE = 0;
	const TREE_VIEW_GRID_LINES_HORIZONTAL = 1;
	const TREE_VIEW_GRID_LINES_VERTICAL = 2;
	const TREE_VIEW_GRID_LINES_BOTH = 3;
	const UNIT_PIXEL = 0;
	const UNIT_POINTS = 1;
	const UNIT_INCH = 2;
	const UNIT_MM = 3;
	const RECENT_FILTER_URI = 1;
	const RECENT_FILTER_DISPLAY_NAME = 2;
	const RECENT_FILTER_MIME_TYPE = 4;
	const RECENT_FILTER_APPLICATION = 8;
	const RECENT_FILTER_GROUP = 16;
	const RECENT_FILTER_AGE = 32;
	const FILE_CHOOSER_CONFIRMATION_CONFIRM = 0;
	const FILE_CHOOSER_CONFIRMATION_ACCEPT_FILENAME = 1;
	const FILE_CHOOSER_CONFIRMATION_SELECT_AGAIN = 2;
	const ICON_VIEW_NO_DROP = 0;
	const ICON_VIEW_DROP_INTO = 1;
	const ICON_VIEW_DROP_LEFT = 2;
	const ICON_VIEW_DROP_RIGHT = 3;
	const ICON_VIEW_DROP_ABOVE = 4;
	const ICON_VIEW_DROP_BELOW = 5;
	const PACK_DIRECTION_LTR = 0;
	const PACK_DIRECTION_RTL = 1;
	const PACK_DIRECTION_TTB = 2;
	const PACK_DIRECTION_BTT = 3;
	const ANCHOR_CENTER = 0;
	const ANCHOR_NORTH = 1;
	const ANCHOR_NORTH_WEST = 2;
	const ANCHOR_NORTH_EAST = 3;
	const ANCHOR_SOUTH = 4;
	const ANCHOR_SOUTH_WEST = 5;
	const ANCHOR_SOUTH_EAST = 6;
	const ANCHOR_WEST = 7;
	const ANCHOR_EAST = 8;
	const ANCHOR_N = 1;
	const ANCHOR_NW = 2;
	const ANCHOR_NE = 3;
	const ANCHOR_S = 4;
	const ANCHOR_SW = 5;
	const ANCHOR_SE = 6;
	const ANCHOR_W = 7;
	const ANCHOR_E = 8;
	const ARROW_UP = 0;
	const ARROW_DOWN = 1;
	const ARROW_LEFT = 2;
	const ARROW_RIGHT = 3;
	const ARROW_NONE = 4;
	const BUTTONBOX_DEFAULT_STYLE = 0;
	const BUTTONBOX_SPREAD = 1;
	const BUTTONBOX_EDGE = 2;
	const BUTTONBOX_START = 3;
	const BUTTONBOX_END = 4;
	const BUTTONBOX_CENTER = 5;
	const BUTTONS_NONE = 0;
	const BUTTONS_OK = 1;
	const BUTTONS_CLOSE = 2;
	const BUTTONS_CANCEL = 3;
	const BUTTONS_YES_NO = 4;
	const BUTTONS_OK_CANCEL = 5;
	const CELL_RENDERER_MODE_INERT = 0;
	const CELL_RENDERER_MODE_ACTIVATABLE = 1;
	const CELL_RENDERER_MODE_EDITABLE = 2;
	const CELL_EMPTY = 0;
	const CELL_TEXT = 1;
	const CELL_PIXMAP = 2;
	const CELL_PIXTEXT = 3;
	const CELL_WIDGET = 4;
	const CLIST_DRAG_NONE = 0;
	const CLIST_DRAG_BEFORE = 1;
	const CLIST_DRAG_INTO = 2;
	const CLIST_DRAG_AFTER = 3;
	const CORNER_TOP_LEFT = 0;
	const CORNER_BOTTOM_LEFT = 1;
	const CORNER_TOP_RIGHT = 2;
	const CORNER_BOTTOM_RIGHT = 3;
	const CTREE_EXPANDER_NONE = 0;
	const CTREE_EXPANDER_SQUARE = 1;
	const CTREE_EXPANDER_TRIANGLE = 2;
	const CTREE_EXPANDER_CIRCULAR = 3;
	const CTREE_EXPANSION_EXPAND = 0;
	const CTREE_EXPANSION_EXPAND_RECURSIVE = 1;
	const CTREE_EXPANSION_COLLAPSE = 2;
	const CTREE_EXPANSION_COLLAPSE_RECURSIVE = 3;
	const CTREE_EXPANSION_TOGGLE = 4;
	const CTREE_EXPANSION_TOGGLE_RECURSIVE = 5;
	const CTREE_LINES_NONE = 0;
	const CTREE_LINES_SOLID = 1;
	const CTREE_LINES_DOTTED = 2;
	const CTREE_LINES_TABBED = 3;
	const CTREE_POS_BEFORE = 0;
	const CTREE_POS_AS_CHILD = 1;
	const CTREE_POS_AFTER = 2;
	const CURVE_TYPE_LINEAR = 0;
	const CURVE_TYPE_SPLINE = 1;
	const CURVE_TYPE_FREE = 2;
	const DELETE_CHARS = 0;
	const DELETE_WORD_ENDS = 1;
	const DELETE_WORDS = 2;
	const DELETE_DISPLAY_LINES = 3;
	const DELETE_DISPLAY_LINE_ENDS = 4;
	const DELETE_PARAGRAPH_ENDS = 5;
	const DELETE_PARAGRAPHS = 6;
	const DELETE_WHITESPACE = 7;
	const DIR_TAB_FORWARD = 0;
	const DIR_TAB_BACKWARD = 1;
	const DIR_UP = 2;
	const DIR_DOWN = 3;
	const DIR_LEFT = 4;
	const DIR_RIGHT = 5;
	const EXPANDER_COLLAPSED = 0;
	const EXPANDER_SEMI_COLLAPSED = 1;
	const EXPANDER_SEMI_EXPANDED = 2;
	const EXPANDER_EXPANDED = 3;
	const FILE_CHOOSER_ACTION_OPEN = 0;
	const FILE_CHOOSER_ACTION_SAVE = 1;
	const FILE_CHOOSER_ACTION_SELECT_FOLDER = 2;
	const FILE_CHOOSER_ACTION_CREATE_FOLDER = 3;
	const FILE_CHOOSER_ERROR_NONEXISTENT = 0;
	const FILE_CHOOSER_ERROR_BAD_FILENAME = 1;
	const FILE_CHOOSER_ERROR_ALREADY_EXISTS = 2;
	const FILE_CHOOSER_ERROR_INCOMPLETE_HOSTNAME = 3;
	const ICON_SIZE_INVALID = 0;
	const ICON_SIZE_MENU = 1;
	const ICON_SIZE_SMALL_TOOLBAR = 2;
	const ICON_SIZE_LARGE_TOOLBAR = 3;
	const ICON_SIZE_BUTTON = 4;
	const ICON_SIZE_DND = 5;
	const ICON_SIZE_DIALOG = 6;
	const ICON_THEME_NOT_FOUND = 0;
	const ICON_THEME_FAILED = 1;
	const IMAGE_EMPTY = 0;
	const IMAGE_PIXMAP = 1;
	const IMAGE_IMAGE = 2;
	const IMAGE_PIXBUF = 3;
	const IMAGE_STOCK = 4;
	const IMAGE_ICON_SET = 5;
	const IMAGE_ANIMATION = 6;
	const IMAGE_ICON_NAME = 7;
	const IMAGE_GICON = 8;
	const IM_PREEDIT_NOTHING = 0;
	const IM_PREEDIT_CALLBACK = 1;
	const IM_PREEDIT_NONE = 2;
	const IM_STATUS_NOTHING = 0;
	const IM_STATUS_CALLBACK = 1;
	const IM_STATUS_NONE = 2;
	const JUSTIFY_LEFT = 0;
	const JUSTIFY_RIGHT = 1;
	const JUSTIFY_CENTER = 2;
	const JUSTIFY_FILL = 3;
	const MATCH_ALL = 0;
	const MATCH_ALL_TAIL = 1;
	const MATCH_HEAD = 2;
	const MATCH_TAIL = 3;
	const MATCH_EXACT = 4;
	const MATCH_LAST = 5;
	const MENU_DIR_PARENT = 0;
	const MENU_DIR_CHILD = 1;
	const MENU_DIR_NEXT = 2;
	const MENU_DIR_PREV = 3;
	const MESSAGE_INFO = 0;
	const MESSAGE_WARNING = 1;
	const MESSAGE_QUESTION = 2;
	const MESSAGE_ERROR = 3;
	const MESSAGE_OTHER = 4;
	const PIXELS = 0;
	const INCHES = 1;
	const CENTIMETERS = 2;
	const MOVEMENT_LOGICAL_POSITIONS = 0;
	const MOVEMENT_VISUAL_POSITIONS = 1;
	const MOVEMENT_WORDS = 2;
	const MOVEMENT_DISPLAY_LINES = 3;
	const MOVEMENT_DISPLAY_LINE_ENDS = 4;
	const MOVEMENT_PARAGRAPHS = 5;
	const MOVEMENT_PARAGRAPH_ENDS = 6;
	const MOVEMENT_PAGES = 7;
	const MOVEMENT_BUFFER_ENDS = 8;
	const MOVEMENT_HORIZONTAL_PAGES = 9;
	const NOTEBOOK_TAB_FIRST = 0;
	const NOTEBOOK_TAB_LAST = 1;
	const ORIENTATION_HORIZONTAL = 0;
	const ORIENTATION_VERTICAL = 1;
	const PACK_START = 0;
	const PACK_END = 1;
	const PATH_PRIO_LOWEST = 0;
	const PATH_PRIO_GTK = 4;
	const PATH_PRIO_APPLICATION = 8;
	const PATH_PRIO_THEME = 10;
	const PATH_PRIO_RC = 12;
	const PATH_PRIO_HIGHEST = 15;
	const PATH_WIDGET = 0;
	const PATH_WIDGET_CLASS = 1;
	const PATH_CLASS = 2;
	const POLICY_ALWAYS = 0;
	const POLICY_AUTOMATIC = 1;
	const POLICY_NEVER = 2;
	const POS_LEFT = 0;
	const POS_RIGHT = 1;
	const POS_TOP = 2;
	const POS_BOTTOM = 3;
	const PREVIEW_COLOR = 0;
	const PREVIEW_GRAYSCALE = 1;
	const PROGRESS_LEFT_TO_RIGHT = 0;
	const PROGRESS_RIGHT_TO_LEFT = 1;
	const PROGRESS_BOTTOM_TO_TOP = 2;
	const PROGRESS_TOP_TO_BOTTOM = 3;
	const PROGRESS_CONTINUOUS = 0;
	const PROGRESS_DISCRETE = 1;
	const RC_TOKEN_INVALID = 270;
	const RC_TOKEN_INCLUDE = 271;
	const RC_TOKEN_NORMAL = 272;
	const RC_TOKEN_ACTIVE = 273;
	const RC_TOKEN_PRELIGHT = 274;
	const RC_TOKEN_SELECTED = 275;
	const RC_TOKEN_INSENSITIVE = 276;
	const RC_TOKEN_FG = 277;
	const RC_TOKEN_BG = 278;
	const RC_TOKEN_TEXT = 279;
	const RC_TOKEN_BASE = 280;
	const RC_TOKEN_XTHICKNESS = 281;
	const RC_TOKEN_YTHICKNESS = 282;
	const RC_TOKEN_FONT = 283;
	const RC_TOKEN_FONTSET = 284;
	const RC_TOKEN_FONT_NAME = 285;
	const RC_TOKEN_BG_PIXMAP = 286;
	const RC_TOKEN_PIXMAP_PATH = 287;
	const RC_TOKEN_STYLE = 288;
	const RC_TOKEN_BINDING = 289;
	const RC_TOKEN_BIND = 290;
	const RC_TOKEN_WIDGET = 291;
	const RC_TOKEN_WIDGET_CLASS = 292;
	const RC_TOKEN_CLASS = 293;
	const RC_TOKEN_LOWEST = 294;
	const RC_TOKEN_GTK = 295;
	const RC_TOKEN_APPLICATION = 296;
	const RC_TOKEN_THEME = 297;
	const RC_TOKEN_RC = 298;
	const RC_TOKEN_HIGHEST = 299;
	const RC_TOKEN_ENGINE = 300;
	const RC_TOKEN_MODULE_PATH = 301;
	const RC_TOKEN_IM_MODULE_PATH = 302;
	const RC_TOKEN_IM_MODULE_FILE = 303;
	const RC_TOKEN_STOCK = 304;
	const RC_TOKEN_LTR = 305;
	const RC_TOKEN_RTL = 306;
	const RC_TOKEN_COLOR = 307;
	const RC_TOKEN_UNBIND = 308;
	const RC_TOKEN_LAST = 309;
	const RELIEF_NORMAL = 0;
	const RELIEF_HALF = 1;
	const RELIEF_NONE = 2;
	const RESIZE_PARENT = 0;
	const RESIZE_QUEUE = 1;
	const RESIZE_IMMEDIATE = 2;
	const RESPONSE_NONE = -1;
	const RESPONSE_REJECT = -2;
	const RESPONSE_ACCEPT = -3;
	const RESPONSE_DELETE_EVENT = -4;
	const RESPONSE_OK = -5;
	const RESPONSE_CANCEL = -6;
	const RESPONSE_CLOSE = -7;
	const RESPONSE_YES = -8;
	const RESPONSE_NO = -9;
	const RESPONSE_APPLY = -10;
	const RESPONSE_HELP = -11;
	const SCROLL_STEPS = 0;
	const SCROLL_PAGES = 1;
	const SCROLL_ENDS = 2;
	const SCROLL_HORIZONTAL_STEPS = 3;
	const SCROLL_HORIZONTAL_PAGES = 4;
	const SCROLL_HORIZONTAL_ENDS = 5;
	const SCROLL_NONE = 0;
	const SCROLL_JUMP = 1;
	const SCROLL_STEP_BACKWARD = 2;
	const SCROLL_STEP_FORWARD = 3;
	const SCROLL_PAGE_BACKWARD = 4;
	const SCROLL_PAGE_FORWARD = 5;
	const SCROLL_STEP_UP = 6;
	const SCROLL_STEP_DOWN = 7;
	const SCROLL_PAGE_UP = 8;
	const SCROLL_PAGE_DOWN = 9;
	const SCROLL_STEP_LEFT = 10;
	const SCROLL_STEP_RIGHT = 11;
	const SCROLL_PAGE_LEFT = 12;
	const SCROLL_PAGE_RIGHT = 13;
	const SCROLL_START = 14;
	const SCROLL_END = 15;
	const SELECTION_NONE = 0;
	const SELECTION_SINGLE = 1;
	const SELECTION_BROWSE = 2;
	const SELECTION_MULTIPLE = 3;
	const SELECTION_EXTENDED = 3;
	const SHADOW_NONE = 0;
	const SHADOW_IN = 1;
	const SHADOW_OUT = 2;
	const SHADOW_ETCHED_IN = 3;
	const SHADOW_ETCHED_OUT = 4;
	const SIDE_TOP = 0;
	const SIDE_BOTTOM = 1;
	const SIDE_LEFT = 2;
	const SIDE_RIGHT = 3;
	const SIZE_GROUP_NONE = 0;
	const SIZE_GROUP_HORIZONTAL = 1;
	const SIZE_GROUP_VERTICAL = 2;
	const SIZE_GROUP_BOTH = 3;
	const SORT_ASCENDING = 0;
	const SORT_DESCENDING = 1;
	const UPDATE_ALWAYS = 0;
	const UPDATE_IF_VALID = 1;
	const SPIN_STEP_FORWARD = 0;
	const SPIN_STEP_BACKWARD = 1;
	const SPIN_PAGE_FORWARD = 2;
	const SPIN_PAGE_BACKWARD = 3;
	const SPIN_HOME = 4;
	const SPIN_END = 5;
	const SPIN_USER_DEFINED = 6;
	const STATE_NORMAL = 0;
	const STATE_ACTIVE = 1;
	const STATE_PRELIGHT = 2;
	const STATE_SELECTED = 3;
	const STATE_INSENSITIVE = 4;
	const DIRECTION_LEFT = 0;
	const DIRECTION_RIGHT = 1;
	const TOP_BOTTOM = 0;
	const LEFT_RIGHT = 1;
	const TEXT_DIR_NONE = 0;
	const TEXT_DIR_LTR = 1;
	const TEXT_DIR_RTL = 2;
	const TEXT_WINDOW_PRIVATE = 0;
	const TEXT_WINDOW_WIDGET = 1;
	const TEXT_WINDOW_TEXT = 2;
	const TEXT_WINDOW_LEFT = 3;
	const TEXT_WINDOW_RIGHT = 4;
	const TEXT_WINDOW_TOP = 5;
	const TEXT_WINDOW_BOTTOM = 6;
	const TOOLBAR_CHILD_SPACE = 0;
	const TOOLBAR_CHILD_BUTTON = 1;
	const TOOLBAR_CHILD_TOGGLEBUTTON = 2;
	const TOOLBAR_CHILD_RADIOBUTTON = 3;
	const TOOLBAR_CHILD_WIDGET = 4;
	const TOOLBAR_SPACE_EMPTY = 0;
	const TOOLBAR_SPACE_LINE = 1;
	const TOOLBAR_ICONS = 0;
	const TOOLBAR_TEXT = 1;
	const TOOLBAR_BOTH = 2;
	const TOOLBAR_BOTH_HORIZ = 3;
	const TREE_VIEW_COLUMN_GROW_ONLY = 0;
	const TREE_VIEW_COLUMN_AUTOSIZE = 1;
	const TREE_VIEW_COLUMN_FIXED = 2;
	const TREE_VIEW_DROP_BEFORE = 0;
	const TREE_VIEW_DROP_AFTER = 1;
	const TREE_VIEW_DROP_INTO_OR_BEFORE = 2;
	const TREE_VIEW_DROP_INTO_OR_AFTER = 3;
	const TREE_VIEW_LINE = 0;
	const TREE_VIEW_ITEM = 1;
	const UPDATE_CONTINUOUS = 0;
	const UPDATE_DISCONTINUOUS = 1;
	const UPDATE_DELAYED = 2;
	const VISIBILITY_NONE = 0;
	const VISIBILITY_PARTIAL = 1;
	const VISIBILITY_FULL = 2;
	const WIDGET_HELP_TOOLTIP = 0;
	const WIDGET_HELP_WHATS_THIS = 1;
	const WIN_POS_NONE = 0;
	const WIN_POS_CENTER = 1;
	const WIN_POS_MOUSE = 2;
	const WIN_POS_CENTER_ALWAYS = 3;
	const WIN_POS_CENTER_ON_PARENT = 4;
	const WINDOW_TOPLEVEL = 0;
	const WINDOW_POPUP = 1;
	const WRAP_NONE = 0;
	const WRAP_CHAR = 1;
	const WRAP_WORD = 2;
	const WRAP_WORD_CHAR = 3;
	const ACCEL_VISIBLE = 1;
	const ACCEL_LOCKED = 2;
	const ACCEL_MASK = 7;
	const ARG_READABLE = 1;
	const ARG_WRITABLE = 2;
	const ARG_CONSTRUCT = 4;
	const ARG_CONSTRUCT_ONLY = 8;
	const ARG_CHILD_ARG = 16;
	const EXPAND = 1;
	const SHRINK = 2;
	const FILL = 4;
	const BUTTON_IGNORED = 0;
	const BUTTON_SELECTS = 1;
	const BUTTON_DRAGS = 2;
	const BUTTON_EXPANDS = 4;
	const CALENDAR_SHOW_HEADING = 1;
	const CALENDAR_SHOW_DAY_NAMES = 2;
	const CALENDAR_NO_MONTH_CHANGE = 4;
	const CALENDAR_SHOW_WEEK_NUMBERS = 8;
	const CALENDAR_WEEK_START_MONDAY = 16;
	const CALENDAR_SHOW_DETAILS = 32;
	const CELL_RENDERER_SELECTED = 1;
	const CELL_RENDERER_PRELIT = 2;
	const CELL_RENDERER_INSENSITIVE = 4;
	const CELL_RENDERER_SORTED = 8;
	const CELL_RENDERER_FOCUSED = 16;
	const DEBUG_MISC = 1;
	const DEBUG_PLUGSOCKET = 2;
	const DEBUG_TEXT = 4;
	const DEBUG_TREE = 8;
	const DEBUG_UPDATES = 16;
	const DEBUG_KEYBINDINGS = 32;
	const DEBUG_MULTIHEAD = 64;
	const DEBUG_MODULES = 128;
	const DEBUG_GEOMETRY = 256;
	const DEBUG_ICONTHEME = 512;
	const DEBUG_PRINTING = 1024;
	const DEBUG_BUILDER = 2048;
	const DEST_DEFAULT_MOTION = 1;
	const DEST_DEFAULT_HIGHLIGHT = 2;
	const DEST_DEFAULT_DROP = 4;
	const DEST_DEFAULT_ALL = 7;
	const DIALOG_MODAL = 1;
	const DIALOG_DESTROY_WITH_PARENT = 2;
	const DIALOG_NO_SEPARATOR = 4;
	const FILE_FILTER_FILENAME = 1;
	const FILE_FILTER_URI = 2;
	const FILE_FILTER_DISPLAY_NAME = 4;
	const FILE_FILTER_MIME_TYPE = 8;
	const ICON_LOOKUP_NO_SVG = 1;
	const ICON_LOOKUP_FORCE_SVG = 2;
	const ICON_LOOKUP_USE_BUILTIN = 4;
	const ICON_LOOKUP_GENERIC_FALLBACK = 8;
	const ICON_LOOKUP_FORCE_SIZE = 16;
	const IN_DESTRUCTION = 1;
	const FLOATING = 2;
	const RESERVED_1 = 4;
	const RESERVED_2 = 8;
	const ATE_GTK_USER_STYLE = 1;
	const ATE_GTK_RESIZE_PENDING = 4;
	const ATE_GTK_HAS_POINTER = 8;
	const ATE_GTK_SHADOWED = 16;
	const ATE_GTK_HAS_SHAPE_MASK = 32;
	const ATE_GTK_IN_REPARENT = 64;
	const ATE_GTK_DIRECTION_SET = 128;
	const ATE_GTK_DIRECTION_LTR = 256;
	const ATE_GTK_ANCHORED = 512;
	const ATE_GTK_CHILD_VISIBLE = 1024;
	const ATE_GTK_REDRAW_ON_ALLOC = 2048;
	const ATE_GTK_ALLOC_NEEDED = 4096;
	const ATE_GTK_REQUEST_NEEDED = 8192;
	const RC_FG = 1;
	const RC_BG = 2;
	const RC_TEXT = 4;
	const RC_BASE = 8;
	const TARGET_SAME_APP = 1;
	const TARGET_SAME_WIDGET = 2;
	const TARGET_OTHER_APP = 4;
	const TARGET_OTHER_WIDGET = 8;
	const TEXT_SEARCH_VISIBLE_ONLY = 1;
	const TEXT_SEARCH_TEXT_ONLY = 2;
	const TREE_MODEL_ITERS_PERSIST = 1;
	const TREE_MODEL_LIST_ONLY = 2;
	const UI_MANAGER_AUTO = 0;
	const UI_MANAGER_MENUBAR = 1;
	const UI_MANAGER_MENU = 2;
	const UI_MANAGER_TOOLBAR = 4;
	const UI_MANAGER_PLACEHOLDER = 8;
	const UI_MANAGER_POPUP = 16;
	const UI_MANAGER_MENUITEM = 32;
	const UI_MANAGER_TOOLITEM = 64;
	const UI_MANAGER_SEPARATOR = 128;
	const UI_MANAGER_ACCELERATOR = 256;
	const UI_MANAGER_POPUP_WITH_ACCELS = 512;
	const TOPLEVEL = 16;
	const NO_WINDOW = 32;
	const REALIZED = 64;
	const MAPPED = 128;
	const VISIBLE = 256;
	const SENSITIVE = 512;
	const PARENT_SENSITIVE = 1024;
	const CAN_FOCUS = 2048;
	const HAS_FOCUS = 4096;
	const CAN_DEFAULT = 8192;
	const HAS_DEFAULT = 16384;
	const HAS_GRAB = 32768;
	const RC_STYLE = 65536;
	const COMPOSITE_CHILD = 131072;
	const NO_REPARENT = 262144;
	const APP_PAINTABLE = 524288;
	const RECEIVES_DEFAULT = 1048576;
	const DOUBLE_BUFFERED = 2097152;
	const NO_SHOW_ALL = 4194304;
	const ENTRY_ICON_PRIMARY = 0;
	const ENTRY_ICON_SECONDARY = 1;
	const TOOL_PALETTE_DRAG_ITEMS = 1;
	const TOOL_PALETTE_DRAG_GROUPS = 2;
	const STOCK_ZOOM_OUT = 'gtk-zoom-out';
	const STOCK_ZOOM_IN = 'gtk-zoom-in';
	const STOCK_ZOOM_FIT = 'gtk-zoom-fit';
	const STOCK_ZOOM_100 = 'gtk-zoom-100';
	const STOCK_YES = 'gtk-yes';
	const STOCK_UNINDENT = 'gtk-unindent';
	const STOCK_UNDO = 'gtk-undo';
	const STOCK_UNDERLINE = 'gtk-underline';
	const STOCK_UNDELETE = 'gtk-undelete';
	const STOCK_STRIKETHROUGH = 'gtk-strikethrough';
	const STOCK_STOP = 'gtk-stop';
	const STOCK_SPELL_CHECK = 'gtk-spell-check';
	const STOCK_SORT_DESCENDING = 'gtk-sort-descending';
	const STOCK_SORT_ASCENDING = 'gtk-sort-ascending';
	const STOCK_SELECT_FONT = 'gtk-select-font';
	const STOCK_SELECT_COLOR = 'gtk-select-color';
	const STOCK_SELECT_ALL = 'gtk-select-all';
	const STOCK_SAVE_AS = 'gtk-save-as';
	const STOCK_SAVE = 'gtk-save';
	const STOCK_REVERT_TO_SAVED = 'gtk-revert-to-saved';
	const STOCK_REMOVE = 'gtk-remove';
	const STOCK_REFRESH = 'gtk-refresh';
	const STOCK_REDO = 'gtk-redo';
	const STOCK_QUIT = 'gtk-quit';
	const STOCK_PROPERTIES = 'gtk-properties';
	const STOCK_PRINT_WARNING = 'gtk-print-warning';
	const STOCK_PRINT_REPORT = 'gtk-print-report';
	const STOCK_PRINT_PREVIEW = 'gtk-print-preview';
	const STOCK_PRINT_PAUSED = 'gtk-print-paused';
	const STOCK_PRINT_ERROR = 'gtk-print-error';
	const STOCK_PRINT = 'gtk-print';
	const STOCK_PREFERENCES = 'gtk-preferences';
	const STOCK_PASTE = 'gtk-paste';
	const STOCK_PAGE_SETUP = 'gtk-page-setup';
	const STOCK_ORIENTATION_REVERSE_PORTRAIT = 'gtk-orientation-reverse-portrait';
	const STOCK_ORIENTATION_REVERSE_LANDSCAPE = 'gtk-orientation-reverse-landscape';
	const STOCK_ORIENTATION_PORTRAIT = 'gtk-orientation-portrait';
	const STOCK_ORIENTATION_LANDSCAPE = 'gtk-orientation-landscape';
	const STOCK_OPEN = 'gtk-open';
	const STOCK_OK = 'gtk-ok';
	const STOCK_NO = 'gtk-no';
	const STOCK_NEW = 'gtk-new';
	const STOCK_NETWORK = 'gtk-network';
	const STOCK_MISSING_IMAGE = 'gtk-missing-image';
	const STOCK_MEDIA_STOP = 'gtk-media-stop';
	const STOCK_MEDIA_REWIND = 'gtk-media-rewind';
	const STOCK_MEDIA_RECORD = 'gtk-media-record';
	const STOCK_MEDIA_PREVIOUS = 'gtk-media-previous';
	const STOCK_MEDIA_PLAY = 'gtk-media-play';
	const STOCK_MEDIA_PAUSE = 'gtk-media-pause';
	const STOCK_MEDIA_NEXT = 'gtk-media-next';
	const STOCK_MEDIA_FORWARD = 'gtk-media-forward';
	const STOCK_LEAVE_FULLSCREEN = 'gtk-leave-fullscreen';
	const STOCK_JUSTIFY_RIGHT = 'gtk-justify-right';
	const STOCK_JUSTIFY_LEFT = 'gtk-justify-left';
	const STOCK_JUSTIFY_FILL = 'gtk-justify-fill';
	const STOCK_JUSTIFY_CENTER = 'gtk-justify-center';
	const STOCK_JUMP_TO = 'gtk-jump-to';
	const STOCK_ITALIC = 'gtk-italic';
	const STOCK_INFO = 'gtk-info';
	const STOCK_INDEX = 'gtk-index';
	const STOCK_INDENT = 'gtk-indent';
	const STOCK_HOME = 'gtk-home';
	const STOCK_HELP = 'gtk-help';
	const STOCK_HARDDISK = 'gtk-harddisk';
	const STOCK_GOTO_TOP = 'gtk-goto-top';
	const STOCK_GOTO_LAST = 'gtk-goto-last';
	const STOCK_GOTO_FIRST = 'gtk-goto-first';
	const STOCK_GOTO_BOTTOM = 'gtk-goto-bottom';
	const STOCK_GO_UP = 'gtk-go-up';
	const STOCK_GO_FORWARD = 'gtk-go-forward';
	const STOCK_GO_DOWN = 'gtk-go-down';
	const STOCK_GO_BACK = 'gtk-go-back';
	const STOCK_FULLSCREEN = 'gtk-fullscreen';
	const STOCK_FLOPPY = 'gtk-floppy';
	const STOCK_FIND_AND_REPLACE = 'gtk-find-and-replace';
	const STOCK_FIND = 'gtk-find';
	const STOCK_FILE = 'gtk-file';
	const STOCK_EXECUTE = 'gtk-execute';
	const STOCK_EDIT = 'gtk-edit';
	const STOCK_DND_MULTIPLE = 'gtk-dnd-multiple';
	const STOCK_DND = 'gtk-dnd';
	const STOCK_DISCONNECT = 'gtk-disconnect';
	const STOCK_DISCARD = 'gtk-discard';
	const STOCK_DIRECTORY = 'gtk-directory';
	const STOCK_DIALOG_WARNING = 'gtk-dialog-warning';
	const STOCK_DIALOG_QUESTION = 'gtk-dialog-question';
	const STOCK_DIALOG_INFO = 'gtk-dialog-info';
	const STOCK_DIALOG_ERROR = 'gtk-dialog-error';
	const STOCK_DIALOG_AUTHENTICATION = 'gtk-dialog-authentication';
	const STOCK_DELETE = 'gtk-delete';
	const STOCK_CUT = 'gtk-cut';
	const STOCK_COPY = 'gtk-copy';
	const STOCK_CONVERT = 'gtk-convert';
	const STOCK_CONNECT = 'gtk-connect';
	const STOCK_COLOR_PICKER = 'gtk-color-picker';
	const STOCK_CLOSE = 'gtk-close';
	const STOCK_CLEAR = 'gtk-clear';
	const STOCK_CDROM = 'gtk-cdrom';
	const STOCK_CAPS_LOCK_WARNING = 'gtk-caps-lock-warning';
	const STOCK_CANCEL = 'gtk-cancel';
	const STOCK_BOLD = 'gtk-bold';
	const STOCK_APPLY = 'gtk-apply';
	const STOCK_ADD = 'gtk-add';
	const STOCK_ABOUT = 'gtk-about';

	static public function accel_groups_activate(GObject $object, $accel_key, $accel_mods) {}
	static public function accel_groups_from_object(GObject $object ) {}
	static public function accelerator_get_default_mod_mask() {}
	static public function accelerator_get_label($accelerator_key, $accelerator_mods) {}
	static public function accelerator_name($accelerator_key, $accelerator_mods) {}
	static public function accelerator_parse($accel_string) {}
	static public function accelerator_set_default_mod_mask($default_mod_mask) {}
	static public function accelerator_valid($keyval, $modifiers) {}
	static public function alternative_dialog_button_order(GdkScreen $screen = NULL) {}
	static public function check_version($required_major, $required_minor, $required_micro) {}
	static public function disable_setlocaleasd() {}
	static public function drag_set_default_icon(GdkColormap $colormap , GdkPixmap $pixmap, $mask, $hot_x, $hot_y) {}
	static public function draw_insertion_cursor(GtkWidget $widget , GdkDrawable $drawable , GdkRectangle $area , GdkRectangle $location, $is_primary, $direction, $draw_arrow) {}
	static public function events_pending() {}
	static public function get_current_event() {}
	static public function get_current_event_state() {}
	static public function get_current_event_time() {}
	static public function get_default_language() {}
	static public function get_version() {}
	static public function grab_get_current() {}
	static public function icon_info_new_for_pixbuf(GtkIconTheme $icon_theme , GdkPixbuf $pixbuf ) {}
	static public function icon_size_from_name($name) {}
	static public function icon_size_get_name($size) {}
	static public function icon_size_lookup($size) {}
	static public function icon_size_lookup_for_settings(GtkSettings $settings, $size) {}
	static public function icon_size_register($name, $width, $height) {}
	static public function icon_size_register_alias($alias, $target) {}
	static public function idle_add() {}
	static public function idle_add_priority() {}
	static public function idle_remove($idle_handler_id) {}
	static public function input_remove($input_handler_id) {}
	static public function io_add_watch() {}
	static public function io_add_watch_priority() {}
	static public function link_button_new($uri) {}
	static public function main() {}
	static public function main_do_event(GdkEvent $event ) {}
	static public function main_iteration() {}
	static public function main_iteration_do() {}
	static public function main_level() {}
	static public function main_quit() {}
	static public function quit_add($main_level, $callback) {}
	static public function quit_remove($quit_handler_id) {}
	static public function rc_add_default_file($filename) {}
	static public function rc_find_module_in_path($module_file) {}
	static public function rc_get_default_files() {}
	static public function rc_get_im_module_file() {}
	static public function rc_get_im_module_path() {}
	static public function rc_get_module_dir() {}
	static public function rc_get_style_by_paths(GtkSettings $settings, $widget_path, $class_path, GType $type ) {}
	static public function rc_get_theme_dir() {}
	static public function rc_parse($filename) {}
	static public function rc_parse_string($rc_string) {}
	static public function rc_reparse_all() {}
	static public function rc_reparse_all_for_settings(GtkSettings $settings, $force_load) {}
	static public function rc_reset_styles(GtkSettings $settings ) {}
	static public function recent_chooser_menu_new() {}
	static public function recent_chooser_widget_new() {}
	static public function selection_owner_set_for_display(GdkDisplay $display , GtkWidget $widget, $selection) {}
	static public function show_uri(GdkScreen $screen, $uri, $timestamp, $error) {}
	static public function stock_list_ids() {}
	static public function stock_lookup($stock_id) {}
	static public function timeout_add($interval, $callback) {}
	static public function timeout_add_priority($interval, $priority, $callback) {}
	static public function timeout_remove($timeout_handler_id) {}
	static public function tooltips_data_get() {}
	static public function window_get_default_icon_name() {}
}

/**
 * @package Gtk
 */
class GtkBuilder extends GObject {
	const gtype = 158412128;

	public function __construct() {}
	public function add_from_file($filename, $error) {}
	public function add_from_string($string) {}
	public function connect_signals() {}
	public function connect_signals_instance($object) {}
	public function get_object($name) {}
	public function get_objects() {}
	public function get_translation_domain() {}
	public function get_type_from_name($type_name) {}
	public function set_translation_domain($domain) {}
}

/**
 * @package Gtk
 */
class GtkTooltip extends GObject {
	const gtype = 158238416;

	public function set_custom(GtkWidget $custom_widget ) {}
	public function set_icon(GdkPixbuf $pixbuf ) {}
	public function set_icon_from_icon_name($icon_name, $size) {}
	public function set_icon_from_stock($stock_id, $size) {}
	public function set_markup($markup) {}
	public function set_text($text) {}
	public function set_tip_area(GdkRectangle $rect ) {}
	static public function trigger_tooltip_query(GdkDisplay $display ) {}
}

/**
 * @package Gtk
 */
class GtkPageSetup extends GObject {
	const gtype = 158434248;

	public function __construct() {}
	static public function new_from_file($file_name, $error) {}
	public function copy() {}
	public function get_bottom_margin($unit) {}
	public function get_left_margin($unit) {}
	public function get_orientation() {}
	public function get_page_height($unit) {}
	public function get_page_width($unit) {}
	public function get_paper_height($unit) {}
	public function get_paper_size() {}
	public function get_paper_width($unit) {}
	public function get_right_margin($unit) {}
	public function get_top_margin($unit) {}
	public function load_file($file_name, $error) {}
	static public function run_dialog(GtkWindow $parent , GtkPageSetup $page_setup , GtkPrintSettings $settings ) {}
	public function set_bottom_margin($margin, $unit) {}
	public function set_left_margin($margin, $unit) {}
	public function set_orientation($orientation) {}
	public function set_paper_size(GtkPaperSize $size ) {}
	public function set_paper_size_and_default_margins(GtkPaperSize $size ) {}
	public function set_right_margin($margin, $unit) {}
	public function set_top_margin($margin, $unit) {}
	public function to_file($file_name, $error) {}
}

/**
 * @package Gtk
 */
class GtkPrintContext extends GObject {
	const gtype = 158448160;

	public function create_pango_context() {}
	public function create_pango_layout() {}
	public function get_cairo_context() {}
	public function get_dpi_x() {}
	public function get_dpi_y() {}
	public function get_hard_margins() {}
	public function get_height() {}
	public function get_page_setup() {}
	public function get_pango_fontmap() {}
	public function get_width() {}
	public function set_cairo_context(CairoContext $context, $dpi_x, $dpi_y) {}
}

/**
 * @package Gtk
 */
class GtkPrintOperation extends GObject implements GtkPrintOperationPreview {
	const gtype = 158459808;

	public function __construct() {}
	public function cancel() {}
	public function draw_page_finish() {}
	public function get_default_page_setup() {}
	public function get_embed_page_setup() {}
	public function get_error($error) {}
	public function get_has_selection() {}
	public function get_n_pages_to_print() {}
	public function get_print_settings() {}
	public function get_status() {}
	public function get_status_string() {}
	public function get_support_selection() {}
	public function is_finished() {}
	public function run($action, GtkWindow $parent = NULL) {}
	public function set_allow_async($allow_async) {}
	public function set_current_page($current_page) {}
	public function set_custom_tab_label($label) {}
	public function set_default_page_setup(GtkPageSetup $default_page_setup = NULL) {}
	public function set_defer_drawing() {}
	public function set_embed_page_setup($embed) {}
	public function set_export_filename($filename) {}
	public function set_has_selection($has_selection) {}
	public function set_job_name($job_name) {}
	public function set_n_pages($n_pages) {}
	public function set_print_settings(GtkPrintSettings $print_settings = NULL) {}
	public function set_show_progress($show_progress) {}
	public function set_support_selection($support_selection) {}
	public function set_track_print_status($track_status) {}
	public function set_unit($unit) {}
	public function set_use_full_page($full_page) {}
	public function render_page($page_nr) {}
	public function end_preview() {}
	public function is_selected($page_nr) {}
}

/**
 * @package Gtk
 */
class GtkPrintSettings extends GObject {
	const gtype = 158475912;

	public function __construct() {}
	static public function new_from_file($file_name, $error) {}
	public function copy() {}
	public function get($key) {}
	public function get_bool($key) {}
	public function get_collate() {}
	public function get_default_source() {}
	public function get_dither() {}
	public function get_double($key) {}
	public function get_double_with_default($key, $def) {}
	public function get_duplex() {}
	public function get_finishings() {}
	public function get_int($key) {}
	public function get_int_with_default($key, $def) {}
	public function get_length($key, $unit) {}
	public function get_media_type() {}
	public function get_n_copies() {}
	public function get_number_up() {}
	public function get_number_up_layout() {}
	public function get_orientation() {}
	public function get_output_bin() {}
	public function get_page_set() {}
	public function get_paper_height($unit) {}
	public function get_paper_size() {}
	public function get_paper_width($unit) {}
	public function get_print_pages() {}
	public function get_printer() {}
	public function get_printer_lpi() {}
	public function get_quality() {}
	public function get_resolution() {}
	public function get_resolution_x() {}
	public function get_resolution_y() {}
	public function get_reverse() {}
	public function get_scale() {}
	public function get_use_color() {}
	public function has_key($key) {}
	public function load_file($file_name, $error) {}
	public function set($key, $value) {}
	public function set_bool($key, $value) {}
	public function set_collate($collate) {}
	public function set_default_source($default_source) {}
	public function set_dither($dither) {}
	public function set_double($key, $value) {}
	public function set_duplex($duplex) {}
	public function set_finishings($finishings) {}
	public function set_int($key, $value) {}
	public function set_length($key, $value, $unit) {}
	public function set_media_type($media_type) {}
	public function set_n_copies($num_copies) {}
	public function set_number_up($number_up) {}
	public function set_number_up_layout($number_up_layout = NULL ) {}
	public function set_orientation($orientation) {}
	public function set_output_bin($output_bin) {}
	public function set_page_set($page_set) {}
	public function set_paper_height($height, $unit) {}
	public function set_paper_size(GtkPaperSize $paper_size ) {}
	public function set_paper_width($width, $unit) {}
	public function set_print_pages($pages) {}
	public function set_printer($printer) {}
	public function set_printer_lpi($lpi) {}
	public function set_quality($quality) {}
	public function set_resolution($resolution) {}
	public function set_resolution_xy($resolution_x, $resolution_y) {}
	public function set_reverse($reverse) {}
	public function set_scale($scale) {}
	public function set_use_color($use_color) {}
	public function to_file($file_name, $error) {}
	public function unset_method($key) {}
}

/**
 * @package Gtk
 */
class GtkRecentManager extends GObject {
	const gtype = 158499384;

	public function __construct() {}
	public function add_item($uri) {}
	static public function get_default() {}
	static public function get_for_screen(GdkScreen $screen ) {}
	public function get_items() {}
	public function get_limit() {}
	public function has_item($uri) {}
	public function lookup_item($uri, $error) {}
	public function move_item($uri, $new_uri, $error) {}
	public function purge_items($error) {}
	public function remove_item($uri, $error) {}
	public function set_limit($limit) {}
	public function set_screen(GdkScreen $screen ) {}
}

/**
 * @package Gtk
 */
class GtkStatusIcon extends GObject {
	const gtype = 158511184;

	public function __construct() {}
	static public function new_from_pixbuf(GdkPixbuf $pixbuf ) {}
	static public function new_from_file($filename) {}
	static public function new_from_stock($stock_id) {}
	static public function new_from_icon_name($icon_name) {}
	public function get_blinking() {}
	public function get_geometry() {}
	public function get_has_tooltip() {}
	public function get_icon_name() {}
	public function get_pixbuf() {}
	public function get_screen() {}
	public function get_size() {}
	public function get_stock() {}
	public function get_storage_type() {}
	public function get_title() {}
	public function get_tooltip_markup() {}
	public function get_tooltip_text() {}
	public function get_visible() {}
	public function get_x11_window_id() {}
	public function is_embedded() {}
	static public function position_menu(GtkMenu $menu , GtkStatusIcon $statusicon ) {}
	public function set_blinking($blinking) {}
	public function set_from_file($filename) {}
	public function set_from_icon_name($icon_name) {}
	public function set_from_pixbuf(GdkPixbuf $pixbuf ) {}
	public function set_from_stock($stock_id) {}
	public function set_has_tooltip($has_tooltip) {}
	public function set_name($name) {}
	public function set_screen(GdkScreen $screen ) {}
	public function set_title($title) {}
	public function set_tooltip($tooltip_text) {}
	public function set_tooltip_markup($markup) {}
	public function set_tooltip_text($text) {}
	public function set_visible($visible) {}
}

/**
 * @package Gtk
 */
class PhpGtkCustomTreeModel extends GObject implements GtkTreeModel {
	const gtype = 158527368;

	public function __construct() {}
	public function get() {}
	public function get_column_type($index) {}
	public function get_flags() {}
	public function get_iter($treepath) {}
	public function get_iter_first() {}
	public function get_iter_root() {}
	public function get_iter_from_string($path) {}
	public function get_n_columns() {}
	public function get_path(GtkTreeIter $iter ) {}
	public function get_string_from_iter(GtkTreeIter $iter ) {}
	public function get_value(GtkTreeIter $iter, $column) {}
	public function iter_children(GtkTreeIter $parent_iter ) {}
	public function iter_has_child(GtkTreeIter $iter ) {}
	public function iter_n_children(GtkTreeIter $iter ) {}
	public function iter_next(GtkTreeIter $iter ) {}
	public function iter_nth_child(GtkTreeIter $parent_iter, $n) {}
	public function iter_parent(GtkTreeIter $iter = NULL) {}
	public function ref_node(GtkTreeIter $iter ) {}
	public function row_changed($path, GtkTreeIter $iter ) {}
	public function row_deleted($path) {}
	public function row_has_child_toggled($path, GtkTreeIter $iter ) {}
	public function row_inserted($path, GtkTreeIter $iter ) {}
	public function rows_reordered() {}
	public function unref_node(GtkTreeIter $iter ) {}
	public function for_each($callback) {}
}

/**
 * @package Gtk
 */
class GtkAccelGroup extends GObject {
	const gtype = 158541920;

	public function __construct() {}
	public function disconnect_key($accel_key, $accel_mods) {}
	public function find($callback) {}
	public function get_is_locked() {}
	public function get_modifier_mask() {}
	public function lock() {}
	public function unlock() {}
}

/**
 * @package Gtk
 */
class GtkAccelMap extends GObject {
	const gtype = 158552504;

	static public function add_entry($accel_path, $accel_key, $accel_mods) {}
	static public function add_filter($filter_pattern) {}
	static public function change_entry($accel_path, $accel_key, $accel_mods, $replace) {}
	static public function get() {}
	static public function load($file_name) {}
	static public function load_fd($fd) {}
	static public function lock_path($accel_path) {}
	static public function lookup_entry($accel_path) {}
	static public function save($file_name) {}
	static public function save_fd($fd) {}
	static public function unlock_path($accel_path) {}
}

/**
 * @package Gtk
 */
class GtkAccessible {
	const gtype = 158564216;

	public function connect_widget_destroyed() {}
}

/**
 * @package Gtk
 */
class GtkAction extends GObject {
	const gtype = 158224352;

	public function __construct($name, $label, $tooltip, $stock_id) {}
	public function activate() {}
	public function block_activate() {}
	public function block_activate_from(GtkWidget $proxy ) {}
	public function connect_accelerator() {}
	public function connect_proxy(GtkWidget $proxy ) {}
	public function create_icon($icon_size) {}
	public function create_menu() {}
	public function create_menu_item() {}
	public function create_tool_item() {}
	public function disconnect_accelerator() {}
	public function disconnect_proxy(GtkWidget $proxy ) {}
	public function get_accel_path() {}
	public function get_always_show_image() {}
	public function get_icon_name() {}
	public function get_is_important() {}
	public function get_label() {}
	public function get_name() {}
	public function get_proxies() {}
	public function get_sensitive() {}
	public function get_short_label() {}
	public function get_stock_id() {}
	public function get_tooltip() {}
	public function get_visible() {}
	public function get_visible_horizontal() {}
	public function get_visible_vertical() {}
	public function is_sensitive() {}
	public function is_visible() {}
	public function set_accel_group(GtkAccelGroup $accel_group ) {}
	public function set_accel_path($accel_path) {}
	public function set_always_show_image($always_show) {}
	public function set_icon_name($icon_name) {}
	public function set_is_important($is_important) {}
	public function set_label($label) {}
	public function set_sensitive($sensitive) {}
	public function set_short_label($short_label) {}
	public function set_stock_id($stock_id) {}
	public function set_tooltip($tooltip) {}
	public function set_visible($visible) {}
	public function set_visible_horizontal($visible_horizontal) {}
	public function set_visible_vertical($visible_vertical) {}
	public function unblock_activate() {}
	public function unblock_activate_from(GtkWidget $proxy ) {}
}

/**
 * @package Gtk
 */
class GtkActionGroup extends GObject {
	const gtype = 158583592;

	public function __construct($name) {}
	public function add_action(GtkAction $action ) {}
	public function add_action_with_accel(GtkAction $action, $accelerator) {}
	public function get_action($action_name) {}
	public function get_name() {}
	public function get_sensitive() {}
	public function get_visible() {}
	public function list_actions() {}
	public function remove_action(GtkAction $action ) {}
	public function set_sensitive($sensitive) {}
	public function set_translation_domain($domain) {}
	public function set_visible($visible) {}
	public function translate_string($string) {}
}

/**
 * @package Gtk
 */
class GtkRecentAction extends GtkAction {
	const gtype = 158595416;

	public function __construct($name, $label, $tooltip, $stock_id) {}
	static public function new_for_manager($name, $label, $tooltip, $stock_id, GtkRecentManager $manager ) {}
	public function get_show_numbers() {}
	public function set_show_numbers($show_numbers) {}
}

/**
 * @package Gtk
 */
class GtkClipboard extends GObject {
	const gtype = 158614408;

	public function __construct(GdkDisplay $display = NULL) {}
	public function clear() {}
	static public function get() {}
	public function get_display() {}
	public function get_owner() {}
	public function request_contents($target, $callback) {}
	public function request_targets($callback) {}
	public function request_text($callback) {}
	public function set_can_store($targets) {}
	public function set_image(GdkPixbuf $pixbuf ) {}
	public function set_text($text) {}
	public function set_with_data($targets, $get_callback, $clear_callback) {}
	public function store() {}
	public function wait_for_contents($target) {}
	public function wait_for_image() {}
	public function wait_for_targets() {}
	public function wait_for_text() {}
	public function wait_is_image_available() {}
	public function wait_is_rich_text_available(GtkTextBuffer $buffer ) {}
	public function wait_is_target_available($target) {}
	public function wait_is_text_available() {}
	public function wait_is_uris_available() {}
}

/**
 * @package Gtk
 */
class GtkEntryCompletion extends GObject implements GtkCellLayout {
	const gtype = 158628128;

	public function __construct() {}
	public function complete() {}
	public function delete_action($index) {}
	public function get_completion_prefix() {}
	public function get_entry() {}
	public function get_inline_completion() {}
	public function get_inline_selection() {}
	public function get_minimum_key_length() {}
	public function get_model() {}
	public function get_popup_completion() {}
	public function get_popup_set_width() {}
	public function get_popup_single_match() {}
	public function get_text_column() {}
	public function insert_action_markup($index, $markup) {}
	public function insert_action_text($index, $text) {}
	public function insert_prefix() {}
	public function set_inline_completion($inline_completion) {}
	public function set_inline_selection($inline_selection) {}
	public function set_match_func($callback) {}
	public function set_minimum_key_length($length) {}
	public function set_model($model) {}
	public function set_popup_completion($popup_completion) {}
	public function set_popup_set_width($popup_set_width) {}
	public function set_popup_single_match($popup_single_match) {}
	public function set_text_column($column) {}
	public function add_attribute(GtkCellRenderer $cell, $attribute, $column) {}
	public function clear() {}
	public function clear_attributes(GtkCellRenderer $cell ) {}
	public function pack_end(GtkCellRenderer $cell ) {}
	public function pack_start(GtkCellRenderer $cell ) {}
	public function reorder(GtkCellRenderer $cell, $position) {}
	public function set_attributes($cell) {}
	public function set_cell_data_func(GtkCellRenderer $cellrenderer, $callback) {}
}

/**
 * @package Gtk
 */
class GtkIconFactory extends GObject {
	const gtype = 158644280;

	public function __construct() {}
	public function add($stock_id, GtkIconSet $icon_set ) {}
	public function add_default() {}
	public function lookup($stock_id) {}
	static public function lookup_default($stock_id) {}
	public function remove_default() {}
}

/**
 * @package Gtk
 */
class GtkIconTheme extends GObject {
	const gtype = 158654544;

	public function __construct() {}
	static public function add_builtin_icon($icon_name, $size, GdkPixbuf $pixbuf ) {}
	public function append_search_path($path) {}
	static public function get_default() {}
	public function get_example_icon_name() {}
	static public function get_for_screen(GdkScreen $screen ) {}
	public function get_search_path() {}
	public function has_icon($icon_name) {}
	public function list_icons() {}
	public function load_icon($icon_name, $size, $flags, $error) {}
	public function lookup_icon($icon_name, $size, $flags) {}
	public function prepend_search_path($path) {}
	public function rescan_if_needed() {}
	public function set_custom_theme($theme_name) {}
	public function set_screen(GdkScreen $screen ) {}
	public function set_search_path(array $search_paths) {}
}

/**
 * @package Gtk
 */
class GtkListStore extends GObject implements GtkTreeModel, GtkTreeDragSource, GtkTreeDragDest, GtkTreeSortable {
	const gtype = 158667000;

	public function __construct() {}
	public function append() {}
	public function clear() {}
	public function insert($position) {}
	public function insert_after() {}
	public function insert_before() {}
	public function iter_is_valid(GtkTreeIter $iter ) {}
	public function move_after(GtkTreeIter $iter , GtkTreeIter $position ) {}
	public function move_before(GtkTreeIter $iter , GtkTreeIter $position ) {}
	public function prepend() {}
	public function remove(GtkTreeIter $iter ) {}
	public function reorder() {}
	public function set(GtkTreeIter $iter, $column, $value) {}
	public function set_column_types() {}
	public function swap(GtkTreeIter $a , GtkTreeIter $b ) {}
	public function get() {}
	public function get_column_type($index) {}
	public function get_flags() {}
	public function get_iter($treepath) {}
	public function get_iter_first() {}
	public function get_iter_root() {}
	public function get_iter_from_string($path) {}
	public function get_n_columns() {}
	public function get_path(GtkTreeIter $iter ) {}
	public function get_string_from_iter(GtkTreeIter $iter ) {}
	public function get_value(GtkTreeIter $iter, $column) {}
	public function iter_children(GtkTreeIter $parent_iter ) {}
	public function iter_has_child(GtkTreeIter $iter ) {}
	public function iter_n_children(GtkTreeIter $iter ) {}
	public function iter_next(GtkTreeIter $iter ) {}
	public function iter_nth_child(GtkTreeIter $parent_iter, $n) {}
	public function iter_parent(GtkTreeIter $iter = NULL) {}
	public function ref_node(GtkTreeIter $iter ) {}
	public function row_changed($path, GtkTreeIter $iter ) {}
	public function row_deleted($path) {}
	public function row_has_child_toggled($path, GtkTreeIter $iter ) {}
	public function row_inserted($path, GtkTreeIter $iter ) {}
	public function rows_reordered() {}
	public function unref_node(GtkTreeIter $iter ) {}
	public function for_each($callback) {}
	public function drag_data_delete($path) {}
	public function drag_data_get($path, GtkSelectionData $selection_data ) {}
	public function row_draggable($path) {}
	public function drag_data_received($dest, GtkSelectionData $selection_data ) {}
	public function row_drop_possible($dest_path, GtkSelectionData $selection_data ) {}
	public function get_sort_column_id() {}
	public function has_default_sort_func() {}
	public function set_default_sort_func($callback) {}
	public function set_sort_column_id($sort_column_id, $order) {}
	public function set_sort_func($column, $callback) {}
	public function sort_column_changed() {}
}

/**
 * @package Gtk
 */
class GtkObject extends GObject {
	const gtype = 158173328;

	public function destroy() {}
	public function flags() {}
	public function set_flags($flags) {}
	public function unset_flags($flags) {}
}

/**
 * @package Gtk
 */
class GtkItemFactory extends GtkObject {
	const gtype = 158697032;

	public function __construct(GType $container_type, $path, GtkAccelGroup $accel_group = NULL) {}
	static public function add_foreign(GtkWidget $accel_widget, $full_path, GtkAccelGroup $accel_group, $keyval, $modifiers) {}
	public function construct(GType $container_type, $path, GtkAccelGroup $accel_group ) {}
	public function delete_item($path) {}
	static public function from_path($path) {}
	static public function from_widget(GtkWidget $widget ) {}
	public function get_item($path) {}
	public function get_item_by_action($action) {}
	public function get_widget($path) {}
	public function get_widget_by_action($action) {}
	static public function path_delete($ifactory_path, $path) {}
	static public function path_from_widget(GtkWidget $widget ) {}
	public function popup($x, $y, $mouse_button) {}
}

/**
 * @package Gtk
 */
class GtkIMContext extends GtkObject {
	const gtype = 158709648;

	public function delete_surrounding($offset, $n_chars) {}
	public function filter_keypress($event) {}
	public function focus_in() {}
	public function focus_out() {}
	public function reset() {}
	public function set_client_window(GdkWindow $window ) {}
	public function set_cursor_location(GdkRectangle $area ) {}
	public function set_surrounding($text, $len, $cursor_index) {}
	public function set_use_preedit($use_preedit) {}
}

/**
 * @package Gtk
 */
class GtkFileFilter extends GtkObject {
	const gtype = 158721656;

	public function __construct() {}
	public function add_custom($flags_needed, $callback) {}
	public function add_mime_type($mime_type) {}
	public function add_pattern($pattern) {}
	public function add_pixbuf_formats() {}
	public function filter($filterinfo) {}
	public function get_name() {}
	public function get_needed() {}
	public function set_name($name) {}
}

/**
 * @package Gtk
 */
class GtkIMMulticontext extends GtkIMContext {
	const gtype = 158733408;

	public function __construct() {}
	public function append_menuitems(GtkMenuShell $menushell ) {}
	public function get_context_id() {}
	public function set_context_id($context_id) {}
}

/**
 * @package Gtk
 */
class GtkIMContextSimple extends GtkIMContext {
	const gtype = 158746048;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkCellRenderer extends GtkObject {
	const gtype = 158758032;

	public function activate(GdkEvent $event , GtkWidget $widget, $path, GdkRectangle $background_area , GdkRectangle $cell_area, $flags) {}
	public function editing_canceled() {}
	public function get_alignment() {}
	public function get_fixed_size() {}
	public function get_padding() {}
	public function get_sensitive() {}
	public function get_size($widget) {}
	public function get_visible() {}
	public function render(GdkWindow $window , GtkWidget $widget , GdkRectangle $background_area , GdkRectangle $cell_area , GdkRectangle $expose_area, $flags) {}
	public function set_alignment($xalign, $yalign) {}
	public function set_fixed_size($width, $height) {}
	public function set_padding($xpad, $ypad) {}
	public function set_sensitive($sensitive) {}
	public function set_visible($visible) {}
	public function start_editing(GdkEvent $event , GtkWidget $widget, $path, GdkRectangle $background_area , GdkRectangle $cell_area, $flags) {}
	public function stop_editing($canceled) {}
}

/**
 * @package Gtk
 */
class GtkAdjustment extends GtkObject {
	const gtype = 158307728;

	public function __construct($value, $lower, $upper, $step_incr, $page_incr, $page_size) {}
	public function changed() {}
	public function clamp_page($lower, $upper) {}
	public function configure($value, $lower, $upper, $step_increment, $page_increment, $page_size) {}
	public function get_lower() {}
	public function get_page_increment() {}
	public function get_page_size() {}
	public function get_step_increment() {}
	public function get_upper() {}
	public function get_value() {}
	public function set_lower($lower) {}
	public function set_page_increment($page_increment) {}
	public function set_page_size($page_size) {}
	public function set_step_increment($step_increment) {}
	public function set_upper($upper) {}
	public function set_value($value) {}
	public function value_changed() {}
}

/**
 * @package Gtk
 */
class GtkCellRendererToggle extends GtkCellRenderer {
	const gtype = 158785144;

	public function __construct() {}
	public function get_activatable() {}
	public function get_active() {}
	public function get_radio() {}
	public function set_activatable($create_folders) {}
	public function set_active($setting) {}
	public function set_radio($radio) {}
}

/**
 * @package Gtk
 */
class GtkCellRendererText extends GtkCellRenderer {
	const gtype = 158799896;

	public function __construct() {}
	public function set_fixed_height_from_font($number_of_rows) {}
}

/**
 * @package Gtk
 */
class GtkCellRendererProgress extends GtkCellRenderer {
	const gtype = 158813592;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkCellRendererAccel extends GtkCellRendererText {
	const gtype = 158827056;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkCellRendererSpin extends GtkCellRendererText {
	const gtype = 158840760;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkCellRendererCombo extends GtkCellRendererText {
	const gtype = 158854432;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkCellRendererPixbuf extends GtkCellRenderer {
	const gtype = 158868104;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkRecentFilter extends GtkObject {
	const gtype = 158881568;

	public function __construct() {}
	public function add_age($days) {}
	public function add_application($application) {}
	public function add_group($group) {}
	public function add_mime_type($mime_type) {}
	public function add_pattern($pattern) {}
	public function add_pixbuf_formats() {}
	public function get_name() {}
	public function get_needed() {}
	public function set_name($name) {}
}

/**
 * @package Gtk
 */
class GtkRcStyle extends GObject {
	const gtype = 158173440;

	public function copy() {}
	public function rc_add_class_style($pattern) {}
	public function rc_add_widget_class_style($pattern) {}
	public function rc_add_widget_name_style($pattern) {}
}

/**
 * @package Gtk
 */
class GtkSettings extends GObject {
	const gtype = 158147728;

	static public function get_default() {}
	static public function get_for_screen(GdkScreen $screen ) {}
	public function set_double_property($name, $v_double, $origin) {}
	public function set_long_property($name, $v_long, $origin) {}
	public function set_string_property($name, $v_string, $origin) {}
}

/**
 * @package Gtk
 */
class GtkSizeGroup extends GObject {
	const gtype = 158913504;

	public function __construct($mode) {}
	public function add_widget(GtkWidget $widget ) {}
	public function get_ignore_hidden() {}
	public function get_mode() {}
	public function remove_widget(GtkWidget $widget ) {}
	public function set_ignore_hidden($ignore_hidden) {}
	public function set_mode($mode) {}
}

/**
 * @package Gtk
 */
class GtkStyle extends GObject {
	const gtype = 158191104;

	public function __construct() {}
	public function apply_default_background(GdkWindow $window, $set_bg, $state_type, GdkRectangle $area, $x, $y, $width, $height) {}
	public function apply_default_pixmap(GdkWindow $window, $set_bg, GdkRectangle $area, $x, $y, $width, $height) {}
	public function attach(GdkWindow $window ) {}
	public function copy() {}
	public function detach() {}
	public function get_font() {}
	public function lookup_color($color_name, GdkColor $color ) {}
	public function lookup_icon_set($stock_id) {}
	public function paint_arrow(GdkWindow $window, $state_type, $shadow_type, GdkRectangle $area , GtkWidget $widget, $detail, $arrow_type, $fill, $x, $y, $width, $height) {}
	public function paint_box(GdkWindow $window, $state_type, $shadow_type, GdkRectangle $area , GtkWidget $widget, $detail, $x, $y, $width, $height) {}
	public function paint_box_gap(GdkWindow $window, $state_type, $shadow_type, GdkRectangle $area , GtkWidget $widget, $detail, $x, $y, $width, $height, $gap_side, $gap_x, $gap_width) {}
	public function paint_check(GdkWindow $window, $state_type, $shadow_type, GdkRectangle $area , GtkWidget $widget, $detail, $x, $y, $width, $height) {}
	public function paint_diamond(GdkWindow $window, $state_type, $shadow_type, GdkRectangle $area , GtkWidget $widget, $detail, $x, $y, $width, $height) {}
	public function paint_expander(GdkWindow $window, $state_type, GdkRectangle $area , GtkWidget $widget, $detail, $x, $y, $expander_style) {}
	public function paint_extension(GdkWindow $window, $state_type, $shadow_type, GdkRectangle $area , GtkWidget $widget, $detail, $x, $y, $width, $height, $gap_side) {}
	public function paint_flat_box(GdkWindow $window, $state_type, $shadow_type, GdkRectangle $area , GtkWidget $widget, $detail, $x, $y, $width, $height) {}
	public function paint_focus(GdkWindow $window, $state_type, GdkRectangle $area , GtkWidget $widget, $detail, $x, $y, $width, $height) {}
	public function paint_handle(GdkWindow $window, $state_type, $shadow_type, GdkRectangle $area , GtkWidget $widget, $detail, $x, $y, $width, $height, $orientation) {}
	public function paint_hline(GdkWindow $window, $state_type, GdkRectangle $area , GtkWidget $widget, $detail, $x1, $x2, $y) {}
	public function paint_layout(GdkWindow $window, $state_type, $use_text, GdkRectangle $area , GtkWidget $widget, $detail, $x, $y, PangoLayout $layout ) {}
	public function paint_option(GdkWindow $window, $state_type, $shadow_type, GdkRectangle $area , GtkWidget $widget, $detail, $x, $y, $width, $height) {}
	public function paint_polygon() {}
	public function paint_resize_grip(GdkWindow $window, $state_type, GdkRectangle $area , GtkWidget $widget, $detail, $edge, $x, $y, $width, $height) {}
	public function paint_shadow(GdkWindow $window, $state_type, $shadow_type, GdkRectangle $area , GtkWidget $widget, $detail, $x, $y, $width, $height) {}
	public function paint_shadow_gap(GdkWindow $window, $state_type, $shadow_type, GdkRectangle $area , GtkWidget $widget, $detail, $x, $y, $width, $height, $gap_side, $gap_x, $gap_width) {}
	public function paint_slider(GdkWindow $window, $state_type, $shadow_type, GdkRectangle $area , GtkWidget $widget, $detail, $x, $y, $width, $height, $orientation) {}
	public function paint_string(GdkWindow $window, $state_type, GdkRectangle $area , GtkWidget $widget, $detail, $x, $y, $string) {}
	public function paint_tab(GdkWindow $window, $state_type, $shadow_type, GdkRectangle $area , GtkWidget $widget, $detail, $x, $y, $width, $height) {}
	public function paint_vline(GdkWindow $window, $state_type, GdkRectangle $area , GtkWidget $widget, $detail, $y1, $y2, $x) {}
	public function render_icon(GtkIconSource $source, $direction, $state, $size, GtkWidget $widget = NULL) {}
	public function set_background(GdkWindow $window, $state_type) {}
	public function set_font(GdkFont $font ) {}
}

/**
 * @package Gtk
 */
class GtkTextBuffer extends GObject {
	const gtype = 158941448;

	public function __construct(GtkTextTagTable $tag_table = NULL) {}
	public function add_mark(GtkTextMark $mark , GtkTextIter $where ) {}
	public function add_selection_clipboard(GtkClipboard $clipboard ) {}
	public function apply_tag(GtkTextTag $tag , GtkTextIter $start , GtkTextIter $end ) {}
	public function apply_tag_by_name($name, GtkTextIter $start , GtkTextIter $end ) {}
	public function backspace(GtkTextIter $iter, $interactive, $default_editable) {}
	public function begin_user_action() {}
	public function copy_clipboard(GtkClipboard $clipboard ) {}
	public function create_child_anchor(GtkTextIter $iter ) {}
	public function create_mark($mark_name, GtkTextIter $where ) {}
	public function cut_clipboard(GtkClipboard $clipboard, $default_editable) {}
	public function delete(GtkTextIter $start , GtkTextIter $end ) {}
	public function delete_interactive(GtkTextIter $start_iter , GtkTextIter $end_iter, $default_editable) {}
	public function delete_mark(GtkTextMark $mark ) {}
	public function delete_mark_by_name($name) {}
	public function delete_selection($interactive, $default_editable) {}
	public function deserialize_get_can_create_tags($format) {}
	public function deserialize_set_can_create_tags($format, $can_create_tags) {}
	public function end_user_action() {}
	public function get_bounds() {}
	public function get_char_count() {}
	public function get_copy_target_list() {}
	public function get_end_iter() {}
	public function get_has_selection() {}
	public function get_insert() {}
	public function get_iter_at_child_anchor() {}
	public function get_iter_at_line($line_number) {}
	public function get_iter_at_line_index($line_number, $byte_offset) {}
	public function get_iter_at_line_offset($line_number, $char_offset) {}
	public function get_iter_at_mark() {}
	public function get_iter_at_offset($char_offset) {}
	public function get_line_count() {}
	public function get_mark($name) {}
	public function get_modified() {}
	public function get_paste_target_list() {}
	public function get_selection_bound() {}
	public function get_selection_bounds() {}
	public function get_slice(GtkTextIter $start , GtkTextIter $end ) {}
	public function get_start_iter() {}
	public function get_tag_table() {}
	public function get_text(GtkTextIter $start , GtkTextIter $end ) {}
	public function insert(GtkTextIter $iter, $text) {}
	public function insert_at_cursor($text) {}
	public function insert_child_anchor(GtkTextIter $iter , GtkTextChildAnchor $anchor ) {}
	public function insert_interactive(GtkTextIter $iter, $text, $len, $default_editable) {}
	public function insert_interactive_at_cursor($text, $len, $default_editable) {}
	public function insert_pixbuf(GtkTextIter $iter , GdkPixbuf $pixbuf ) {}
	public function insert_range(GtkTextIter $iter , GtkTextIter $start , GtkTextIter $end ) {}
	public function insert_range_interactive(GtkTextIter $iter , GtkTextIter $start , GtkTextIter $end, $default_editable) {}
	public function insert_with_tags_by_name() {}
	public function move_mark(GtkTextMark $mark , GtkTextIter $where ) {}
	public function move_mark_by_name($name, GtkTextIter $where ) {}
	public function paste_clipboard(GtkClipboard $clipboard , GtkTextIter $override_location, $default_editable) {}
	public function place_cursor(GtkTextIter $where ) {}
	public function register_deserialize_tagset() {}
	public function register_serialize_tagset() {}
	public function remove_all_tags(GtkTextIter $start , GtkTextIter $end ) {}
	public function remove_selection_clipboard(GtkClipboard $clipboard ) {}
	public function remove_tag(GtkTextTag $tag , GtkTextIter $start , GtkTextIter $end ) {}
	public function remove_tag_by_name($name, GtkTextIter $start , GtkTextIter $end ) {}
	public function select_range(GtkTextIter $ins , GtkTextIter $bound ) {}
	public function set_modified($setting) {}
	public function set_text($text) {}
	public function unregister_deserialize_format($format) {}
	public function unregister_serialize_format($format) {}
}

/**
 * @package Gtk
 */
class GtkTextChildAnchor extends GObject {
	const gtype = 158964576;

	public function __construct() {}
	public function get_deleted() {}
	public function get_widgets() {}
}

/**
 * @package Gtk
 */
class GtkTextMark extends GObject {
	const gtype = 158975296;

	public function __construct($name, $left_gravity) {}
	public function get_buffer() {}
	public function get_deleted() {}
	public function get_left_gravity() {}
	public function get_name() {}
	public function get_visible() {}
	public function set_visible($setting) {}
}

/**
 * @package Gtk
 */
class GtkTextTag extends GObject {
	const gtype = 158985832;

	public function __construct() {}
	public function event(GObject $event_object , GdkEvent $event , GtkTextIter $iter ) {}
	public function get_priority() {}
	public function set_priority($priority) {}
}

/**
 * @package Gtk
 */
class GtkTextTagTable extends GObject {
	const gtype = 158995624;

	public function __construct() {}
	public function add(GtkTextTag $tag ) {}
	public function for_each($callback) {}
	public function get_size() {}
	public function lookup($name) {}
	public function remove(GtkTextTag $tag ) {}
}

/**
 * @package Gtk
 */
class GtkToggleAction extends GtkAction {
	const gtype = 159005760;

	public function __construct($name, $label, $tooltip, $stock_id) {}
	public function get_active() {}
	public function get_draw_as_radio() {}
	public function set_active($is_active) {}
	public function set_draw_as_radio($draw_as_radio) {}
	public function toggled() {}
}

/**
 * @package Gtk
 */
class GtkRadioAction extends GtkToggleAction {
	const gtype = 159025144;

	public function __construct($name, $label, $tooltip, $stock_id, $value) {}
	public function get_current_value() {}
	public function get_group() {}
	public function set_current_value($current_value) {}
	public function set_group() {}
}

/**
 * @package Gtk
 */
class GtkTooltips extends GtkObject {
	const gtype = 159045424;

	public function __construct() {}
	public function disable() {}
	public function enable() {}
	public function force_window() {}
	static public function get_info_from_tip_window() {}
	public function set_delay($delay) {}
	public function set_tip(GtkWidget $widget, $tip_text) {}
}

/**
 * @package Gtk
 */
class GtkTreeModelFilter extends GObject implements GtkTreeModel, GtkTreeDragSource {
	const gtype = 159057368;

	public function __construct(GtkTreeModel $model ) {}
	public function clear_cache() {}
	public function convert_child_iter_to_iter(GtkTreeIter $child_iter ) {}
	public function convert_child_path_to_path($child_path) {}
	public function convert_iter_to_child_iter(GtkTreeIter $filter_iter ) {}
	public function convert_path_to_child_path($filter_path) {}
	public function get_model() {}
	public function refilter() {}
	public function set_visible_column($column) {}
	public function set_visible_func($callback) {}
	public function get() {}
	public function get_column_type($index) {}
	public function get_flags() {}
	public function get_iter($treepath) {}
	public function get_iter_first() {}
	public function get_iter_root() {}
	public function get_iter_from_string($path) {}
	public function get_n_columns() {}
	public function get_path(GtkTreeIter $iter ) {}
	public function get_string_from_iter(GtkTreeIter $iter ) {}
	public function get_value(GtkTreeIter $iter, $column) {}
	public function iter_children(GtkTreeIter $parent_iter ) {}
	public function iter_has_child(GtkTreeIter $iter ) {}
	public function iter_n_children(GtkTreeIter $iter ) {}
	public function iter_next(GtkTreeIter $iter ) {}
	public function iter_nth_child(GtkTreeIter $parent_iter, $n) {}
	public function iter_parent(GtkTreeIter $iter = NULL) {}
	public function ref_node(GtkTreeIter $iter ) {}
	public function row_changed($path, GtkTreeIter $iter ) {}
	public function row_deleted($path) {}
	public function row_has_child_toggled($path, GtkTreeIter $iter ) {}
	public function row_inserted($path, GtkTreeIter $iter ) {}
	public function rows_reordered() {}
	public function unref_node(GtkTreeIter $iter ) {}
	public function for_each($callback) {}
	public function drag_data_delete($path) {}
	public function drag_data_get($path, GtkSelectionData $selection_data ) {}
	public function row_draggable($path) {}
}

/**
 * @package Gtk
 */
class GtkTreeModelSort extends GObject implements GtkTreeModel, GtkTreeSortable {
	const gtype = 159074552;

	public function __construct($model) {}
	public function clear_cache() {}
	public function convert_child_iter_to_iter(GtkTreeIter $child_iter ) {}
	public function convert_child_path_to_path($child_path) {}
	public function convert_iter_to_child_iter(GtkTreeIter $sort_iter ) {}
	public function convert_path_to_child_path($sorted_path) {}
	public function get_model() {}
	public function iter_is_valid(GtkTreeIter $iter ) {}
	public function reset_default_sort_func() {}
	public function get() {}
	public function get_column_type($index) {}
	public function get_flags() {}
	public function get_iter($treepath) {}
	public function get_iter_first() {}
	public function get_iter_root() {}
	public function get_iter_from_string($path) {}
	public function get_n_columns() {}
	public function get_path(GtkTreeIter $iter ) {}
	public function get_string_from_iter(GtkTreeIter $iter ) {}
	public function get_value(GtkTreeIter $iter, $column) {}
	public function iter_children(GtkTreeIter $parent_iter ) {}
	public function iter_has_child(GtkTreeIter $iter ) {}
	public function iter_n_children(GtkTreeIter $iter ) {}
	public function iter_next(GtkTreeIter $iter ) {}
	public function iter_nth_child(GtkTreeIter $parent_iter, $n) {}
	public function iter_parent(GtkTreeIter $iter = NULL) {}
	public function ref_node(GtkTreeIter $iter ) {}
	public function row_changed($path, GtkTreeIter $iter ) {}
	public function row_deleted($path) {}
	public function row_has_child_toggled($path, GtkTreeIter $iter ) {}
	public function row_inserted($path, GtkTreeIter $iter ) {}
	public function rows_reordered() {}
	public function unref_node(GtkTreeIter $iter ) {}
	public function for_each($callback) {}
	public function get_sort_column_id() {}
	public function has_default_sort_func() {}
	public function set_default_sort_func($callback) {}
	public function set_sort_column_id($sort_column_id, $order) {}
	public function set_sort_func($column, $callback) {}
	public function sort_column_changed() {}
}

/**
 * @package Gtk
 */
class GtkTreeSelection extends GObject {
	const gtype = 159092424;

	public function count_selected_rows() {}
	public function get_mode() {}
	public function get_selected() {}
	public function get_selected_rows() {}
	public function get_tree_view() {}
	public function iter_is_selected(GtkTreeIter $iter ) {}
	public function path_is_selected($path) {}
	public function select_all() {}
	public function select_iter(GtkTreeIter $iter ) {}
	public function select_path($path) {}
	public function select_range($start_path, $end_path) {}
	public function selected_foreach($callback) {}
	public function set_mode($type) {}
	public function set_select_function($callback) {}
	public function unselect_all() {}
	public function unselect_iter(GtkTreeIter $iter ) {}
	public function unselect_path($path) {}
	public function unselect_range($start_path, $end_path) {}
}

/**
 * @package Gtk
 */
class GtkTreeStore extends GObject implements GtkTreeModel, GtkTreeDragSource, GtkTreeDragDest, GtkTreeSortable {
	const gtype = 159105528;

	public function __construct($type_col_0) {}
	public function append(GtkTreeIter $iter = NULL) {}
	public function clear() {}
	public function insert($position, GtkTreeIter $parent = NULL) {}
	public function insert_after(GtkTreeIter $parent = NULL, GtkTreeIter $sibling = NULL) {}
	public function insert_before(GtkTreeIter $parent = NULL, GtkTreeIter $sibling = NULL) {}
	public function is_ancestor(GtkTreeIter $iter , GtkTreeIter $descendant ) {}
	public function iter_depth(GtkTreeIter $iter ) {}
	public function iter_is_valid(GtkTreeIter $iter ) {}
	public function move_after(GtkTreeIter $iter , GtkTreeIter $position ) {}
	public function move_before(GtkTreeIter $iter , GtkTreeIter $position ) {}
	public function prepend(GtkTreeIter $iter = NULL) {}
	public function remove(GtkTreeIter $iter ) {}
	public function reorder() {}
	public function set(GtkTreeIter $iter, $column, $value) {}
	public function set_column_types() {}
	public function swap(GtkTreeIter $a , GtkTreeIter $b ) {}
	public function get() {}
	public function get_column_type($index) {}
	public function get_flags() {}
	public function get_iter($treepath) {}
	public function get_iter_first() {}
	public function get_iter_root() {}
	public function get_iter_from_string($path) {}
	public function get_n_columns() {}
	public function get_path(GtkTreeIter $iter ) {}
	public function get_string_from_iter(GtkTreeIter $iter ) {}
	public function get_value(GtkTreeIter $iter, $column) {}
	public function iter_children(GtkTreeIter $parent_iter ) {}
	public function iter_has_child(GtkTreeIter $iter ) {}
	public function iter_n_children(GtkTreeIter $iter ) {}
	public function iter_next(GtkTreeIter $iter ) {}
	public function iter_nth_child(GtkTreeIter $parent_iter, $n) {}
	public function iter_parent(GtkTreeIter $iter = NULL) {}
	public function ref_node(GtkTreeIter $iter ) {}
	public function row_changed($path, GtkTreeIter $iter ) {}
	public function row_deleted($path) {}
	public function row_has_child_toggled($path, GtkTreeIter $iter ) {}
	public function row_inserted($path, GtkTreeIter $iter ) {}
	public function rows_reordered() {}
	public function unref_node(GtkTreeIter $iter ) {}
	public function for_each($callback) {}
	public function drag_data_delete($path) {}
	public function drag_data_get($path, GtkSelectionData $selection_data ) {}
	public function row_draggable($path) {}
	public function drag_data_received($dest, GtkSelectionData $selection_data ) {}
	public function row_drop_possible($dest_path, GtkSelectionData $selection_data ) {}
	public function get_sort_column_id() {}
	public function has_default_sort_func() {}
	public function set_default_sort_func($callback) {}
	public function set_sort_column_id($sort_column_id, $order) {}
	public function set_sort_func($column, $callback) {}
	public function sort_column_changed() {}
}

/**
 * @package Gtk
 */
class GtkTreeViewColumn extends GtkObject implements GtkCellLayout {
	const gtype = 158138456;

	public function __construct(GtkCellRenderer $cellrenderer = NULL) {}
	public function add_attribute(GtkCellRenderer $cell_renderer, $attribute, $column) {}
	public function cell_get_position(GtkCellRenderer $cellrenderer ) {}
	public function cell_get_size() {}
	public function cell_is_visible() {}
	public function cell_set_cell_data($tree_model, GtkTreeIter $iter, $is_expander, $is_expanded) {}
	public function clear_attributes(GtkCellRenderer $cell_renderer ) {}
	public function clicked() {}
	public function focus_cell(GtkCellRenderer $cell ) {}
	public function get_alignment() {}
	public function get_cell_renderers() {}
	public function get_clickable() {}
	public function get_expand() {}
	public function get_fixed_width() {}
	public function get_max_width() {}
	public function get_min_width() {}
	public function get_reorderable() {}
	public function get_resizable() {}
	public function get_sizing() {}
	public function get_sort_column_id() {}
	public function get_sort_indicator() {}
	public function get_sort_order() {}
	public function get_spacing() {}
	public function get_title() {}
	public function get_tree_view() {}
	public function get_visible() {}
	public function get_widget() {}
	public function get_width() {}
	public function pack_end(GtkCellRenderer $cell ) {}
	public function pack_start(GtkCellRenderer $cell ) {}
	public function queue_resize() {}
	public function set_alignment($xalign) {}
	public function set_clickable($active) {}
	public function set_expand($expand) {}
	public function set_fixed_width($fixed_width) {}
	public function set_max_width($max_width) {}
	public function set_min_width($min_width) {}
	public function set_reorderable($reorderable) {}
	public function set_resizable($resizable) {}
	public function set_sizing($type) {}
	public function set_sort_column_id($sort_column_id) {}
	public function set_sort_indicator($setting) {}
	public function set_sort_order($order) {}
	public function set_spacing($spacing) {}
	public function set_title($title) {}
	public function set_visible($visible) {}
	public function set_widget(GtkWidget $widget ) {}
	public function clear() {}
	public function reorder(GtkCellRenderer $cell, $position) {}
	public function set_attributes($cell) {}
	public function set_cell_data_func(GtkCellRenderer $cellrenderer, $callback) {}
}

/**
 * @package Gtk
 */
class GtkUIManager extends GObject {
	const gtype = 159146760;

	public function __construct() {}
	public function add_ui($merge_id, $path, $name, $action, $type, $top) {}
	public function add_ui_from_file($filename, $error) {}
	public function add_ui_from_string($text) {}
	public function ensure_update() {}
	public function get_accel_group() {}
	public function get_action($path) {}
	public function get_action_groups() {}
	public function get_add_tearoffs() {}
	public function get_toplevels($types) {}
	public function get_ui() {}
	public function get_widget($path) {}
	public function insert_action_group(GtkActionGroup $action_group, $pos) {}
	public function new_merge_id() {}
	public function remove_action_group(GtkActionGroup $action_group ) {}
	public function remove_ui($merge_id) {}
	public function set_add_tearoffs($add_tearoffs) {}
}

/**
 * @package Gtk
 */
class GtkWidget extends GtkObject {
	const gtype = 158174936;

	public function __construct() {}
	public function activate() {}
	public function add_accelerator($accel_signal, GtkAccelGroup $accel_group, $accel_key, $accel_mods, $accel_flags) {}
	public function add_events($events) {}
	public function add_mnemonic_label(GtkWidget $label ) {}
	public function can_activate_accel($signal_id) {}
	public function child_focus($direction) {}
	public function child_notify($child_property) {}
	public function class_path() {}
	public function create_pango_context() {}
	public function create_pango_layout($text) {}
	public function destroy() {}
	public function drag_begin($targets, $actions, $button, GdkEvent $event ) {}
	public function drag_check_threshold($start_x, $start_y, $current_x, $current_y) {}
	public function drag_dest_add_image_targets() {}
	public function drag_dest_add_text_targets() {}
	public function drag_dest_add_uri_targets() {}
	public function drag_dest_find_target(GdkDragContext $context ) {}
	public function drag_dest_get_target_list() {}
	public function drag_dest_get_track_motion() {}
	public function drag_dest_set($flags, $targets, $actions) {}
	public function drag_dest_set_proxy(GdkWindow $proxy_window, $protocol, $use_coordinates) {}
	public function drag_dest_set_target_list($targets) {}
	public function drag_dest_set_track_motion($track_motion) {}
	public function drag_dest_unset() {}
	public function drag_get_data(GdkDragContext $context, $target) {}
	public function drag_highlight() {}
	static public function drag_set_icon_name(GdkDragContext $context, $icon_name, $hot_x, $hot_y) {}
	public function drag_source_add_image_targets() {}
	public function drag_source_add_text_targets() {}
	public function drag_source_add_uri_targets() {}
	public function drag_source_get_target_list() {}
	public function drag_source_set($sbmask, $targets, $actions) {}
	public function drag_source_set_icon(GdkColormap $colormap , GdkPixmap $pixmap ) {}
	public function drag_source_set_icon_name($icon_name) {}
	public function drag_source_set_icon_pixbuf(GdkPixbuf $pixbuf ) {}
	public function drag_source_set_icon_stock($stock_id) {}
	public function drag_source_set_target_list($targets) {}
	public function drag_source_unset() {}
	public function drag_unhighlight() {}
	public function draw(GdkRectangle $area ) {}
	public function ensure_style() {}
	public function error_bell() {}
	public function event(GdkEvent $event ) {}
	public function freeze_child_notify() {}
	public function get_accessible() {}
	public function get_action() {}
	public function get_allocation() {}
	public function get_ancestor(GType $widget_type ) {}
	public function get_app_paintable() {}
	public function get_can_default() {}
	public function get_can_focus() {}
	public function get_child_requisition() {}
	public function get_child_visible() {}
	public function get_clipboard($selection) {}
	public function get_colormap() {}
	public function get_composite_name() {}
	static public function get_default_colormap() {}
	static public function get_default_direction() {}
	static public function get_default_style() {}
	static public function get_default_visual() {}
	public function get_direction() {}
	public function get_display() {}
	public function get_double_buffered() {}
	public function get_events() {}
	public function get_extension_events() {}
	public function get_for_attach_widget() {}
	public function get_has_tooltip() {}
	public function get_has_window() {}
	public function get_mapped() {}
	public function get_modifier_style() {}
	public function get_name() {}
	public function get_no_show_all() {}
	public function get_pango_context() {}
	public function get_parent() {}
	public function get_parent_window() {}
	public function get_pointer() {}
	public function get_realized() {}
	public function get_receives_default() {}
	public function get_requisition(GtkRequisition $requisition ) {}
	public function get_root_window() {}
	public function get_screen() {}
	public function get_sensitive() {}
	public function get_settings() {}
	public function get_size_request() {}
	public function get_snapshot(GdkRectangle $clip_rect = NULL) {}
	public function get_state() {}
	public function get_style() {}
	public function get_tooltip_markup() {}
	public function get_tooltip_text() {}
	public function get_tooltip_window() {}
	public function get_toplevel() {}
	public function get_visible() {}
	public function get_visual() {}
	public function get_window() {}
	public function grab_add() {}
	public function grab_default() {}
	public function grab_focus() {}
	public function grab_remove() {}
	public function has_default() {}
	public function has_focus() {}
	public function has_grab() {}
	public function has_rc_style() {}
	public function has_screen() {}
	public function hide() {}
	public function hide_all() {}
	public function hide_on_delete() {}
	public function input_shape_combine_mask($shape_mask, $offset_x, $offset_y) {}
	public function intersect(GdkRectangle $area ) {}
	public function is_ancestor(GtkWidget $ancestor ) {}
	public function is_composited() {}
	public function is_drawable() {}
	public function is_focus() {}
	public function is_sensitive() {}
	public function is_toplevel() {}
	public function is_visible() {}
	public function keynav_failed($direction) {}
	public function list_mnemonic_labels() {}
	public function map() {}
	public function mnemonic_activate($group_cycling) {}
	public function modify_base($state, GdkColor $color ) {}
	public function modify_bg($state, GdkColor $color ) {}
	public function modify_cursor(GdkColor $primary , GdkColor $secondary ) {}
	public function modify_fg($state, GdkColor $color ) {}
	public function modify_font(PangoFontDescription $font_desc ) {}
	public function modify_style(GtkRcStyle $style ) {}
	public function modify_text($state, GdkColor $color ) {}
	public function path() {}
	static public function pop_colormap() {}
	static public function pop_composite_child() {}
	static public function push_colormap(GdkColormap $cmap ) {}
	static public function push_composite_child() {}
	public function queue_clear() {}
	public function queue_clear_area($x, $y, $width, $height) {}
	public function queue_draw() {}
	public function queue_draw_area($x, $y, $width, $height) {}
	public function queue_resize() {}
	public function queue_resize_no_redraw() {}
	public function rc_get_style() {}
	public function realize() {}
	public function region_intersect(GdkRegion $region ) {}
	public function remove_accelerator(GtkAccelGroup $accel_group, $accel_key, $accel_mods) {}
	public function remove_mnemonic_label(GtkWidget $label ) {}
	public function render_icon($stock_id, $size) {}
	public function reparent(GtkWidget $new_parent ) {}
	public function reset_rc_styles() {}
	public function reset_shapes() {}
	public function selection_add_target($selection, $target, $info) {}
	public function selection_add_targets() {}
	public function selection_clear($event) {}
	public function selection_clear_targets($selection) {}
	public function selection_convert($selection, $target) {}
	public function selection_owner_set($selection) {}
	public function selection_remove_all() {}
	public function send_expose(GdkEvent $event ) {}
	public function set_accel_path($accel_path, GtkAccelGroup $accel_group ) {}
	public function set_all_visible($visible) {}
	public function set_allocation($allocation) {}
	public function set_app_paintable($app_paintable) {}
	public function set_can_default($can_default) {}
	public function set_can_focus($can_focus) {}
	public function set_child_visible($is_visible) {}
	public function set_colormap(GdkColormap $colormap ) {}
	public function set_composite_name($name) {}
	static public function set_default_colormap(GdkColormap $colormap ) {}
	static public function set_default_direction($dir) {}
	public function set_direction($dir) {}
	public function set_double_buffered($double_buffered) {}
	public function set_events($events) {}
	public function set_extension_events($mode) {}
	public function set_has_tooltip($has_tooltip) {}
	public function set_has_window($has_window) {}
	public function set_mapped($mapped) {}
	public function set_name($name) {}
	public function set_no_show_all($no_show_all) {}
	public function set_parent(GtkWidget $parent ) {}
	public function set_parent_window(GdkWindow $parent_window ) {}
	public function set_realized($realized) {}
	public function set_receives_default($receives_default) {}
	public function set_redraw_on_allocate($redraw_on_allocate) {}
	public function set_scroll_adjustments(GtkAdjustment $hadjustment , GtkAdjustment $vadjustment ) {}
	public function set_sensitive($sensitive) {}
	public function set_size_request($width, $height) {}
	public function set_state($state) {}
	public function set_style(GtkStyle $style ) {}
	public function set_tooltip_markup($markup) {}
	public function set_tooltip_text($text) {}
	public function set_tooltip_window(GtkWindow $custom_window ) {}
	public function set_uposition($x, $y) {}
	public function set_usize($width, $height) {}
	public function set_visible($visible) {}
	public function set_window(GdkWindow $window ) {}
	public function shape_combine_mask($shape_mask, $offset_x, $offset_y) {}
	public function show() {}
	public function show_all() {}
	public function show_now() {}
	public function size_allocate($allocation) {}
	public function size_request() {}
	public function style_attach() {}
	public function style_get_property($property_name) {}
	public function thaw_child_notify() {}
	public function translate_coordinates(GtkWidget $dest_widget, $src_x, $src_y) {}
	public function trigger_tooltip_query() {}
	public function unmap() {}
	public function unparent() {}
	public function unrealize() {}
}

/**
 * @package Gtk
 */
class GtkSeparator extends GtkWidget {
	const gtype = 159213600;

}

/**
 * @package Gtk
 */
class GtkRuler extends GtkWidget {
	const gtype = 159267952;

	public function draw_pos() {}
	public function draw_ticks() {}
	public function get_metric() {}
	public function get_range() {}
	public function set_metric($metric) {}
	public function set_range($lower, $upper, $position, $max_size) {}
}

/**
 * @package Gtk
 */
class GtkVSeparator extends GtkSeparator {
	const gtype = 157055512;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkHSeparator extends GtkSeparator {
	const gtype = 159378216;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkVRuler extends GtkRuler {
	const gtype = 159432592;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkRange extends GtkWidget {
	const gtype = 159488208;

	public function get_adjustment() {}
	public function get_fill_level() {}
	public function get_flippable() {}
	public function get_inverted() {}
	public function get_lower_stepper_sensitivity() {}
	public function get_min_slider_size() {}
	public function get_range_rect(GdkRectangle $range_rect ) {}
	public function get_restrict_to_fill_level() {}
	public function get_show_fill_level() {}
	public function get_slider_range() {}
	public function get_slider_size_fixed() {}
	public function get_update_policy() {}
	public function get_upper_stepper_sensitivity() {}
	public function get_value() {}
	public function set_adjustment(GtkAdjustment $adjustment ) {}
	public function set_fill_level($fill_level) {}
	public function set_flippable($flippable) {}
	public function set_increments($step, $page) {}
	public function set_inverted($setting) {}
	public function set_lower_stepper_sensitivity($sensitivity) {}
	public function set_min_slider_size($min_size) {}
	public function set_range($min, $max) {}
	public function set_restrict_to_fill_level($restrict_to_fill_level) {}
	public function set_show_fill_level($show_fill_level) {}
	public function set_slider_size_fixed($size_fixed) {}
	public function set_update_policy($policy) {}
	public function set_upper_stepper_sensitivity($sensitivity) {}
	public function set_value($value) {}
}

/**
 * @package Gtk
 */
class GtkHRuler extends GtkRuler {
	const gtype = 159549616;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkScrollbar extends GtkRange {
	const gtype = 159605216;

}

/**
 * @package Gtk
 */
class GtkProgress extends GtkWidget {
	const gtype = 159666624;

	public function configure($value, $min, $max) {}
	public function get_current_percentage() {}
	public function get_current_text() {}
	public function get_percentage_from_value($value) {}
	public function get_text_from_value($value) {}
	public function get_value() {}
	public function set_activity_mode($activity_mode) {}
	public function set_adjustment(GtkAdjustment $adjustment ) {}
	public function set_format_string($format) {}
	public function set_percentage($percentage) {}
	public function set_show_text($show_text) {}
	public function set_text_alignment($x_align, $y_align) {}
	public function set_value($value) {}
}

/**
 * @package Gtk
 */
class GtkVScrollbar extends GtkScrollbar {
	const gtype = 159723744;

	public function __construct(GtkAdjustment $adjustment = NULL) {}
}

/**
 * @package Gtk
 */
class GtkHScrollbar extends GtkScrollbar {
	const gtype = 159785160;

	public function __construct(GtkAdjustment $adjustment = NULL) {}
}

/**
 * @package Gtk
 */
class GtkScale extends GtkRange {
	const gtype = 159846560;

	public function add_mark($value, $position, $markup) {}
	public function clear_marks() {}
	public function get_digits() {}
	public function get_draw_value() {}
	public function get_layout() {}
	public function get_layout_offsets() {}
	public function get_value_pos() {}
	public function set_digits($digits) {}
	public function set_draw_value($draw_value) {}
	public function set_value_pos($pos) {}
}

/**
 * @package Gtk
 */
class GtkPreview extends GtkWidget {
	const gtype = 159910032;

	public function __construct($type) {}
	public function draw_row($data, $x, $y, $w) {}
	static public function get_cmap() {}
	static public function get_preview_visual() {}
	public function put(GdkWindow $window , GdkGC $gc, $srcx, $srcy, $destx, $desty, $width, $height) {}
	static public function reset() {}
	static public function set_color_cube($nred_shades, $ngreen_shades, $nblue_shades, $ngray_shades) {}
	public function set_dither($dither) {}
	public function set_expand($expand) {}
	static public function set_gamma($gamma) {}
	static public function set_install_cmap($install_cmap) {}
	static public function set_reserved($nreserved) {}
	public function size($width, $height) {}
}

/**
 * @package Gtk
 */
class GtkVScale extends GtkScale {
	const gtype = 159966872;

	public function __construct(GtkAdjustment $adjustment = NULL) {}
	static public function new_with_range($min, $max, $step) {}
}

/**
 * @package Gtk
 */
class GtkHScale extends GtkScale {
	const gtype = 160030576;

	public function __construct(GtkAdjustment $adjustment = NULL) {}
	static public function new_with_range($min, $max, $step) {}
}

/**
 * @package Gtk
 */
class GtkProgressBar extends GtkProgress {
	const gtype = 160094264;

	public function __construct(GtkAdjustment $adjustment = NULL) {}
	public function get_ellipsize() {}
	public function get_fraction() {}
	public function get_orientation() {}
	public function get_pulse_step() {}
	public function get_text() {}
	public function pulse() {}
	public function set_activity_blocks($blocks) {}
	public function set_activity_step($step) {}
	public function set_bar_style($style) {}
	public function set_discrete_blocks($blocks) {}
	public function set_ellipsize($mode) {}
	public function set_fraction($fraction) {}
	public function set_orientation($orientation) {}
	public function set_pulse_step($fraction) {}
	public function set_text($text) {}
}

/**
 * @package Gtk
 */
class GtkOldEditable extends GtkWidget implements GtkEditable {
	const gtype = 160155576;

	public function changed() {}
	public function claim_selection($claim) {}
	public function copy_clipboard() {}
	public function cut_clipboard() {}
	public function delete_selection() {}
	public function delete_text($start_pos, $end_pos) {}
	public function get_chars($start_pos, $end_pos) {}
	public function get_editable() {}
	public function get_position() {}
	public function get_selection_bounds() {}
	public function insert_text($text, $position) {}
	public function paste_clipboard() {}
	public function select_region($start, $end) {}
	public function set_editable($is_editable) {}
	public function set_position($position) {}
}

/**
 * @package Gtk
 */
class GtkMisc extends GtkWidget {
	const gtype = 160213128;

	public function get_alignment() {}
	public function get_padding() {}
	public function set_alignment($xalign, $yalign) {}
	public function set_padding($xpad, $ypad) {}
}

/**
 * @package Gtk
 */
class GtkInvisible extends GtkWidget {
	const gtype = 160268344;

	public function __construct() {}
	static public function new_for_screen(GdkScreen $screen ) {}
	public function get_screen() {}
	public function set_screen(GdkScreen $screen ) {}
}

/**
 * @package Gtk
 */
class GtkPixmap extends GtkMisc {
	const gtype = 160323144;

	public function __construct(GdkPixmap $pixmap, $mask) {}
	public function get() {}
	public function set(GdkPixmap $val, $mask) {}
	public function set_build_insensitive($build) {}
}

/**
 * @package Gtk
 */
class GtkArrow extends GtkMisc {
	const gtype = 160378968;

	public function __construct($arrow_type, $shadow_type) {}
	public function set($arrow_type, $shadow_type) {}
}

/**
 * @package Gtk
 */
class GtkImage extends GtkMisc {
	const gtype = 160434344;

	public function __construct() {}
	static public function new_from_animation(GdkPixbufAnimation $animation ) {}
	static public function new_from_file($filename) {}
	static public function new_from_icon_name($icon_name, $size) {}
	static public function new_from_icon_set(GtkIconSet $icon_set, $size) {}
	static public function new_from_image(GdkImage $image, $mask) {}
	static public function new_from_pixbuf(GdkPixbuf $pixbuf ) {}
	static public function new_from_pixmap(GdkPixmap $pixmap, $mask) {}
	static public function new_from_stock($stock_id, $size) {}
	public function clear() {}
	public function get() {}
	public function get_animation() {}
	public function get_icon_name() {}
	public function get_icon_set() {}
	public function get_image() {}
	public function get_pixbuf() {}
	public function get_pixel_size() {}
	public function get_pixmap() {}
	public function get_stock() {}
	public function get_storage_type() {}
	public function set(GdkImage $val, $mask) {}
	public function set_from_animation(GdkPixbufAnimation $animation ) {}
	public function set_from_file($filename) {}
	public function set_from_icon_name($icon_name, $size) {}
	public function set_from_icon_set(GtkIconSet $icon_set, $size) {}
	public function set_from_image(GdkImage $gdk_image, $mask) {}
	public function set_from_pixbuf(GdkPixbuf $pixbuf ) {}
	public function set_from_pixmap(GdkPixmap $pixmap, $mask) {}
	public function set_from_stock($stock_id, $size) {}
	public function set_pixel_size($pixel_size) {}
}

/**
 * @package Gtk
 */
class GtkLabel extends GtkMisc {
	const gtype = 160496608;

	public function __construct() {}
	public function get() {}
	public function get_angle() {}
	public function get_attributes() {}
	public function get_current_uri() {}
	public function get_ellipsize() {}
	public function get_justify() {}
	public function get_label() {}
	public function get_layout() {}
	public function get_layout_offsets() {}
	public function get_line_wrap() {}
	public function get_line_wrap_mode() {}
	public function get_max_width_chars() {}
	public function get_mnemonic_keyval() {}
	public function get_mnemonic_widget() {}
	public function get_selectable() {}
	public function get_selection_bounds() {}
	public function get_single_line_mode() {}
	public function get_text() {}
	public function get_track_visited_links() {}
	public function get_use_markup() {}
	public function get_use_underline() {}
	public function get_width_chars() {}
	public function parse_uline($string) {}
	public function select_region($start_offset, $end_offset) {}
	public function set($str) {}
	public function set_angle($angle) {}
	public function set_attributes(PangoAttrList $attrs ) {}
	public function set_ellipsize($mode) {}
	public function set_justify($jtype) {}
	public function set_label($str) {}
	public function set_line_wrap($wrap) {}
	public function set_line_wrap_mode($wrap_mode) {}
	public function set_markup($str) {}
	public function set_markup_with_mnemonic($str) {}
	public function set_max_width_chars($n_chars) {}
	public function set_mnemonic_widget(GtkWidget $widget ) {}
	public function set_pattern($pattern) {}
	public function set_selectable($setting) {}
	public function set_single_line_mode($single_line_mode) {}
	public function set_text($str) {}
	public function set_text_with_mnemonic($str) {}
	public function set_track_visited_links($track_visited_links) {}
	public function set_use_markup($setting) {}
	public function set_use_underline($setting) {}
	public function set_width_chars($n_chars) {}
}

/**
 * @package Gtk
 */
class GtkEntry extends GtkWidget implements GtkEditable, GtkCellEditable {
	const gtype = 160562328;

	public function __construct() {}
	static public function new_with_buffer(GtkEntryBuffer $buffer ) {}
	public function append_text($text) {}
	public function get_activates_default() {}
	public function get_alignment() {}
	public function get_buffer() {}
	public function get_completion() {}
	public function get_current_icon_drag_source() {}
	public function get_cursor_hadjustment() {}
	public function get_has_frame() {}
	public function get_icon_activatable($icon_pos = NULL ) {}
	public function get_icon_at_pos($x, $y) {}
	public function get_icon_name($icon_pos = NULL ) {}
	public function get_icon_pixbuf($icon_pos = NULL ) {}
	public function get_icon_sensitive($icon_pos = NULL ) {}
	public function get_icon_stock($icon_pos = NULL ) {}
	public function get_icon_storage_type($icon_pos = NULL ) {}
	public function get_icon_tooltip_markup($icon_pos = NULL ) {}
	public function get_icon_tooltip_text($icon_pos = NULL ) {}
	public function get_icon_window($icon_pos = NULL ) {}
	public function get_inner_border() {}
	public function get_invisible_char() {}
	public function get_layout() {}
	public function get_layout_offsets() {}
	public function get_max_length() {}
	public function get_overwrite_mode() {}
	public function get_progress_fraction() {}
	public function get_progress_pulse_step() {}
	public function get_text() {}
	public function get_text_length() {}
	public function get_text_window() {}
	public function get_visibility() {}
	public function get_width_chars() {}
	public function prepend_text($text) {}
	public function progress_pulse() {}
	public function select_region($start, $end) {}
	public function set_activates_default($setting) {}
	public function set_alignment($xalign) {}
	public function set_buffer(GtkEntryBuffer $buffer ) {}
	public function set_completion(GtkEntryCompletion $completion ) {}
	public function set_cursor_hadjustment(GtkAdjustment $adjustment ) {}
	public function set_editable($editable) {}
	public function set_has_frame($setting) {}
	public function set_icon_activatable($icon_pos = NULL, $activatable) {}
	public function set_icon_drag_source($icon_pos = NULL , GtkTargetList $target_list, $actions) {}
	public function set_icon_from_icon_name($icon_pos = NULL, $icon_name) {}
	public function set_icon_from_pixbuf($icon_pos = NULL , GdkPixbuf $pixbuf ) {}
	public function set_icon_from_stock($icon_pos = NULL, $stock_id) {}
	public function set_icon_sensitive($icon_pos = NULL, $sensitive) {}
	public function set_icon_tooltip_markup($icon_pos = NULL, $tooltip) {}
	public function set_icon_tooltip_text($icon_pos = NULL, $tooltip) {}
	public function set_inner_border(GtkBorder $border ) {}
	public function set_invisible_char($char) {}
	public function set_max_length($max) {}
	public function set_overwrite_mode($overwrite) {}
	public function set_position($position) {}
	public function set_progress_fraction($fraction) {}
	public function set_progress_pulse_step($fraction) {}
	public function set_text($text) {}
	public function set_visibility($visible) {}
	public function set_width_chars($n_chars) {}
	public function unset_invisible_char() {}
	public function copy_clipboard() {}
	public function cut_clipboard() {}
	public function delete_selection() {}
	public function delete_text($start_pos, $end_pos) {}
	public function get_chars($start_pos, $end_pos) {}
	public function get_editable() {}
	public function get_position() {}
	public function get_selection_bounds() {}
	public function insert_text($text, $position) {}
	public function paste_clipboard() {}
	public function editing_done() {}
	public function remove_widget() {}
	public function start_editing(GdkEvent $event ) {}
}

/**
 * @package Gtk
 */
class GtkTipsQuery extends GtkLabel {
	const gtype = 160635480;

	public function __construct() {}
	public function set_caller(GtkWidget $caller ) {}
	public function set_labels($label_inactive, $label_no_tip) {}
	public function start_query() {}
	public function stop_query() {}
}

/**
 * @package Gtk
 */
class GtkAccelLabel extends GtkLabel {
	const gtype = 160702064;

	public function __construct($string) {}
	public function accelerator_width() {}
	public function get_accel_widget() {}
	public function get_accel_width() {}
	public function refetch() {}
	public function set_accel_widget(GtkWidget $accel_widget ) {}
}

/**
 * @package Gtk
 */
class GtkSpinButton extends GtkEntry implements GtkCellEditable, GtkEditable {
	const gtype = 160768816;

	public function __construct(GtkAdjustment $adjustment ) {}
	static public function new_with_range($min, $max, $step) {}
	public function configure(GtkAdjustment $adjustment, $climb_rate, $digits) {}
	public function get_adjustment() {}
	public function get_digits() {}
	public function get_increments() {}
	public function get_numeric() {}
	public function get_range() {}
	public function get_snap_to_ticks() {}
	public function get_update_policy() {}
	public function get_value() {}
	public function get_value_as_int() {}
	public function get_wrap() {}
	public function set_adjustment(GtkAdjustment $adjustment ) {}
	public function set_digits($digits) {}
	public function set_increments($step, $page) {}
	public function set_numeric($numeric) {}
	public function set_range($min, $max) {}
	public function set_snap_to_ticks($snap_to_ticks) {}
	public function set_update_policy($policy) {}
	public function set_value($value) {}
	public function set_wrap($wrap) {}
	public function spin($direction, $increment) {}
	public function update() {}
}

/**
 * @package Gtk
 */
class GtkDrawingArea extends GtkWidget {
	const gtype = 160844688;

	public function __construct() {}
	public function size($width, $height) {}
}

/**
 * @package Gtk
 */
class GtkContainer extends GtkWidget {
	const gtype = 158174312;

	public function add(GtkWidget $widget ) {}
	public function check_resize() {}
	public function child_type() {}
	public function children() {}
	public function get_border_width() {}
	public function get_children() {}
	public function get_focus_chain() {}
	public function get_focus_child() {}
	public function get_focus_hadjustment() {}
	public function get_focus_vadjustment() {}
	public function get_resize_mode() {}
	public function propagate_expose(GtkWidget $child, $event) {}
	public function remove(GtkWidget $widget ) {}
	public function resize_children() {}
	public function set_border_width($border_width) {}
	public function set_focus_chain($widgets) {}
	public function set_focus_child(GtkWidget $child ) {}
	public function set_focus_hadjustment(GtkAdjustment $adjustment ) {}
	public function set_focus_vadjustment(GtkAdjustment $adjustment ) {}
	public function set_reallocate_redraws($needs_redraws) {}
	public function set_resize_mode($resize_mode) {}
	public function unset_focus_chain() {}
}

/**
 * @package Gtk
 */
class GtkCurve extends GtkDrawingArea {
	const gtype = 160959696;

	public function __construct() {}
	public function get_vector() {}
	public function reset() {}
	public function set_curve_type($type) {}
	public function set_gamma($gamma) {}
	public function set_range($min_x, $max_x, $min_y, $max_y) {}
	public function set_vector() {}
}

/**
 * @package Gtk
 */
class GtkTreeView extends GtkContainer {
	const gtype = 158305136;

	public function __construct() {}
	public function append_column(GtkTreeViewColumn $column ) {}
	public function collapse_all() {}
	public function collapse_row($path) {}
	public function columns_autosize() {}
	public function convert_bin_window_to_tree_coords($x, $y) {}
	public function convert_bin_window_to_widget_coords($x, $y) {}
	public function convert_tree_to_bin_window_coords($x, $y) {}
	public function convert_tree_to_widget_coords($x, $y) {}
	public function convert_widget_to_bin_window_coords($x, $y) {}
	public function convert_widget_to_tree_coords($x, $y) {}
	public function create_row_drag_icon($path) {}
	public function enable_model_drag_dest($targets, $actions) {}
	public function enable_model_drag_source($sbmask, $targets, $actions) {}
	public function expand_all() {}
	public function expand_row($path, $open_all) {}
	public function expand_to_path($path) {}
	public function get_background_area($path, GtkTreeViewColumn $column ) {}
	public function get_bin_window() {}
	public function get_cell_area($path, GtkTreeViewColumn $column ) {}
	public function get_column($n) {}
	public function get_columns() {}
	public function get_cursor() {}
	public function get_dest_row_at_pos($x, $y) {}
	public function get_drag_dest_row() {}
	public function get_enable_search() {}
	public function get_enable_tree_lines() {}
	public function get_expander_column() {}
	public function get_fixed_height_mode() {}
	public function get_grid_lines() {}
	public function get_hadjustment() {}
	public function get_headers_clickable() {}
	public function get_headers_visible() {}
	public function get_hover_expand() {}
	public function get_hover_selection() {}
	public function get_level_indentation() {}
	public function get_model() {}
	public function get_path_at_pos($x, $y) {}
	public function get_reorderable() {}
	public function get_rubber_banding() {}
	public function get_rules_hint() {}
	public function get_search_column() {}
	public function get_search_entry() {}
	public function get_selection() {}
	public function get_show_expanders() {}
	public function get_tooltip_column() {}
	public function get_tooltip_context($x, $y, $keyboard_mode) {}
	public function get_vadjustment() {}
	public function get_visible_range() {}
	public function get_visible_rect() {}
	public function insert_column(GtkTreeViewColumn $column, $position) {}
	public function insert_column_with_data_func($position, $title, GtkCellRenderer $cellrenderer, $callback) {}
	public function is_rubber_banding_active() {}
	public function move_column_after(GtkTreeViewColumn $column , GtkTreeViewColumn $base_column ) {}
	public function remove_column(GtkTreeViewColumn $column ) {}
	public function row_activated($path, GtkTreeViewColumn $column ) {}
	public function row_expanded($path) {}
	public function scroll_to_cell($path, GtkTreeViewColumn $column = NULL) {}
	public function scroll_to_point($tree_x, $tree_y) {}
	public function set_column_drag_function($callback) {}
	public function set_cursor($path, GtkTreeViewColumn $focus_column = NULL) {}
	public function set_cursor_on_cell($path, GtkTreeViewColumn $focus_column = NULL, GtkCellRenderer $focus_cell = NULL) {}
	public function set_drag_dest_row($path, $pos) {}
	public function set_enable_search($enable_search) {}
	public function set_enable_tree_lines($enabled) {}
	public function set_expander_column(GtkTreeViewColumn $column ) {}
	public function set_fixed_height_mode($enable) {}
	public function set_grid_lines($grid_lines) {}
	public function set_hadjustment(GtkAdjustment $adjustment ) {}
	public function set_headers_clickable($active) {}
	public function set_headers_visible($headers_visible) {}
	public function set_hover_expand($expand) {}
	public function set_hover_selection($hover) {}
	public function set_level_indentation($indentation) {}
	public function set_model() {}
	public function set_reorderable($reorderable) {}
	public function set_row_separator_func($callback) {}
	public function set_rubber_banding($enable) {}
	public function set_rules_hint($setting) {}
	public function set_search_column($column) {}
	public function set_search_entry(GtkEntry $entry = NULL) {}
	public function set_search_equal_func($callback) {}
	public function set_show_expanders($enabled) {}
	public function set_tooltip_cell(GtkTooltip $tooltip, $path, GtkTreeViewColumn $column , GtkCellRenderer $cell ) {}
	public function set_tooltip_column($column) {}
	public function set_tooltip_row(GtkTooltip $tooltip, $path) {}
	public function set_vadjustment(GtkAdjustment $adjustment ) {}
	public function tree_to_widget_coords($tx, $ty) {}
	public function unset_rows_drag_dest() {}
	public function unset_rows_drag_source() {}
	public function widget_to_tree_coords($wx, $wy) {}
}

/**
 * @package Gtk
 */
class GtkToolbar extends GtkContainer {
	const gtype = 161094928;

	public function __construct() {}
	public function append_item($text, $tooltip_text, $tooltip_private_text, GtkWidget $icon, $callback) {}
	public function append_space() {}
	public function append_widget(GtkWidget $widget, $tooltip_text, $tooltip_private_text) {}
	public function get_drop_index($x, $y) {}
	public function get_icon_size() {}
	public function get_item_index(GtkToolItem $item ) {}
	public function get_n_items() {}
	public function get_nth_item($n) {}
	public function get_relief_style() {}
	public function get_show_arrow() {}
	public function get_toolbar_style() {}
	public function get_tooltips() {}
	public function insert(GtkToolItem $item, $pos) {}
	public function insert_space($position) {}
	public function insert_widget(GtkWidget $widget, $tooltip_text, $tooltip_private_text, $position) {}
	public function prepend_item($text, $tooltip_text, $tooltip_private_text, GtkWidget $icon, $callback) {}
	public function prepend_space() {}
	public function prepend_widget(GtkWidget $widget, $tooltip_text, $tooltip_private_text) {}
	public function remove_space($position) {}
	public function set_drop_highlight_item(GtkToolItem $tool_item, $index) {}
	public function set_icon_size($icon_size) {}
	public function set_show_arrow($show_arrow) {}
	public function set_toolbar_style($style) {}
	public function set_tooltips($enable) {}
	public function unset_icon_size() {}
	public function unset_style() {}
}

/**
 * @package Gtk
 */
class GtkTextView extends GtkContainer {
	const gtype = 161160912;

	public function __construct(GtkTextBuffer $buffer = NULL) {}
	public function add_child_at_anchor(GtkWidget $child , GtkTextChildAnchor $anchor ) {}
	public function add_child_in_window(GtkWidget $child, $which_window, $xpos, $ypos) {}
	public function backward_display_line(GtkTextIter $iter ) {}
	public function backward_display_line_start(GtkTextIter $iter ) {}
	public function buffer_to_window_coords($window_type, $buffer_x, $buffer_y) {}
	public function forward_display_line(GtkTextIter $iter ) {}
	public function forward_display_line_end(GtkTextIter $iter ) {}
	public function get_accepts_tab() {}
	public function get_border_window_size($type) {}
	public function get_buffer() {}
	public function get_cursor_visible() {}
	public function get_default_attributes() {}
	public function get_editable() {}
	public function get_indent() {}
	public function get_iter_at_location($x, $y) {}
	public function get_iter_at_position($x, $y) {}
	public function get_iter_location(GtkTextIter $iter) {}
	public function get_justification() {}
	public function get_left_margin() {}
	public function get_line_at_y($y) {}
	public function get_line_yrange(GtkTextIter $iter) {}
	public function get_overwrite() {}
	public function get_pixels_above_lines() {}
	public function get_pixels_below_lines() {}
	public function get_pixels_inside_wrap() {}
	public function get_right_margin() {}
	public function get_tabs() {}
	public function get_visible_rect() {}
	public function get_window($win) {}
	public function get_window_type(GdkWindow $window ) {}
	public function get_wrap_mode() {}
	public function move_child(GtkWidget $child, $xpos, $ypos) {}
	public function move_mark_onscreen(GtkTextMark $mark ) {}
	public function move_visually(GtkTextIter $iter, $count) {}
	public function place_cursor_onscreen() {}
	public function scroll_mark_onscreen(GtkTextMark $mark ) {}
	public function scroll_to_iter(GtkTextIter $iter, $within_margin) {}
	public function scroll_to_mark(GtkTextMark $mark, $within_margin) {}
	public function set_accepts_tab($accepts_tab) {}
	public function set_border_window_size($type, $size) {}
	public function set_buffer(GtkTextBuffer $buffer ) {}
	public function set_cursor_visible($setting) {}
	public function set_editable($setting) {}
	public function set_indent($indent) {}
	public function set_justification($justification) {}
	public function set_left_margin($left_margin) {}
	public function set_overwrite($overwrite) {}
	public function set_pixels_above_lines($pixels_above_lines) {}
	public function set_pixels_below_lines($pixels_below_lines) {}
	public function set_pixels_inside_wrap($pixels_inside_wrap) {}
	public function set_right_margin($right_margin) {}
	public function set_tabs(PangoTabArray $tabs ) {}
	public function set_wrap_mode($wrap_mode) {}
	public function starts_display_line(GtkTextIter $iter ) {}
	public function window_to_buffer_coords($window_type, $window_x, $window_y) {}
}

/**
 * @package Gtk
 */
class GtkTable extends GtkContainer {
	const gtype = 161232816;

	public function __construct() {}
	public function attach(GtkWidget $child, $left_attach, $right_attach, $top_attach, $bottom_attach) {}
	public function attach_defaults(GtkWidget $widget, $left_attach, $right_attach, $top_attach, $bottom_attach) {}
	public function get_col_spacing($column) {}
	public function get_default_col_spacing() {}
	public function get_default_row_spacing() {}
	public function get_homogeneous() {}
	public function get_row_spacing($row) {}
	public function resize($rows, $columns) {}
	public function set_col_spacing($column, $spacing) {}
	public function set_col_spacings($spacing) {}
	public function set_homogeneous($homogeneous) {}
	public function set_row_spacing($row, $spacing) {}
	public function set_row_spacings($spacing) {}
}

/**
 * @package Gtk
 */
class GtkSocket extends GtkContainer {
	const gtype = 161295984;

	public function __construct() {}
	public function add_id($window_id) {}
	public function get_id() {}
	public function get_plug_window() {}
	public function steal($wid) {}
}

/**
 * @package Gtk
 */
class GtkPaned extends GtkContainer {
	const gtype = 161357280;

	public function add1(GtkWidget $child ) {}
	public function add2(GtkWidget $child ) {}
	public function compute_position($allocation, $child1_req, $child2_req) {}
	public function get_child1() {}
	public function get_child2() {}
	public function get_handle_window() {}
	public function get_position() {}
	public function pack1(GtkWidget $child ) {}
	public function pack2(GtkWidget $child ) {}
	public function set_position($position) {}
}

/**
 * @package Gtk
 */
class GtkNotebook extends GtkContainer {
	const gtype = 158290560;

	public function __construct() {}
	public function append_page(GtkWidget $child , GtkWidget $tab_label = NULL) {}
	public function append_page_menu(GtkWidget $child , GtkWidget $tab_label = NULL, GtkWidget $menu_label = NULL) {}
	public function current_page() {}
	public function get_action_widget($pack_type) {}
	public function get_current_page() {}
	public function get_group() {}
	public function get_group_id() {}
	public function get_menu_label(GtkWidget $child ) {}
	public function get_menu_label_text(GtkWidget $child ) {}
	public function get_n_pages() {}
	public function get_nth_page($page_num) {}
	public function get_scrollable() {}
	public function get_show_border() {}
	public function get_show_tabs() {}
	public function get_tab_detachable(GtkWidget $child ) {}
	public function get_tab_label(GtkWidget $child ) {}
	public function get_tab_label_text(GtkWidget $child ) {}
	public function get_tab_pos() {}
	public function get_tab_reorderable(GtkWidget $child ) {}
	public function insert_page(GtkWidget $child , GtkWidget $tab_label = NULL) {}
	public function insert_page_menu(GtkWidget $child , GtkWidget $tab_label = NULL, GtkWidget $menu_label = NULL) {}
	public function next_page() {}
	public function page_num(GtkWidget $child ) {}
	public function popup_disable() {}
	public function popup_enable() {}
	public function prepend_page(GtkWidget $child , GtkWidget $tab_label = NULL) {}
	public function prepend_page_menu(GtkWidget $child , GtkWidget $tab_label = NULL, GtkWidget $menu_label = NULL) {}
	public function prev_page() {}
	public function query_tab_label_packing(GtkWidget $child ) {}
	public function remove_page($page_num) {}
	public function reorder_child(GtkWidget $child, $position) {}
	public function set_action_widget(GtkWidget $widget, $pack_type) {}
	public function set_current_page($page_num) {}
	public function set_group() {}
	public function set_group_id($group_id) {}
	public function set_homogeneous_tabs($homogeneous) {}
	public function set_menu_label(GtkWidget $child , GtkWidget $menu_label = NULL) {}
	public function set_menu_label_text(GtkWidget $child, $menu_text) {}
	public function set_page($page_num) {}
	public function set_scrollable($scrollable) {}
	public function set_show_border($show_border) {}
	public function set_show_tabs($show_tabs) {}
	public function set_tab_border($border_width) {}
	public function set_tab_detachable(GtkWidget $child, $detachable) {}
	public function set_tab_hborder($tab_hborder) {}
	public function set_tab_label(GtkWidget $child , GtkWidget $tab_label = NULL) {}
	public function set_tab_label_packing(GtkWidget $child, $expand, $fill, $pack_type) {}
	public function set_tab_label_text(GtkWidget $child, $tab_text) {}
	public function set_tab_pos($pos) {}
	public function set_tab_reorderable(GtkWidget $child, $reorderable) {}
	public function set_tab_vborder($tab_vborder) {}
}

/**
 * @package Gtk
 */
class GtkVPaned extends GtkPaned {
	const gtype = 161490904;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkHPaned extends GtkPaned {
	const gtype = 161553432;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkMenuShell extends GtkContainer {
	const gtype = 158235472;

	public function activate_item(GtkWidget $menu_item, $force_deactivate) {}
	public function append(GtkWidget $child ) {}
	public function cancel() {}
	public function deactivate() {}
	public function deselect() {}
	public function get_take_focus() {}
	public function insert(GtkWidget $child, $position) {}
	public function prepend(GtkWidget $child ) {}
	public function select_first($search_sensitive) {}
	public function select_item(GtkWidget $menu_item ) {}
	public function set_take_focus($take_focus) {}
}

/**
 * @package Gtk
 */
class GtkList extends GtkContainer {
	const gtype = 161678512;

	public function __construct() {}
	public function child_position(GtkWidget $child ) {}
	public function clear_items($start, $end) {}
	public function end_drag_selection() {}
	public function end_selection() {}
	public function extend_selection($scroll_type, $position, $auto_start_selection) {}
	public function scroll_horizontal($scroll_type, $position) {}
	public function scroll_vertical($scroll_type, $position) {}
	public function select_all() {}
	public function select_child(GtkWidget $child ) {}
	public function select_item($item) {}
	public function set_selection_mode($mode) {}
	public function start_selection() {}
	public function toggle_add_mode() {}
	public function toggle_focus_row() {}
	public function toggle_row(GtkWidget $item ) {}
	public function undo_selection() {}
	public function unselect_all() {}
	public function unselect_child(GtkWidget $child ) {}
	public function unselect_item($item) {}
}

/**
 * @package Gtk
 */
class GtkMenu extends GtkMenuShell {
	const gtype = 158280536;

	public function __construct() {}
	public function attach(GtkWidget $child, $left_attach, $right_attach, $top_attach, $bottom_attach) {}
	public function detach() {}
	public function get_accel_group() {}
	public function get_accel_path() {}
	public function get_active() {}
	public function get_attach_widget() {}
	public function get_monitor() {}
	public function get_reserve_toggle_size() {}
	public function get_tearoff_state() {}
	public function get_title() {}
	public function popdown() {}
	public function popup(GtkWidget $parent_menu_shell = NULL, GtkWidget $parent_menu_item = NULL) {}
	public function reorder_child(GtkWidget $child, $position) {}
	public function reposition() {}
	public function set_accel_group(GtkAccelGroup $accel_group ) {}
	public function set_active($index) {}
	public function set_menu_accel_path($accel_path) {}
	public function set_monitor($monitor_num) {}
	public function set_reserve_toggle_size($reserve_toggle_size) {}
	public function set_screen(GdkScreen $screen ) {}
	public function set_tearoff_state($torn_off) {}
	public function set_title($title) {}
}

/**
 * @package Gtk
 */
class GtkMenuBar extends GtkMenuShell {
	const gtype = 161810072;

	public function __construct() {}
	public function get_child_pack_direction() {}
	public function get_pack_direction() {}
	public function set_child_pack_direction($child_pack_dir) {}
	public function set_pack_direction($pack_dir) {}
}

/**
 * @package Gtk
 */
class GtkRecentChooserMenu extends GtkMenu implements GtkRecentChooser {
	const gtype = 161873664;

	public function __construct() {}
	public function get_show_numbers() {}
	public function set_show_numbers($show_numbers) {}
	public function set_show_private($show_private) {}
	public function get_show_private() {}
	public function set_show_not_found($show_not_found) {}
	public function get_show_not_found() {}
	public function set_select_multiple($select_multiple) {}
	public function get_select_multiple() {}
	public function set_limit($limit) {}
	public function get_limit() {}
	public function set_local_only($local_only) {}
	public function get_local_only() {}
	public function set_show_tips($show_tips) {}
	public function get_show_tips() {}
	public function set_show_icons($show_icons) {}
	public function get_show_icons() {}
	public function set_sort_type($sort_type) {}
	public function get_sort_type() {}
	public function set_sort_func($callback) {}
	public function set_current_uri($uri, $error) {}
	public function get_current_uri() {}
	public function get_current_item() {}
	public function select_uri($uri, $error) {}
	public function unselect_uri($uri) {}
	public function select_all() {}
	public function unselect_all() {}
	public function get_items() {}
	public function get_uris() {}
	public function add_filter(GtkRecentFilter $filter ) {}
	public function remove_filter(GtkRecentFilter $filter ) {}
	public function list_filters() {}
	public function set_filter(GtkRecentFilter $filter ) {}
	public function get_filter() {}
}

/**
 * @package Gtk
 */
class GtkLayout extends GtkContainer {
	const gtype = 161947992;

	public function __construct(GtkAdjustment $hadjustment = NULL, GtkAdjustment $vadjustment = NULL) {}
	public function freeze() {}
	public function get_bin_window() {}
	public function get_hadjustment() {}
	public function get_size() {}
	public function get_vadjustment() {}
	public function move(GtkWidget $child_widget, $x, $y) {}
	public function put(GtkWidget $child_widget, $x, $y) {}
	public function set_hadjustment(GtkAdjustment $adjustment ) {}
	public function set_size($width, $height) {}
	public function set_vadjustment(GtkAdjustment $adjustment ) {}
	public function thaw() {}
}

/**
 * @package Gtk
 */
class GtkIconView extends GtkContainer {
	const gtype = 158329248;

	public function __construct(GtkTreeModel $model = NULL) {}
	public function create_drag_icon($path) {}
	public function enable_model_drag_dest($targets, $actions) {}
	public function enable_model_drag_source($sbmask, $targets, $actions) {}
	public function get_column_spacing() {}
	public function get_columns() {}
	public function get_cursor() {}
	public function get_dest_item_at_pos($x, $y) {}
	public function get_drag_dest_item() {}
	public function get_item_at_pos($x, $y) {}
	public function get_item_padding() {}
	public function get_item_width() {}
	public function get_margin() {}
	public function get_markup_column() {}
	public function get_model() {}
	public function get_orientation() {}
	public function get_path_at_pos($x, $y) {}
	public function get_pixbuf_column() {}
	public function get_reorderable() {}
	public function get_row_spacing() {}
	public function get_selected_items() {}
	public function get_selection_mode() {}
	public function get_spacing() {}
	public function get_text_column() {}
	public function get_tooltip_column() {}
	public function get_tooltip_context($x, $y, $keyboard_mode) {}
	public function get_visible_range() {}
	public function item_activated($path) {}
	public function path_is_selected($path) {}
	public function scroll_to_path($path, $use_align, $row_align, $col_align) {}
	public function select_all() {}
	public function select_path($path) {}
	public function selected_foreach($callback) {}
	public function set_column_spacing($column_spacing) {}
	public function set_columns($columns) {}
	public function set_cursor($path, GtkCellRenderer $cell = NULL) {}
	public function set_drag_dest_item($path, $pos = NULL ) {}
	public function set_item_padding($item_padding) {}
	public function set_item_width($item_width) {}
	public function set_margin($margin) {}
	public function set_markup_column($column) {}
	public function set_model() {}
	public function set_orientation($orientation) {}
	public function set_pixbuf_column($column) {}
	public function set_reorderable($reorderable) {}
	public function set_row_spacing($row_spacing) {}
	public function set_selection_mode($mode) {}
	public function set_spacing($spacing) {}
	public function set_text_column($column) {}
	public function set_tooltip_cell(GtkTooltip $tooltip, $path, GtkCellRenderer $cell ) {}
	public function set_tooltip_column($column) {}
	public function set_tooltip_item(GtkTooltip $tooltip, $path) {}
	public function unselect_all() {}
	public function unselect_path($path) {}
	public function unset_model_drag_dest() {}
	public function unset_model_drag_source() {}
}

/**
 * @package Gtk
 */
class GtkFixed extends GtkContainer {
	const gtype = 162082672;

	public function __construct() {}
	public function get_has_window() {}
	public function move(GtkWidget $widget, $x, $y) {}
	public function put(GtkWidget $widget, $x, $y) {}
	public function set_has_window($has_window) {}
}

/**
 * @package Gtk
 */
class GtkCellView extends GtkWidget implements GtkCellLayout {
	const gtype = 162143552;

	public function __construct() {}
	static public function new_with_markup($markup) {}
	static public function new_with_pixbuf(GdkPixbuf $pixbuf ) {}
	static public function new_with_text($text) {}
	public function get_cell_renderers() {}
	public function get_displayed_row() {}
	public function get_model() {}
	public function get_size_of_row($path) {}
	public function set_background_color(GdkColor $color ) {}
	public function set_displayed_row($path) {}
	public function set_model($model) {}
	public function add_attribute(GtkCellRenderer $cell, $attribute, $column) {}
	public function clear() {}
	public function clear_attributes(GtkCellRenderer $cell ) {}
	public function pack_end(GtkCellRenderer $cell ) {}
	public function pack_start(GtkCellRenderer $cell ) {}
	public function reorder(GtkCellRenderer $cell, $position) {}
	public function set_attributes($cell) {}
	public function set_cell_data_func(GtkCellRenderer $cellrenderer, $callback) {}
}

/**
 * @package Gtk
 */
class GtkBin extends GtkContainer {
	const gtype = 158197392;

	public function get_child() {}
}

/**
 * @package Gtk
 */
class GtkBox extends GtkContainer {
	const gtype = 162262344;

	public function get_homogeneous() {}
	public function get_spacing() {}
	public function pack_end(GtkWidget $child ) {}
	public function pack_end_defaults(GtkWidget $widget ) {}
	public function pack_start(GtkWidget $child ) {}
	public function pack_start_defaults(GtkWidget $widget ) {}
	public function query_child_packing(GtkWidget $child ) {}
	public function reorder_child(GtkWidget $child, $position) {}
	public function set_child_packing(GtkWidget $child, $expand, $fill, $padding, $pack_type) {}
	public function set_homogeneous($homogeneous) {}
	public function set_spacing($spacing) {}
}

/**
 * @package Gtk
 */
class GtkWindow extends GtkBin {
	const gtype = 158184600;

	public function __construct() {}
	public function activate_default() {}
	public function activate_focus() {}
	public function activate_key($event) {}
	public function add_accel_group(GtkAccelGroup $accel_group ) {}
	public function add_mnemonic($keyval, GtkWidget $target ) {}
	public function begin_move_drag($button, $root_x, $root_y, $timestamp) {}
	public function begin_resize_drag($edge, $button, $root_x, $root_y, $timestamp) {}
	public function deiconify() {}
	public function fullscreen() {}
	public function get_accept_focus() {}
	public function get_decorated() {}
	static public function get_default_icon_list() {}
	public function get_default_size() {}
	public function get_default_widget() {}
	public function get_deletable() {}
	public function get_destroy_with_parent() {}
	public function get_focus() {}
	public function get_focus_on_map() {}
	public function get_frame_dimensions() {}
	public function get_gravity() {}
	public function get_group() {}
	public function get_has_frame() {}
	public function get_icon() {}
	public function get_icon_list() {}
	public function get_icon_name() {}
	public function get_mnemonic_modifier() {}
	public function get_mnemonics_visible() {}
	public function get_modal() {}
	public function get_opacity() {}
	public function get_position() {}
	public function get_resizable() {}
	public function get_role() {}
	public function get_screen() {}
	public function get_size() {}
	public function get_skip_pager_hint() {}
	public function get_skip_taskbar_hint() {}
	public function get_title() {}
	public function get_transient_for() {}
	public function get_type_hint() {}
	public function get_urgency_hint() {}
	public function get_window_type() {}
	public function has_toplevel_focus() {}
	public function iconify() {}
	public function is_active() {}
	static public function list_toplevels() {}
	public function maximize() {}
	public function move($x, $y) {}
	public function parse_geometry($geometry) {}
	public function present() {}
	public function present_with_time($timestamp) {}
	public function propagate_key_event($event) {}
	public function remove_accel_group(GtkAccelGroup $accel_group ) {}
	public function remove_mnemonic($keyval, GtkWidget $target ) {}
	public function reshow_with_initial_size() {}
	public function resize($width, $height) {}
	public function set_accept_focus($setting) {}
	static public function set_auto_startup_notification($setting) {}
	public function set_decorated($setting) {}
	public function set_default(GtkWidget $default_widget ) {}
	static public function set_default_icon(GdkPixbuf $icon ) {}
	static public function set_default_icon_from_file($filename, $error) {}
	static public function set_default_icon_list($pixbufs) {}
	static public function set_default_icon_name($name) {}
	public function set_default_size($width, $height) {}
	public function set_deletable($setting) {}
	public function set_destroy_with_parent($setting) {}
	public function set_focus(GtkWidget $focus ) {}
	public function set_focus_on_map($setting) {}
	public function set_frame_dimensions($left, $top, $right, $bottom) {}
	public function set_geometry_hints(GtkWidget $widget, $min_width, $min_height, $max_width, $max_height, $base_width, $base_height, $width_inc, $height_inc, $min_aspect, $max_aspect, $win_gravity) {}
	public function set_gravity($gravity) {}
	public function set_has_frame($setting) {}
	public function set_icon(GdkPixbuf $icon ) {}
	public function set_icon_from_file($filename, $error) {}
	public function set_icon_list($pixbufs) {}
	public function set_icon_name($name) {}
	public function set_keep_above($setting) {}
	public function set_keep_below($setting) {}
	public function set_mnemonic_modifier($modifier) {}
	public function set_mnemonics_visible($setting) {}
	public function set_modal($modal) {}
	public function set_opacity($opacity) {}
	public function set_policy($allow_shrink, $allow_grow, $auto_shrink) {}
	public function set_position($position) {}
	public function set_resizable($resizable) {}
	public function set_role($role) {}
	public function set_screen(GdkScreen $screen ) {}
	public function set_skip_pager_hint($setting) {}
	public function set_skip_taskbar_hint($setting) {}
	public function set_startup_id($startup_id) {}
	public function set_title($title) {}
	public function set_transient_for(GtkWindow $parent ) {}
	public function set_type_hint($hint) {}
	public function set_urgency_hint($setting) {}
	public function set_wmclass($wmclass_name, $wmclass_class) {}
	public function stick() {}
	public function unfullscreen() {}
	public function unmaximize() {}
	public function unstick() {}
	public function window_mnemonic_activate($keyval, $modifier) {}
}

/**
 * @package Gtk
 */
class GtkViewport extends GtkBin {
	const gtype = 162409144;

	public function __construct(GtkAdjustment $hadjustment = NULL, GtkAdjustment $vadjustment = NULL) {}
	public function get_bin_window() {}
	public function get_hadjustment() {}
	public function get_shadow_type() {}
	public function get_vadjustment() {}
	public function set_hadjustment(GtkAdjustment $adjustment ) {}
	public function set_shadow_type($type) {}
	public function set_vadjustment(GtkAdjustment $adjustment ) {}
}

/**
 * @package Gtk
 */
class GtkDialog extends GtkWindow {
	const gtype = 158221504;

	public function __construct(GtkWindow $parent = NULL) {}
	public function add_action_widget(GtkWidget $child, $response_id) {}
	public function add_button($button_text, $response_id) {}
	public function add_buttons($buttons) {}
	public function get_action_area() {}
	public function get_content_area() {}
	public function get_has_separator() {}
	public function get_response_for_widget(GtkWidget $widget ) {}
	public function get_widget_for_response($response_id) {}
	public function response($response_id) {}
	public function run() {}
	public function set_default_response($response_id) {}
	public function set_has_separator($setting) {}
	public function set_response_sensitive($response_id, $setting) {}
}

/**
 * @package Gtk
 */
class GtkPlug extends GtkWindow {
	const gtype = 162558224;

	public function __construct($socket_id, GdkDisplay $display = NULL) {}
	public function get_embedded() {}
	public function get_id() {}
	public function get_socket_window() {}
}

/**
 * @package Gtk
 */
class GtkColorSelectionDialog extends GtkDialog {
	const gtype = 162643008;

	public function __construct() {}
	public function get_color_selection() {}
}

/**
 * @package Gtk
 */
class GtkAboutDialog extends GtkDialog {
	const gtype = 162730616;

	public function __construct() {}
	public function get_artists() {}
	public function get_authors() {}
	public function get_comments() {}
	public function get_copyright() {}
	public function get_documenters() {}
	public function get_license() {}
	public function get_logo() {}
	public function get_logo_icon_name() {}
	public function get_name() {}
	public function get_program_name() {}
	public function get_translator_credits() {}
	public function get_version() {}
	public function get_website() {}
	public function get_website_label() {}
	public function get_wrap_license() {}
	public function set_artists($artists) {}
	public function set_authors($authors) {}
	public function set_comments($comments) {}
	public function set_copyright($copyright) {}
	public function set_documenters($documenters) {}
	static public function set_email_hook($callback) {}
	public function set_license($license) {}
	public function set_logo(GdkPixbuf $logo ) {}
	public function set_logo_icon_name($icon_name) {}
	public function set_name($name) {}
	public function set_program_name($name) {}
	public function set_translator_credits($translator_credits) {}
	static public function set_url_hook($callback) {}
	public function set_version($version) {}
	public function set_website($website) {}
	public function set_website_label($website_label) {}
	public function set_wrap_license($wrap_license) {}
}

/**
 * @package Gtk
 */
class GtkRecentChooserDialog extends GtkDialog implements GtkRecentChooser {
	const gtype = 162823944;

	public function __construct(GtkWindow $parent = NULL) {}
	public function set_show_private($show_private) {}
	public function get_show_private() {}
	public function set_show_not_found($show_not_found) {}
	public function get_show_not_found() {}
	public function set_select_multiple($select_multiple) {}
	public function get_select_multiple() {}
	public function set_limit($limit) {}
	public function get_limit() {}
	public function set_local_only($local_only) {}
	public function get_local_only() {}
	public function set_show_tips($show_tips) {}
	public function get_show_tips() {}
	public function set_show_numbers($show_numbers) {}
	public function get_show_numbers() {}
	public function set_show_icons($show_icons) {}
	public function get_show_icons() {}
	public function set_sort_type($sort_type) {}
	public function get_sort_type() {}
	public function set_sort_func($callback) {}
	public function set_current_uri($uri, $error) {}
	public function get_current_uri() {}
	public function get_current_item() {}
	public function select_uri($uri, $error) {}
	public function unselect_uri($uri) {}
	public function select_all() {}
	public function unselect_all() {}
	public function get_items() {}
	public function get_uris() {}
	public function add_filter(GtkRecentFilter $filter ) {}
	public function remove_filter(GtkRecentFilter $filter ) {}
	public function list_filters() {}
	public function set_filter(GtkRecentFilter $filter ) {}
	public function get_filter() {}
}

/**
 * @package Gtk
 */
class GtkFileChooserDialog extends GtkDialog implements GtkFileChooser {
	const gtype = 162917936;

	public function __construct(GtkWindow $parent = NULL) {}
	public function add_filter(GtkFileFilter $filter ) {}
	public function add_shortcut_folder($folder, $error) {}
	public function add_shortcut_folder_uri($uri, $error) {}
	public function get_action() {}
	public function get_current_folder() {}
	public function get_current_folder_uri() {}
	public function get_extra_widget() {}
	public function get_filename() {}
	public function get_filenames() {}
	public function get_filter() {}
	public function get_local_only() {}
	public function get_preview_filename() {}
	public function get_preview_uri() {}
	public function get_preview_widget() {}
	public function get_preview_widget_active() {}
	public function get_select_multiple() {}
	public function get_show_hidden() {}
	public function get_uri() {}
	public function get_uris() {}
	public function get_use_preview_label() {}
	public function list_filters() {}
	public function list_shortcut_folder_uris() {}
	public function list_shortcut_folders() {}
	public function remove_filter(GtkFileFilter $filter ) {}
	public function remove_shortcut_folder($folder, $error) {}
	public function remove_shortcut_folder_uri($uri, $error) {}
	public function select_all() {}
	public function select_filename($filename) {}
	public function select_uri($uri) {}
	public function set_action($action) {}
	public function set_current_folder($filename) {}
	public function set_current_folder_uri($uri) {}
	public function set_current_name($name) {}
	public function set_extra_widget(GtkWidget $extra_widget ) {}
	public function set_filename($filename) {}
	public function set_filter(GtkFileFilter $filter ) {}
	public function set_local_only($local_only) {}
	public function set_preview_widget(GtkWidget $preview_widget ) {}
	public function set_preview_widget_active($active) {}
	public function set_select_multiple($select_multiple) {}
	public function set_show_hidden($show_hidden) {}
	public function set_uri($uri) {}
	public function set_use_preview_label($use_label) {}
	public function unselect_all() {}
	public function unselect_filename($filename) {}
	public function unselect_uri($uri) {}
	public function set_do_overwrite_confirmation($do_overwrite_confirmation) {}
	public function get_do_overwrite_confirmation() {}
	public function set_create_folders($create_folders) {}
	public function get_create_folders() {}
}

/**
 * @package Gtk
 */
class GtkFileSelection extends GtkDialog {
	const gtype = 163017056;

	public function __construct() {}
	public function complete($pattern) {}
	public function get_filename() {}
	public function get_select_multiple() {}
	public function get_selections() {}
	public function hide_fileop_buttons() {}
	public function set_filename($filename) {}
	public function set_select_multiple($select_multiple) {}
	public function show_fileop_buttons() {}
}

/**
 * @package Gtk
 */
class GtkFontSelectionDialog extends GtkDialog {
	const gtype = 163107304;

	public function __construct($title) {}
	public function get_apply_button() {}
	public function get_cancel_button() {}
	public function get_font() {}
	public function get_font_name() {}
	public function get_ok_button() {}
	public function get_preview_text() {}
	public function set_font_name($fontname) {}
	public function set_preview_text($text) {}
}

/**
 * @package Gtk
 */
class GtkInputDialog extends GtkDialog {
	const gtype = 163199536;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkMessageDialog extends GtkDialog {
	const gtype = 163286592;

	public function __construct(GtkWindow $parent = NULL) {}
	public function get_image() {}
	public function set_image(GtkWidget $image ) {}
	public function set_markup($str) {}
}

/**
 * @package Gtk
 */
class GtkToolItem extends GtkBin {
	const gtype = 163374464;

	public function __construct() {}
	public function get_ellipsize_mode() {}
	public function get_expand() {}
	public function get_homogeneous() {}
	public function get_icon_size() {}
	public function get_is_important() {}
	public function get_orientation() {}
	public function get_proxy_menu_item($menu_item_id) {}
	public function get_relief_style() {}
	public function get_text_alignment() {}
	public function get_text_orientation() {}
	public function get_text_size_group() {}
	public function get_toolbar_style() {}
	public function get_use_drag_window() {}
	public function get_visible_horizontal() {}
	public function get_visible_vertical() {}
	public function rebuild_menu() {}
	public function retrieve_proxy_menu_item() {}
	public function set_expand($expand) {}
	public function set_homogeneous($homogeneous) {}
	public function set_is_important($is_important) {}
	public function set_proxy_menu_item($menu_item_id, GtkWidget $menu_item ) {}
	public function set_tooltip(GtkTooltips $tooltips ) {}
	public function set_tooltip_markup($markup) {}
	public function set_tooltip_text($text) {}
	public function set_use_drag_window($use_drag_window) {}
	public function set_visible_horizontal($visible_horizontal) {}
	public function set_visible_vertical($visible_vertical) {}
	public function toolbar_reconfigured() {}
}

/**
 * @package Gtk
 */
class GtkVBox extends GtkBox {
	const gtype = 163440792;

	public function __construct($homogeneous) {}
}

/**
 * @package Gtk
 */
class GtkScrolledWindow extends GtkBin {
	const gtype = 163503584;

	public function __construct(GtkAdjustment $hadjustment = NULL, GtkAdjustment $vadjustment = NULL) {}
	public function add_with_viewport(GtkWidget $child ) {}
	public function get_hadjustment() {}
	public function get_hscrollbar() {}
	public function get_placement() {}
	public function get_policy() {}
	public function get_shadow_type() {}
	public function get_vadjustment() {}
	public function get_vscrollbar() {}
	public function set_hadjustment(GtkAdjustment $hadjustment ) {}
	public function set_placement($window_placement) {}
	public function set_policy($hscrollbar_policy, $vscrollbar_policy) {}
	public function set_shadow_type($type) {}
	public function set_vadjustment(GtkAdjustment $hadjustment ) {}
	public function unset_placement() {}
}

/**
 * @package Gtk
 */
class GtkRecentChooserWidget extends GtkVBox implements GtkRecentChooser {
	const gtype = 163567288;

	public function __construct() {}
	public function set_show_private($show_private) {}
	public function get_show_private() {}
	public function set_show_not_found($show_not_found) {}
	public function get_show_not_found() {}
	public function set_select_multiple($select_multiple) {}
	public function get_select_multiple() {}
	public function set_limit($limit) {}
	public function get_limit() {}
	public function set_local_only($local_only) {}
	public function get_local_only() {}
	public function set_show_tips($show_tips) {}
	public function get_show_tips() {}
	public function set_show_numbers($show_numbers) {}
	public function get_show_numbers() {}
	public function set_show_icons($show_icons) {}
	public function get_show_icons() {}
	public function set_sort_type($sort_type) {}
	public function get_sort_type() {}
	public function set_sort_func($callback) {}
	public function set_current_uri($uri, $error) {}
	public function get_current_uri() {}
	public function get_current_item() {}
	public function select_uri($uri, $error) {}
	public function unselect_uri($uri) {}
	public function select_all() {}
	public function unselect_all() {}
	public function get_items() {}
	public function get_uris() {}
	public function add_filter(GtkRecentFilter $filter ) {}
	public function remove_filter(GtkRecentFilter $filter ) {}
	public function list_filters() {}
	public function set_filter(GtkRecentFilter $filter ) {}
	public function get_filter() {}
}

/**
 * @package Gtk
 */
class GtkColorSelection extends GtkVBox {
	const gtype = 159323552;

	public function __construct() {}
	public function get_color() {}
	public function get_current_alpha() {}
	public function get_current_color() {}
	public function get_has_opacity_control() {}
	public function get_has_palette() {}
	public function get_previous_alpha() {}
	public function get_previous_color() {}
	public function is_adjusting() {}
	static public function palette_to_string(array $colors) {}
	static public function set_change_palette_with_screen_hook($callback) {}
	public function set_color($red, $green, $blue) {}
	public function set_current_alpha($alpha) {}
	public function set_current_color(GdkColor $color ) {}
	public function set_has_opacity_control($has_opacity) {}
	public function set_has_palette($has_palette) {}
	public function set_previous_alpha($alpha) {}
	public function set_previous_color(GdkColor $color ) {}
	public function set_update_policy($policy) {}
}

/**
 * @package Gtk
 */
class GtkFileChooserWidget extends GtkVBox implements GtkFileChooser {
	const gtype = 163704280;

	public function __construct($action) {}
	static public function new_with_backend($action, $backend) {}
	public function add_filter(GtkFileFilter $filter ) {}
	public function add_shortcut_folder($folder, $error) {}
	public function add_shortcut_folder_uri($uri, $error) {}
	public function get_action() {}
	public function get_current_folder() {}
	public function get_current_folder_uri() {}
	public function get_extra_widget() {}
	public function get_filename() {}
	public function get_filenames() {}
	public function get_filter() {}
	public function get_local_only() {}
	public function get_preview_filename() {}
	public function get_preview_uri() {}
	public function get_preview_widget() {}
	public function get_preview_widget_active() {}
	public function get_select_multiple() {}
	public function get_show_hidden() {}
	public function get_uri() {}
	public function get_uris() {}
	public function get_use_preview_label() {}
	public function list_filters() {}
	public function list_shortcut_folder_uris() {}
	public function list_shortcut_folders() {}
	public function remove_filter(GtkFileFilter $filter ) {}
	public function remove_shortcut_folder($folder, $error) {}
	public function remove_shortcut_folder_uri($uri, $error) {}
	public function select_all() {}
	public function select_filename($filename) {}
	public function select_uri($uri) {}
	public function set_action($action) {}
	public function set_current_folder($filename) {}
	public function set_current_folder_uri($uri) {}
	public function set_current_name($name) {}
	public function set_extra_widget(GtkWidget $extra_widget ) {}
	public function set_filename($filename) {}
	public function set_filter(GtkFileFilter $filter ) {}
	public function set_local_only($local_only) {}
	public function set_preview_widget(GtkWidget $preview_widget ) {}
	public function set_preview_widget_active($active) {}
	public function set_select_multiple($select_multiple) {}
	public function set_show_hidden($show_hidden) {}
	public function set_uri($uri) {}
	public function set_use_preview_label($use_label) {}
	public function unselect_all() {}
	public function unselect_filename($filename) {}
	public function unselect_uri($uri) {}
	public function set_do_overwrite_confirmation($do_overwrite_confirmation) {}
	public function get_do_overwrite_confirmation() {}
	public function set_create_folders($create_folders) {}
	public function get_create_folders() {}
}

/**
 * @package Gtk
 */
class GtkFontSelection extends GtkVBox {
	const gtype = 163777968;

	public function __construct() {}
	public function get_face() {}
	public function get_face_list() {}
	public function get_family() {}
	public function get_family_list() {}
	public function get_font() {}
	public function get_font_name() {}
	public function get_preview_entry() {}
	public function get_preview_text() {}
	public function get_size() {}
	public function get_size_entry() {}
	public function get_size_list() {}
	public function set_font_name($fontname) {}
	public function set_preview_text($text) {}
}

/**
 * @package Gtk
 */
class GtkGammaCurve extends GtkVBox {
	const gtype = 163843496;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkSeparatorToolItem extends GtkToolItem {
	const gtype = 163906712;

	public function __construct() {}
	public function get_draw() {}
	public function set_draw($draw) {}
}

/**
 * @package Gtk
 */
class GtkToolButton extends GtkToolItem {
	const gtype = 163973448;

	public function __construct(GtkWidget $icon_widget = NULL) {}
	static public function new_from_stock($stock_id) {}
	public function get_icon_name() {}
	public function get_icon_widget() {}
	public function get_label() {}
	public function get_label_widget() {}
	public function get_stock_id() {}
	public function get_use_underline() {}
	public function set_icon_name($icon_name) {}
	public function set_icon_widget(GtkWidget $icon_widget ) {}
	public function set_label($label) {}
	public function set_label_widget(GtkWidget $label_widget ) {}
	public function set_stock_id($stock_id) {}
	public function set_use_underline($use_underline) {}
}

/**
 * @package Gtk
 */
class GtkItem extends GtkBin {
	const gtype = 158225376;

	public function deselect() {}
	public function select() {}
	public function toggle() {}
}

/**
 * @package Gtk
 */
class GtkToggleToolButton extends GtkToolButton {
	const gtype = 164103664;

	public function __construct() {}
	static public function new_from_stock($stock_id) {}
	public function get_active() {}
	public function set_active($is_active) {}
}

/**
 * @package Gtk
 */
class GtkMenuToolButton extends GtkToolButton {
	const gtype = 164173168;

	public function __construct(GtkWidget $icon_widget, $label) {}
	static public function new_from_stock($stock_id) {}
	public function get_menu() {}
	public function set_arrow_tooltip(GtkTooltips $tooltips, $tip_text) {}
	public function set_arrow_tooltip_markup($markup) {}
	public function set_arrow_tooltip_text($text) {}
	public function set_menu(GtkWidget $menu ) {}
}

/**
 * @package Gtk
 */
class GtkRadioToolButton extends GtkToggleToolButton {
	const gtype = 164243232;

	public function __construct(GtkRadioToolButton $group = NULL) {}
	public function get_group() {}
	public function set_group(GtkRadioToolButton $group ) {}
}

/**
 * @package Gtk
 */
class GtkHandleBox extends GtkBin {
	const gtype = 164313112;

	public function __construct() {}
	public function get_child_detached() {}
	public function get_handle_position() {}
	public function get_shadow_type() {}
	public function get_snap_edge() {}
	public function set_handle_position($position) {}
	public function set_shadow_type($type) {}
	public function set_snap_edge($edge) {}
}

/**
 * @package Gtk
 */
class GtkMenuItem extends GtkItem {
	const gtype = 158270976;

	public function __construct() {}
	public function activate() {}
	public function deselect() {}
	public function get_accel_path() {}
	public function get_label() {}
	public function get_right_justified() {}
	public function get_submenu() {}
	public function get_use_underline() {}
	public function remove_submenu() {}
	public function right_justify() {}
	public function select() {}
	public function set_item_accel_path($accel_path) {}
	public function set_label($label) {}
	public function set_right_justified($right_justified) {}
	public function set_submenu(GtkWidget $submenu ) {}
	public function set_use_underline($setting) {}
	public function toggle_size_allocate($allocation) {}
	public function toggle_size_request() {}
}

/**
 * @package Gtk
 */
class GtkListItem extends GtkItem {
	const gtype = 164439520;

	public function __construct() {}
	public function deselect() {}
	public function select() {}
}

/**
 * @package Gtk
 */
class GtkTearoffMenuItem extends GtkMenuItem {
	const gtype = 164500896;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkSeparatorMenuItem extends GtkMenuItem {
	const gtype = 164565224;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkCheckMenuItem extends GtkMenuItem {
	const gtype = 158155504;

	public function __construct() {}
	public function get_active() {}
	public function get_draw_as_radio() {}
	public function get_inconsistent() {}
	public function set_active($is_active) {}
	public function set_draw_as_radio($draw_as_radio) {}
	public function set_inconsistent($setting) {}
	public function set_show_toggle($always) {}
	public function set_state($is_active) {}
	public function toggled() {}
}

/**
 * @package Gtk
 */
class GtkImageMenuItem extends GtkMenuItem {
	const gtype = 164695528;

	public function __construct(GtkAccelGroup $accel_group = NULL) {}
	public function get_always_show_image() {}
	public function get_image() {}
	public function get_use_stock() {}
	public function set_accel_group(GtkAccelGroup $accel_group ) {}
	public function set_always_show_image($always_show) {}
	public function set_image(GtkWidget $image ) {}
	public function set_use_stock($use_stock) {}
}

/**
 * @package Gtk
 */
class GtkRadioMenuItem extends GtkCheckMenuItem {
	const gtype = 164761392;

	public function __construct(GtkRadioMenuItem $group = NULL) {}
	public function get_group() {}
	public function new_from_widget() {}
	public function set_group(GtkRadioMenuItem $group ) {}
}

/**
 * @package Gtk
 */
class GtkHBox extends GtkBox {
	const gtype = 164828120;

	public function __construct($homogeneous) {}
}

/**
 * @package Gtk
 */
class GtkFrame extends GtkBin {
	const gtype = 164890896;

	public function __construct() {}
	public function get_label() {}
	public function get_label_align() {}
	public function get_label_widget() {}
	public function get_shadow_type() {}
	public function set_label($label) {}
	public function set_label_align($xalign, $yalign) {}
	public function set_label_widget(GtkWidget $label_widget ) {}
	public function set_shadow_type($type) {}
}

/**
 * @package Gtk
 */
class GtkStatusbar extends GtkHBox {
	const gtype = 164953328;

	public function __construct() {}
	public function get_context_id($context_description) {}
	public function get_has_resize_grip() {}
	public function get_message_area() {}
	public function pop($context_id) {}
	public function push($context_id, $text) {}
	public function remove_message($context_id, $message_id) {}
	public function set_has_resize_grip($setting) {}
}

/**
 * @package Gtk
 */
class GtkCombo extends GtkHBox {
	const gtype = 165017640;

	public function __construct() {}
	public function disable_activate() {}
	public function set_case_sensitive($val) {}
	public function set_item_string(GtkItem $item, $item_value) {}
	public function set_popdown_strings($strings) {}
	public function set_use_arrows($val) {}
	public function set_use_arrows_always($val) {}
	public function set_value_in_list($val, $ok_if_empty) {}
}

/**
 * @package Gtk
 */
class GtkFileChooserButton extends GtkHBox implements GtkFileChooser {
	const gtype = 165082024;

	public function __construct($title, $action) {}
	static public function new_with_backend($title, $action, $backend) {}
	static public function new_with_dialog(GtkWidget $dialog ) {}
	public function get_focus_on_click() {}
	public function get_title() {}
	public function get_width_chars() {}
	public function set_focus_on_click($focus_on_click) {}
	public function set_title($title) {}
	public function set_width_chars($n_chars) {}
	public function add_filter(GtkFileFilter $filter ) {}
	public function add_shortcut_folder($folder, $error) {}
	public function add_shortcut_folder_uri($uri, $error) {}
	public function get_action() {}
	public function get_current_folder() {}
	public function get_current_folder_uri() {}
	public function get_extra_widget() {}
	public function get_filename() {}
	public function get_filenames() {}
	public function get_filter() {}
	public function get_local_only() {}
	public function get_preview_filename() {}
	public function get_preview_uri() {}
	public function get_preview_widget() {}
	public function get_preview_widget_active() {}
	public function get_select_multiple() {}
	public function get_show_hidden() {}
	public function get_uri() {}
	public function get_uris() {}
	public function get_use_preview_label() {}
	public function list_filters() {}
	public function list_shortcut_folder_uris() {}
	public function list_shortcut_folders() {}
	public function remove_filter(GtkFileFilter $filter ) {}
	public function remove_shortcut_folder($folder, $error) {}
	public function remove_shortcut_folder_uri($uri, $error) {}
	public function select_all() {}
	public function select_filename($filename) {}
	public function select_uri($uri) {}
	public function set_action($action) {}
	public function set_current_folder($filename) {}
	public function set_current_folder_uri($uri) {}
	public function set_current_name($name) {}
	public function set_extra_widget(GtkWidget $extra_widget ) {}
	public function set_filename($filename) {}
	public function set_filter(GtkFileFilter $filter ) {}
	public function set_local_only($local_only) {}
	public function set_preview_widget(GtkWidget $preview_widget ) {}
	public function set_preview_widget_active($active) {}
	public function set_select_multiple($select_multiple) {}
	public function set_show_hidden($show_hidden) {}
	public function set_uri($uri) {}
	public function set_use_preview_label($use_label) {}
	public function unselect_all() {}
	public function unselect_filename($filename) {}
	public function unselect_uri($uri) {}
	public function set_do_overwrite_confirmation($do_overwrite_confirmation) {}
	public function get_do_overwrite_confirmation() {}
	public function set_create_folders($create_folders) {}
	public function get_create_folders() {}
}

/**
 * @package Gtk
 */
class GtkExpander extends GtkBin {
	const gtype = 158345184;

	public function __construct($label) {}
	static public function new_with_mnemonic($label) {}
	public function get_expanded() {}
	public function get_label() {}
	public function get_label_widget() {}
	public function get_spacing() {}
	public function get_use_markup() {}
	public function get_use_underline() {}
	public function set_expanded($expanded) {}
	public function set_label($label) {}
	public function set_label_widget(GtkWidget $label_widget ) {}
	public function set_spacing($spacing) {}
	public function set_use_markup($use_markup) {}
	public function set_use_underline($use_underline) {}
}

/**
 * @package Gtk
 */
class GtkAspectFrame extends GtkFrame {
	const gtype = 165220280;

	public function __construct() {}
	public function set() {}
}

/**
 * @package Gtk
 */
class GtkEventBox extends GtkBin {
	const gtype = 165282904;

	public function __construct() {}
	public function get_above_child() {}
	public function get_visible_window() {}
	public function set_above_child($above_child) {}
	public function set_visible_window($visible_window) {}
}

/**
 * @package Gtk
 */
class GtkAlignment extends GtkBin {
	const gtype = 165344520;

	public function __construct() {}
	public function get_padding() {}
	public function set($xalign, $yalign, $xscale, $yscale) {}
	public function set_padding($padding_top, $padding_bottom, $padding_left, $padding_right) {}
}

/**
 * @package Gtk
 */
class GtkButton extends GtkBin {
	const gtype = 158285480;

	public function __construct() {}
	static public function new_from_stock($stock_id) {}
	public function clicked() {}
	public function enter() {}
	public function get_alignment() {}
	public function get_focus_on_click() {}
	public function get_image() {}
	public function get_image_position() {}
	public function get_label() {}
	public function get_relief() {}
	public function get_use_stock() {}
	public function get_use_underline() {}
	public function leave() {}
	public function pressed() {}
	public function released() {}
	public function set_alignment($xalign, $yalign) {}
	public function set_focus_on_click($focus_on_click) {}
	public function set_image(GtkWidget $image ) {}
	public function set_image_position($position) {}
	public function set_label($label) {}
	public function set_relief($newstyle) {}
	public function set_use_stock($use_stock) {}
	public function set_use_underline($use_underline) {}
}

/**
 * @package Gtk
 */
class GtkComboBox extends GtkBin implements GtkCellLayout {
	const gtype = 165471088;

	public function __construct() {}
	static public function new_text() {}
	public function append_text($text) {}
	public function get_active() {}
	public function get_active_iter() {}
	public function get_active_text() {}
	public function get_add_tearoffs() {}
	public function get_button_sensitivity() {}
	public function get_column_span_column() {}
	public function get_focus_on_click() {}
	public function get_model() {}
	public function get_popup_accessible() {}
	public function get_row_span_column() {}
	public function get_title() {}
	public function get_wrap_width() {}
	public function insert_text($position, $text) {}
	public function popdown() {}
	public function popup() {}
	public function prepend_text($text) {}
	public function remove_text($position) {}
	public function set_active($index) {}
	public function set_active_iter(GtkTreeIter $iter ) {}
	public function set_add_tearoffs($add_tearoffs) {}
	public function set_button_sensitivity($sensitivity) {}
	public function set_column_span_column($column_span) {}
	public function set_focus_on_click($focus_on_click) {}
	public function set_model($model) {}
	public function set_row_separator_func($callback) {}
	public function set_row_span_column($row_span) {}
	public function set_title($title) {}
	public function set_wrap_width($width) {}
	public function add_attribute(GtkCellRenderer $cell, $attribute, $column) {}
	public function clear() {}
	public function clear_attributes(GtkCellRenderer $cell ) {}
	public function pack_end(GtkCellRenderer $cell ) {}
	public function pack_start(GtkCellRenderer $cell ) {}
	public function reorder(GtkCellRenderer $cell, $position) {}
	public function set_attributes($cell) {}
	public function set_cell_data_func(GtkCellRenderer $cellrenderer, $callback) {}
}

/**
 * @package Gtk
 */
class GtkToggleButton extends GtkButton {
	const gtype = 158285672;

	public function __construct() {}
	public function get_active() {}
	public function get_inconsistent() {}
	public function get_mode() {}
	public function set_active($is_active) {}
	public function set_inconsistent($setting) {}
	public function set_mode($draw_indicator) {}
	public function set_state($is_active) {}
	public function toggled() {}
}

/**
 * @package Gtk
 */
class GtkOptionMenu extends GtkButton {
	const gtype = 165606800;

	public function __construct() {}
	public function get_history() {}
	public function get_menu() {}
	public function remove_menu() {}
	public function set_history($index) {}
	public function set_menu(GtkWidget $menu ) {}
}

/**
 * @package Gtk
 */
class GtkCheckButton extends GtkToggleButton {
	const gtype = 165673176;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkFontButton extends GtkButton {
	const gtype = 165740256;

	public function __construct() {}
	static public function new_with_font($fontname) {}
	public function get_font_name() {}
	public function get_show_size() {}
	public function get_show_style() {}
	public function get_title() {}
	public function get_use_font() {}
	public function get_use_size() {}
	public function set_font_name($fontname) {}
	public function set_show_size($show_size) {}
	public function set_show_style($show_style) {}
	public function set_title($title) {}
	public function set_use_font($use_font) {}
	public function set_use_size($use_size) {}
}

/**
 * @package Gtk
 */
class GtkRadioButton extends GtkCheckButton {
	const gtype = 165808312;

	public function __construct(GtkRadioButton $group = NULL) {}
	public function get_group() {}
	public function group() {}
	public function set_group() {}
}

/**
 * @package Gtk
 */
class GtkLinkButton extends GtkButton {
	const gtype = 165876000;

	public function __construct($uri) {}
	public function get_uri() {}
	public function get_visited() {}
	public function set_uri($uri) {}
	static public function set_uri_hook($callback) {}
	public function set_visited($visited) {}
}

/**
 * @package Gtk
 */
class GtkScaleButton extends GtkButton {
	const gtype = 165942384;

	public function __construct() {}
	public function get_adjustment() {}
	public function get_minus_button() {}
	public function get_plus_button() {}
	public function get_popup() {}
	public function get_value() {}
	public function set_adjustment(GtkAdjustment $adjustment ) {}
	public function set_icons() {}
	public function set_value($value) {}
}

/**
 * @package Gtk
 */
class GtkColorButton extends GtkButton {
	const gtype = 166009440;

	public function __construct(GdkColor $color = NULL) {}
	public function get_alpha() {}
	public function get_color() {}
	public function get_title() {}
	public function get_use_alpha() {}
	public function set_alpha($alpha) {}
	public function set_color(GdkColor $color ) {}
	public function set_title($title) {}
	public function set_use_alpha($use_alpha) {}
}

/**
 * @package Gtk
 */
class GtkVolumeButton extends GtkScaleButton {
	const gtype = 166076464;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkCList extends GtkContainer {
	const gtype = 166143504;

	public function __construct() {}
	public function append() {}
	public function clear() {}
	public function column_title_active($column) {}
	public function column_title_passive($column) {}
	public function column_titles_active() {}
	public function column_titles_hide() {}
	public function column_titles_passive() {}
	public function column_titles_show() {}
	public function columns_autosize() {}
	public function freeze() {}
	public function get_cell_style($row, $column) {}
	public function get_cell_type($row, $column) {}
	public function get_column_title($column) {}
	public function get_column_widget($column) {}
	public function get_hadjustment() {}
	public function get_row_style($row) {}
	public function get_selectable($row) {}
	public function get_selection_info($x, $y) {}
	public function get_text() {}
	public function get_vadjustment() {}
	public function insert() {}
	public function moveto($row, $column, $row_align, $col_align) {}
	public function optimal_column_width($column) {}
	public function prepend() {}
	public function remove_row($row) {}
	public function row_is_visible($row) {}
	public function row_move($source_row, $dest_row) {}
	public function select_all() {}
	public function select_row($row, $column) {}
	public function set_auto_sort($auto_sort) {}
	public function set_background($row, GdkColor $color ) {}
	public function set_button_actions($button, $button_actions) {}
	public function set_cell_style($row, $column, GtkStyle $style ) {}
	public function set_column_auto_resize($column, $auto_resize) {}
	public function set_column_justification($column, $justification) {}
	public function set_column_max_width($column, $max_width) {}
	public function set_column_min_width($column, $min_width) {}
	public function set_column_resizeable($column, $resizeable) {}
	public function set_column_title($column, $title) {}
	public function set_column_visibility($column, $visible) {}
	public function set_column_widget($column, GtkWidget $widget ) {}
	public function set_column_width($column, $width) {}
	public function set_foreground($row, GdkColor $color ) {}
	public function set_hadjustment(GtkAdjustment $adjustment ) {}
	public function set_pixmap($row, $column, GdkPixmap $pixmap ) {}
	public function set_pixtext($row, $column, $text, $spacing, GdkPixmap $pixmap, $mask) {}
	public function set_reorderable($reorderable) {}
	public function set_row_height($height) {}
	public function set_row_style($row, GtkStyle $style ) {}
	public function set_selectable($row, $selectable) {}
	public function set_selection_mode($mode) {}
	public function set_shadow_type($type) {}
	public function set_shift($row, $column, $vertical, $horizontal) {}
	public function set_sort_column($column) {}
	public function set_sort_type($sort_type) {}
	public function set_text($row, $column, $text) {}
	public function set_use_drag_icons($use_icons) {}
	public function set_vadjustment(GtkAdjustment $adjustment ) {}
	public function sort() {}
	public function swap_rows($row1, $row2) {}
	public function thaw() {}
	public function undo_selection() {}
	public function unselect_all() {}
	public function unselect_row($row, $column) {}
}

/**
 * @package Gtk
 */
class GtkComboBoxEntry extends GtkComboBox implements GtkCellLayout {
	const gtype = 166217584;

	public function __construct() {}
	static public function new_text() {}
	public function get_text_column() {}
	public function set_text_column($text_column) {}
	public function add_attribute(GtkCellRenderer $cell, $attribute, $column) {}
	public function clear() {}
	public function clear_attributes(GtkCellRenderer $cell ) {}
	public function pack_end(GtkCellRenderer $cell ) {}
	public function pack_start(GtkCellRenderer $cell ) {}
	public function reorder(GtkCellRenderer $cell, $position) {}
	public function set_attributes($cell) {}
	public function set_cell_data_func(GtkCellRenderer $cellrenderer, $callback) {}
}

/**
 * @package Gtk
 */
class GtkButtonBox extends GtkBox {
	const gtype = 166286792;

	public function get_child_ipadding() {}
	public function get_child_secondary(GtkWidget $child ) {}
	public function get_child_size() {}
	public function get_layout() {}
	public function set_child_ipadding($ipad_x, $ipad_y) {}
	public function set_child_secondary(GtkWidget $child, $is_secondary) {}
	public function set_child_size($min_width, $min_height) {}
	public function set_layout($layout_style) {}
}

/**
 * @package Gtk
 */
class GtkCalendar extends GtkWidget {
	const gtype = 166351288;

	public function __construct() {}
	public function clear_marks() {}
	public function display_options($flags) {}
	public function freeze() {}
	public function get_date() {}
	public function get_detail_height_rows() {}
	public function get_detail_width_chars() {}
	public function get_display_options() {}
	public function mark_day($day) {}
	public function select_day($day) {}
	public function select_month($month, $year) {}
	public function set_detail_height_rows($rows) {}
	public function set_detail_width_chars($chars) {}
	public function set_display_options($flags) {}
	public function thaw() {}
	public function unmark_day($day) {}
}

/**
 * @package Gtk
 */
class GtkVButtonBox extends GtkButtonBox {
	const gtype = 166408752;

	public function __construct() {}
	static public function get_layout_default() {}
	static public function get_spacing_default() {}
	static public function set_layout_default($layout) {}
	static public function set_spacing_default($spacing) {}
}

/**
 * @package Gtk
 */
class GtkHButtonBox extends GtkButtonBox {
	const gtype = 166474168;

	public function __construct() {}
	static public function get_layout_default() {}
	static public function get_spacing_default() {}
	static public function set_layout_default($layout) {}
	static public function set_spacing_default($spacing) {}
}

/**
 * @package Gtk
 */
class GtkCTree extends GtkCList {
	const gtype = 166539528;

	public function __construct() {}
	public function collapse(GtkCTreeNode $node ) {}
	public function collapse_recursive(GtkCTreeNode $node ) {}
	public function collapse_to_depth(GtkCTreeNode $node, $depth) {}
	public function expand(GtkCTreeNode $node ) {}
	public function expand_recursive(GtkCTreeNode $node ) {}
	public function expand_to_depth(GtkCTreeNode $node, $depth) {}
	public function find(GtkCTreeNode $node , GtkCTreeNode $child ) {}
	public function insert_node() {}
	public function is_hot_spot($x, $y) {}
	public function is_viewable(GtkCTreeNode $node ) {}
	public function last(GtkCTreeNode $node ) {}
	public function move(GtkCTreeNode $node , GtkCTreeNode $new_parent , GtkCTreeNode $new_sibling ) {}
	public function node_get_cell_style(GtkCTreeNode $node, $column) {}
	public function node_get_cell_type(GtkCTreeNode $node, $column) {}
	public function node_get_row_style(GtkCTreeNode $node ) {}
	public function node_get_selectable(GtkCTreeNode $node ) {}
	public function node_is_visible(GtkCTreeNode $node ) {}
	public function node_moveto(GtkCTreeNode $node, $column, $row_align, $col_align) {}
	public function node_nth($row) {}
	public function node_set_background(GtkCTreeNode $node , GdkColor $color ) {}
	public function node_set_cell_style(GtkCTreeNode $node, $column, GtkStyle $style ) {}
	public function node_set_foreground(GtkCTreeNode $node , GdkColor $color ) {}
	public function node_set_pixmap(GtkCTreeNode $node, $column, GdkPixmap $pixmap, $mask) {}
	public function node_set_pixtext(GtkCTreeNode $node, $column, $text, $spacing, GdkPixmap $pixmap, $mask) {}
	public function node_set_row_style(GtkCTreeNode $node , GtkStyle $style ) {}
	public function node_set_selectable(GtkCTreeNode $node, $selectable) {}
	public function node_set_shift(GtkCTreeNode $node, $column, $vertical, $horizontal) {}
	public function node_set_text(GtkCTreeNode $node, $column, $text) {}
	public function real_select_recursive(GtkCTreeNode $node, $state) {}
	public function remove_node(GtkCTreeNode $node ) {}
	public function row_is_ancestor(GtkCTreeNode $node , GtkCTreeNode $child ) {}
	public function select(GtkCTreeNode $node ) {}
	public function select_recursive(GtkCTreeNode $node ) {}
	public function set_expander_style($expander_style) {}
	public function set_indent($indent) {}
	public function set_line_style($line_style) {}
	public function set_node_info(GtkCTreeNode $node, $text, $spacing, GdkPixmap $pixmap_closed, $mask_closed, GdkPixmap $pixmap_opened, $mask_opened, $is_leaf, $expanded) {}
	public function set_show_stub($show_stub) {}
	public function set_spacing($spacing) {}
	public function sort_node(GtkCTreeNode $node ) {}
	public function sort_recursive(GtkCTreeNode $node ) {}
	public function toggle_expansion(GtkCTreeNode $node ) {}
	public function toggle_expansion_recursive(GtkCTreeNode $node ) {}
	public function unselect(GtkCTreeNode $node ) {}
	public function unselect_recursive(GtkCTreeNode $node ) {}
}

/**
 * @package Gtk
 */
class GtkHsv extends GtkWidget {
	const gtype = 166623064;

}

/**
 * @package Gtk
 */
class GtkAssistant extends GtkWindow {
	const gtype = 166677376;

	public function __construct() {}
	public function add_action_widget(GtkWidget $child ) {}
	public function append_page(GtkWidget $page ) {}
	public function get_current_page() {}
	public function get_n_pages() {}
	public function get_nth_page($page_num) {}
	public function get_page_complete(GtkWidget $page ) {}
	public function get_page_header_image(GtkWidget $page ) {}
	public function get_page_side_image(GtkWidget $page ) {}
	public function get_page_title(GtkWidget $page ) {}
	public function get_page_type(GtkWidget $page ) {}
	public function insert_page(GtkWidget $page, $position) {}
	public function prepend_page(GtkWidget $page ) {}
	public function remove_action_widget(GtkWidget $child ) {}
	public function set_current_page($page_num) {}
	public function set_forward_page_func($callback) {}
	public function set_page_complete(GtkWidget $page, $complete) {}
	public function set_page_header_image(GtkWidget $page , GdkPixbuf $pixbuf = NULL) {}
	public function set_page_side_image(GtkWidget $page , GdkPixbuf $pixbuf = NULL) {}
	public function set_page_title(GtkWidget $page, $title) {}
	public function set_page_type(GtkWidget $page, $type) {}
	public function update_buttons_state() {}
}

/**
 * @package Gtk
 */
class GtkWindowGroup extends GObject {
	const gtype = 166766104;

	public function __construct() {}
	public function add_window(GtkWindow $window ) {}
	public function remove_window(GtkWindow $window ) {}
}

/**
 * @package Gtk
 */
class GtkInfoBar extends GtkHBox {
	const gtype = 166775728;

	public function __construct() {}
	public function add_action_widget(GtkWidget $child, $response_id) {}
	public function add_button($button_text, $response_id) {}
	public function add_buttons($buttons) {}
	public function get_action_area() {}
	public function get_content_area() {}
	public function get_message_type() {}
	public function response($response_id) {}
	public function set_default_response($response_id) {}
	public function set_message_type($message_type) {}
	public function set_response_sensitive($response_id, $sensitive) {}
}

/**
 * @package Gtk
 */
class GtkEntryBuffer extends GObject {
	const gtype = 166840616;

	public function __construct() {}
	public function delete_text($position, $n_chars) {}
	public function emit_deleted_text($position, $n_chars) {}
	public function emit_inserted_text($position, $chars, $n_chars) {}
	public function get_bytes() {}
	public function get_length() {}
	public function get_max_length() {}
	public function get_text() {}
	public function insert_text($position, $chars, $n_chars) {}
	public function set_max_length($max_length) {}
	public function set_text($chars, $n_chars) {}
}

/**
 * @package Gtk
 */
class GtkToolItemGroup extends GtkContainer {
	const gtype = 166852080;

	public function __construct($label) {}
	public function get_collapsed() {}
	public function get_drop_item($x, $y) {}
	public function get_ellipsize() {}
	public function get_header_relief() {}
	public function get_item_position(GtkToolItem $item ) {}
	public function get_label() {}
	public function get_label_widget() {}
	public function get_n_items() {}
	public function get_nth_item($index) {}
	public function insert(GtkToolItem $item, $position) {}
	public function set_collapsed($collapsed) {}
	public function set_ellipsize($ellipsize) {}
	public function set_header_relief($style) {}
	public function set_item_position(GtkToolItem $item, $position) {}
	public function set_label($label) {}
	public function set_label_widget(GtkWidget $label_widget ) {}
}

/**
 * @package Gtk
 */
class GtkToolPalette extends GtkContainer {
	const gtype = 166915848;

	public function __construct() {}
	public function add_drag_dest(GtkWidget $widget, $flags = NULL, $targets = NULL, $actions) {}
	public function get_drag_item(GtkSelectionData $selection ) {}
	public function get_drop_group($x, $y) {}
	public function get_drop_item($x, $y) {}
	public function get_exclusive(GtkToolItemGroup $group ) {}
	public function get_expand(GtkToolItemGroup $group ) {}
	public function get_group_position(GtkToolItemGroup $group ) {}
	public function get_hadjustment() {}
	public function get_icon_size() {}
	public function get_style() {}
	public function get_vadjustment() {}
	public function set_drag_source($targets = NULL ) {}
	public function set_exclusive(GtkToolItemGroup $group, $exclusive) {}
	public function set_expand(GtkToolItemGroup $group, $expand) {}
	public function set_group_position(GtkToolItemGroup $group, $position) {}
	public function set_icon_size($icon_size) {}
	public function set_style($style) {}
	public function unset_icon_size() {}
	public function unset_style() {}
}

/**
 * @package Gtk
 */
class GtkCellRendererSpinner extends GtkCellRenderer {
	const gtype = 166979944;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkOffscreenWindow extends GtkWindow {
	const gtype = 166993488;

	public function __construct() {}
	public function get_pixbuf() {}
	public function get_pixmap() {}
}

/**
 * @package Gtk
 */
class GtkSpinner extends GtkDrawingArea {
	const gtype = 167078000;

	public function __construct() {}
	public function start() {}
	public function stop() {}
}

/**
 * @package Gtk
 */
class GtkPaperSize extends GBoxed {
	const gtype = 167132928;

	public function __construct() {}
	static public function new_from_ppd($ppd_name, $ppd_display_name, $width, $height) {}
	static public function new_custom($name, $display_name, $width, $height, $unit) {}
	public function copy() {}
	static public function get_default() {}
	public function get_default_bottom_margin($unit) {}
	public function get_default_left_margin($unit) {}
	public function get_default_right_margin($unit) {}
	public function get_default_top_margin($unit) {}
	public function get_display_name() {}
	public function get_height($unit) {}
	public function get_name() {}
	public function get_ppd_name() {}
	public function get_width($unit) {}
	public function is_custom() {}
	public function is_equal(GtkPaperSize $size2 ) {}
	public function set_size($width, $height, $unit) {}
}

/**
 * @package Gtk
 */
class GtkRecentInfo extends GBoxed {
	const gtype = 167137592;

	public function __construct() {}
	public function exists() {}
	public function get_added() {}
	public function get_age() {}
	public function get_application_info($app_name) {}
	public function get_applications() {}
	public function get_description() {}
	public function get_display_name() {}
	public function get_groups() {}
	public function get_icon($size) {}
	public function get_mime_type() {}
	public function get_modified() {}
	public function get_private_hint() {}
	public function get_short_name() {}
	public function get_uri() {}
	public function get_uri_display() {}
	public function get_visited() {}
	public function has_application($app_name) {}
	public function has_group($group_name) {}
	public function is_local() {}
	public function last_application() {}
	public function match(GtkRecentInfo $info_b ) {}
}

/**
 * @package Gtk
 */
class GtkTargetList extends GBoxed {
	const gtype = 167143424;

	public function __construct() {}
	public function add($target, $flags, $info) {}
	public function add_image_targets($info, $writable) {}
	public function add_rich_text_targets($info, $deserializable, GtkTextBuffer $buffer ) {}
	public function add_text_targets($info) {}
	public function add_uri_targets($info) {}
	public function remove($target) {}
}

/**
 * @package Gtk
 */
class GtkBorder extends GBoxed {
	const gtype = 158240784;

	public function __construct() {}
	public function copy() {}
}

/**
 * @package Gtk
 */
class GtkIconInfo extends GBoxed {
	const gtype = 167147344;

	public function __construct() {}
	public function copy() {}
	public function get_attach_points() {}
	public function get_base_size() {}
	public function get_builtin_pixbuf() {}
	public function get_display_name() {}
	public function get_embedded_rect(GdkRectangle $rectangle ) {}
	public function get_filename() {}
	public function load_icon($error) {}
	public function set_raw_coordinates($raw_coordinates) {}
}

/**
 * @package Gtk
 */
class GtkIconSet extends GBoxed {
	const gtype = 167150472;

	public function __construct() {}
	static public function new_from_pixbuf(GdkPixbuf $pixbuf ) {}
	public function add_source(GtkIconSource $source ) {}
	public function copy() {}
	public function get_sizes() {}
	public function render_icon(GtkStyle $style, $direction, $state, $size, GtkWidget $widget = NULL) {}
}

/**
 * @package Gtk
 */
class GtkIconSource extends GBoxed {
	const gtype = 167152712;

	public function __construct() {}
	public function copy() {}
	public function get_direction() {}
	public function get_direction_wildcarded() {}
	public function get_filename() {}
	public function get_icon_name() {}
	public function get_pixbuf() {}
	public function get_size() {}
	public function get_size_wildcarded() {}
	public function get_state() {}
	public function get_state_wildcarded() {}
	public function set_direction($direction) {}
	public function set_direction_wildcarded($setting) {}
	public function set_filename($filename) {}
	public function set_icon_name($icon_name) {}
	public function set_pixbuf(GdkPixbuf $pixbuf ) {}
	public function set_size($size) {}
	public function set_size_wildcarded($setting) {}
	public function set_state($state) {}
	public function set_state_wildcarded($setting) {}
}

/**
 * @package Gtk
 */
class GtkRequisition extends GBoxed {
	const gtype = 158228432;

	public function __construct() {}
	public function copy() {}
}

/**
 * @package Gtk
 */
class GtkSelectionData extends GBoxed {
	const gtype = 158230536;

	public function __construct() {}
	public function copy() {}
	public function get_data() {}
	public function get_data_type() {}
	public function get_display() {}
	public function get_format() {}
	public function get_length() {}
	public function get_pixbuf() {}
	public function get_selection() {}
	public function get_target() {}
	public function get_text() {}
	public function get_uris() {}
	public function set($type, $format, $data, $length) {}
	public function set_pixbuf(GdkPixbuf $pixbuf ) {}
	public function set_text($str) {}
	public function set_uris($uris) {}
	public function targets_include_image($writable) {}
	public function targets_include_rich_text(GtkTextBuffer $buffer ) {}
	public function targets_include_text() {}
	public function targets_include_uri() {}
	public function tree_set_row_drag_data($tree_model, $path) {}
}

/**
 * @package Gtk
 */
class GtkTextAttributes extends GBoxed {
	const gtype = 167165016;

	public function __construct() {}
	public function copy() {}
	public function copy_values(GtkTextAttributes $dest ) {}
}

/**
 * @package Gtk
 */
class GtkTextIter extends GBoxed {
	const gtype = 167168808;

	public function __construct() {}
	public function backward_char() {}
	public function backward_chars($count) {}
	public function backward_cursor_position() {}
	public function backward_cursor_positions($count) {}
	public function backward_find_char(GtkTextIter $iter, $callback) {}
	public function backward_line() {}
	public function backward_lines($count) {}
	public function backward_search($str, $flags, GtkTextIter $match_start , GtkTextIter $match_end , GtkTextIter $limit ) {}
	public function backward_sentence_start() {}
	public function backward_sentence_starts($count) {}
	public function backward_to_tag_toggle(GtkTextTag $tag ) {}
	public function backward_visible_cursor_position() {}
	public function backward_visible_cursor_positions($count) {}
	public function backward_visible_line() {}
	public function backward_visible_lines($count) {}
	public function backward_visible_word_start() {}
	public function backward_visible_word_starts($count) {}
	public function backward_word_start() {}
	public function backward_word_starts($count) {}
	public function begins_tag(GtkTextTag $tag = NULL) {}
	public function can_insert($default_editability) {}
	public function compare(GtkTextIter $rhs ) {}
	public function copy() {}
	public function editable($default_setting) {}
	public function ends_line() {}
	public function ends_sentence() {}
	public function ends_tag(GtkTextTag $tag = NULL) {}
	public function ends_word() {}
	public function equal(GtkTextIter $rhs ) {}
	public function forward_char() {}
	public function forward_chars($count) {}
	public function forward_cursor_position() {}
	public function forward_cursor_positions($count) {}
	public function forward_find_char($callback, GtkTextIter $iter ) {}
	public function forward_line() {}
	public function forward_lines($count) {}
	public function forward_search($str, $flags, GtkTextIter $match_start , GtkTextIter $match_end , GtkTextIter $limit ) {}
	public function forward_sentence_end() {}
	public function forward_sentence_ends($count) {}
	public function forward_to_end() {}
	public function forward_to_line_end() {}
	public function forward_to_tag_toggle(GtkTextTag $tag ) {}
	public function forward_visible_cursor_position() {}
	public function forward_visible_cursor_positions($count) {}
	public function forward_visible_line() {}
	public function forward_visible_lines($count) {}
	public function forward_visible_word_end() {}
	public function forward_visible_word_ends($count) {}
	public function forward_word_end() {}
	public function forward_word_ends($count) {}
	public function get_attributes(GtkTextAttributes $values ) {}
	public function get_buffer() {}
	public function get_bytes_in_line() {}
	public function get_char() {}
	public function get_chars_in_line() {}
	public function get_child_anchor() {}
	public function get_language() {}
	public function get_line() {}
	public function get_line_index() {}
	public function get_line_offset() {}
	public function get_marks() {}
	public function get_offset() {}
	public function get_pixbuf() {}
	public function get_slice(GtkTextIter $end ) {}
	public function get_tags() {}
	public function get_text(GtkTextIter $end ) {}
	public function get_toggled_tags() {}
	public function get_visible_line_index() {}
	public function get_visible_line_offset() {}
	public function get_visible_slice(GtkTextIter $end ) {}
	public function get_visible_text(GtkTextIter $end ) {}
	public function has_tag(GtkTextTag $tag ) {}
	public function in_range(GtkTextIter $start , GtkTextIter $end ) {}
	public function inside_sentence() {}
	public function inside_word() {}
	public function is_cursor_position() {}
	public function is_end() {}
	public function is_start() {}
	public function order(GtkTextIter $second ) {}
	public function set_line($line_number) {}
	public function set_line_index($byte_on_line) {}
	public function set_line_offset($char_on_line) {}
	public function set_offset($char_offset) {}
	public function set_visible_line_index($byte_on_line) {}
	public function set_visible_line_offset($char_on_line) {}
	public function starts_line() {}
	public function starts_sentence() {}
	public function starts_word() {}
	public function toggles_tag(GtkTextTag $tag = NULL) {}
}

/**
 * @package Gtk
 */
class GtkTreeIter extends GBoxed {
	const gtype = 158303648;

	public function __construct() {}
}

/**
 * @package Gtk
 */
class GtkTreeRowReference extends GBoxed {
	const gtype = 167190496;

	public function __construct($model, $path) {}
	public function copy() {}
	public function get_model() {}
	public function get_path() {}
	public function valid() {}
}

/**
 * @package Gtk
 */
class GtkCTreeNode extends GPointer {
	const gtype = 167192528;

	public function __construct() {}
}

/**
 * @package Gtk
 */
final class GtkTreeModelRow {
	public function __construct() {}
	public function children() {}
}

/**
 * @package Gtk
 */
final class GtkTreeModelRowIterator {}
