<?php
	
/**
 * @package Gdk
 */
class GdkAtom {
	public function __construct() {}
}

/**
 * @package Gdk
 */
class GdkRegion extends GBoxed {
	const gtype = 167506072;

	public function __construct() {}
	public function copy() {}
	public function destroy() {}
	public function empty() {}
	public function equal(GdkRegion $other}
	public function get_clipbox(GdkRectangle $rect}
	public function intersect(GdkRegion $source2}
	public function offset($dx, $dy) {}
	public function point_in($x, $y) {}
	public function rect_equal(GdkRectangle $rectangle}
	public function rect_in(GdkRectangle $rect}
	public function shrink($dx, $dy) {}
	public function subtract(GdkRegion $source2}
	public function union(GdkRegion $source2}
	public function union_with_rect(GdkRectangle $rect}
	public function xor(GdkRegion $source2) {}
}

/**
 * @package Gdk
 */
class GdkRectangle extends GBoxed {
	const gtype = 158228672;

	public function __construct($x, $y, $width, $height) {}
	public function intersect(GdkRectangle $rect}
	public function union(GdkRectangle $rect}
}

/**
 * @package Gdk
 */
class GdkCursor extends GBoxed {
	const gtype = 158108808;

	public function __construct($cursor_type) {}
	static public function new_for_display(GdkDisplay $display, $cursor_type) {}
	static public function new_from_pixmap(GdkPixmap $source , GdkPixmap $mask , GdkColor $fg , GdkColor $bg, $x, $y) {}
	static public function new_from_pixbuf(GdkDisplay $display , GdkPixbuf $source, $x, $y) {}
	static public function new_from_name(GdkDisplay $display, $name) {}
	public function get_display() {}
	public function get_image() {}
}

/**
 * @package Gdk
 */
class GdkColor extends GBoxed {
	const gtype = 158240640;

	public function __construct() {}
	public function copy() {}
	public function equal(GdkColor $colorb}
	public function free() {}
	public function hash() {}
	static public function parse($color) {}
	public function to_string() {}
}

/**
 * @package Gdk
 */
class GdkFont extends GBoxed {
	const gtype = 167494824;

	public function __construct($font_name) {}
	public function char_height($character) {}
	public function char_measure($character) {}
	public function char_width($character) {}
	public function equal(GdkFont $fontb}
	public function extents() {}
	public function get_display() {}
	public function height($text) {}
	public function id() {}
	public function measure($text) {}
	public function string_height($string) {}
	public function string_measure($string) {}
	public function string_width($string) {}
	public function width($text) {}
}

/**
 * @package Gdk
 */
class GdkEvent extends GBoxed {
	const gtype = 158231288;

	public function __construct($type) {}
	public function copy() {}
	public function free() {}
	public function get_axis($axis_type) {}
	public function get_coords() {}
	public function get_root_coords() {}
	public function get_screen() {}
	public function get_state() {}
	public function get_time() {}
	public function put() {}
	public function send_client_message($winid) {}
	public function send_clientmessage_toall() {}
	public function set_screen(GdkScreen $screen}
}

/**
 * @package Gdk
 */
class GdkVisual extends GObject {
	const gtype = 158110408;

	static public function get_best() {}
	static public function get_best_depth() {}
	static public function get_best_type() {}
	static public function get_best_with_both($depth, $visual_type) {}
	static public function get_best_with_depth($depth) {}
	static public function get_best_with_type($visual_type) {}
	public function get_screen() {}
	static public function get_system() {}
	static public function list_visuals() {}
}

/**
 * @package Gdk
 */
class GdkScreen extends GObject {
	const gtype = 158107032;

	public function alternative_dialog_button_order() {}
	public function broadcast_client_message(GdkEvent $event}
	public function get_active_window() {}
	static public function get_default() {}
	public function get_default_colormap() {}
	public function get_display() {}
	public function get_font_options() {}
	public function get_height() {}
	public function get_height_mm() {}
	public function get_monitor_at_point($x, $y) {}
	public function get_monitor_at_window(GdkWindow $window}
	public function get_monitor_geometry($monitor_num, GdkRectangle $dest}
	public function get_monitor_height_mm($monitor_num) {}
	public function get_monitor_plug_name($monitor_num) {}
	public function get_monitor_width_mm($monitor_num) {}
	public function get_n_monitors() {}
	public function get_number() {}
	public function get_primary_monitor() {}
	public function get_resolution() {}
	public function get_rgb_colormap() {}
	public function get_rgb_visual() {}
	public function get_rgba_colormap() {}
	public function get_rgba_visual() {}
	public function get_root_window() {}
	public function get_system_colormap() {}
	public function get_system_visual() {}
	public function get_toplevel_windows() {}
	public function get_width() {}
	public function get_width_mm() {}
	static public function height() {}
	static public function height_mm() {}
	public function is_composited() {}
	public function list_visuals() {}
	public function make_display_name() {}
	public function set_default_colormap(GdkColormap $colormap}
	public function set_font_options(CairoFontOptions $obj}
	public function set_resolution($dpi) {}
	static public function width() {}
	static public function width_mm() {}
}

/**
 * @package Gdk
 */
class GdkPixbufLoader extends GObject {
	const gtype = 167451128;

	public function __construct() {}
	static public function new_with_type($image_type, $error) {}
	static public function new_with_mime_type($mime_type, $error) {}
	public function close($error) {}
	public function get_animation() {}
	public function get_pixbuf() {}
	public function set_size($width, $height) {}
}

/**
 * @package Gdk
 */
class GdkPixbufSimpleAnimIter extends GdkPixbufAnimationIter {
	const gtype = 167441272;

}

/**
 * @package Gdk
 */
class GdkPixbufSimpleAnim extends GdkPixbufAnimation {
	const gtype = 167431072;

	public function __construct($width, $height, $rate) {}
	public function add_frame(GdkPixbuf $pixbuf}
}

/**
 * @package Gdk
 */
class GdkPixbufAnimationIter extends GObject {
	const gtype = 167421208;

	public function get_delay_time() {}
	public function get_pixbuf() {}
	public function on_currently_loading_frame() {}
}

/**
 * @package Gdk
 */
class GdkPixbufAnimation extends GObject {
	const gtype = 167401592;

	public function __construct($filename, $error) {}
	public function get_height() {}
	public function get_static_image() {}
	public function get_width() {}
	public function is_static_image() {}
}

/**
 * @package Gdk
 */
class GdkPixbuf extends GObject {
	const gtype = 158253840;

	public function __construct($colorspace, $has_alpha, $bits_per_sample, $width, $height) {}
	static public function new_from_file($filename, $error) {}
	static public function new_from_file_at_size($filename, $width, $height, $error) {}
	static public function new_from_xpm_data($data) {}
	static public function new_from_file_at_scale($filename, $width, $height, $preserve_aspect_ratio, $error) {}
	public function add_alpha() {}
	public function composite(GdkPixbuf $dest, $dest_x, $dest_y, $dest_width, $dest_height, $offset_x, $offset_y, $scale_x, $scale_y, $interp_type, $overall_alpha) {}
	public function composite_color(GdkPixbuf $dest, $dest_x, $dest_y, $dest_width, $dest_height, $offset_x, $offset_y, $scale_x, $scale_y, $interp_type, $overall_alpha, $check_x, $check_y, $check_size, $color1, $color2) {}
	public function composite_color_simple($dest_width, $dest_height, $interp_type, $overall_alpha, $check_size, $color1, $color2) {}
	public function copy() {}
	public function copy_area($src_x, $src_y, $width, $height, GdkPixbuf $dest_pixbuf, $dest_x, $dest_y) {}
	public function fill($pixel_or_red) {}
	public function fill_area($x, $y, $width, $height, $pixel_or_red) {}
	public function flip($horizontal) {}
	public function get_bits_per_sample() {}
	public function get_colorspace() {}
	static public function get_formats() {}
	public function get_from_drawable(GdkDrawable $src , GdkColormap $cmap, $src_x, $src_y, $dest_x, $dest_y, $width, $height) {}
	public function get_from_image(GdkImage $src , GdkColormap $cmap, $src_x, $src_y, $dest_x, $dest_y, $width, $height) {}
	public function get_has_alpha() {}
	public function get_height() {}
	public function get_n_channels() {}
	public function get_option($key) {}
	public function get_pixel($x, $y) {}
	public function get_pixels() {}
	public function get_rowstride() {}
	public function get_width() {}
	static public function new_from_gd($gd) {}
	public function put_pixel($x, $y, $pixel_or_red) {}
	public function render_pixmap_and_mask() {}
	public function render_threshold_alpha($bitmap, $src_x, $src_y, $dest_x, $dest_y, $width, $height, $alpha_threshold) {}
	public function render_to_drawable(GdkDrawable $drawable , GdkGC $gc, $src_x, $src_y, $dest_x, $dest_y, $width, $height) {}
	public function render_to_drawable_alpha(GdkDrawable $drawable, $src_x, $src_y, $dest_x, $dest_y, $width, $height, $alpha_mode, $alpha_threshold) {}
	public function rotate_simple($angle) {}
	public function saturate_and_pixelate(GdkPixbuf $dest, $saturation, $pixelate) {}
	public function save($filename, $type) {}
	public function scale(GdkPixbuf $dest, $dest_x, $dest_y, $dest_width, $dest_height, $offset_x, $offset_y, $scale_x, $scale_y, $interp_type) {}
	public function scale_simple($dest_width, $dest_height, $interp_type) {}
	public function subpixbuf($src_x, $src_y, $width, $height) {}
}

/**
 * @package Gdk
 */
class GdkKeymap extends GObject {
	const gtype = 167383568;

	public function get_caps_lock_state() {}
	static public function get_default() {}
	public function get_direction() {}
	static public function get_for_display(GdkDisplay $display}
	public function have_bidi_layouts() {}
}

/**
 * @package Gdk
 */
class GdkImage extends GObject {
	const gtype = 167373616;

	public function __construct($type, GdkVisual $visual, $width, $height) {}
	public function get_colormap() {}
	public function get_pixel($x, $y) {}
	public function put_pixel($x, $y, $pixel) {}
	public function set_colormap(GdkColormap $colormap}
}

/**
 * @package Gdk
 */
class GdkGC extends GObject {
	const gtype = 167358000;

	public function __construct(GdkDrawable $drawable}
	public function copy(GdkGC $src_gc}
	public function get_colormap() {}
	public function get_screen() {}
	public function offset($x_offset, $y_offset) {}
	public function set_background(GdkColor $color}
	public function set_clip_mask($mask) {}
	public function set_clip_origin($x, $y) {}
	public function set_clip_rectangle(GdkRectangle $rectangle}
	public function set_clip_region(GdkRegion $region}
	public function set_colormap(GdkColormap $colormap}
	public function set_dashes() {}
	public function set_exposures($exposures) {}
	public function set_fill($fill) {}
	public function set_font(GdkFont $font}
	public function set_foreground(GdkColor $color}
	public function set_function($function) {}
	public function set_line_attributes($line_width, $line_style, $cap_style, $join_style) {}
	public function set_rgb_bg_color(GdkColor $color}
	public function set_rgb_fg_color(GdkColor $color}
	public function set_stipple(GdkPixmap $stipple}
	public function set_subwindow($mode) {}
	public function set_tile(GdkPixmap $tile}
	public function set_ts_origin($x, $y) {}
	public function set_values() {}
}

/**
 * @package Gdk
 */
class GdkPixmap extends GdkDrawable {
	const gtype = 167342584;

	public function __construct(GdkDrawable $drawable, $width, $height) {}
	static public function create_from_xpm() {}
	static public function create_from_xpm_data() {}
}

/**
 * @package Gdk
 */
class GdkWindow extends GdkDrawable {
	const gtype = 158123776;

