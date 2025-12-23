<div class="w-full sticky top-0 z-50">
  <nav id="mainNavbar" data-header data-back-top-btn
    class="absolute lg:max-w-[70%] lg:md:left-52 top-0 left-0 w-full mx-auto bg-white mt-4 sm:mt-6 lg:mt-10 px-4 sm:px-6 lg:px-4 h-[82px]">
    <div class="flex items-center justify-between h-full ">

      <div class="w-full ">
        <div class="flex items-center justify-between h-20">
          <!-- Logo -->
          <div class="">
            <a href="<?php echo site_url(); ?>">
              <?php
              $custom_logo_id = get_theme_mod('custom_logo');
              $image = wp_get_attachment_image_src($custom_logo_id, 'full');
              ?>
              <img src="<?php echo esc_url($image[0]); ?>" class="logo" alt="Logo" width="135">
            </a>
          </div>

          <!-- Desktop Menu -->
          <div class="md:flex ">
            <ul class="hidden md:flex lg:md:space-x-5 gap-1 items-center uppercase text-[--text-color] mr-8">

              <?php
              // WordPress menu dynamic items
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

              <!-- Static Contact -->
              <li>
                <a href="<?php echo site_url('/contact'); ?>"
                  class="flex latoRegular items-center gap-1 px-6 lg:md:h-[82px] h-[82px] text-[12px] text-white bg-[--hading-color] shadow-md hover:shadow-lg transition-all duration-300 hover:bg-[--hading-color]/90">
                  <img src="<?php echo DK_IMG; ?>/pin.png" width="12" height="12" alt="location">
                  Contact
                </a>
              </li>
            </ul>

            <!-- Mobile Hamburger -->
            <label class="relative top-6 flex items-center cursor-pointer max-md:hidden h-6">
              <input type="checkbox" class="hidden peer">

              <!-- Hamburger icon -->
              <div class="bars" onclick="barsClose()">
                <div class="bars1"></div>
                <div class="bars2"></div>
                <div class="bars3"></div>
              </div>

              <!-- Menu container -->
              <div class="absolute top-[59px] right-0 z-10 w-80 sm:w-96 h-[550px] bg-white shadow-2xl p-4 hidden peer-checked:flex flex-col space-y-4 animate-slideIn">

                <!-- Logo  -->
                <div class="flex justify-center md:justify-start">
                  <a href="<?php echo site_url(); ?>">
                    <?php
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                    ?>
                    <img src="<?php echo esc_url($image[0]); ?>" class="w-32">
                  </a>
                </div>

                <div class="border-t border-[--hading-color]"></div>

                <!-- Locations -->
                <div class="flex flex-col space-y-2">

                  <?php if (have_rows('address', 'option')): ?>
                    <?php while (have_rows('address', 'option')): the_row(); ?>

                      <?php
                      $country = get_sub_field('country');
                      $address = get_sub_field('address');
                      $phone   = get_sub_field('phone');
                      $email   = get_sub_field('email');
                      ?>

                      <!-- One Location Card -->
                      <div class="flex flex-col">

                        <!-- Country + Location Icon -->
                        <div class="flex items-center gap-2">
                          <img src="<?php echo DK_IMG; ?>/location.png" class="w-5 h-5" alt="Location">
                          <h2 class="md:text-[22px] sm:text-[20px] font-light text-black">
                            <?php echo esc_html($country); ?>
                          </h2>
                        </div>

                        <!-- Address, phone, email -->
                        <div class="text-[12px] ml-6">
                          <?php if ($address): ?>
                            <p><a class="hover:text-[--hading-color]"><?php echo wp_kses_post($address); ?></a></p>
                          <?php endif; ?>

                          <?php if ($phone): ?>
                            <p><a href="tel:<?php echo esc_attr($phone); ?>" class="hover:text-[--hading-color]">
                                T: <?php echo esc_html($phone); ?></a></p>
                          <?php endif; ?>

                          <?php if ($email): ?>
                            <p>E:
                              <a href="mailto:<?php echo esc_attr($email); ?>"
                                class="hover:underline hover:text-[--hading-color]">
                                <?php echo esc_html($email); ?>
                              </a>
                            </p>
                          <?php endif; ?>
                        </div>

                        <!-- Divider -->
                        <div class="border-t border-gray-200 mt-2"></div>

                      </div>

                    <?php endwhile; ?>
                  <?php endif; ?>

                </div>

                <!-- Social Icons -->
                <div class="flex justify-center gap-6 mt-4">

                  <?php
                  $linkedin  = get_field('linkedin', 'option');
                  $facebook  = get_field('facebook', 'option');
                  $instagram = get_field('instagram', 'option');
                  $twitter   = get_field('x', 'option');
                  ?>

                  <?php if ($linkedin): ?>
                    <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener">
                      <img src="<?php echo DK_IMG; ?>/linkedin.png" alt="LinkedIn"
                        class="w-6 h-6 hover:bg-[#0A66C2] rounded-full transition" />
                    </a>
                  <?php endif; ?>

                  <?php if ($facebook): ?>
                    <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener">
                      <img src="<?php echo DK_IMG; ?>/facebook.png" alt="Facebook"
                        class="w-6 h-6 transition hover:bg-[#0866FF] rounded-full" />
                    </a>
                  <?php endif; ?>

                  <?php if ($instagram): ?>
                    <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener">
                      <img src="<?php echo DK_IMG; ?>/instagram.png" alt="Instagram"
                        class="w-6 h-6 transition hover:bg-[#FC1855] rounded-full" />
                    </a>
                  <?php endif; ?>

                  <?php if ($twitter): ?>
                    <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener">
                      <img src="<?php echo DK_IMG; ?>/twitter.png" alt="Twitter"
                        class="w-6 h-6 hover:opacity-80 transition hover:bg-[#4B4B4B] rounded-full" />
                    </a>
                  <?php endif; ?>

                </div>

            </label>
          </div>



        </div>
        <button id="menu-btn" class="md:hidden text-2xl focus:outline-none">
          ☰
        </button>
       <?php 
       class Mobile_Dropdown_Walker extends Walker_Nav_Menu {

    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0) {

        $has_children = in_array('menu-item-has-children', $item->classes);

        // Parent item wrapper (flex ensures arrow stays in same line)
        $output .= '<li class="">';

        $output .= '<div class="flex items-center justify-between px-6 py-3">';

        // Left side: the menu item link (clickable)
        $output .= '<a href="' . esc_attr($item->url) . '" 
                        class="tracking-widest text-[24px] text-white hover:text-white flex-1">'
                        . esc_html($item->title) . 
                    '</a>';

        // Right side: arrow toggle (only for parents)
        if ($has_children) {
            $output .= '
                <button class="submenu-toggle text-white text-2xl ml-4 transition-transform duration-300">
                    ▼
                </button>
            ';
        }

        $output .= '</div>'; // close flex container
    }

    public function start_lvl(&$output, $depth = 0, $args = []) {
        $output .= '<ul class="submenu hidden bg-black/60  pb-3">';
    }

    public function end_lvl(&$output, $depth = 0, $args = []) {
        $output .= '</ul>';
    }

    public function end_el(&$output, $item, $depth = 0, $args = []) {
        $output .= '</li>';
    }
}
?>
<div id="mobile-menu"
     class="hidden absolute right-0 top-full text-center w-full bg-transparent/80 shadow-xl z-50 latoRegular">

    <?php
    wp_nav_menu(array(
        'theme_location' => 'header-menu',
        'container'      => false,
        'items_wrap'     => '%3$s',
        'depth'          => 2,
        'walker'         => new Mobile_Dropdown_Walker(),
    ));
    ?>

    <li class="border-b">
        <a href="<?php echo site_url('/contact'); ?>"
           class="block px-6 py-3 tracking-widest text-[24px] text-white hover:bg-[--hading-color] transition">
            Contact
        </a>
    </li>

</div>
<script>
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".submenu-toggle").forEach(btn => {

        btn.addEventListener("click", (e) => {
            e.preventDefault();
            e.stopPropagation();

            const li = btn.closest("li");
            const submenu = li.querySelector(".submenu");

            // Toggle visibility
            submenu.classList.toggle("hidden");

            // Rotate arrow up/down
            if (submenu.classList.contains("hidden")) {
                btn.style.transform = "rotate(0deg)";
            } else {
                btn.style.transform = "rotate(180deg)";
            }
        });

    });
});
</script>



      </div>
    </div>
  </nav>
</div>