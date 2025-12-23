<?php
// Get social links and contact info dynamically
$linkedin  = get_field('linkedin', 'option');
$facebook  = get_field('facebook', 'option');
$instagram = get_field('instagram', 'option');
$twitter   = get_field('x', 'option');
$phone     = get_field('phone', 'option') ?: '+971 4 395 0403';
$email     = get_field('email', 'option') ?: 'info@asiamanagementcs.com';
$contact_page = get_permalink(get_page_by_path('contact'));
?>

<!-- Navbar -->
<nav id="navbar" class="fixed max-w-7xl mx-auto top-10 left-0 right-0 z-[100] transition-all duration-300 bg-white">
    <div class="flex items-center justify-between px-6 lg:px-12 h-20 md:h-24">
        <!-- Logo -->
        <div class="cursor-pointer group">
            <a href="<?php echo site_url(); ?>">
              <?php
              $custom_logo_id = get_theme_mod('custom_logo');
              $image = wp_get_attachment_image_src($custom_logo_id, 'full');
              ?>
                <img src="<?php echo esc_url($image[0]); ?>" alt="Asia Management" class="h-12 md:h-16 w-auto transition-transform group-hover:scale-105" />
                <div class="text-[10px] md:text-xs font-bold uppercase tracking-[0.2em] text-gray-900 leading-[1.2]">Asia Management</div>
            </a>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex items-center space-x-10 text-[11px] font-bold uppercase text-gray-800 tracking-[0.15em]">
            <?php
            if (has_nav_menu('header-menu')) :
                wp_nav_menu(array(
                    'theme_location' => 'header-menu',
                    'container'      => false,
                    'items_wrap'     => '%3$s',
                    'depth'          => 2,
                    'walker'         => new bs4Navwalker(),
                ));
            endif;
            ?>
        </div>

        <!-- Contact & Mobile Button -->
        <div class="flex items-center h-full">
            <!-- Contact Button -->
            <a href="/contact-us" class="hidden sm:flex bg-[#C41E3A] text-white h-full px-8 items-center space-x-3 text-[11px] font-bold uppercase tracking-[0.2em] hover:bg-black transition-colors duration-300">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
                <span>Contact</span>
            </a>

            <!-- Mobile Menu Toggle -->
            <button id="menu-toggle" class="p-6 md:p-8 border-l border-gray-100 h-full flex items-center hover:bg-gray-50 transition-colors">
                <div class="w-6 flex flex-col items-end space-y-1.5">
                    <span class="burger-line block h-0.5 bg-gray-900 w-6 transition-all duration-300"></span>
                    <span class="burger-line block h-0.5 bg-gray-900 w-4 transition-all duration-300"></span>
                    <span class="burger-line block h-0.5 bg-gray-900 w-5 transition-all duration-300"></span>
                </div>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Overlay Menu -->