	public function __construct() {}
	static public function at_pointer() {}
	public function beep() {}
	public function begin_move_drag($button, $root_x, $root_y, $timestamp) {}
	public function begin_paint_rect(GdkRectangle $rectangle}
	public function begin_paint_region(GdkRegion $region}
	public function begin_resize_drag($edge, $button, $root_x, $root_y, $timestamp) {}
	public function clear() {}
	public function clear_area($x, $y, $width, $height) {}
	public function clear_area_e($x, $y, $width, $height) {}
	public function configure_finished() {}
	public function deiconify() {}
	public function destroy() {}
	public function enable_synchronized_configure() {}
	public function end_paint() {}
	public function ensure_native() {}
	public function flush() {}
	public function focus() {}
	static public function foreign_new($anid) {}
	static public function foreign_new_for_display(GdkDisplay $display, $anid) {}
	public function freeze_updates() {}
	public function fullscreen() {}
	public function geometry_changed() {}
	public function get_children() {}
	public function get_cursor() {}
	public function get_deskrelative_origin() {}
	public function get_events() {}
	public function get_frame_extents() {}
	public function get_geometry() {}
	public function get_group() {}
	public function get_origin() {}
	public function get_parent() {}
	public function get_pointer() {}
	public function get_position() {}
	public function get_root_origin() {}
	public function get_state() {}
	public function get_toplevel() {}
	static public function get_toplevels() {}
	public function get_type_hint() {}
	public function get_update_area() {}
	public function get_window_type() {}
	public function hide() {}
	public function iconify() {}
	public function input_set_extension_events($mask, $mode) {}
	public function input_shape_combine_mask($mask, $x, $y) {}
	public function input_shape_combine_region(GdkRegion $shape_region, $offset_x, $offset_y) {}
	public function invalidate_rect(GdkRectangle $rect, $invalidate_children) {}
	public function invalidate_region(GdkRegion $region, $invalidate_children) {}
	public function is_destroyed() {}
	public function is_viewable() {}
	public function is_visible() {}
	static public function lookup($anid) {}
	static public function lookup_for_display(GdkDisplay $display, $anid) {}
	public function lower() {}
	public function maximize() {}
	public function merge_child_input_shapes() {}
	public function merge_child_shapes() {}
	public function move($x, $y) {}
	public function move_region(GdkRegion $region, $dx, $dy) {}
	public function move_resize($x, $y, $width, $height) {}
	static public function process_all_updates() {}
	public function process_updates($update_children) {}
	public function property_change($property, $type, $format, $mode, $data, $nelements) {}
	public function property_delete($property) {}
	public function raise() {}
	public function redirect_to_drawable(GdkDrawable $drawable, $src_x, $src_y, $dest_x, $dest_y, $width, $height) {}
	public function register_dnd() {}
	public function remove_redirection() {}
	public function reparent(GdkWindow $new_parent, $x, $y) {}
	public function resize($width, $height) {}
	public function restack(GdkWindow $sibling, $above) {}
	public function scroll($dx, $dy) {}
	public function selection_convert($selection, $target, $time) {}
	public function set_accept_focus($accept_focus) {}
	public function set_back_pixmap(GdkPixmap $pixmap, $parent_relative) {}
	public function set_background(GdkColor $color}
	public function set_child_input_shapes() {}
	public function set_child_shapes() {}
	public function set_composited($composited) {}
	public function set_cursor(GdkCursor $cursor}
	static public function set_debug_updates($setting) {}
	public function set_decorations($decorations) {}
	public function set_events($event_mask) {}
	public function set_focus_on_map($focus_on_map) {}
	public function set_functions($functions) {}
	public function set_group(GdkWindow $leader}
	public function set_hints($x, $y, $min_width, $min_height, $max_width, $max_height, $flags) {}
	public function set_icon(GdkWindow $icon_window , GdkPixmap $pixmap, $mask) {}
	public function set_icon_list() {}
	public function set_icon_name($name) {}
	public function set_keep_above($setting) {}
	public function set_keep_below($setting) {}
	public function set_modal_hint($modal) {}
	public function set_opacity($opacity) {}
	public function set_override_redirect($override_redirect) {}
	public function set_role($role) {}
	public function set_skip_pager_hint($modal) {}
	public function set_skip_taskbar_hint($modal) {}
	public function set_startup_id($startup_id) {}
	public function set_static_gravities($use_static) {}
	public function set_title($title) {}
	public function set_transient_for(GdkWindow $leader}
	public function set_type_hint($hint) {}
	public function set_urgency_hint($urgent) {}
	public function shape_combine_mask($shape_mask, $offset_x, $offset_y) {}
	public function shape_combine_region(GdkRegion $shape_region, $offset_x, $offset_y) {}
	public function show() {}
	public function show_unraised() {}
	public function stick() {}
	public function thaw_updates() {}
	public function unfullscreen() {}
	public function unmaximize() {}
	public function unstick() {}
	public function withdraw() {}
}

/**
 * @package Gdk
 */
class GdkDrawable extends GObject {
	const gtype = 158123632;

	public function cairo_create() {}
	public function copy_to_image(GdkImage $image, $src_x, $src_y, $dest_x, $dest_y, $width, $height) {}
	public function draw_arc(GdkGC $gc, $filled, $x, $y, $width, $height, $angle1, $angle2) {}
	public function draw_drawable(GdkGC $gc , GdkDrawable $src, $xsrc, $ysrc, $xdest, $ydest, $width, $height) {}
	public function draw_glyphs(GdkGC $gc , PangoFont $font, $x, $y, PangoGlyphString $glyphs}
	public function draw_gray_image(GdkGC $gc, $x, $y, $width, $height, $dith, $buf, $rowstride) {}
	public function draw_image(GdkGC $gc , GdkImage $image, $xsrc, $ysrc, $xdest, $ydest, $width, $height) {}
	public function draw_layout(GdkGC $gc, $x, $y, PangoLayout $layout}
	public function draw_line(GdkGC $gc, $x1, $y1, $x2, $y2) {}
	public function draw_pixbuf(GdkGC $gc , GdkPixbuf $pixbuf, $src_x, $src_y, $dest_x, $dest_y) {}
	public function draw_point(GdkGC $gc, $x, $y) {}
	public function draw_rectangle(GdkGC $gc, $filled, $x, $y, $width, $height) {}
	public function draw_rgb_32_image() {}
	public function draw_rgb_image() {}
	public function draw_string(GdkFont $font , GdkGC $gc, $x, $y, $string) {}
	public function draw_text(GdkFont $font , GdkGC $gc, $x, $y, $text, $text_length) {}
	public function get_clip_region() {}
	public function get_colormap() {}
	public function get_depth() {}
	public function get_display() {}
	public function get_image($x, $y, $width, $height) {}
	public function get_screen() {}
	public function get_size() {}
	public function get_visible_region() {}
	public function get_visual() {}
	public function image_get($x, $y, $width, $height) {}
	public function set_colormap(GdkColormap $colormap}
}

/**
 * @package Gdk
 */
class GdkDragContext extends GObject {
	const gtype = 158236320;

	public function __construct() {}
	public function drag_abort($time) {}
	public function drag_drop($time) {}
	public function drag_drop_succeeded() {}
	public function drag_get_selection() {}
	public function drag_motion(GdkWindow $dest_window, $protocol, $x_root, $y_root, $suggested_action, $possible_actions, $time) {}
	public function drag_status($action) {}
	public function drop_finish($success) {}
	public function drop_reply($ok) {}
	public function finish($success, $del) {}
	public function get_source_widget() {}
	public function set_icon_default() {}
	public function set_icon_name($icon_name, $hot_x, $hot_y) {}
	public function set_icon_pixbuf(GdkPixbuf $pixbuf, $hot_x, $hot_y) {}
	public function set_icon_pixmap(GdkColormap $colormap , GdkPixmap $pixmap, $mask, $hot_x, $hot_y) {}
	public function set_icon_stock($stock_id, $hot_x, $hot_y) {}
	public function set_icon_widget(GtkWidget $widget, $hot_x, $hot_y) {}
}

/**
 * @package Gdk
 */
class GdkDisplayManager extends GObject {
	const gtype = 158040376;

	static public function get() {}
	public function get_default_display() {}
	public function list_displays() {}
	public function set_default_display(GdkDisplay $display}
}

/**
 * @package Gdk
 */
class GdkDisplay extends GObject {
	const gtype = 158038088;

	public function __construct($display_name) {}
	public function beep() {}
	public function close() {}
	public function flush() {}
	public function get_core_pointer() {}
	static public function get_default() {}
	public function get_default_cursor_size() {}
	public function get_default_group() {}
	public function get_default_screen() {}
	public function get_event() {}
	public function get_maximal_cursor_size() {}
	public function get_n_screens() {}
	public function get_name() {}
	public function get_screen($screen_num) {}
	public function get_window_at_pointer() {}
	public function keyboard_ungrab() {}
	public function list_devices() {}
	static public function open_default_libgtk_only() {}
	public function peek_event() {}
	public function pointer_is_grabbed() {}
	public function pointer_ungrab() {}
	public function put_event(GdkEvent $event}
	public function request_selection_notification($selection) {}
	public function set_double_click_distance($distance) {}
	public function set_double_click_time($msec) {}
	public function supports_clipboard_persistence() {}
	public function supports_composite() {}
	public function supports_cursor_alpha() {}
	public function supports_cursor_color() {}
	public function supports_input_shapes() {}
	public function supports_selection_notification() {}
	public function supports_shapes() {}
	public function sync() {}
	public function warp_pointer(GdkScreen $screen, $x, $y) {}
}

/**
 * @package Gdk
 */
class GdkDevice extends GObject {
	const gtype = 158146784;

	public function get_axis() {}
	static public function get_core_pointer() {}
	public function get_history(GdkWindow $window, $start, $stop) {}
	public function get_state(GdkWindow $window) {}
	static public function list_devices() {}
	public function set_axis_use($index, $use) {}
	public function set_key($index, $keyval, $modifiers) {}
	public function set_mode($mode) {}
	public function set_source($source) {}
}

/**
 * @package Gdk
 */
class GdkColormap extends GObject {
	const gtype = 158110632;

	public function __construct(GdkVisual $visual, $allocate) {}
	public function alloc() {}
	public function alloc_color() {}
	public function black(GdkColor $color}
	public function change($ncolors) {}
	public function free_colors(GdkColor $colors, $ncolors) {}
	public function get_screen() {}
	static public function get_system() {}
	public function get_visual() {}
	public function query_color($allocated) {}
	public function white(GdkColor $color}
}

/**
 * @package Gdk
 */
