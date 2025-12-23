<?php
class bs4Navwalker extends Walker_Nav_Menu {

    // Start Level
    public function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);

        if ($depth === 0) {
            $output .= "\n$indent<ul class=\"absolute left-0 top-full bg-white shadow-lg rounded-xl w-64 py-3 opacity-0 translate-y-4 pointer-events-none group-hover:opacity-100 group-hover:translate-y-0 group-hover:pointer-events-auto transition-all duration-300 ease-out border border-gray-100\">\n";
        } else {
            $output .= "\n$indent<ul class=\"absolute left-full top-0 bg-white shadow-lg rounded-xl w-56 py-3 opacity-0 translate-x-4 pointer-events-none group-hover:opacity-100 group-hover:translate-x-0 group-hover:pointer-events-auto transition-all duration-300 ease-out border border-gray-100\">\n";
        }
    }

    // End Level
    public function end_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    // Start Element
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array)$item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));

        // Top-level li classes
        if ($depth === 0) {
            $class_names .= ' relative group mt-2';
        }

        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';

        // Link attributes
        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel']    = !empty($item->xfn) ? $item->xfn : '';
        $atts['href']   = !empty($item->url) ? $item->url : '';

        // Classes for links
        if ($depth === 0) {
            $atts['class'] = 'nav-link latoRegular uppercase flex items-center gap-1 text-[12px] transition-all duration-300 hover:text-[--hading-color]';

            if (in_array('menu-item-has-children', $classes)) {
                $atts['class'] .= ' flex items-center gap-1 relative';
                $image_url = get_template_directory_uri() . '/assets/images/arrow-down.png';
                $item->title .= ' <img src="' . esc_url($image_url) . '" width="10" height="10" class="ml-1 transition-all duration-300 group-hover:rotate-180" alt="arrow">';
            }
        } else {
            $atts['class'] = 'block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 rounded-lg transition';
        }

        // Special: Contact button
        if (strtolower($item->title) === 'contact') {
            $atts['class'] = 'flex latoRegular items-center gap-1 px-6 lg:md:h-[82px] h-[82px] text-[12px] text-white bg-[--hading-color] shadow-md hover:shadow-lg transition-all duration-300 hover:bg-[--hading-color]/90';
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : $value;
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // End Element
    public function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= "</li>\n";
    }
}
?>
