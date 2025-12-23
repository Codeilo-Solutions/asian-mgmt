  <!-- subscribe  -->

  <div class="bg-[--hading-color] w-full md:h-[100px] lg:md:w-[80%] mt-14 z-1 relative ">

    <div class="w-full text-white px-4 py-6 lg:md:ml-20
            flex flex-col md:flex-row 
            md:justify-around md:items-center gap-6 md:gap-0">

      <!-- Left Section -->
      <div class="text-center md:text-left 
            px-2 sm:px-0                   w-full md:w-auto"> <!-- added -->

        <ul class="text-[12px] md:text-[14px] lato-light list-disc marker:text-white mb-2 
             flex justify-center md:justify-start"> <!-- added -->
          <li>Newsletter Subscription</li>
        </ul>

        <h1 class="text-[16px] sm:text-[18px] md:text-[20px] 
             latoRegular leading-snug 
             px-1 sm:px-0"> <!-- added -->
          What's the latest with Asia Management?
        </h1>

      </div>


      <!-- Right Section Button -->
      <div class="flex justify-center md:justify-end">
        <button class="lato-light flex items-center gap-2
             px-5 py-3 text-[16px] md:text-[18px]
             bg-black text-[#A3A3A3] border border-white/30 shadow-md
             transition-all duration-300 ease-in-out
             hover:text-[--hading-color] ">
          <img src="<?php echo DK_IMG; ?>/mail-icon.png" alt="mail" class="w-4 h-4 md:w-5 md:h-5 object-contain" />
          Subscribe Now
        </button>
      </div>

    </div>



  </div>

  <!-- footer  -->
  <footer class="bg-[#242C43] text-gray-300 bottom-14 relative ">
    <div class="w-full max-sm:w-[85%] lg:md:w-[75%] mx-auto py-20">

      <!-- Grid Wrapper -->
      <div class="grid grid-cols-1 md:grid-cols-4 mt-1">
        <div class="w-[330px] ml-0 sm:ml-10 md:ml-14 text-center md:text-left">

          <ul class="text-white text-[18px] lato-light marker:text-white mx-auto md:mx-0">
            <li> • Get in touch </li>
          </ul>

          <p class="text-[22px] tracking-wider latoRegular text-white mt-2">
            How can we help you?
          </p>

          <div class="flex items-center gap-2 latoRegular tracking-widest cursor-pointer 
            justify-center md:justify-start ml-0 md:ml-16 mt-3 group">
            <a href="<?php echo site_url('/contact'); ?>" class="flex items-center gap-2">
              <span
                class="text-[--text-color] text-[16px] latoRegular transition-colors duration-300 group-hover:text-[--hading-color]">
                Contact us
              </span>
            </a>

            <div
              class="w-16 relative after:content-[''] after:absolute after:w-full after:h-[2px] 
              after:bg-white after:top-[1px] after:right-1 group-hover:after:bg-[--hading-color] transition-colors duration-300">
            </div>

          </div>


        </div>

         <!-- Footer Menus -->
            <?php
            $footer_menus = ['footer-menu-1', 'footer-menu-2', 'footer-menu-3']; // Menu locations registered in theme
            foreach ($footer_menus as $menu_location):
                if (has_nav_menu($menu_location)):
                    $menu_items = wp_get_nav_menu_items(wp_get_nav_menu_object(get_nav_menu_locations()[$menu_location]));
            ?>
                <div class="px-4 sm:px-8 md:ml-8 ml-24 mt-6 md:mt-0">
                    <h2 class="text-white text-[22px] sm:text-[26px] md:text-[28px] latoRegular">
                        <?php echo wp_get_nav_menu_object(get_nav_menu_locations()[$menu_location])->name; ?>
                    </h2>
                    <ul class="lato-light text-[14px] sm:text-[16px] list-disc ml-5 marker:text-gray-400 space-y-1 mt-1">
                        <?php foreach ($menu_items as $item): ?>
                            <li class="hover:marker:text-[--hading-color] transition-colors duration-300">
                                <a href="<?php echo esc_url($item->url); ?>" class="transition-colors duration-300 hover:text-white">
                                    <?php echo esc_html($item->title); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; endforeach; ?>



      </div>
    </div>
  </footer>


  <!-- get touch  -->
  <div class="w-full sm:w-[85%] lg:md:w-[75%] mx-auto">

    <div class="flex flex-wrap md:gap-28">

      <!-- Contact Card -->
        <?php if( have_rows('address', 'option') ): ?>
        <?php while( have_rows('address', 'option') ): the_row(); ?>
   <div class="w-full sm:w-60 latoRegular text-[--text-color] px-4 sm:px-0">

    <div class="space-y-4">
   <div class="w-full sm:w-60 latoRegular text-[--text-color] px-4 sm:px-0 address-list">

    <?php
            $country = get_sub_field('country');
            $address = get_sub_field('address');
            $phone   = get_sub_field('phone');
            $email   = get_sub_field('email');
        ?>
        <div class="address-item space-y-4 relative">

            <!-- Location -->
            <?php if($country): ?>
            <div class="flex items-center gap-2">
                <img src="<?php echo DK_IMG; ?>/location.png" class="w-3 h-3 sm:w-5 sm:h-5" alt="Location Icon">
                <h1 class="md:text-[20px] sm:text-[22px] lato-light text-black"><?php echo esc_html($country); ?></h1>
            </div>
            <?php endif; ?>

            <!-- Contact Info -->
            <?php if($address || $phone || $email): ?>
            <div class="contact-info w-72 ml-0 sm:ml-8 space-y-1 text-[14px] sm:text-[14px] lato-light">
                <?php if($address): ?><p><a class="hover:text-[--hading-color]"><?php echo wp_kses_post($address); ?></a></p><?php endif; ?>
                <?php if($phone): ?><p><a href="tel:<?php echo esc_attr($phone); ?>" class="hover:text-[--hading-color]">T: <?php echo esc_html($phone); ?></a></p><?php endif; ?>
                <?php if($email): ?><p>E: <a href="mailto:<?php echo esc_attr($email); ?>" class="hover:underline hover:text-[--hading-color]"><?php echo esc_html($email); ?></a></p><?php endif; ?>
            </div>
            <?php endif; ?>

            <!-- Divider Line -->
            <div class="divider absolute w-[250px] h-0.5 bg-[#E5E5E5] left-0 bottom-0" ></div>

        </div>
      

</div>

      
    </div>
</div>
  <?php endwhile; ?>
    <?php endif; ?>

    </div>

    <!-- term Conditions  -->
    <div class="flex flex-col md:flex-row justify-between items-center py-6 px-4 text-[--text-color] gap-4">
      <!-- Left: Copyright & Links -->
      <div class="text-center md:text-left space-y-2">
        <h1 class="text-[12px] latoRegular">Copyright &copy; 2025 Asia Management. All Rights Reserved.</h1>
        <div class="flex flex-wrap justify-center md:justify-start gap-4 text-[12px]">
          <a href="<?php get_site_url(); ?>/privacy-policy/" class="hover:underline">Privacy Policy</a>
          <a href="<?php get_site_url(); ?>/terms-conditions/" class="hover:underline">Terms & Conditions</a>
        </div>
      </div>

      <!-- Right: Social Icons -->
      <div class="flex gap-8 md:gap-2 md:mr-30 mr-0 ml-4 md:ml-0">
    <?php
    $linkedin  = get_field('linkedin', 'option');
    $facebook  = get_field('facebook', 'option');
    $instagram = get_field('instagram', 'option');
    $twitter   = get_field('x', 'option');
    ?>
    
    <?php if($linkedin): ?>
        <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener">
            <img src="<?php echo DK_IMG; ?>/linkedin.png" alt="LinkedIn"
                 class="w-5 h-5 hover:bg-[#0A66C2] rounded-full transition" />
        </a>
    <?php endif; ?>

    <?php if($facebook): ?>
        <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener">
            <img src="<?php echo DK_IMG; ?>/facebook.png" alt="Facebook"
                 class="w-5 h-5 transition hover:bg-[#0866FF] rounded-full" />
        </a>
    <?php endif; ?>

    <?php if($instagram): ?>
        <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener">
            <img src="<?php echo DK_IMG; ?>/instagram.png" alt="Instagram"
                 class="w-5 h-5 transition hover:bg-[#FC1855] rounded-full" />
        </a>
    <?php endif; ?>

    <?php if($twitter): ?>
        <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener">
            <img src="<?php echo DK_IMG; ?>/twitter.png" alt="Twitter"
                 class="w-5 h-5 hover:opacity-80 transition hover:bg-[#4B4B4B] rounded-full" />
        </a>
    <?php endif; ?>
</div>

    </div>
  </div>
  <style>
  .form-input,
.form-textarea {
  width: 100%;
  border: 1px solid #d1d5db;
  padding: 0.75rem;
  font-size: 15px;
}

.form-input:focus,
.form-textarea:focus {
  outline: none;
  border:1px solid var(--hading-color);
}

.form-file {
  width: 100%;
  border: 1px solid #d1d5db;
  padding: 0.5rem 1rem;
}

.form-submit {
  cursor: pointer;
  width: 100%;
  text-transform: uppercase;
  color: white;
  background-color: var(--hading-color);
  padding: 0.75rem 3rem;
  font-size: 17px;
  letter-spacing: 0.1em;
  transition: background-color 0.3s;
}

.form-submit:hover {
  background-color: black;
}

@media (min-width: 640px) {
  .form-submit {
    width: auto;
  }
}
  .form-input.wpcf7-not-valid {
  
    border: 1px solid #d34343ff;
   
}</style>
  <script>
    function setEqualHeight() {
    const items = document.querySelectorAll('.address-item');
    let maxHeight = 0;

    // Reset height first
    items.forEach(item => {
      item.style.height = 'auto';
    });

    // Find max height
    items.forEach(item => {
      const height = item.offsetHeight;
      if(height > maxHeight) maxHeight = height;
    });

    // Set all to max height + 5px
    items.forEach(item => {
      item.style.height = (maxHeight + 5) + 'px';
    });
  }

  // Run on load and on window resize
  window.addEventListener('load', setEqualHeight);
  window.addEventListener('resize', setEqualHeight);

    </script>