class Gdk {
	const COLORSPACE_RGB = 0;
	const X_CURSOR = 0;
	const ARROW = 2;
	const BASED_ARROW_DOWN = 4;
	const BASED_ARROW_UP = 6;
	const BOAT = 8;
	const BOGOSITY = 10;
	const BOTTOM_LEFT_CORNER = 12;
	const BOTTOM_RIGHT_CORNER = 14;
	const BOTTOM_SIDE = 16;
	const BOTTOM_TEE = 18;
	const BOX_SPIRAL = 20;
	const CENTER_PTR = 22;
	const CIRCLE = 24;
	const CLOCK = 26;
	const COFFEE_MUG = 28;
	const CROSS = 30;
	const CROSS_REVERSE = 32;
	const CROSSHAIR = 34;
	const DIAMOND_CROSS = 36;
	const DOT = 38;
	const DOTBOX = 40;
	const DOUBLE_ARROW = 42;
	const DRAFT_LARGE = 44;
	const DRAFT_SMALL = 46;
	const DRAPED_BOX = 48;
	const EXCHANGE = 50;
	const FLEUR = 52;
	const GOBBLER = 54;
	const GUMBY = 56;
	const HAND1 = 58;
	const HAND2 = 60;
	const HEART = 62;
	const ICON = 64;
	const IRON_CROSS = 66;
	const LEFT_PTR = 68;
	const LEFT_SIDE = 70;
	const LEFT_TEE = 72;
	const LEFTBUTTON = 74;
	const LL_ANGLE = 76;
	const LR_ANGLE = 78;
	const MAN = 80;
	const MIDDLEBUTTON = 82;
	const MOUSE = 84;
	const PENCIL = 86;
	const PIRATE = 88;
	const PLUS = 90;
	const QUESTION_ARROW = 92;
	const RIGHT_PTR = 94;
	const RIGHT_SIDE = 96;
	const RIGHT_TEE = 98;
	const RIGHTBUTTON = 100;
	const RTL_LOGO = 102;
	const SAILBOAT = 104;
	const SB_DOWN_ARROW = 106;
	const SB_H_DOUBLE_ARROW = 108;
	const SB_LEFT_ARROW = 110;
	const SB_RIGHT_ARROW = 112;
	const SB_UP_ARROW = 114;
	const SB_V_DOUBLE_ARROW = 116;
	const SHUTTLE = 118;
	const SIZING = 120;
	const SPIDER = 122;
	const SPRAYCAN = 124;
	const STAR = 126;
	const TARGET = 128;
	const TCROSS = 130;
	const TOP_LEFT_ARROW = 132;
	const TOP_LEFT_CORNER = 134;
	const TOP_RIGHT_CORNER = 136;
	const TOP_SIDE = 138;
	const TOP_TEE = 140;
	const TREK = 142;
	const UL_ANGLE = 144;
	const UMBRELLA = 146;
	const UR_ANGLE = 148;
	const WATCH = 150;
	const XTERM = 152;
	const LAST_CURSOR = 153;
	const BLANK_CURSOR = -2;
	const CURSOR_IS_PIXMAP = -1;
	const ACTION_DEFAULT = 1;
	const ACTION_COPY = 2;
	const ACTION_MOVE = 4;
	const ACTION_LINK = 8;
	const ACTION_PRIVATE = 16;
	const ACTION_ASK = 32;
	const DRAG_PROTO_MOTIF = 0;
	const DRAG_PROTO_XDND = 1;
	const DRAG_PROTO_ROOTWIN = 2;
	const DRAG_PROTO_NONE = 3;
	const DRAG_PROTO_WIN32_DROPFILES = 4;
	const DRAG_PROTO_OLE2 = 5;
	const DRAG_PROTO_LOCAL = 6;
	const FILTER_CONTINUE = 0;
	const FILTER_TRANSLATE = 1;
	const FILTER_REMOVE = 2;
	const NOTHING = -1;
	const DELETE = 0;
	const DESTROY = 1;
	const EXPOSE = 2;
	const MOTION_NOTIFY = 3;
	const BUTTON_PRESS = 4;
	const _2BUTTON_PRESS = 5;
	const _3BUTTON_PRESS = 6;
	const BUTTON_RELEASE = 7;
	const KEY_PRESS = 8;
	const KEY_RELEASE = 9;
	const ENTER_NOTIFY = 10;
	const LEAVE_NOTIFY = 11;
	const FOCUS_CHANGE = 12;
	const CONFIGURE = 13;
	const MAP = 14;
	const UNMAP = 15;
	const PROPERTY_NOTIFY = 16;
	const SELECTION_CLEAR = 17;
	const SELECTION_REQUEST = 18;
	const SELECTION_NOTIFY = 19;
	const PROXIMITY_IN = 20;
	const PROXIMITY_OUT = 21;
	const DRAG_ENTER = 22;
	const DRAG_LEAVE = 23;
	const DRAG_MOTION = 24;
	const DRAG_STATUS = 25;
	const DROP_START = 26;
	const DROP_FINISHED = 27;
	const CLIENT_EVENT = 28;
	const VISIBILITY_NOTIFY = 29;
	const NO_EXPOSE = 30;
	const SCROLL = 31;
	const WINDOW_STATE = 32;
	const SETTING = 33;
	const OWNER_CHANGE = 34;
	const GRAB_BROKEN = 35;
	const DAMAGE = 36;
	const EVENT_LAST = 37;
	const EXPOSURE_MASK = 2;
	const POINTER_MOTION_MASK = 4;
	const POINTER_MOTION_HINT_MASK = 8;
	const BUTTON_MOTION_MASK = 16;
	const BUTTON1_MOTION_MASK = 32;
	const BUTTON2_MOTION_MASK = 64;
	const BUTTON3_MOTION_MASK = 128;
	const BUTTON_PRESS_MASK = 256;
	const BUTTON_RELEASE_MASK = 512;
	const KEY_PRESS_MASK = 1024;
	const KEY_RELEASE_MASK = 2048;
	const ENTER_NOTIFY_MASK = 4096;
	const LEAVE_NOTIFY_MASK = 8192;
	const FOCUS_CHANGE_MASK = 16384;
	const STRUCTURE_MASK = 32768;
	const PROPERTY_CHANGE_MASK = 65536;
	const VISIBILITY_NOTIFY_MASK = 131072;
	const PROXIMITY_IN_MASK = 262144;
	const PROXIMITY_OUT_MASK = 524288;
	const SUBSTRUCTURE_MASK = 1048576;
	const SCROLL_MASK = 2097152;
	const ALL_EVENTS_MASK = 4194302;
	const VISIBILITY_UNOBSCURED = 0;
	const VISIBILITY_PARTIAL = 1;
	const VISIBILITY_FULLY_OBSCURED = 2;
	const SCROLL_UP = 0;
	const SCROLL_DOWN = 1;
	const SCROLL_LEFT = 2;
	const SCROLL_RIGHT = 3;
	const NOTIFY_ANCESTOR = 0;
	const NOTIFY_VIRTUAL = 1;
	const NOTIFY_INFERIOR = 2;
	const NOTIFY_NONLINEAR = 3;
	const NOTIFY_NONLINEAR_VIRTUAL = 4;
	const NOTIFY_UNKNOWN = 5;
	const CROSSING_NORMAL = 0;
	const CROSSING_GRAB = 1;
	const CROSSING_UNGRAB = 2;
	const CROSSING_GTK_GRAB = 3;
	const CROSSING_GTK_UNGRAB = 4;
	const CROSSING_STATE_CHANGED = 5;
	const PROPERTY_NEW_VALUE = 0;
	const PROPERTY_DELETE = 1;
	const WINDOW_STATE_WITHDRAWN = 1;
	const WINDOW_STATE_ICONIFIED = 2;
	const WINDOW_STATE_MAXIMIZED = 4;
	const WINDOW_STATE_STICKY = 8;
	const WINDOW_STATE_FULLSCREEN = 16;
	const WINDOW_STATE_ABOVE = 32;
	const WINDOW_STATE_BELOW = 64;
	const SETTING_ACTION_NEW = 0;
	const SETTING_ACTION_CHANGED = 1;
	const SETTING_ACTION_DELETED = 2;
	const FONT_FONT = 0;
	const FONT_FONTSET = 1;
	const CAP_NOT_LAST = 0;
	const CAP_BUTT = 1;
	const CAP_ROUND = 2;
	const CAP_PROJECTING = 3;
	const SOLID = 0;
	const TILED = 1;
	const STIPPLED = 2;
	const OPAQUE_STIPPLED = 3;
	const COPY = 0;
	const INVERT = 1;
	const XOR_BLIT = 2;
	const CLEAR = 3;
	const AND_BLIT = 4;
	const AND_REVERSE = 5;
	const AND_INVERT = 6;
	const NOOP = 7;
	const OR_BLIT = 8;
	const EQUIV = 9;
	const OR_REVERSE = 10;
	const COPY_INVERT = 11;
	const OR_INVERT = 12;
	const NAND = 13;
	const NOR = 14;
	const SET = 15;
	const JOIN_MITER = 0;
	const JOIN_ROUND = 1;
	const JOIN_BEVEL = 2;
	const LINE_SOLID = 0;
	const LINE_ON_OFF_DASH = 1;
	const LINE_DOUBLE_DASH = 2;
	const CLIP_BY_CHILDREN = 0;
	const INCLUDE_INFERIORS = 1;
	const GC_FOREGROUND = 1;
	const GC_BACKGROUND = 2;
	const GC_FONT = 4;
	const GC_FUNCTION = 8;
	const GC_FILL = 16;
	const GC_TILE = 32;
	const GC_STIPPLE = 64;
	const GC_CLIP_MASK = 128;
	const GC_SUBWINDOW = 256;
	const GC_TS_X_ORIGIN = 512;
	const GC_TS_Y_ORIGIN = 1024;
	const GC_CLIP_X_ORIGIN = 2048;
	const GC_CLIP_Y_ORIGIN = 4096;
	const GC_EXPOSURES = 8192;
	const GC_LINE_WIDTH = 16384;
	const GC_LINE_STYLE = 32768;
	const GC_CAP_STYLE = 65536;
	const GC_JOIN_STYLE = 131072;
	const IMAGE_NORMAL = 0;
	const IMAGE_SHARED = 1;
	const IMAGE_FASTEST = 2;
	const EXTENSION_EVENTS_NONE = 0;
	const EXTENSION_EVENTS_ALL = 1;
	const EXTENSION_EVENTS_CURSOR = 2;
	const SOURCE_MOUSE = 0;
	const SOURCE_PEN = 1;
	const SOURCE_ERASER = 2;
	const SOURCE_CURSOR = 3;
	const MODE_DISABLED = 0;
	const MODE_SCREEN = 1;
	const MODE_WINDOW = 2;
	const AXIS_IGNORE = 0;
	const AXIS_X = 1;
	const AXIS_Y = 2;
	const AXIS_PRESSURE = 3;
	const AXIS_XTILT = 4;
	const AXIS_YTILT = 5;
	const AXIS_WHEEL = 6;
	const AXIS_LAST = 7;
	const PROP_MODE_REPLACE = 0;
	const PROP_MODE_PREPEND = 1;
	const PROP_MODE_APPEND = 2;
	const EVEN_ODD_RULE = 0;
	const WINDING_RULE = 1;
	const OVERLAP_RECTANGLE_IN = 0;
	const OVERLAP_RECTANGLE_OUT = 1;
	const OVERLAP_RECTANGLE_PART = 2;
	const RGB_DITHER_NONE = 0;
	const RGB_DITHER_NORMAL = 1;
	const RGB_DITHER_MAX = 2;
	const LSB_FIRST = 0;
	const MSB_FIRST = 1;
	const SHIFT_MASK = 1;
	const LOCK_MASK = 2;
	const CONTROL_MASK = 4;
	const MOD1_MASK = 8;
	const MOD2_MASK = 16;
	const MOD3_MASK = 32;
	const MOD4_MASK = 64;
	const MOD5_MASK = 128;
	const BUTTON1_MASK = 256;
	const BUTTON2_MASK = 512;
	const BUTTON3_MASK = 1024;
	const BUTTON4_MASK = 2048;
	const BUTTON5_MASK = 4096;
	const SUPER_MASK = 67108864;
	const HYPER_MASK = 134217728;
	const META_MASK = 268435456;
	const RELEASE_MASK = 1073741824;
	const MODIFIER_MASK = 1543512063;
	const INPUT_READ = 1;
	const INPUT_WRITE = 2;
	const INPUT_EXCEPTION = 4;
	const OK = 0;
	const ERROR = -1;
	const ERROR_PARAM = -2;
	const ERROR_FILE = -3;
	const ERROR_MEM = -4;
	const GRAB_SUCCESS = 0;
	const GRAB_ALREADY_GRABBED = 1;
	const GRAB_INVALID_TIME = 2;
	const GRAB_NOT_VIEWABLE = 3;
	const GRAB_FROZEN = 4;
	const VISUAL_STATIC_GRAY = 0;
	const VISUAL_GRAYSCALE = 1;
	const VISUAL_STATIC_COLOR = 2;
	const VISUAL_PSEUDO_COLOR = 3;
	const VISUAL_TRUE_COLOR = 4;
	const VISUAL_DIRECT_COLOR = 5;
	const INPUT_OUTPUT = 0;
	const INPUT_ONLY = 1;
	const WINDOW_ROOT = 0;
	const WINDOW_TOPLEVEL = 1;
	const WINDOW_CHILD = 2;
	const WINDOW_DIALOG = 3;
	const WINDOW_TEMP = 4;
	const WINDOW_FOREIGN = 5;
	const WINDOW_OFFSCREEN = 6;
	const WA_TITLE = 2;
	const WA_X = 4;
	const WA_Y = 8;
	const WA_CURSOR = 16;
	const WA_COLORMAP = 32;
	const WA_VISUAL = 64;
	const WA_WMCLASS = 128;
	const WA_NOREDIR = 256;
	const WA_TYPE_HINT = 512;
	const HINT_POS = 1;
	const HINT_MIN_SIZE = 2;
	const HINT_MAX_SIZE = 4;
	const HINT_BASE_SIZE = 8;
	const HINT_ASPECT = 16;
	const HINT_RESIZE_INC = 32;
	const HINT_WIN_GRAVITY = 64;
	const HINT_USER_POS = 128;
	const HINT_USER_SIZE = 256;
	const WINDOW_TYPE_HINT_NORMAL = 0;
	const WINDOW_TYPE_HINT_DIALOG = 1;
	const WINDOW_TYPE_HINT_MENU = 2;
	const WINDOW_TYPE_HINT_TOOLBAR = 3;
	const WINDOW_TYPE_HINT_SPLASHSCREEN = 4;
	const WINDOW_TYPE_HINT_UTILITY = 5;
	const WINDOW_TYPE_HINT_DOCK = 6;
	const WINDOW_TYPE_HINT_DESKTOP = 7;
	const WINDOW_TYPE_HINT_DROPDOWN_MENU = 8;
	const WINDOW_TYPE_HINT_POPUP_MENU = 9;
	const WINDOW_TYPE_HINT_TOOLTIP = 10;
	const WINDOW_TYPE_HINT_NOTIFICATION = 11;
	const WINDOW_TYPE_HINT_COMBO = 12;
	const WINDOW_TYPE_HINT_DND = 13;
	const DECOR_ALL = 1;
	const DECOR_BORDER = 2;
	const DECOR_RESIZEH = 4;
	const DECOR_TITLE = 8;
	const DECOR_MENU = 16;
	const DECOR_MINIMIZE = 32;
	const DECOR_MAXIMIZE = 64;
	const FUNC_ALL = 1;
	const FUNC_RESIZE = 2;
	const FUNC_MOVE = 4;
	const FUNC_MINIMIZE = 8;
	const FUNC_MAXIMIZE = 16;
	const FUNC_CLOSE = 32;
	const GRAVITY_NORTH_WEST = 1;
	const GRAVITY_NORTH = 2;
	const GRAVITY_NORTH_EAST = 3;
	const GRAVITY_WEST = 4;
	const GRAVITY_CENTER = 5;
	const GRAVITY_EAST = 6;
	const GRAVITY_SOUTH_WEST = 7;
	const GRAVITY_SOUTH = 8;
	const GRAVITY_SOUTH_EAST = 9;
	const GRAVITY_STATIC = 10;
	const WINDOW_EDGE_NORTH_WEST = 0;
	const WINDOW_EDGE_NORTH = 1;
	const WINDOW_EDGE_NORTH_EAST = 2;
	const WINDOW_EDGE_WEST = 3;
	const WINDOW_EDGE_EAST = 4;
	const WINDOW_EDGE_SOUTH_WEST = 5;
	const WINDOW_EDGE_SOUTH = 6;
	const WINDOW_EDGE_SOUTH_EAST = 7;
	const PIXBUF_ALPHA_BILEVEL = 0;
	const PIXBUF_ALPHA_FULL = 1;
	const PIXBUF_ERROR_CORRUPT_IMAGE = 0;
	const PIXBUF_ERROR_INSUFFICIENT_MEMORY = 1;
	const PIXBUF_ERROR_BAD_OPTION = 2;
	const PIXBUF_ERROR_UNKNOWN_TYPE = 3;
	const PIXBUF_ERROR_UNSUPPORTED_OPERATION = 4;
	const PIXBUF_ERROR_FAILED = 5;
	const PIXBUF_ROTATE_NONE = 0;
	const PIXBUF_ROTATE_COUNTERCLOCKWISE = 90;
	const PIXBUF_ROTATE_UPSIDEDOWN = 180;
	const PIXBUF_ROTATE_CLOCKWISE = 270;
	const INTERP_NEAREST = 0;
	const INTERP_TILES = 1;
	const INTERP_BILINEAR = 2;
	const INTERP_HYPER = 3;
	const OWNER_CHANGE_NEW_OWNER = 0;
	const OWNER_CHANGE_DESTROY = 1;
	const OWNER_CHANGE_CLOSE = 2;
	const KEY_VoidSymbol = 16777215;
	const KEY_BackSpace = 65288;
	const KEY_Tab = 65289;
	const KEY_Linefeed = 65290;
	const KEY_Clear = 65291;
	const KEY_Return = 65293;
	const KEY_Pause = 65299;
	const KEY_Scroll_Lock = 65300;
	const KEY_Sys_Req = 65301;
	const KEY_Escape = 65307;
	const KEY_Delete = 65535;
	const KEY_Multi_key = 65312;
	const KEY_Codeinput = 65335;
	const KEY_SingleCandidate = 65340;
	const KEY_MultipleCandidate = 65341;
	const KEY_PreviousCandidate = 65342;
	const KEY_Kanji = 65313;
	const KEY_Muhenkan = 65314;
	const KEY_Henkan_Mode = 65315;
	const KEY_Henkan = 65315;
	const KEY_Romaji = 65316;
	const KEY_Hiragana = 65317;
	const KEY_Katakana = 65318;
	const KEY_Hiragana_Katakana = 65319;
	const KEY_Zenkaku = 65320;
	const KEY_Hankaku = 65321;
	const KEY_Zenkaku_Hankaku = 65322;
	const KEY_Touroku = 65323;
	const KEY_Massyo = 65324;
	const KEY_Kana_Lock = 65325;
	const KEY_Kana_Shift = 65326;
	const KEY_Eisu_Shift = 65327;
	const KEY_Eisu_toggle = 65328;
	const KEY_Kanji_Bangou = 65335;
	const KEY_Zen_Koho = 65341;
	const KEY_Mae_Koho = 65342;
	const KEY_Home = 65360;
	const KEY_Left = 65361;
	const KEY_Up = 65362;
	const KEY_Right = 65363;
	const KEY_Down = 65364;
	const KEY_Prior = 65365;
	const KEY_Page_Up = 65365;
	const KEY_Next = 65366;
	const KEY_Page_Down = 65366;
	const KEY_End = 65367;
	const KEY_Begin = 65368;
	const KEY_Select = 65376;
	const KEY_Print = 65377;
	const KEY_Execute = 65378;
	const KEY_Insert = 65379;
	const KEY_Undo = 65381;
	const KEY_Redo = 65382;
	const KEY_Menu = 65383;
	const KEY_Find = 65384;
	const KEY_Cancel = 65385;
	const KEY_Help = 65386;
	const KEY_Break = 65387;
	const KEY_Mode_switch = 65406;
	const KEY_script_switch = 65406;
	const KEY_Num_Lock = 65407;
	const KEY_KP_Space = 65408;
	const KEY_KP_Tab = 65417;
	const KEY_KP_Enter = 65421;
	const KEY_KP_F1 = 65425;
	const KEY_KP_F2 = 65426;
	const KEY_KP_F3 = 65427;
	const KEY_KP_F4 = 65428;
	const KEY_KP_Home = 65429;
	const KEY_KP_Left = 65430;
	const KEY_KP_Up = 65431;
	const KEY_KP_Right = 65432;
	const KEY_KP_Down = 65433;
	const KEY_KP_Prior = 65434;
	const KEY_KP_Page_Up = 65434;
	const KEY_KP_Next = 65435;
	const KEY_KP_Page_Down = 65435;
	const KEY_KP_End = 65436;
	const KEY_KP_Begin = 65437;
	const KEY_KP_Insert = 65438;
	const KEY_KP_Delete = 65439;
	const KEY_KP_Equal = 65469;
	const KEY_KP_Multiply = 65450;
	const KEY_KP_Add = 65451;
	const KEY_KP_Separator = 65452;
	const KEY_KP_Subtract = 65453;
	const KEY_KP_Decimal = 65454;
	const KEY_KP_Divide = 65455;
	const KEY_KP_0 = 65456;
	const KEY_KP_1 = 65457;
	const KEY_KP_2 = 65458;
	const KEY_KP_3 = 65459;
	const KEY_KP_4 = 65460;
	const KEY_KP_5 = 65461;
	const KEY_KP_6 = 65462;
	const KEY_KP_7 = 65463;
	const KEY_KP_8 = 65464;
	const KEY_KP_9 = 65465;
	const KEY_F1 = 65470;
	const KEY_F2 = 65471;
	const KEY_F3 = 65472;
	const KEY_F4 = 65473;
	const KEY_F5 = 65474;
	const KEY_F6 = 65475;
	const KEY_F7 = 65476;
	const KEY_F8 = 65477;
	const KEY_F9 = 65478;
	const KEY_F10 = 65479;
	const KEY_F11 = 65480;
	const KEY_L1 = 65480;
	const KEY_F12 = 65481;
	const KEY_L2 = 65481;
	const KEY_F13 = 65482;
	const KEY_L3 = 65482;
	const KEY_F14 = 65483;
	const KEY_L4 = 65483;
	const KEY_F15 = 65484;
	const KEY_L5 = 65484;
	const KEY_F16 = 65485;
	const KEY_L6 = 65485;
	const KEY_F17 = 65486;
	const KEY_L7 = 65486;
	const KEY_F18 = 65487;
	const KEY_L8 = 65487;
	const KEY_F19 = 65488;
	const KEY_L9 = 65488;
	const KEY_F20 = 65489;
	const KEY_L10 = 65489;
	const KEY_F21 = 65490;
	const KEY_R1 = 65490;
	const KEY_F22 = 65491;
	const KEY_R2 = 65491;
	const KEY_F23 = 65492;
	const KEY_R3 = 65492;
	const KEY_F24 = 65493;
	const KEY_R4 = 65493;
	const KEY_F25 = 65494;
	const KEY_R5 = 65494;
	const KEY_F26 = 65495;
	const KEY_R6 = 65495;
	const KEY_F27 = 65496;
	const KEY_R7 = 65496;
	const KEY_F28 = 65497;
	const KEY_R8 = 65497;
	const KEY_F29 = 65498;
	const KEY_R9 = 65498;
	const KEY_F30 = 65499;
	const KEY_R10 = 65499;
	const KEY_F31 = 65500;
	const KEY_R11 = 65500;
	const KEY_F32 = 65501;
	const KEY_R12 = 65501;
	const KEY_F33 = 65502;
	const KEY_R13 = 65502;
	const KEY_F34 = 65503;
	const KEY_R14 = 65503;
	const KEY_F35 = 65504;
	const KEY_R15 = 65504;
	const KEY_Shift_L = 65505;
	const KEY_Shift_R = 65506;
	const KEY_Control_L = 65507;
	const KEY_Control_R = 65508;
	const KEY_Caps_Lock = 65509;
	const KEY_Shift_Lock = 65510;
	const KEY_Meta_L = 65511;
	const KEY_Meta_R = 65512;
	const KEY_Alt_L = 65513;
	const KEY_Alt_R = 65514;
	const KEY_Super_L = 65515;
	const KEY_Super_R = 65516;
	const KEY_Hyper_L = 65517;
	const KEY_Hyper_R = 65518;
	const KEY_ISO_Lock = 65025;
	const KEY_ISO_Level2_Latch = 65026;
	const KEY_ISO_Level3_Shift = 65027;
	const KEY_ISO_Level3_Latch = 65028;
	const KEY_ISO_Level3_Lock = 65029;
	const KEY_ISO_Group_Shift = 65406;
	const KEY_ISO_Group_Latch = 65030;
	const KEY_ISO_Group_Lock = 65031;
	const KEY_ISO_Next_Group = 65032;
	const KEY_ISO_Next_Group_Lock = 65033;
	const KEY_ISO_Prev_Group = 65034;
	const KEY_ISO_Prev_Group_Lock = 65035;
	const KEY_ISO_First_Group = 65036;
	const KEY_ISO_First_Group_Lock = 65037;
	const KEY_ISO_Last_Group = 65038;
	const KEY_ISO_Last_Group_Lock = 65039;
	const KEY_ISO_Left_Tab = 65056;
	const KEY_ISO_Move_Line_Up = 65057;
	const KEY_ISO_Move_Line_Down = 65058;
	const KEY_ISO_Partial_Line_Up = 65059;
	const KEY_ISO_Partial_Line_Down = 65060;
	const KEY_ISO_Partial_Space_Left = 65061;
	const KEY_ISO_Partial_Space_Right = 65062;
	const KEY_ISO_Set_Margin_Left = 65063;
	const KEY_ISO_Set_Margin_Right = 65064;
	const KEY_ISO_Release_Margin_Left = 65065;
	const KEY_ISO_Release_Margin_Right = 65066;
	const KEY_ISO_Release_Both_Margins = 65067;
	const KEY_ISO_Fast_Cursor_Left = 65068;
	const KEY_ISO_Fast_Cursor_Right = 65069;
	const KEY_ISO_Fast_Cursor_Up = 65070;
	const KEY_ISO_Fast_Cursor_Down = 65071;
	const KEY_ISO_Continuous_Underline = 65072;
	const KEY_ISO_Discontinuous_Underline = 65073;
	const KEY_ISO_Emphasize = 65074;
	const KEY_ISO_Center_Object = 65075;
	const KEY_ISO_Enter = 65076;
	const KEY_dead_grave = 65104;
	const KEY_dead_acute = 65105;
	const KEY_dead_circumflex = 65106;
	const KEY_dead_tilde = 65107;
	const KEY_dead_macron = 65108;
	const KEY_dead_breve = 65109;
	const KEY_dead_abovedot = 65110;
	const KEY_dead_diaeresis = 65111;
	const KEY_dead_abovering = 65112;
	const KEY_dead_doubleacute = 65113;
	const KEY_dead_caron = 65114;
	const KEY_dead_cedilla = 65115;
	const KEY_dead_ogonek = 65116;
	const KEY_dead_iota = 65117;
	const KEY_dead_voiced_sound = 65118;
	const KEY_dead_semivoiced_sound = 65119;
	const KEY_dead_belowdot = 65120;
	const KEY_dead_hook = 65121;
	const KEY_dead_horn = 65122;
	const KEY_First_Virtual_Screen = 65232;
	const KEY_Prev_Virtual_Screen = 65233;
	const KEY_Next_Virtual_Screen = 65234;
	const KEY_Last_Virtual_Screen = 65236;
	const KEY_Terminate_Server = 65237;
	const KEY_AccessX_Enable = 65136;
	const KEY_AccessX_Feedback_Enable = 65137;
	const KEY_RepeatKeys_Enable = 65138;
	const KEY_SlowKeys_Enable = 65139;
	const KEY_BounceKeys_Enable = 65140;
	const KEY_StickyKeys_Enable = 65141;
	const KEY_MouseKeys_Enable = 65142;
	const KEY_MouseKeys_Accel_Enable = 65143;
	const KEY_Overlay1_Enable = 65144;
	const KEY_Overlay2_Enable = 65145;
	const KEY_AudibleBell_Enable = 65146;
	const KEY_Pointer_Left = 65248;
	const KEY_Pointer_Right = 65249;
	const KEY_Pointer_Up = 65250;
	const KEY_Pointer_Down = 65251;
	const KEY_Pointer_UpLeft = 65252;
	const KEY_Pointer_UpRight = 65253;
	const KEY_Pointer_DownLeft = 65254;
	const KEY_Pointer_DownRight = 65255;
	const KEY_Pointer_Button_Dflt = 65256;
	const KEY_Pointer_Button1 = 65257;
	const KEY_Pointer_Button2 = 65258;
	const KEY_Pointer_Button3 = 65259;
	const KEY_Pointer_Button4 = 65260;
	const KEY_Pointer_Button5 = 65261;
	const KEY_Pointer_DblClick_Dflt = 65262;
	const KEY_Pointer_DblClick1 = 65263;
	const KEY_Pointer_DblClick2 = 65264;
	const KEY_Pointer_DblClick3 = 65265;
	const KEY_Pointer_DblClick4 = 65266;
	const KEY_Pointer_DblClick5 = 65267;
	const KEY_Pointer_Drag_Dflt = 65268;
	const KEY_Pointer_Drag1 = 65269;
	const KEY_Pointer_Drag2 = 65270;
	const KEY_Pointer_Drag3 = 65271;
	const KEY_Pointer_Drag4 = 65272;
	const KEY_Pointer_Drag5 = 65277;
	const KEY_Pointer_EnableKeys = 65273;
	const KEY_Pointer_Accelerate = 65274;
	const KEY_Pointer_DfltBtnNext = 65275;
	const KEY_Pointer_DfltBtnPrev = 65276;
	const KEY_3270_Duplicate = 64769;
	const KEY_3270_FieldMark = 64770;
	const KEY_3270_Right2 = 64771;
	const KEY_3270_Left2 = 64772;
	const KEY_3270_BackTab = 64773;
	const KEY_3270_EraseEOF = 64774;
	const KEY_3270_EraseInput = 64775;
	const KEY_3270_Reset = 64776;
	const KEY_3270_Quit = 64777;
	const KEY_3270_PA1 = 64778;
	const KEY_3270_PA2 = 64779;
	const KEY_3270_PA3 = 64780;
	const KEY_3270_Test = 64781;
	const KEY_3270_Attn = 64782;
	const KEY_3270_CursorBlink = 64783;
	const KEY_3270_AltCursor = 64784;
	const KEY_3270_KeyClick = 64785;
	const KEY_3270_Jump = 64786;
	const KEY_3270_Ident = 64787;
	const KEY_3270_Rule = 64788;
	const KEY_3270_Copy = 64789;
	const KEY_3270_Play = 64790;
	const KEY_3270_Setup = 64791;
	const KEY_3270_Record = 64792;
	const KEY_3270_ChangeScreen = 64793;
	const KEY_3270_DeleteWord = 64794;
	const KEY_3270_ExSelect = 64795;
	const KEY_3270_CursorSelect = 64796;
	const KEY_3270_PrintScreen = 64797;
	const KEY_3270_Enter = 64798;
	const KEY_space = 32;
	const KEY_exclam = 33;
	const KEY_quotedbl = 34;
	const KEY_numbersign = 35;
	const KEY_dollar = 36;
	const KEY_percent = 37;
	const KEY_ampersand = 38;
	const KEY_apostrophe = 39;
	const KEY_quoteright = 39;
	const KEY_parenleft = 40;
	const KEY_parenright = 41;
	const KEY_asterisk = 42;
	const KEY_plus = 43;
	const KEY_comma = 44;
	const KEY_minus = 45;
	const KEY_period = 46;
	const KEY_slash = 47;
	const KEY_0 = 48;
	const KEY_1 = 49;
	const KEY_2 = 50;
	const KEY_3 = 51;
	const KEY_4 = 52;
	const KEY_5 = 53;
	const KEY_6 = 54;
	const KEY_7 = 55;
	const KEY_8 = 56;
	const KEY_9 = 57;
	const KEY_colon = 58;
	const KEY_semicolon = 59;
	const KEY_less = 60;
	const KEY_equal = 61;
	const KEY_greater = 62;
	const KEY_question = 63;
	const KEY_at = 64;
	const KEY_A = 65;
	const KEY_B = 66;
	const KEY_C = 67;
	const KEY_D = 68;
	const KEY_E = 69;
	const KEY_F = 70;
	const KEY_G = 71;
	const KEY_H = 72;
	const KEY_I = 73;
	const KEY_J = 74;
	const KEY_K = 75;
	const KEY_L = 76;
	const KEY_M = 77;
	const KEY_N = 78;
	const KEY_O = 79;
	const KEY_P = 80;
	const KEY_Q = 81;
	const KEY_R = 82;
	const KEY_S = 83;
	const KEY_T = 84;
	const KEY_U = 85;
	const KEY_V = 86;
	const KEY_W = 87;
	const KEY_X = 88;
	const KEY_Y = 89;
	const KEY_Z = 90;
	const KEY_bracketleft = 91;
	const KEY_backslash = 92;
	const KEY_bracketright = 93;
	const KEY_asciicircum = 94;
	const KEY_underscore = 95;
	const KEY_grave = 96;
	const KEY_quoteleft = 96;
	const KEY_a = 97;
	const KEY_b = 98;
	const KEY_c = 99;
	const KEY_d = 100;
	const KEY_e = 101;
	const KEY_f = 102;
	const KEY_g = 103;
	const KEY_h = 104;
	const KEY_i = 105;
	const KEY_j = 106;
	const KEY_k = 107;
	const KEY_l = 108;
	const KEY_m = 109;
	const KEY_n = 110;
	const KEY_o = 111;
	const KEY_p = 112;
	const KEY_q = 113;
	const KEY_r = 114;
	const KEY_s = 115;
	const KEY_t = 116;
	const KEY_u = 117;
	const KEY_v = 118;
	const KEY_w = 119;
	const KEY_x = 120;
	const KEY_y = 121;
	const KEY_z = 122;
	const KEY_braceleft = 123;
	const KEY_bar = 124;
	const KEY_braceright = 125;
	const KEY_asciitilde = 126;
	const KEY_nobreakspace = 160;
	const KEY_exclamdown = 161;
	const KEY_cent = 162;
	const KEY_sterling = 163;
	const KEY_currency = 164;
	const KEY_yen = 165;
	const KEY_brokenbar = 166;
	const KEY_section = 167;
	const KEY_diaeresis = 168;
	const KEY_copyright = 169;
	const KEY_ordfeminine = 170;
	const KEY_guillemotleft = 171;
	const KEY_notsign = 172;
	const KEY_hyphen = 173;
	const KEY_registered = 174;
	const KEY_macron = 175;
	const KEY_degree = 176;
	const KEY_plusminus = 177;
	const KEY_twosuperior = 178;
	const KEY_threesuperior = 179;
	const KEY_acute = 180;
	const KEY_mu = 181;
	const KEY_paragraph = 182;
	const KEY_periodcentered = 183;
	const KEY_cedilla = 184;
	const KEY_onesuperior = 185;
	const KEY_masculine = 186;
	const KEY_guillemotright = 187;
	const KEY_onequarter = 188;
	const KEY_onehalf = 189;
	const KEY_threequarters = 190;
	const KEY_questiondown = 191;
	const KEY_Agrave = 192;
	const KEY_Aacute = 193;
	const KEY_Acircumflex = 194;
	const KEY_Atilde = 195;
	const KEY_Adiaeresis = 196;
	const KEY_Aring = 197;
	const KEY_AE = 198;
	const KEY_Ccedilla = 199;
	const KEY_Egrave = 200;
	const KEY_Eacute = 201;
	const KEY_Ecircumflex = 202;
	const KEY_Ediaeresis = 203;
	const KEY_Igrave = 204;
	const KEY_Iacute = 205;
	const KEY_Icircumflex = 206;
	const KEY_Idiaeresis = 207;
	const KEY_Eth = 208;
	const KEY_Ntilde = 209;
	const KEY_Ograve = 210;
	const KEY_Oacute = 211;
	const KEY_Ocircumflex = 212;
	const KEY_Otilde = 213;
	const KEY_Odiaeresis = 214;
	const KEY_multiply = 215;
	const KEY_Ooblique = 216;
	const KEY_Ugrave = 217;
	const KEY_Uacute = 218;
	const KEY_Ucircumflex = 219;
	const KEY_Udiaeresis = 220;
	const KEY_Yacute = 221;
	const KEY_Thorn = 222;
	const KEY_ssharp = 223;
	const KEY_agrave = 224;
	const KEY_aacute = 225;
	const KEY_acircumflex = 226;
	const KEY_atilde = 227;
	const KEY_adiaeresis = 228;
	const KEY_aring = 229;
	const KEY_ae = 230;
	const KEY_ccedilla = 231;
	const KEY_egrave = 232;
	const KEY_eacute = 233;
	const KEY_ecircumflex = 234;
	const KEY_ediaeresis = 235;
	const KEY_igrave = 236;
	const KEY_iacute = 237;
	const KEY_icircumflex = 238;
	const KEY_idiaeresis = 239;
	const KEY_eth = 240;
	const KEY_ntilde = 241;
	const KEY_ograve = 242;
	const KEY_oacute = 243;
	const KEY_ocircumflex = 244;
	const KEY_otilde = 245;
	const KEY_odiaeresis = 246;
	const KEY_division = 247;
	const KEY_oslash = 248;
	const KEY_ugrave = 249;
	const KEY_uacute = 250;
	const KEY_ucircumflex = 251;
	const KEY_udiaeresis = 252;
	const KEY_yacute = 253;
	const KEY_thorn = 254;
	const KEY_ydiaeresis = 255;
	const KEY_Aogonek = 417;
	const KEY_breve = 418;
	const KEY_Lstroke = 419;
	const KEY_Lcaron = 421;
	const KEY_Sacute = 422;
	const KEY_Scaron = 425;
	const KEY_Scedilla = 426;
	const KEY_Tcaron = 427;
	const KEY_Zacute = 428;
	const KEY_Zcaron = 430;
	const KEY_Zabovedot = 431;
	const KEY_aogonek = 433;
	const KEY_ogonek = 434;
	const KEY_lstroke = 435;
	const KEY_lcaron = 437;
	const KEY_sacute = 438;
	const KEY_caron = 439;
	const KEY_scaron = 441;
	const KEY_scedilla = 442;
	const KEY_tcaron = 443;
	const KEY_zacute = 444;
	const KEY_doubleacute = 445;
	const KEY_zcaron = 446;
	const KEY_zabovedot = 447;
	const KEY_Racute = 448;
	const KEY_Abreve = 451;
	const KEY_Lacute = 453;
	const KEY_Cacute = 454;
	const KEY_Ccaron = 456;
	const KEY_Eogonek = 458;
	const KEY_Ecaron = 460;
	const KEY_Dcaron = 463;
	const KEY_Dstroke = 464;
	const KEY_Nacute = 465;
	const KEY_Ncaron = 466;
	const KEY_Odoubleacute = 469;
	const KEY_Rcaron = 472;
	const KEY_Uring = 473;
	const KEY_Udoubleacute = 475;
	const KEY_Tcedilla = 478;
	const KEY_racute = 480;
	const KEY_abreve = 483;
	const KEY_lacute = 485;
	const KEY_cacute = 486;
	const KEY_ccaron = 488;
	const KEY_eogonek = 490;
	const KEY_ecaron = 492;
	const KEY_dcaron = 495;
	const KEY_dstroke = 496;
	const KEY_nacute = 497;
	const KEY_ncaron = 498;
	const KEY_odoubleacute = 501;
	const KEY_udoubleacute = 507;
	const KEY_rcaron = 504;
	const KEY_uring = 505;
	const KEY_tcedilla = 510;
	const KEY_abovedot = 511;
	const KEY_Hstroke = 673;
	const KEY_Hcircumflex = 678;
	const KEY_Iabovedot = 681;
	const KEY_Gbreve = 683;
	const KEY_Jcircumflex = 684;
	const KEY_hstroke = 689;
	const KEY_hcircumflex = 694;
	const KEY_idotless = 697;
	const KEY_gbreve = 699;
	const KEY_jcircumflex = 700;
	const KEY_Cabovedot = 709;
	const KEY_Ccircumflex = 710;
	const KEY_Gabovedot = 725;
	const KEY_Gcircumflex = 728;
	const KEY_Ubreve = 733;
	const KEY_Scircumflex = 734;
	const KEY_cabovedot = 741;
	const KEY_ccircumflex = 742;
	const KEY_gabovedot = 757;
	const KEY_gcircumflex = 760;
	const KEY_ubreve = 765;
	const KEY_scircumflex = 766;
	const KEY_kra = 930;
	const KEY_kappa = 930;
	const KEY_Rcedilla = 931;
	const KEY_Itilde = 933;
	const KEY_Lcedilla = 934;
	const KEY_Emacron = 938;
	const KEY_Gcedilla = 939;
	const KEY_Tslash = 940;
	const KEY_rcedilla = 947;
	const KEY_itilde = 949;
	const KEY_lcedilla = 950;
	const KEY_emacron = 954;
	const KEY_gcedilla = 955;
	const KEY_tslash = 956;
	const KEY_Eng = 957;
	const KEY_eng = 959;
	const KEY_Amacron = 960;
	const KEY_Iogonek = 967;
	const KEY_Eabovedot = 972;
	const KEY_Imacron = 975;
	const KEY_Ncedilla = 977;
	const KEY_Omacron = 978;
	const KEY_Kcedilla = 979;
	const KEY_Uogonek = 985;
	const KEY_Utilde = 989;
	const KEY_Umacron = 990;
	const KEY_amacron = 992;
	const KEY_iogonek = 999;
	const KEY_eabovedot = 1004;
	const KEY_imacron = 1007;
	const KEY_ncedilla = 1009;
	const KEY_omacron = 1010;
	const KEY_kcedilla = 1011;
	const KEY_uogonek = 1017;
	const KEY_utilde = 1021;
	const KEY_umacron = 1022;
	const KEY_OE = 5052;
	const KEY_oe = 5053;
	const KEY_Ydiaeresis = 5054;
	const KEY_overline = 1150;
	const KEY_kana_fullstop = 1185;
	const KEY_kana_openingbracket = 1186;
	const KEY_kana_closingbracket = 1187;
	const KEY_kana_comma = 1188;
	const KEY_kana_conjunctive = 1189;
	const KEY_kana_middledot = 1189;
	const KEY_kana_WO = 1190;
	const KEY_kana_a = 1191;
	const KEY_kana_i = 1192;
	const KEY_kana_u = 1193;
	const KEY_kana_e = 1194;
	const KEY_kana_o = 1195;
	const KEY_kana_ya = 1196;
	const KEY_kana_yu = 1197;
	const KEY_kana_yo = 1198;
	const KEY_kana_tsu = 1199;
	const KEY_kana_tu = 1199;
	const KEY_prolongedsound = 1200;
	const KEY_kana_A = 1201;
	const KEY_kana_I = 1202;
	const KEY_kana_U = 1203;
	const KEY_kana_E = 1204;
	const KEY_kana_O = 1205;
	const KEY_kana_KA = 1206;
	const KEY_kana_KI = 1207;
	const KEY_kana_KU = 1208;
	const KEY_kana_KE = 1209;
	const KEY_kana_KO = 1210;
	const KEY_kana_SA = 1211;
	const KEY_kana_SHI = 1212;
	const KEY_kana_SU = 1213;
	const KEY_kana_SE = 1214;
	const KEY_kana_SO = 1215;
	const KEY_kana_TA = 1216;
	const KEY_kana_CHI = 1217;
	const KEY_kana_TI = 1217;
	const KEY_kana_TSU = 1218;
	const KEY_kana_TU = 1218;
	const KEY_kana_TE = 1219;
	const KEY_kana_TO = 1220;
	const KEY_kana_NA = 1221;
	const KEY_kana_NI = 1222;
	const KEY_kana_NU = 1223;
	const KEY_kana_NE = 1224;
	const KEY_kana_NO = 1225;
	const KEY_kana_HA = 1226;
	const KEY_kana_HI = 1227;
	const KEY_kana_FU = 1228;
	const KEY_kana_HU = 1228;
	const KEY_kana_HE = 1229;
	const KEY_kana_HO = 1230;
	const KEY_kana_MA = 1231;
	const KEY_kana_MI = 1232;
	const KEY_kana_MU = 1233;
	const KEY_kana_ME = 1234;
	const KEY_kana_MO = 1235;
	const KEY_kana_YA = 1236;
	const KEY_kana_YU = 1237;
	const KEY_kana_YO = 1238;
	const KEY_kana_RA = 1239;
	const KEY_kana_RI = 1240;
	const KEY_kana_RU = 1241;
	const KEY_kana_RE = 1242;
	const KEY_kana_RO = 1243;
	const KEY_kana_WA = 1244;
	const KEY_kana_N = 1245;
	const KEY_voicedsound = 1246;
	const KEY_semivoicedsound = 1247;
	const KEY_kana_switch = 65406;
	const KEY_Arabic_comma = 1452;
	const KEY_Arabic_semicolon = 1467;
	const KEY_Arabic_question_mark = 1471;
	const KEY_Arabic_hamza = 1473;
	const KEY_Arabic_maddaonalef = 1474;
	const KEY_Arabic_hamzaonalef = 1475;
	const KEY_Arabic_hamzaonwaw = 1476;
	const KEY_Arabic_hamzaunderalef = 1477;
	const KEY_Arabic_hamzaonyeh = 1478;
	const KEY_Arabic_alef = 1479;
	const KEY_Arabic_beh = 1480;
	const KEY_Arabic_tehmarbuta = 1481;
	const KEY_Arabic_teh = 1482;
	const KEY_Arabic_theh = 1483;
	const KEY_Arabic_jeem = 1484;
	const KEY_Arabic_hah = 1485;
	const KEY_Arabic_khah = 1486;
	const KEY_Arabic_dal = 1487;
	const KEY_Arabic_thal = 1488;
	const KEY_Arabic_ra = 1489;
	const KEY_Arabic_zain = 1490;
	const KEY_Arabic_seen = 1491;
	const KEY_Arabic_sheen = 1492;
	const KEY_Arabic_sad = 1493;
	const KEY_Arabic_dad = 1494;
	const KEY_Arabic_tah = 1495;
	const KEY_Arabic_zah = 1496;
	const KEY_Arabic_ain = 1497;
	const KEY_Arabic_ghain = 1498;
	const KEY_Arabic_tatweel = 1504;
	const KEY_Arabic_feh = 1505;
	const KEY_Arabic_qaf = 1506;
	const KEY_Arabic_kaf = 1507;
	const KEY_Arabic_lam = 1508;
	const KEY_Arabic_meem = 1509;
	const KEY_Arabic_noon = 1510;
	const KEY_Arabic_ha = 1511;
	const KEY_Arabic_heh = 1511;
	const KEY_Arabic_waw = 1512;
	const KEY_Arabic_alefmaweb&cd=14&ved=0CDEQFjADOAo&url=http%3A%2F%2Fphp.bigresource.com%2FphpDoc-Templates-gsvqAsPj.html&ei=Hgw_TfDzMMnogAf1kuXJCA&usg=ksura = 1513;
	const KEY_Arabic_yeh = 1514;
	const KEY_Arabic_fathatan = 1515;
	const KEY_Arabic_dammatan = 1516;
	const KEY_Arabic_kasratan = 1517;
	const KEY_Arabic_fatha = 1518;
	const KEY_Arabic_damma = 1519;
	const KEY_Arabic_kasra = 1520;
	const KEY_Arabic_shadda = 1521;
	const KEY_Arabic_sukun = 1522;
	const KEY_Arabic_switch = 65406;
	const KEY_Serbian_dje = 1697;
	const KEY_Macedonia_gje = 1698;
	const KEY_Ukrainian_ghe_with_upturn = 1709;
	const KEY_Cyrillic_io = 1699;
	const KEY_Ukrainian_ie = 1700;
	const KEY_Ukranian_je = 1700;
	const KEY_Macedonia_dse = 1701;
	const KEY_Ukrainian_i = 1702;
	const KEY_Ukranian_i = 1702;
	const KEY_Ukrainian_yi = 1703;
	const KEY_Ukranian_yi = 1703;
	const KEY_Cyrillic_je = 1704;
	const KEY_Serbian_je = 1704;
	const KEY_Cyrillic_lje = 1705;
	const KEY_Serbian_lje = 1705;
	const KEY_Cyrillic_nje = 1706;
	const KEY_Serbian_nje = 1706;
	const KEY_Serbian_tshe = 1707;
	const KEY_Macedonia_kje = 1708;
	const KEY_Byelorussian_shortu = 1710;
	const KEY_Cyrillic_dzhe = 1711;
	const KEY_Serbian_dze = 1711;
	const KEY_numerosign = 1712;
	const KEY_Serbian_DJE = 1713;
	const KEY_Macedonia_GJE = 1714;
	const KEY_Cyrillic_IO = 1715;
	const KEY_Ukrainian_IE = 1716;
	const KEY_Ukranian_JE = 1716;
	const KEY_Macedonia_DSE = 1717;
	const KEY_Ukrainian_I = 1718;
	const KEY_Ukranian_I = 1718;
	const KEY_Ukrainian_YI = 1719;
	const KEY_Ukranian_YI = 1719;
	const KEY_Cyrillic_JE = 1720;
	const KEY_Serbian_JE = 1720;
	const KEY_Cyrillic_LJE = 1721;
	const KEY_Serbian_LJE = 1721;
	const KEY_Cyrillic_NJE = 1722;
	const KEY_Serbian_NJE = 1722;
	const KEY_Serbian_TSHE = 1723;
	const KEY_Macedonia_KJE = 1724;
	const KEY_Byelorussian_SHORTU = 1726;
	const KEY_Cyrillic_DZHE = 1727;
	const KEY_Serbian_DZE = 1727;
	const KEY_Cyrillic_yu = 1728;
	const KEY_Cyrillic_a = 1729;
	const KEY_Cyrillic_be = 1730;
	const KEY_Cyrillic_tse = 1731;
	const KEY_Cyrillic_de = 1732;
	const KEY_Cyrillic_ie = 1733;
	const KEY_Cyrillic_ef = 1734;
	const KEY_Cyrillic_ghe = 1735;
	const KEY_Cyrillic_ha = 1736;
	const KEY_Cyrillic_i = 1737;
	const KEY_Cyrillic_shorti = 1738;
	const KEY_Cyrillic_ka = 1739;
	const KEY_Cyrillic_el = 1740;
	const KEY_Cyrillic_em = 1741;
	const KEY_Cyrillic_en = 1742;
	const KEY_Cyrillic_o = 1743;
	const KEY_Cyrillic_pe = 1744;
	const KEY_Cyrillic_ya = 1745;
	const KEY_Cyrillic_er = 1746;
	const KEY_Cyrillic_es = 1747;
	const KEY_Cyrillic_te = 1748;
	const KEY_Cyrillic_u = 1749;
	const KEY_Cyrillic_zhe = 1750;
	const KEY_Cyrillic_ve = 1751;
	const KEY_Cyrillic_softsign = 1752;
	const KEY_Cyrillic_yeru = 1753;
	const KEY_Cyrillic_ze = 1754;
	const KEY_Cyrillic_sha = 1755;
	const KEY_Cyrillic_e = 1756;
	const KEY_Cyrillic_shcha = 1757;
	const KEY_Cyrillic_che = 1758;
	const KEY_Cyrillic_hardsign = 1759;
	const KEY_Cyrillic_YU = 1760;
	const KEY_Cyrillic_A = 1761;
	const KEY_Cyrillic_BE = 1762;
	const KEY_Cyrillic_TSE = 1763;
	const KEY_Cyrillic_DE = 1764;
	const KEY_Cyrillic_IE = 1765;
	const KEY_Cyrillic_EF = 1766;
	const KEY_Cyrillic_GHE = 1767;
	const KEY_Cyrillic_HA = 1768;
	const KEY_Cyrillic_I = 1769;
	const KEY_Cyrillic_SHORTI = 1770;
	const KEY_Cyrillic_KA = 1771;
	const KEY_Cyrillic_EL = 1772;
	const KEY_Cyrillic_EM = 1773;
	const KEY_Cyrillic_EN = 1774;
	const KEY_Cyrillic_O = 1775;
	const KEY_Cyrillic_PE = 1776;
	const KEY_Cyrillic_YA = 1777;
	const KEY_Cyrillic_ER = 1778;
	const KEY_Cyrillic_ES = 1779;
	const KEY_Cyrillic_TE = 1780;
	const KEY_Cyrillic_U = 1781;
	const KEY_Cyrillic_ZHE = 1782;
	const KEY_Cyrillic_VE = 1783;
	const KEY_Cyrillic_SOFTSIGN = 1784;
	const KEY_Cyrillic_YERU = 1785;
	const KEY_Cyrillic_ZE = 1786;
	const KEY_Cyrillic_SHA = 1787;
	const KEY_Cyrillic_E = 1788;
	const KEY_Cyrillic_SHCHA = 1789;
	const KEY_Cyrillic_CHE = 1790;
	const KEY_Cyrillic_HARDSIGN = 1791;
	const KEY_Greek_ALPHAaccent = 1953;
	const KEY_Greek_EPSILONaccent = 1954;
	const KEY_Greek_ETAaccent = 1955;
	const KEY_Greek_IOTAaccent = 1956;
	const KEY_Greek_IOTAdieresis = 1957;
	const KEY_Greek_IOTAdiaeresis = 1957;
	const KEY_Greek_OMICRONaccent = 1959;
	const KEY_Greek_UPSILONaccent = 1960;
	const KEY_Greek_UPSILONdieresis = 1961;
	const KEY_Greek_OMEGAaccent = 1963;
	const KEY_Greek_accentdieresis = 1966;
	const KEY_Greek_horizbar = 1967;
	const KEY_Greek_alphaaccent = 1969;
	const KEY_Greek_epsilonaccent = 1970;
	const KEY_Greek_etaaccent = 1971;
	const KEY_Greek_iotaaccent = 1972;
	const KEY_Greek_iotadieresis = 1973;
	const KEY_Greek_iotaaccentdieresis = 1974;
	const KEY_Greek_omicronaccent = 1975;
	const KEY_Greek_upsilonaccent = 1976;
	const KEY_Greek_upsilondieresis = 1977;
	const KEY_Greek_upsilonaccentdieresis = 1978;
	const KEY_Greek_omegaaccent = 1979;
	const KEY_Greek_ALPHA = 1985;
	const KEY_Greek_BETA = 1986;
	const KEY_Greek_GAMMA = 1987;
	const KEY_Greek_DELTA = 1988;
	const KEY_Greek_EPSILON = 1989;
	const KEY_Greek_ZETA = 1990;
	const KEY_Greek_ETA = 1991;
	const KEY_Greek_THETA = 1992;
	const KEY_Greek_IOTA = 1993;
	const KEY_Greek_KAPPA = 1994;
	const KEY_Greek_LAMDA = 1995;
	const KEY_Greek_LAMBDA = 1995;
	const KEY_Greek_MU = 1996;
	const KEY_Greek_NU = 1997;
	const KEY_Greek_XI = 1998;
	const KEY_Greek_OMICRON = 1999;
	const KEY_Greek_PI = 2000;
	const KEY_Greek_RHO = 2001;
	const KEY_Greek_SIGMA = 2002;
	const KEY_Greek_TAU = 2004;
	const KEY_Greek_UPSILON = 2005;
	const KEY_Greek_PHI = 2006;
	const KEY_Greek_CHI = 2007;
	const KEY_Greek_PSI = 2008;
	const KEY_Greek_OMEGA = 2009;
	const KEY_Greek_alpha = 2017;
	const KEY_Greek_beta = 2018;
	const KEY_Greek_gamma = 2019;
	const KEY_Greek_delta = 2020;
	const KEY_Greek_epsilon = 2021;
	const KEY_Greek_zeta = 2022;
	const KEY_Greek_eta = 2023;
	const KEY_Greek_theta = 2024;
	const KEY_Greek_iota = 2025;
	const KEY_Greek_kappa = 2026;
	const KEY_Greek_lamda = 2027;
	const KEY_Greek_lambda = 2027;
	const KEY_Greek_mu = 2028;
	const KEY_Greek_nu = 2029;
	const KEY_Greek_xi = 2030;
	const KEY_Greek_omicron = 2031;
	const KEY_Greek_pi = 2032;
	const KEY_Greek_rho = 2033;
	const KEY_Greek_sigma = 2034;
	const KEY_Greek_finalsmallsigma = 2035;
	const KEY_Greek_tau = 2036;
	const KEY_Greek_upsilon = 2037;
	const KEY_Greek_phi = 2038;
	const KEY_Greek_chi = 2039;
	const KEY_Greek_psi = 2040;
	const KEY_Greek_omega = 2041;
	const KEY_Greek_switch = 65406;
	const KEY_leftradical = 2209;
	const KEY_topleftradical = 2210;
	const KEY_horizconnector = 2211;
	const KEY_topintegral = 2212;
	const KEY_botintegral = 2213;
	const KEY_vertconnector = 2214;
	const KEY_topleftsqbracket = 2215;
	const KEY_botleftsqbracket = 2216;
	const KEY_toprightsqbracket = 2217;
	const KEY_botrightsqbracket = 2218;
	const KEY_topleftparens = 2219;
	const KEY_botleftparens = 2220;
	const KEY_toprightparens = 2221;
	const KEY_botrightparens = 2222;
	const KEY_leftmiddlecurlybrace = 2223;
	const KEY_rightmiddlecurlybrace = 2224;
	const KEY_topleftsummation = 2225;
	const KEY_botleftsummation = 2226;
	const KEY_topvertsummationconnector = 2227;
	const KEY_botvertsummationconnector = 2228;
	const KEY_toprightsummation = 2229;
	const KEY_botrightsummation = 2230;
	const KEY_rightmiddlesummation = 2231;
	const KEY_lessthanequal = 2236;
	const KEY_notequal = 2237;
	const KEY_greaterthanequal = 2238;
	const KEY_integral = 2239;
	const KEY_therefore = 2240;
	const KEY_variation = 2241;
	const KEY_infinity = 2242;
	const KEY_nabla = 2245;
	const KEY_approximate = 2248;
	const KEY_similarequal = 2249;
	const KEY_ifonlyif = 2253;
	const KEY_implies = 2254;
	const KEY_identical = 2255;
	const KEY_radical = 2262;
	const KEY_includedin = 2266;
	const KEY_includes = 2267;
	const KEY_intersection = 2268;
	const KEY_union = 2269;
	const KEY_logicaland = 2270;
	const KEY_logicalor = 2271;
	const KEY_partialderivative = 2287;
	const KEY_function = 2294;
	const KEY_leftarrow = 2299;
	const KEY_uparrow = 2300;
	const KEY_rightarrow = 2301;
	const KEY_downarrow = 2302;
	const KEY_blank = 2527;
	const KEY_soliddiamond = 2528;
	const KEY_checkerboard = 2529;
	const KEY_ht = 2530;
	const KEY_ff = 2531;
	const KEY_cr = 2532;
	const KEY_lf = 2533;
	const KEY_nl = 2536;
	const KEY_vt = 2537;
	const KEY_lowrightcorner = 2538;
	const KEY_uprightcorner = 2539;
	const KEY_upleftcorner = 2540;
	const KEY_lowleftcorner = 2541;
	const KEY_crossinglines = 2542;
	const KEY_horizlinescan1 = 2543;
	const KEY_horizlinescan3 = 2544;
	const KEY_horizlinescan5 = 2545;
	const KEY_horizlinescan7 = 2546;
	const KEY_horizlinescan9 = 2547;
	const KEY_leftt = 2548;
	const KEY_rightt = 2549;
	const KEY_bott = 2550;
	const KEY_topt = 2551;
	const KEY_vertbar = 2552;
	const KEY_emspace = 2721;
	const KEY_enspace = 2722;
	const KEY_em3space = 2723;
	const KEY_em4space = 2724;
	const KEY_digitspace = 2725;
	const KEY_punctspace = 2726;
	const KEY_thinspace = 2727;
	const KEY_hairspace = 2728;
	const KEY_emdash = 2729;
	const KEY_endash = 2730;
	const KEY_signifblank = 2732;
	const KEY_ellipsis = 2734;
	const KEY_doubbaselinedot = 2735;
	const KEY_onethird = 2736;
	const KEY_twothirds = 2737;
	const KEY_onefifth = 2738;
	const KEY_twofifths = 2739;
	const KEY_threefifths = 2740;
	const KEY_fourfifths = 2741;
	const KEY_onesixth = 2742;
	const KEY_fivesixths = 2743;
	const KEY_careof = 2744;
	const KEY_figdash = 2747;
	const KEY_leftanglebracket = 2748;
	const KEY_decimalpoint = 2749;
	const KEY_rightanglebracket = 2750;
	const KEY_marker = 2751;
	const KEY_oneeighth = 2755;
	const KEY_threeeighths = 2756;
	const KEY_fiveeighths = 2757;
	const KEY_seveneighths = 2758;
	const KEY_trademark = 2761;
	const KEY_signaturemark = 2762;
	const KEY_trademarkincircle = 2763;
	const KEY_leftopentriangle = 2764;
	const KEY_rightopentriangle = 2765;
	const KEY_emopencircle = 2766;
	const KEY_emopenrectangle = 2767;
	const KEY_leftsinglequotemark = 2768;
	const KEY_rightsinglequotemark = 2769;
	const KEY_leftdoublequotemark = 2770;
	const KEY_rightdoublequotemark = 2771;
	const KEY_prescription = 2772;
	const KEY_minutes = 2774;
	const KEY_seconds = 2775;
	const KEY_latincross = 2777;
	const KEY_hexagram = 2778;
	const KEY_filledrectbullet = 2779;
	const KEY_filledlefttribullet = 2780;
	const KEY_filledrighttribullet = 2781;
	const KEY_emfilledcircle = 2782;
	const KEY_emfilledrect = 2783;
	const KEY_enopencircbullet = 2784;
	const KEY_enopensquarebullet = 2785;
	const KEY_openrectbullet = 2786;
	const KEY_opentribulletup = 2787;
	const KEY_opentribulletdown = 2788;
	const KEY_openstar = 2789;
	const KEY_enfilledcircbullet = 2790;
	const KEY_enfilledsqbullet = 2791;
	const KEY_filledtribulletup = 2792;
	const KEY_filledtribulletdown = 2793;
	const KEY_leftpointer = 2794;
	const KEY_rightpointer = 2795;
	const KEY_club = 2796;
	const KEY_diamond = 2797;
	const KEY_heart = 2798;
	const KEY_maltesecross = 2800;
	const KEY_dagger = 2801;
	const KEY_doubledagger = 2802;
	const KEY_checkmark = 2803;
	const KEY_ballotcross = 2804;
	const KEY_musicalsharp = 2805;
	const KEY_musicalflat = 2806;
	const KEY_malesymbol = 2807;
	const KEY_femalesymbol = 2808;
	const KEY_telephone = 2809;
	const KEY_telephonerecorder = 2810;
	const KEY_phonographcopyright = 2811;
	const KEY_caret = 2812;
	const KEY_singlelowquotemark = 2813;
	const KEY_doublelowquotemark = 2814;
	const KEY_cursor = 2815;
	const KEY_leftcaret = 2979;
	const KEY_rightcaret = 2982;
	const KEY_downcaret = 2984;
	const KEY_upcaret = 2985;
	const KEY_overbar = 3008;
	const KEY_downtack = 3010;
	const KEY_upshoe = 3011;
	const KEY_downstile = 3012;
	const KEY_underbar = 3014;
	const KEY_jot = 3018;
	const KEY_quad = 3020;
	const KEY_uptack = 3022;
	const KEY_circle = 3023;
	const KEY_upstile = 3027;
	const KEY_downshoe = 3030;
	const KEY_rightshoe = 3032;
	const KEY_leftshoe = 3034;
	const KEY_lefttack = 3036;
	const KEY_righttack = 3068;
	const KEY_hebrew_doublelowline = 3295;
	const KEY_hebrew_aleph = 3296;
	const KEY_hebrew_bet = 3297;
	const KEY_hebrew_beth = 3297;
	const KEY_hebrew_gimel = 3298;
	const KEY_hebrew_gimmel = 3298;
	const KEY_hebrew_dalet = 3299;
	const KEY_hebrew_daleth = 3299;
	const KEY_hebrew_he = 3300;
	const KEY_hebrew_waw = 3301;
	const KEY_hebrew_zain = 3302;
	const KEY_hebrew_zayin = 3302;
	const KEY_hebrew_chet = 3303;
	const KEY_hebrew_het = 3303;
	const KEY_hebrew_tet = 3304;
	const KEY_hebrew_teth = 3304;
	const KEY_hebrew_yod = 3305;
	const KEY_hebrew_finalkaph = 3306;
	const KEY_hebrew_kaph = 3307;
	const KEY_hebrew_lamed = 3308;
	const KEY_hebrew_finalmem = 3309;
	const KEY_hebrew_mem = 3310;
	const KEY_hebrew_finalnun = 3311;
	const KEY_hebrew_nun = 3312;
	const KEY_hebrew_samech = 3313;
	const KEY_hebrew_samekh = 3313;
	const KEY_hebrew_ayin = 3314;
	const KEY_hebrew_finalpe = 3315;
	const KEY_hebrew_pe = 3316;
	const KEY_hebrew_finalzade = 3317;
	const KEY_hebrew_finalzadi = 3317;
	const KEY_hebrew_zade = 3318;
	const KEY_hebrew_zadi = 3318;
	const KEY_hebrew_qoph = 3319;
	const KEY_hebrew_kuf = 3319;
	const KEY_hebrew_resh = 3320;
	const KEY_hebrew_shin = 3321;
	const KEY_hebrew_taw = 3322;
	const KEY_hebrew_taf = 3322;
	const KEY_Hebrew_switch = 65406;
	const KEY_Thai_kokai = 3489;
	const KEY_Thai_khokhai = 3490;
	const KEY_Thai_khokhuat = 3491;
	const KEY_Thai_khokhwai = 3492;
	const KEY_Thai_khokhon = 3493;
	const KEY_Thai_khorakhang = 3494;
	const KEY_Thai_ngongu = 3495;
	const KEY_Thai_chochan = 3496;
	const KEY_Thai_choching = 3497;
	const KEY_Thai_chochang = 3498;
	const KEY_Thai_soso = 3499;
	const KEY_Thai_chochoe = 3500;
	const KEY_Thai_yoying = 3501;
	const KEY_Thai_dochada = 3502;
	const KEY_Thai_topatak = 3503;
	const KEY_Thai_thothan = 3504;
	const KEY_Thai_thonangmontho = 3505;
	const KEY_Thai_thophuthao = 3506;
	const KEY_Thai_nonen = 3507;
	const KEY_Thai_dodek = 3508;
	const KEY_Thai_totao = 3509;
	const KEY_Thai_thothung = 3510;
	const KEY_Thai_thothahan = 3511;
	const KEY_Thai_thothong = 3512;
	const KEY_Thai_nonu = 3513;
	const KEY_Thai_bobaimai = 3514;
	const KEY_Thai_popla = 3515;
	const KEY_Thai_phophung = 3516;
	const KEY_Thai_fofa = 3517;
	const KEY_Thai_phophan = 3518;
	const KEY_Thai_fofan = 3519;
	const KEY_Thai_phosamphao = 3520;
	const KEY_Thai_moma = 3521;
	const KEY_Thai_yoyak = 3522;
	const KEY_Thai_rorua = 3523;
	const KEY_Thai_ru = 3524;
	const KEY_Thai_loling = 3525;
	const KEY_Thai_lu = 3526;
	const KEY_Thai_wowaen = 3527;
	const KEY_Thai_sosala = 3528;
	const KEY_Thai_sorusi = 3529;
	const KEY_Thai_sosua = 3530;
	const KEY_Thai_hohip = 3531;
	const KEY_Thai_lochula = 3532;
	const KEY_Thai_oang = 3533;
	const KEY_Thai_honokhuk = 3534;
	const KEY_Thai_paiyannoi = 3535;
	const KEY_Thai_saraa = 3536;
	const KEY_Thai_maihanakat = 3537;
	const KEY_Thai_saraaa = 3538;
	const KEY_Thai_saraam = 3539;
	const KEY_Thai_sarai = 3540;
	const KEY_Thai_saraii = 3541;
	const KEY_Thai_saraue = 3542;
	const KEY_Thai_sarauee = 3543;
	const KEY_Thai_sarau = 3544;
	const KEY_Thai_sarauu = 3545;
	const KEY_Thai_phinthu = 3546;
	const KEY_Thai_maihanakat_maitho = 3550;
	const KEY_Thai_baht = 3551;
	const KEY_Thai_sarae = 3552;
	const KEY_Thai_saraae = 3553;
	const KEY_Thai_sarao = 3554;
	const KEY_Thai_saraaimaimuan = 3555;
	const KEY_Thai_saraaimaimalai = 3556;
	const KEY_Thai_lakkhangyao = 3557;
	const KEY_Thai_maiyamok = 3558;
	const KEY_Thai_maitaikhu = 3559;
	const KEY_Thai_maiek = 3560;
	const KEY_Thai_maitho = 3561;
	const KEY_Thai_maitri = 3562;
	const KEY_Thai_maichattawa = 3563;
	const KEY_Thai_thanthakhat = 3564;
	const KEY_Thai_nikhahit = 3565;
	const KEY_Thai_leksun = 3568;
	const KEY_Thai_leknung = 3569;
	const KEY_Thai_leksong = 3570;
	const KEY_Thai_leksam = 3571;
	const KEY_Thai_leksi = 3572;
	const KEY_Thai_lekha = 3573;
	const KEY_Thai_lekhok = 3574;
	const KEY_Thai_lekchet = 3575;
	const KEY_Thai_lekpaet = 3576;
	const KEY_Thai_lekkao = 3577;
	const KEY_Hangul = 65329;
	const KEY_Hangul_Start = 65330;
	const KEY_Hangul_End = 65331;
	const KEY_Hangul_Hanja = 65332;
	const KEY_Hangul_Jamo = 65333;
	const KEY_Hangul_Romaja = 65334;
	const KEY_Hangul_Codeinput = 65335;
	const KEY_Hangul_Jeonja = 65336;
	const KEY_Hangul_Banja = 65337;
	const KEY_Hangul_PreHanja = 65338;
	const KEY_Hangul_PostHanja = 65339;
	const KEY_Hangul_SingleCandidate = 65340;
	const KEY_Hangul_MultipleCandidate = 65341;
	const KEY_Hangul_PreviousCandidate = 65342;
	const KEY_Hangul_Special = 65343;
	const KEY_Hangul_switch = 65406;
	const KEY_Hangul_Kiyeog = 3745;
	const KEY_Hangul_SsangKiyeog = 3746;
	const KEY_Hangul_KiyeogSios = 3747;
	const KEY_Hangul_Nieun = 3748;
	const KEY_Hangul_NieunJieuj = 3749;
	const KEY_Hangul_NieunHieuh = 3750;
	const KEY_Hangul_Dikeud = 3751;
	const KEY_Hangul_SsangDikeud = 3752;
	const KEY_Hangul_Rieul = 3753;
	const KEY_Hangul_RieulKiyeog = 3754;
	const KEY_Hangul_RieulMieum = 3755;
	const KEY_Hangul_RieulPieub = 3756;
	const KEY_Hangul_RieulSios = 3757;
	const KEY_Hangul_RieulTieut = 3758;
	const KEY_Hangul_RieulPhieuf = 3759;
	const KEY_Hangul_RieulHieuh = 3760;
	const KEY_Hangul_Mieum = 3761;
	const KEY_Hangul_Pieub = 3762;
	const KEY_Hangul_SsangPieub = 3763;
	const KEY_Hangul_PieubSios = 3764;
	const KEY_Hangul_Sios = 3765;
	const KEY_Hangul_SsangSios = 3766;
	const KEY_Hangul_Ieung = 3767;
	const KEY_Hangul_Jieuj = 3768;
	const KEY_Hangul_SsangJieuj = 3769;
	const KEY_Hangul_Cieuc = 3770;
	const KEY_Hangul_Khieuq = 3771;
	const KEY_Hangul_Tieut = 3772;
	const KEY_Hangul_Phieuf = 3773;
	const KEY_Hangul_Hieuh = 3774;
	const KEY_Hangul_A = 3775;
	const KEY_Hangul_AE = 3776;
	const KEY_Hangul_YA = 3777;
	const KEY_Hangul_YAE = 3778;
	const KEY_Hangul_EO = 3779;
	const KEY_Hangul_E = 3780;
	const KEY_Hangul_YEO = 3781;
	const KEY_Hangul_YE = 3782;
	const KEY_Hangul_O = 3783;
	const KEY_Hangul_WA = 3784;
	const KEY_Hangul_WAE = 3785;
	const KEY_Hangul_OE = 3786;
	const KEY_Hangul_YO = 3787;
	const KEY_Hangul_U = 3788;
	const KEY_Hangul_WEO = 3789;
	const KEY_Hangul_WE = 3790;
	const KEY_Hangul_WI = 3791;
	const KEY_Hangul_YU = 3792;
	const KEY_Hangul_EU = 3793;
	const KEY_Hangul_YI = 3794;
	const KEY_Hangul_I = 3795;
	const KEY_Hangul_J_Kiyeog = 3796;
	const KEY_Hangul_J_SsangKiyeog = 3797;
	const KEY_Hangul_J_KiyeogSios = 3798;
	const KEY_Hangul_J_Nieun = 3799;
	const KEY_Hangul_J_NieunJieuj = 3800;
	const KEY_Hangul_J_NieunHieuh = 3801;
	const KEY_Hangul_J_Dikeud = 3802;
	const KEY_Hangul_J_Rieul = 3803;
	const KEY_Hangul_J_RieulKiyeog = 3804;
	const KEY_Hangul_J_RieulMieum = 3805;
	const KEY_Hangul_J_RieulPieub = 3806;
	const KEY_Hangul_J_RieulSios = 3807;
	const KEY_Hangul_J_RieulTieut = 3808;
	const KEY_Hangul_J_RieulPhieuf = 3809;
	const KEY_Hangul_J_RieulHieuh = 3810;
	const KEY_Hangul_J_Mieum = 3811;
	const KEY_Hangul_J_Pieub = 3812;
	const KEY_Hangul_J_PieubSios = 3813;
	const KEY_Hangul_J_Sios = 3814;
	const KEY_Hangul_J_SsangSios = 3815;
	const KEY_Hangul_J_Ieung = 3816;
	const KEY_Hangul_J_Jieuj = 3817;
	const KEY_Hangul_J_Cieuc = 3818;
	const KEY_Hangul_J_Khieuq = 3819;
	const KEY_Hangul_J_Tieut = 3820;
	const KEY_Hangul_J_Phieuf = 3821;
	const KEY_Hangul_J_Hieuh = 3822;
	const KEY_Hangul_RieulYeorinHieuh = 3823;
	const KEY_Hangul_SunkyeongeumMieum = 3824;
	const KEY_Hangul_SunkyeongeumPieub = 3825;
	const KEY_Hangul_PanSios = 3826;
	const KEY_Hangul_KkogjiDalrinIeung = 3827;
	const KEY_Hangul_SunkyeongeumPhieuf = 3828;
	const KEY_Hangul_YeorinHieuh = 3829;
	const KEY_Hangul_AraeA = 3830;
	const KEY_Hangul_AraeAE = 3831;
	const KEY_Hangul_J_PanSios = 3832;
	const KEY_Hangul_J_KkogjiDalrinIeung = 3833;
	const KEY_Hangul_J_YeorinHieuh = 3834;
	const KEY_Korean_Won = 3839;
	const KEY_EcuSign = 16785568;
	const KEY_ColonSign = 16785569;
	const KEY_CruzeiroSign = 16785570;
	const KEY_FFrancSign = 16785571;
	const KEY_LiraSign = 16785572;
	const KEY_MillSign = 16785573;
	const KEY_NairaSign = 16785574;
	const KEY_PesetaSign = 16785575;
	const KEY_RupeeSign = 16785576;
	const KEY_WonSign = 16785577;
	const KEY_NewSheqelSign = 16785578;
	const KEY_DongSign = 16785579;
	const KEY_EuroSign = 8364;
	const SELECTION_PRIMARY = 'PRIMARY';
	const SELECTION_SECONDARY = 'SECONDARY';
	const SELECTION_CLIPBOARD = 'CLIPBOARD';
	const TARGET_BITMAP = 'BITMAP';
	const TARGET_COLORMAP = 'COLORMAP';
	const TARGET_DRAWABLE = 'DRAWABLE';
	const TARGET_PIXMAP = 'PIXMAP';
	const TARGET_STRING = 'STRING';
	const SELECTION_TYPE_ATOM = 'ATOM';
	const SELECTION_TYPE_BITMAP = 'BITMAP';
	const SELECTION_TYPE_COLORMAP = 'COLORMAP';
	const SELECTION_TYPE_DRAWABLE = 'DRAWABLE';
	const SELECTION_TYPE_INTEGER = 'INTEGER';
	const SELECTION_TYPE_PIXMAP = 'PIXMAP';
	const SELECTION_TYPE_WINDOW = 'WINDOW';
	const SELECTION_TYPE_STRING = 'STRING';