<div id="mobile-menu" class="lg:hidden fixed inset-0 bg-gradient-to-br from-white via-gray-50 to-gray-100 backdrop-blur-xl z-[99] flex flex-col overflow-hidden hidden">
    <!-- Close Button -->
    <div class="flex justify-between items-center p-4 sm:p-6 flex-shrink-0">
        <a href="<?php echo site_url(); ?>">
            <img src="<?php echo esc_url($image[0]); ?>" alt="Asia Management" class="h-10 sm:h-12 w-auto" />
        </a>
        <button id="menu-close" class="p-2 hover:bg-white/50 rounded-full transition-all duration-300 group">
            <svg class="w-6 h-6 text-gray-900 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <!-- Menu Content -->
    <div class="flex-1 flex flex-col px-6 sm:px-8 pb-6 sm:pb-10 pt-4 overflow-y-auto">
        <?php
        if (has_nav_menu('header-menu')) :
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'container'      => false,
                'items_wrap'     => '<nav class="space-y-1 sm:space-y-2 mb-6 sm:mb-8">%3$s</nav>',
                'depth'          => 2,
                'walker'         => new class extends Walker_Nav_Menu {
                    public function start_lvl(&$output, $depth = 0, $args = []) {
                        $indent = str_repeat("\t", $depth);
                        $output .= "\n$indent<ul class='pl-4 border-l border-gray-200 mt-2 space-y-1'>\n";
                    }
                    public function end_lvl(&$output, $depth = 0, $args = []) {
                        $output .= "</ul>\n";
                    }
                    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {
                        $has_children = in_array('menu-item-has-children', $item->classes);
                        $output .= '<a href="'.esc_url($item->url).'" class="mobile-menu-item group flex items-center justify-between py-4 sm:py-5 border-b border-gray-200 hover:border-[#C41E3A] transition-all duration-300">';
                        $output .= '<span class="text-xl sm:text-2xl font-bold text-gray-900 group-hover:text-[#C41E3A] group-hover:translate-x-2 transition-all duration-300">'.esc_html($item->title).'</span>';
                        if ($has_children) {
                            $output .= '<svg class="w-5 h-5 text-gray-400 group-hover:text-[#C41E3A] group-hover:translate-x-1 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>';
                        }
                        $output .= '</a>';
                    }
                    public function end_el(&$output, $item, $depth = 0, $args = []) { $output .= "\n"; }
                },
            ));
        endif;
        ?>

        <!-- Contact Button -->
        <div class="mb-6 sm:mb-8">
            <a href="/contact-us" class="flex items-center justify-center space-x-3 bg-[#C41E3A] text-white px-6 sm:px-8 py-4 sm:py-5 rounded-none hover:bg-black transition-all duration-300 shadow-xl hover:shadow-2xl group">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
                <span class="text-sm font-bold uppercase tracking-[0.2em]">Contact Us</span>
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>

        <!-- Contact Info -->
        <div class="space-y-3 sm:space-y-4 text-center">
            <div>
                <p class="text-[10px] sm:text-xs uppercase tracking-widest text-gray-500 mb-1 sm:mb-2">Call Us</p>
                <a href="tel:<?php echo esc_attr($phone); ?>" class="text-base sm:text-lg font-semibold text-gray-900 hover:text-[#C41E3A] transition-colors"><?php echo esc_html($phone); ?></a>
            </div>
            <div>
                <p class="text-[10px] sm:text-xs uppercase tracking-widest text-gray-500 mb-1 sm:mb-2">Email</p>
                <a href="mailto:<?php echo esc_attr($email); ?>" class="text-xs sm:text-sm text-gray-900 hover:text-[#C41E3A] transition-colors break-words"><?php echo esc_html($email); ?></a>
            </div>
        </div>

        <!-- Social Links -->
        <div class="flex justify-center gap-4 sm:gap-6 mt-6 sm:mt-8 pb-4">
            <?php if($linkedin): ?><a href="<?php echo esc_url($linkedin); ?>" class="w-10 h-10 flex items-center justify-center rounded-full bg-white hover:bg-[#C41E3A] text-gray-700 hover:text-white transition-all duration-300 shadow-md"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg></a><?php endif; ?>
            <?php if($instagram): ?><a href="<?php echo esc_url($instagram); ?>" class="w-10 h-10 flex items-center justify-center rounded-full bg-white hover:bg-[#C41E3A] text-gray-700 hover:text-white transition-all duration-300 shadow-md"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/></svg></a><?php endif; ?>
            <?php if($facebook): ?><a href="<?php echo esc_url($facebook); ?>" class="w-10 h-10 flex items-center justify-center rounded-full bg-white hover:bg-[#C41E3A] text-gray-700 hover:text-white transition-all duration-300 shadow-md"><svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.522-4.477-10-10-10S2 6.478 2 12c0 4.991 3.657 9.128 8.438 9.879v-6.988H7.898v-2.89h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.772-1.63 1.562v1.875h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg></a><?php endif; ?>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('menu-toggle');
    const menuClose = document.getElementById('menu-close');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.remove('hidden');
    });

    menuClose.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
    });
});
</script>
