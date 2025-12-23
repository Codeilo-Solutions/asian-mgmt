<!-- Newsletter Subscription Section -->
<section class="relative gsap-reveal">
    <div class="max-w-7xl bg-[#c02428] py-8 px-6 md:px-12 lg:px-24 flex flex-col md:flex-row justify-between items-center gap-8">
        <div class="text-white">
            <div class="flex items-center gap-2 mb-2">
                <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
                <p class="text-sm font-light opacity-90 uppercase tracking-widest">Newsletter subscription</p>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold">What's the latest with Asia Management</h2>
        </div>
        <button class="flex items-center gap-3 bg-black text-white px-8 py-4 hover:bg-zinc-900 transition-all group">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-80 group-hover:scale-110 transition-transform"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
            <span class="text-sm font-semibold tracking-widest uppercase">Subscribe now</span>
        </button>
    </div>
</section>

<!-- Dark Main Footer Section -->
<section class="bg-[#242a3a] py-24 px-6 md:px-12 lg:px-24 md:-mt-10">
    <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-16">

        <!-- Contact Block -->
        <div class="lg:col-span-5 flex flex-col justify-start gsap-reveal">
            <div class="flex items-center gap-2 mb-4">
                <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
                <p class="text-gray-400 text-lg font-light">Get in touch</p>
            </div>
            <h1 class="text-4xl font-bold mb-4 text-white leading-tight">
               How can we help you?
            </h1>
            <a href="/contact-us">
            <div class="flex items-center gap-5 group cursor-pointer w-4/5 lg:justify-end">
                <span class="text-xl font-light text-gray-300 group-hover:text-white transition-colors">Contact us</span>
                <div class="w-24 h-px bg-white"></div>
            </div>
            </a>
        </div>

        <!-- Navigation Columns -->
        <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-3 gap-12">
            <?php
            $footer_menus = ['footer-menu-1', 'footer-menu-2', 'footer-menu-3'];
            foreach ($footer_menus as $menu_location):
                if (has_nav_menu($menu_location)):
                    $menu_items = wp_get_nav_menu_items(wp_get_nav_menu_object(get_nav_menu_locations()[$menu_location]));
            ?>
            <div class="gsap-reveal">
                <h3 class="text-3xl font-bold mb-8 text-white">
                    <?php echo wp_get_nav_menu_object(get_nav_menu_locations()[$menu_location])->name; ?>
                </h3>
                <ul class="space-y-4 text-gray-400 font-light">
                    <?php foreach ($menu_items as $item): ?>
                        <li class="flex items-center gap-3 group">
                            <span class="w-1.5 h-1.5 bg-gray-500 rounded-full group-hover:bg-white transition-colors"></span>
                            <a href="<?php echo esc_url($item->url); ?>" class="hover:text-white transition-colors text-lg">
                                <?php echo esc_html($item->title); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; endforeach; ?>
        </div>

    </div>
</section>

<!-- Light Locations Section -->
<section class="bg-white text-[#333] pt-24 pb-16 px-6 md:px-12 lg:px-24">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-16 mb-24">
            <?php if(have_rows('address', 'option')): ?>
                <?php while(have_rows('address', 'option')): the_row();
                    $country = get_sub_field('country');
                    $address = get_sub_field('address');
                    $phone   = get_sub_field('phone');
                    $email   = get_sub_field('email');
                ?>
            <div class="gsap-reveal">
                <div class="flex gap-4 mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400 mt-1"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    <h4 class="text-xl font-medium text-gray-400 tracking-widest"><?php echo esc_html($country); ?></h4>
                </div>
                <div class="pl-10 space-y-1 text-gray-500 text-sm leading-relaxed font-light">
                    <?php if($address): ?><p class="mb-2"><?php echo wp_kses_post($address); ?></p><?php endif; ?>
                    <?php if($phone): ?> <p>T: <a href="tel:<?php echo esc_html($phone); ?>" class="hover:text-[#C41E3A]"><?php echo esc_html($phone); ?></a></p><?php endif; ?>
                    <?php if($email): ?><p>E: <a href="mailto:<?php echo esc_html($email); ?>" class="hover:text-[#C41E3A]"><?php echo esc_html($email); ?></a></p><?php endif; ?>
                </div>
                <div class="mt-10 h-[1px] w-full bg-gray-200"></div>
            </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <!-- Footer Bottom -->
        <div class="pt-12 flex flex-col md:flex-row justify-between items-center gap-8 text-sm text-gray-400">
            <div class="flex flex-col gap-2 items-center md:items-start">
                <p>Copyright © 2025. Asia Management. All Rights reserved.</p>
                <div class="flex gap-4 opacity-70">
                    <a href="<?php echo site_url('/privacy-policy'); ?>" class="underline hover:text-black">Privacy Policy</a>
                    <a href="<?php echo site_url('/terms-conditions'); ?>" class="underline hover:text-black">Terms & Conditions</a>
                </div>
            </div>
            <div class="flex gap-8 items-center">
               <?php
    $linkedin  = get_field('linkedin', 'option');
    $facebook  = get_field('facebook', 'option');
    $instagram = get_field('instagram', 'option');
    $twitter   = get_field('x', 'option');
    
                    if($linkedin):
                        echo '<a href="'.esc_url($linkedin).'" target="_blank" class="hover:text-[#c02428] transition-colors">';
                        echo '<img src="'.DK_IMG.'/linkedin.png" alt="LinkedIn" class="w-5 h-5"/>';
                        echo '</a>';
                    endif;
                    if($facebook):
                        echo '<a href="'.esc_url($facebook).'" target="_blank" class="hover:text-[#c02428] transition-colors">';
                        echo '<img src="'.DK_IMG.'/facebook.png" alt="Facebook" class="w-5 h-5"/>';
                        echo '</a>';
                    endif;
                    if($instagram):
                        echo '<a href="'.esc_url($instagram).'" target="_blank" class="hover:text-[#c02428] transition-colors">';
                        echo '<img src="'.DK_IMG.'/instagram.png" alt="Instagram" class="w-5 h-5"/>';
                        echo '</a>';
                    endif;
                    if($twitter):
                        echo '<a href="'.esc_url($twitter).'" target="_blank" class="hover:text-[#c02428] transition-colors">';
                        echo '<img src="'.DK_IMG.'/twitter.png" alt="Twitter/X" class="w-5 h-5"/>';
                        echo '</a>';
                    endif;
              
                ?>
            </div>
        </div>
    </div>
</section>