	static public function atom_intern() {}
	static public function atom_intern_static_string($atom_name) {}
	static public function beep() {}
	static public function bitmap_create_from_data(GdkDrawable $drawable, $data, $width, $height) {}
	static public function cairo_rectangle(CairoContext $context , GdkRectangle $rectangle}
	static public function cairo_region(CairoContext $context , GdkRegion $region}
	static public function cairo_reset_clip(CairoContext $context , GdkDrawable $drawable}
	static public function cairo_set_source_color(CairoContext $context , GdkColor $color}
	static public function cairo_set_source_pixbuf(CairoContext $cobj , GdkPixbuf $pbuf, $pixbuf_x, $pixbuf_y) {}
	static public function cairo_set_source_pixmap(CairoContext $cobj , GdkPixmap $pmap, $pixmap_x, $pixmap_y) {}
	static public function colormap_get_system_size() {}
	static public function colors_store(GdkColormap $colormap , GdkColor $colors, $ncolors) {}
	static public function draw_layout_with_colors(GdkDrawable $drawable , GdkGC $gc, $x, $y, PangoLayout $layout , GdkColor $foreground , GdkColor $background}
	static public function error_trap_pop() {}
	static public function error_trap_push() {}
	static public function event_get() {}
	static public function event_get_graphics_expose(GdkWindow $window}
	static public function event_peek() {}
	static public function event_request_motions($event = NULL}
	static public function event_send_client_message_for_display(GdkDisplay $display , GdkEvent $event, $winid) {}
	static public function events_pending() {}
	static public function exit($error_code) {}
	static public function flush() {}
	static public function font_from_description(PangoFontDescription $font_desc}
	static public function font_from_description_for_display(GdkDisplay $display , PangoFontDescription $font_desc}
	static public function font_load_for_display(GdkDisplay $display, $font_name) {}
	static public function fontset_load($fontset_name) {}
	static public function fontset_load_for_display(GdkDisplay $display, $fontset_name) {}
	static public function get_default_root_window() {}
	static public function get_display() {}
	static public function get_display_arg_name() {}
	static public function get_program_class() {}
	static public function get_show_events() {}
	static public function get_use_xshm() {}
	static public function input_remove($tag) {}
	static public function keyboard_grab(GdkWindow $window}
	static public function keyboard_ungrab() {}
	static public function keyval_convert_case() {}
	static public function keyval_from_name($keyval_name) {}
	static public function keyval_is_lower($keyval) {}
	static public function keyval_is_upper($keyval) {}
	static public function keyval_name($keyval) {}
	static public function keyval_to_lower($keyval) {}
	static public function keyval_to_unicode($keyval) {}
	static public function keyval_to_upper($keyval) {}
	static public function notify_startup_complete() {}
	static public function notify_startup_complete_with_id($startup_id) {}
	static public function offscreen_window_get_embedder(GdkWindow $window}
	static public function offscreen_window_get_pixmap(GdkWindow $window}
	static public function offscreen_window_set_embedder(GdkWindow $window , GdkWindow $embedder}
	static public function pango_context_get() {}
	static public function pango_context_get_for_screen(GdkScreen $screen}
	static public function pango_context_set_colormap(PangoContext $context , GdkColormap $colormap}
	static public function pixmap_create_from_data(GdkDrawable $drawable, $data, $width, $height, $depth, GdkColor $fg , GdkColor $bg}
	static public function pixmap_foreign_new($anid) {}
	static public function pixmap_foreign_new_for_display(GdkDisplay $display, $anid) {}
	static public function pixmap_foreign_new_for_screen(GdkScreen $screen, $anid, $width, $height, $depth) {}
	static public function pixmap_lookup($anid) {}
	static public function pixmap_lookup_for_display(GdkDisplay $display, $anid) {}
	static public function pointer_grab(GdkWindow $window, $owner_events, GdkWindow $confine_to = NULL, GdkCursor $cursor = NULL) {}
	static public function pointer_is_grabbed() {}
	static public function pointer_ungrab() {}
	static public function query_depths() {}
	static public function query_visual_types() {}
	static public function region_rectangle(GdkRectangle $rectangle}
	static public function rgb_colormap_ditherable(GdkColormap $cmap}
	static public function rgb_ditherable() {}
	static public function rgb_find_color(GdkColormap $colormap , GdkColor $color}
	static public function rgb_gc_set_background(GdkGC $gc, $rgb) {}
	static public function rgb_gc_set_foreground(GdkGC $gc, $rgb) {}
	static public function rgb_get_cmap() {}
	static public function rgb_get_colormap() {}
	static public function rgb_get_visual() {}
	static public function rgb_init() {}
	static public function rgb_set_install($install) {}
	static public function rgb_set_min_colors($min_colors) {}
	static public function rgb_set_verbose($verbose) {}
	static public function rgb_xpixel_from_rgb($rgb) {}
	static public function selection_owner_get($selection) {}
	static public function selection_owner_get_for_display(GdkDisplay $display, $selection) {}
	static public function selection_owner_set(GdkWindow $owner, $selection, $time, $send_event) {}
	static public function selection_owner_set_for_display(GdkDisplay $display , GdkWindow $owner, $selection, $time, $send_event) {}
	static public function selection_send_notify($requestor, $selection, $target, $property, $time) {}
	static public function selection_send_notify_for_display(GdkDisplay $display, $requestor, $selection, $target, $property, $time) {}
	static public function set_double_click_time($msec) {}
	static public function set_locale() {}
	static public function set_program_class($program_class) {}
	static public function set_show_events($show_events) {}
	static public function set_sm_client_id($sm_client_id) {}
	static public function set_use_xshm($use_xshm) {}
	static public function unicode_to_keyval($wc) {}
}

/**
 * @package Gdk
 */
class GdkAppLaunchContext extends GObject {
	const gtype = 167214520;

	public function __construct() {}
	public function set_desktop($desktop) {}
	public function set_display(GdkDisplay $display}
	public function set_icon_name($icon_name) {}
	public function set_screen(GdkScreen $screen}
	public function set_timestamp($timestamp) {}
}
