<?php

/**
 * @package Pango
 */
class Pango {
	const ALIGN_LEFT = 0;
	const ALIGN_CENTER = 1;
	const ALIGN_RIGHT = 2;
	const ATTR_INVALID = 0;
	const ATTR_LANGUAGE = 1;
	const ATTR_FAMILY = 2;
	const ATTR_STYLE = 3;
	const ATTR_WEIGHT = 4;
	const ATTR_VARIANT = 5;
	const ATTR_STRETCH = 6;
	const ATTR_SIZE = 7;
	const ATTR_FONT_DESC = 8;
	const ATTR_FOREGROUND = 9;
	const ATTR_BACKGROUND = 10;
	const ATTR_UNDERLINE = 11;
	const ATTR_STRIKETHROUGH = 12;
	const ATTR_RISE = 13;
	const ATTR_SHAPE = 14;
	const ATTR_SCALE = 15;
	const ATTR_FALLBACK = 16;
	const ATTR_LETTER_SPACING = 17;
	const ATTR_UNDERLINE_COLOR = 18;
	const ATTR_STRIKETHROUGH_COLOR = 19;
	const ATTR_ABSOLUTE_SIZE = 20;
	const ATTR_GRAVITY = 21;
	const ATTR_GRAVITY_HINT = 22;
	const COVERAGE_NONE = 0;
	const COVERAGE_FALLBACK = 1;
	const COVERAGE_APPROXIMATE = 2;
	const COVERAGE_EXACT = 3;
	const DIRECTION_LTR = 0;
	const DIRECTION_RTL = 1;
	const DIRECTION_TTB_LTR = 2;
	const DIRECTION_TTB_RTL = 3;
	const DIRECTION_WEAK_LTR = 4;
	const DIRECTION_WEAK_RTL = 5;
	const DIRECTION_NEUTRAL = 6;
	const ELLIPSIZE_NONE = 0;
	const ELLIPSIZE_START = 1;
	const ELLIPSIZE_MIDDLE = 2;
	const ELLIPSIZE_END = 3;
	const STRETCH_ULTRA_CONDENSED = 0;
	const STRETCH_EXTRA_CONDENSED = 1;
	const STRETCH_CONDENSED = 2;
	const STRETCH_SEMI_CONDENSED = 3;
	const STRETCH_NORMAL = 4;
	const STRETCH_SEMI_EXPANDED = 5;
	const STRETCH_EXPANDED = 6;
	const STRETCH_EXTRA_EXPANDED = 7;
	const STRETCH_ULTRA_EXPANDED = 8;
	const STYLE_NORMAL = 0;
	const STYLE_OBLIQUE = 1;
	const STYLE_ITALIC = 2;
	const TAB_LEFT = 0;
	const UNDERLINE_NONE = 0;
	const UNDERLINE_SINGLE = 1;
	const UNDERLINE_DOUBLE = 2;
	const UNDERLINE_LOW = 3;
	const UNDERLINE_ERROR = 4;
	const VARIANT_NORMAL = 0;
	const VARIANT_SMALL_CAPS = 1;
	const WEIGHT_THIN = 100;
	const WEIGHT_ULTRALIGHT = 200;
	const WEIGHT_LIGHT = 300;
	const WEIGHT_BOOK = 380;
	const WEIGHT_NORMAL = 400;
	const WEIGHT_MEDIUM = 500;
	const WEIGHT_SEMIBOLD = 600;
	const WEIGHT_BOLD = 700;
	const WEIGHT_ULTRABOLD = 800;
	const WEIGHT_HEAVY = 900;
	const WEIGHT_ULTRAHEAVY = 1000;
	const WRAP_WORD = 0;
	const WRAP_CHAR = 1;
	const WRAP_WORD_CHAR = 2;
	const FONT_MASK_FAMILY = 1;
	const FONT_MASK_STYLE = 2;
	const FONT_MASK_VARIANT = 4;
	const FONT_MASK_WEIGHT = 8;
	const FONT_MASK_STRETCH = 16;
	const FONT_MASK_SIZE = 32;
	const FONT_MASK_GRAVITY = 64;

	static public function PIXELS($size) {}
	static public function attr_type_register($name) {}
}

/**
 * @package Pango
 */
class PangoContext extends GObject {
	const gtype = 167630352;

	public function __construct() {}
	public function add_font_map(PangoFontMap $font_map ) {}
	public function get_base_dir() {}
	public function get_font_description() {}
	public function get_language() {}
	public function get_metrics(PangoFontDescription $desc , PangoLanguage $language = NULL) {}
	public function load_font(PangoFontDescription $desc ) {}
	public function load_fontset(PangoFontDescription $desc , PangoLanguage $language ) {}
	public function set_base_dir($direction) {}
	public function set_font_description(PangoFontDescription $desc ) {}
	public function set_language(PangoLanguage $language ) {}
}

/**
 * @package Pango
 */
class PangoFont extends GObject {
	const gtype = 167641776;

	public function describe() {}
	public function get_metrics(PangoLanguage $language = NULL) {}
}

/**
 * @package Pango
 */
class PangoFontFace extends GObject {
	const gtype = 167651360;

	public function describe() {}
	public function get_face_name() {}
	public function list_sizes() {}
}

/**
 * @package Pango
 */
class PangoFontFamily extends GObject {
	const gtype = 167661128;

	public function get_name() {}
	public function is_monospace() {}
}

/**
 * @package Pango
 */
class PangoFontMap extends GObject {
	const gtype = 167670704;

	public function get_shape_engine_type() {}
	public function load_font(PangoContext $context , PangoFontDescription $desc ) {}
	public function load_fontset(PangoContext $context , PangoFontDescription $desc , PangoLanguage $language ) {}
}

