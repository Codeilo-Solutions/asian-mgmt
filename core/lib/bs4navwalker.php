<?php

class bs4navwalker extends Walker_Nav_Menu {

    // Start Level (Submenu)
    public function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        if ($depth === 0) {
            // Top-level dropdown
            $output .= "\n$indent<ul class=\"absolute left-0 top-full bg-white shadow-lg w-56 py-3 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-300 ease-out border border-gray-200 list-none\">\n";
        } else {
            // Nested dropdown
            $output .= "\n$indent<ul class=\"absolute left-full top-0 bg-white shadow-lg w-48 py-2 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto transition-all duration-300 ease-out border border-gray-200 list-none\">\n";
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

        if ($depth === 0) $class_names .= ' relative group list-none'; // Top-level menu item
        else $class_names .= ' list-none'; // Submenu item
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

        // Desktop Classes
        if ($depth === 0) {
            $atts['class'] = 'hover:text-[#C41E3A] transition flex items-center group text-[11px] font-bold uppercase tracking-[0.15em]';

            if (in_array('menu-item-has-children', $classes)) {
                $atts['class'] .= ' flex items-center justify-between';
                $item->title .= ' <span class="ml-1.5 text-[8px]">▼</span>';
            }
        } else {
            // Dropdown submenu items
            $atts['class'] = 'block px-4 py-2 text-sm text-gray-800 hover:text-[#C41E3A] hover:bg-gray-50 transition-all duration-300';
        }

        // Contact button (top-level special)
        if (strtolower($item->title) === 'contact') {
            $atts['class'] = 'flex items-center justify-center space-x-3 bg-[#C41E3A] text-white px-6 py-4 sm:px-8 sm:py-5 rounded-none hover:bg-black transition-all duration-300 shadow-xl hover:shadow-2xl group text-[11px] font-bold uppercase tracking-[0.2em]';
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


