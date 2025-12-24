<?php
class Mobile_Navwalker extends Walker_Nav_Menu {

    public function start_lvl(&$output, $depth = 0, $args = []) {
        $output .= '<div class="mobile-submenu hidden pl-4 pb-3">';
    }

    public function end_lvl(&$output, $depth = 0, $args = []) {
        $output .= '</div>';
    }

    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {

        $has_children = in_array('menu-item-has-children', $item->classes);

        if ($depth === 0) {

            $output .= '<div class="border-b">';

            $output .= '<div class="flex justify-between items-center py-4">';

            $output .= '<a href="'. esc_url($item->url) .'"
                         class="text-xl font-bold">'. esc_html($item->title) .'</a>';

            if ($has_children) {
                $output .= '
                <button type="button" class="mobile-submenu-toggle p-2">
                    ▶
                </button>';
            }

            $output .= '</div>';

        } else {

            $output .= '<a href="'. esc_url($item->url) .'"
                         class="block py-2 text-sm text-gray-600">'
                         . esc_html($item->title) .'</a>';
        }
    }

    public function end_el(&$output, $item, $depth = 0, $args = []) {
        if ($depth === 0) {
            $output .= '</div>';
        }
    }
}
