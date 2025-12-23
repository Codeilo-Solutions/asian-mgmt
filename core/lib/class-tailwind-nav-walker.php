<?php
class Tailwind_Nav_Walker extends Walker_Nav_Menu {

    // Start Submenu (for nested items)
    function start_lvl( &$output, $depth = 0, $args = null ) {
        if ($depth === 0) {
            // Wrap the submenu inside accordionContent
            $output .= '<div class="accordionContent"><div class="overflow-hidden">';
            $output .= '<ul class="py-2 pl-8 text-xl">';
        } else {
            // Normal submenu without extra divs
            $output .= '<ul class="flex gap-4 content-center items-center">';
        }
    }

    // End Submenu
    function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul>';
        if ($depth === 0) {
            $output .= '</div></div>'; // Close accordionContent wrapper
        }
    }

    // Start Each Menu Item
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $has_children = !empty($args->walker->has_children);

        if ($depth === 0) {
            if ($has_children) {
                // Parent item (like "Services")
                $output .= '<div class="grid accordionGrid">';
                $output .= '<a href="' . esc_attr($item->url) . '" class="uppercase">';
                $output .= '<div class="accordionTitle mt-4">' . esc_html($item->title) . '</div>';
                $output .= '</a>';
            } else {
                // Regular top-level menu items (like "Home", "About Us")
                $output .= '<a href="' . esc_attr($item->url) . '" class="mt-4 uppercase block">' . esc_html($item->title) . '</a>';
            }
        } else {
            // Submenu items (Service 1, Service 1.1, Service 1.2)
            if ($depth == 1) {
                $output .= '<li class="flex gap-4 content-center items-center">';
                $output .= '<a href="' . esc_attr($item->url) . '" class="text-black text-2xl hover:text-white transition-colors duration-400 ease-in-out">';
            } else {
                $output .= '<li>';
                $output .= '<a href="' . esc_attr($item->url) . '" class="text-lg transition-colors duration-400 ease-in-out">';
            }
            $output .= esc_html($item->title) . '</a>';
        }
    }

    // End Each Menu Item
    function end_el( &$output, $item, $depth = 0, $args = null ) {
        if ($depth !== 0) {
            $output .= '</li>';
        }
        if ($depth === 0 && !empty($args->walker->has_children)) {
            $output .= '</div>'; // Close accordionGrid for "Services"
        }
    }
}
?>
