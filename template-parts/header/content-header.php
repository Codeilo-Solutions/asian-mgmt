<?php
// Dynamic fields
$linkedin  = get_field('linkedin', 'option');
$facebook  = get_field('facebook', 'option');
$instagram = get_field('instagram', 'option');
$twitter   = get_field('x', 'option');
$phone     = get_field('phone', 'option') ?: '+971 4 395 0403';
$email     = get_field('email', 'option') ?: 'info@asiamanagementcs.com';


// Logo
$custom_logo_id = get_theme_mod('custom_logo');
$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
?>

<!-- Navbar -->
<nav id="navbar" class="fixed max-w-7xl mx-auto top-10 left-0 right-0 z-[100] transition-all duration-300 bg-white">
    <div class="flex items-center justify-between px-6 lg:px-12 h-20 md:h-24">
        <!-- Logo -->
        <a href="<?php echo site_url(); ?>" class="cursor-pointer group">
            <img src="<?php echo esc_url($logo[0]); ?>" alt="Asia Management" class="h-12 md:h-16 w-auto transition-transform group-hover:scale-105" />
        </a>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex items-center space-x-10 text-[11px] font-bold uppercase text-gray-800 tracking-[0.15em]">
            <?php
            if (has_nav_menu('header-menu')) :
                $menu_items = wp_get_nav_menu_items('header-menu');
                $parents = [];
                foreach ($menu_items as $item) if ($item->menu_item_parent == 0) $parents[$item->ID] = $item;

                foreach ($parents as $parent) {
                    $children = [];
                    foreach ($menu_items as $item) if ($item->menu_item_parent == $parent->ID) $children[] = $item;

                    if ($children) {
                        echo '<div class="dropdown group relative">';
                        echo '<a href="' . esc_url($parent->url) . '" class="hover:text-black transition flex items-center group">' . $parent->title . '<span class="ml-1.5 text-[8px]">▼</span></a>';
                        echo '<div class="dropdown-menu bg-white shadow-2xl border border-gray-100 absolute hidden group-hover:block z-50">';
                        echo '<div class="py-4">';
                        foreach ($children as $child) {
                            echo '<a href="' . esc_url($child->url) . '" class="dropdown-item block px-6 py-3 text-sm font-medium text-gray-700 hover:text-black">' . $child->title . '</a>';
                        }
                        echo '</div></div></div>';
                    } else {
                        echo '<a href="' . esc_url($parent->url) . '" class="hover:text-black transition flex items-center group">' . $parent->title . '</a>';
                    }
                }
            endif;
            ?>
        </div>

        <!-- Contact + Mobile Toggle -->
        <div class="flex items-center h-full">
                <button class="hidden sm:flex bg-black text-white h-full px-8 items-center space-x-3 text-[11px] font-bold uppercase tracking-[0.2em] hover:bg-black transition-colors duration-300">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path></svg>
                    <a href="/contact-us" >Contact</a>
                </button>
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


 <!-- Contact Overlay for Desktop/Laptop Hamburger -->
    <div class="overlay-backdrop" id="overlay-backdrop"></div>
    <div id="contact-overlay">
        <div class="flex justify-between items-center p-6 border-b border-gray-200">
            <img src="<?php echo esc_url($logo[0]); ?>" alt="Asia Management" class="h-12 w-auto" />
            <button id="overlay-close" class="p-2 hover:bg-gray-100 rounded transition-colors">
                <svg class="w-8 h-8 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <div class="flex-1 overflow-y-auto p-8">
            
           <?php if (have_rows('address', 'option')): ?>
            <?php while (have_rows('address', 'option')): the_row(); ?>

                <?php
                $country = get_sub_field('country');
                $address = get_sub_field('address');
                $phone   = get_sub_field('phone');
                $email   = get_sub_field('email');
                ?>
            <!-- Dubai Location -->
            <div class="mb-8">
                <div class="flex items-start ">
                    <svg class="w-5 h-5 text-gray-600 mt-1 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                    </svg>
                    <h3 class="text-xl font-bold text-gray-900"><?php echo $country;?></h3>
                </div>
                <p class="text-gray-700 ml-7 "><?php echo $address;?></p>
                <p class="text-gray-700 ml-7"><span class="font-semibold">T:</span> <?php echo $phone;?></p>
                <p class="text-gray-700 ml-7"><span class="font-semibold">E:</span> <?php echo $email;?></p>
            </div>
            
            <?php endwhile; ?>
            <?php endif; ?>
            
            <!-- Social Media Icons -->
            <div class="flex space-x-4 justify-center">
              <?php  if ($linkedin): ?>
                <a href="<?php echo esc_url($linkedin); ?>" class="w-10 h-10 flex items-center justify-center rounded-full bg-white hover:bg-black text-gray-700 hover:text-white transition-all duration-300 shadow-md">
                   <img src="<?php echo DK_IMG; ?>/linkedin.png" alt="LinkedIn"
                 class="w-6 h-6 hover:bg-[#0A66C2] rounded-full transition" />
                </a>
                <?php endif; ?>
                <?php if ($facebook): ?>
                <a href="<?php echo esc_url($facebook); ?>" class="w-10 h-10 flex items-center justify-center rounded-full bg-white hover:bg-black text-gray-700 hover:text-white transition-all duration-300 shadow-md">
                    <!-- <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg> -->
                <img src="<?php echo DK_IMG; ?>/facebook.png" alt="Facebook"
                 class="w-6 h-6 transition hover:bg-[#0866FF] rounded-full" />
                </a>
                <?php endif; ?>
                <?php if ($instagram): ?>
                <a href="<?php echo esc_url($instagram); ?>" class="w-10 h-10 flex items-center justify-center rounded-full bg-white hover:bg-black text-gray-700 hover:text-white transition-all duration-300 shadow-md">
                    <!-- <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.045 4.126H5.078z"/></svg> -->
                            <img src="<?php echo DK_IMG; ?>/instagram.png" alt="Instagram"
                 class="w-6 h-6 transition hover:bg-[#FC1855] rounded-full" />
                </a>
                <?php endif; ?>
                <?php if ($twitter): ?>
                <a href="<?php echo esc_url($twitter); ?>" class="w-10 h-10 flex items-center justify-center rounded-full bg-white hover:bg-black text-gray-700 hover:text-white transition-all duration-300 shadow-md">
                    <!-- <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg> -->
                           <img src="<?php echo DK_IMG; ?>/twitter.png" alt="Twitter"
                 class="w-6 h-6 hover:opacity-80 transition hover:bg-[#4B4B4B] rounded-full" />
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<!-- Mobile Menu Overlay -->
<div id="mobile-menu" class="lg:hidden fixed inset-0 bg-gradient-to-br from-white via-gray-50 to-gray-100 backdrop-blur-xl z-[99] flex flex-col overflow-hidden hidden">
    <div class="flex justify-between items-center p-4 sm:p-6 flex-shrink-0">
        <img src="<?php echo esc_url($logo[0]); ?>" alt="Asia Management" class="h-10 sm:h-12 w-auto" />
        <button id="menu-close" class="p-2 hover:bg-white/50 rounded-full transition-all duration-300">
            ✕
        </button>
    </div>
    <div class="flex-1 flex flex-col px-6 sm:px-8 pb-6 sm:pb-10 pt-4 overflow-y-auto">
        <!-- Menu Items -->
        <nav class="space-y-1 sm:space-y-2 mb-6 sm:mb-8">
            <?php
            foreach ($parents as $parent) {
                $children = [];
                foreach ($menu_items as $item) if ($item->menu_item_parent == $parent->ID) $children[] = $item;


                if ($children) {
                    echo '<div class="border-b border-gray-200">';
                    // Text link
                    echo '<a href="' . esc_url($parent->url) . '" class="py-4 sm:py-5 text-xl sm:text-2xl font-bold text-gray-900 hover:text-black transition-all duration-300">' . esc_html($parent->title) . '</a>';
                    // Arrow toggle
                    echo ' <button class="mobile-dropdown-toggle p-4">
    <svg class="w-5 h-5 text-gray-400 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
    </svg>
  </button>';
                    // Submenu
                    echo '<div class="mobile-dropdown-content hidden pl-4 pb-2 space-y-1">';
                    foreach ($children as $child) echo '<a href="' . esc_url($child->url) . '" class="block py-2 text-sm text-gray-600 hover:text-black transition-colors">' . esc_html($child->title) . '</a>';
                    echo '</div></div>';
                } else {
                    echo '<a href="' . esc_url($parent->url) . '" class="mobile-menu-item group flex items-center justify-between py-4 sm:py-5 border-b border-gray-200 hover:border-black transition-all duration-300">';
                    echo '<span class="text-xl sm:text-2xl font-bold text-gray-900 group-hover:text-black">' . $parent->title . '</span></a>';
                }
            }
            ?>
        </nav>

         <div class="mb-6 sm:mb-8">
                <a href="/contact-us" class="flex items-center justify-center space-x-3 bg-black text-white px-6 sm:px-8 py-4 sm:py-5 rounded-none hover:bg-black transition-all duration-300 shadow-xl hover:shadow-2xl group">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                    </svg>
                    <span class="text-sm font-bold uppercase tracking-[0.2em]">Contact Us</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
            
            <!-- Contact Info -->
            <div class="space-y-3 sm:space-y-4 text-center">
                <div>
                    <p class="text-[10px] sm:text-xs uppercase tracking-widest text-gray-500 mb-1 sm:mb-2">Call Us</p>
                    <a href="tel:+97143950403" class="text-base sm:text-lg font-semibold text-gray-900 hover:text-black transition-colors">+971 4 395 0403</a>
                </div>
                <div>
                    <p class="text-[10px] sm:text-xs uppercase tracking-widest text-gray-500 mb-1 sm:mb-2">Email</p>
                    <a href="mailto:info@asiamanagementcs.com" class="text-xs sm:text-sm text-gray-900 hover:text-black transition-colors break-words">info@asiamanagementcs.com</a>
                </div>
            </div>
            
            <!-- Social Links -->
            <div class="flex justify-center gap-4 sm:gap-6 mt-6 sm:mt-8 pb-4">
                    <?php
    $linkedin  = get_field('linkedin', 'option');
    $facebook  = get_field('facebook', 'option');
    $instagram = get_field('instagram', 'option');
    $twitter   = get_field('x', 'option');
    
    if ($linkedin): ?>
                <a href="<?php echo esc_url($linkedin); ?>" class="w-10 h-10 flex items-center justify-center rounded-full bg-white hover:bg-black text-gray-700 hover:text-white transition-all duration-300 shadow-md">
                   <img src="<?php echo DK_IMG; ?>/linkedin.png" alt="LinkedIn"
                 class="w-6 h-6 hover:bg-[#0A66C2] rounded-full transition" />
                </a>
                <?php endif; ?>
                <?php if ($facebook): ?>
                <a href="<?php echo esc_url($facebook); ?>" class="w-10 h-10 flex items-center justify-center rounded-full bg-white hover:bg-black text-gray-700 hover:text-white transition-all duration-300 shadow-md">
                    <!-- <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg> -->
                <img src="<?php echo DK_IMG; ?>/facebook.png" alt="Facebook"
                 class="w-6 h-6 transition hover:bg-[#0866FF] rounded-full" />
                </a>
                <?php endif; ?>
                <?php if ($instagram): ?>
                <a href="<?php echo esc_url($instagram); ?>" class="w-10 h-10 flex items-center justify-center rounded-full bg-white hover:bg-black text-gray-700 hover:text-white transition-all duration-300 shadow-md">
                    <!-- <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.045 4.126H5.078z"/></svg> -->
                            <img src="<?php echo DK_IMG; ?>/instagram.png" alt="Instagram"
                 class="w-6 h-6 transition hover:bg-[#FC1855] rounded-full" />
                </a>
                <?php endif; ?>
                <?php if ($twitter): ?>
                <a href="<?php echo esc_url($twitter); ?>" class="w-10 h-10 flex items-center justify-center rounded-full bg-white hover:bg-black text-gray-700 hover:text-white transition-all duration-300 shadow-md">
                    <!-- <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg> -->
                           <img src="<?php echo DK_IMG; ?>/twitter.png" alt="Twitter"
                 class="w-6 h-6 hover:opacity-80 transition hover:bg-[#4B4B4B] rounded-full" />
                </a>
                <?php endif; ?>
            </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menu-toggle');
        const menuClose = document.getElementById('menu-close');
        const mobileMenu = document.getElementById('mobile-menu');

        const contactBtn = document.getElementById('desktop-contact-btn');
        const contactOverlay = document.getElementById('contact-overlay');
        const overlayClose = document.getElementById('overlay-close');

        // Mobile menu toggle
        menuToggle.addEventListener('click', () => mobileMenu.classList.remove('hidden'));
        menuClose.addEventListener('click', () => mobileMenu.classList.add('hidden'));

        // Mobile dropdown toggle
        document.querySelectorAll('.mobile-dropdown-toggle').forEach(btn => {
            btn.addEventListener('click', () => {
                const content = btn.nextElementSibling;
                if (content) content.classList.toggle('hidden');
            });
        });

        // Desktop contact overlay
        contactBtn.addEventListener('click', () => contactOverlay.classList.remove('hidden'));
        overlayClose.addEventListener('click', () => contactOverlay.classList.add('hidden'));
    });
</script>