/**
 * @package Pango
 */
class PangoFontset extends GObject {
	const gtype = 167680464;

	public function get_font($wc) {}
	public function get_metrics() {}
}

/**
 * @package Pango
 */
class PangoFontsetSimple extends PangoFontset {
	const gtype = 167690056;

	public function __construct(PangoLanguage $language ) {}
	public function append(PangoFont $font ) {}
	public function size() {}
}

/**
 * @package Pango
 */
class PangoLayout extends GObject {
	const gtype = 167700096;

	public function __construct(PangoContext $context ) {}
	public function context_changed() {}
	public function copy() {}
	public function get_alignment() {}
	public function get_attributes() {}
	public function get_auto_dir() {}
	public function get_context() {}
	public function get_cursor_pos($index, $strong_pos, $weak_pos) {}
	public function get_extents($ink_rect, $logical_rect) {}
	public function get_indent() {}
	public function get_iter() {}
	public function get_justify() {}
	public function get_line() {}
	public function get_line_count() {}
	public function get_lines() {}
	public function get_pixel_extents() {}
	public function get_pixel_size() {}
	public function get_single_paragraph_mode() {}
	public function get_size() {}
	public function get_spacing() {}
	public function get_tabs() {}
	public function get_text() {}
	public function get_width() {}
	public function get_wrap() {}
	public function index_to_pos($index, $pos) {}
	public function set_alignment($alignment) {}
	public function set_attributes(PangoAttrList $attrs ) {}
	public function set_auto_dir($auto_dir) {}
	public function set_font_description(PangoFontDescription $desc ) {}
	public function set_indent($indent) {}
	public function set_justify($justify) {}
	public function set_markup($markup, $length) {}
	public function set_single_paragraph_mode($setting) {}
	public function set_spacing($spacing) {}
	public function set_tabs(PangoTabArray $tabs ) {}
	public function set_text($text, $length) {}
	public function set_width($width) {}
	public function set_wrap($wrap) {}
	public function xy_to_index() {}
}

/**
 * @package Pango
 */
class PangoRenderer extends GObject {
	const gtype = 167224840;

}

/**
 * @package Pango
 */
class PangoAttrList extends GBoxed {
	const gtype = 167726592;

	public function __construct() {}
	public function copy() {}
	public function ref() {}
	public function splice(PangoAttrList $other, $pos, $len) {}
	public function unref() {}
}

/**
 * @package Pango
 */
class PangoColor extends GBoxed {
	const gtype = 167728496;

	public function __construct() {}
	public function copy() {}
	public function free() {}
}

/**
 * @package Pango
 */
class PangoFontDescription extends GBoxed {
	const gtype = 167730264;

	public function __construct() {}
	static public function from_string($str) {}
	public function better_match(PangoFontDescription $old_match = NULL, PangoFontDescription $new_match = NULL) {}
	public function copy() {}
	public function copy_static() {}
	public function equal(PangoFontDescription $desc2 ) {}
	public function get_family() {}
	public function get_set_fields() {}
	public function get_size() {}
	public function get_stretch() {}
	public function get_style() {}
	public function get_variant() {}
	public function get_weight() {}
	public function hash() {}
	public function merge(PangoFontDescription $desc_to_merge, $replace_existing) {}
	public function merge_static(PangoFontDescription $desc_to_merge, $replace_existing) {}
	public function set_family($family) {}
	public function set_family_static($family) {}
	public function set_size($size) {}
	public function set_stretch($stretch) {}
	public function set_style($style) {}
	public function set_variant($variant) {}
	public function set_weight($weight) {}
	public function to_filename() {}
	public function to_string() {}
	public function unset_fields($to_unset) {}
}

/**
 * @package Pango
 */
class PangoFontMetrics extends GBoxed {
	const gtype = 167736744;

	public function __construct() {}
	public function get_approximate_char_width() {}
	public function get_approximate_digit_width() {}
	public function get_ascent() {}
	public function get_descent() {}
	public function ref() {}
	public function unref() {}
}

/**
 * @package Pango
 */
class PangoGlyphString extends GBoxed {
	const gtype = 167739440;

	public function __construct() {}
	public function copy() {}
	public function extents(PangoFont $font, $ink_rect, $logical_rect) {}
	public function extents_range($start, $end, PangoFont $font, $ink_rect, $logical_rect) {}
	public function free() {}
	public function set_size($new_len) {}
}

/**
 * @package Pango
 */
class PangoLanguage extends GBoxed {
	const gtype = 167741712;

	public function __construct($language) {}
	public function matches($range_list) {}
	public function to_string() {}
}

/**
 * @package Pango
 */
class PangoLayoutIter extends GBoxed {
	const gtype = 167743536;

	public function __construct() {}
	public function at_last_line() {}
	public function free() {}
	public function get_baseline() {}
	public function get_char_extents($logical_rect) {}
	public function get_cluster_extents($ink_rect, $logical_rect) {}
	public function get_index() {}
	public function get_layout_extents($ink_rect, $logical_rect) {}
	public function get_line_extents($ink_rect, $logical_rect) {}
	public function get_run_extents($ink_rect, $logical_rect) {}
	public function next_char() {}
	public function next_cluster() {}
	public function next_line() {}
	public function next_run() {}
}

/**
 * @package Pango
 */
class PangoTabArray extends GBoxed {
	const gtype = 167747680;

	public function __construct($initial_size, $positions_in_pixels) {}
	public function copy() {}
	public function free() {}
	public function get_positions_in_pixels() {}
	public function get_size() {}
	public function resize($new_size) {}
	public function set_tab($tab_index, $alignment, $location) {}
}
