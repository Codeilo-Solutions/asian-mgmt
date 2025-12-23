<?php
/**
 * Template Name: Contact Layout
 */
get_header();
?>
<div class="contact w-full" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>);">
    <?php

    /**
     * asiamanagement_header_content hook
     *
     * @hooked asiamanagement_output_header_content()
     *
     */
    do_action( 'asiamanagement_header_content' );

?>
<?php

get_template_part('template-parts/common/banner');
?>
  <div class="absolute 
            top-40 sm:md:top-56 md:top-64 
            left-1/2 md:left-56 
            -translate-x-1/2 md:translate-x-0">

        <div class="text-white md:text-left">
          <h1 class="acta tracking-[2px] text-[28px] sm:text-[34px] md:text-[38px]">
            Contact Us
          </h1>

          <div class="mt-6">
            <div class="w-20 mx-auto md:mx-0 relative 
               after:content-[''] after:absolute after:w-full after:h-[2px] 
               after:bg-white after:bottom-0 md:ml-2 ml-0">
            </div>
          </div>
        </div>

      </div>
</div>
 <div class="w-[90%] sm:w-10/12 md:w-8/12 mx-auto mt-10 
            grid grid-cols-1 sm:grid-cols-3 gap-10 sm:gap-20 text-black">

      <!-- Address -->
         <?php if(get_field('address')): ?>
      <div class="latoRegular space-y-2 text-center sm:text-left">
        <h1 class="text-[24px]">Address</h1>
        <a >
          <p class="text-[14px]"><?php echo get_field('address');?></p>
        </a>
      </div>
      <?php endif; ?>
      <!-- Phone -->
      <?php if(get_field('phone')): ?>
      <div class="latoRegular space-y-2 text-center sm:text-left md:ml-20">
        <h1 class="text-[24px]">Phone</h1>
        <a href="tel:<?php echo get_field('phone');?>">
          <p class="text-[14px]"><?php echo get_field('phone');?></p>
        </a>
      </div>
      <?php endif; ?>

      <!-- Email -->
      <?php if(get_field('email')): ?>
      <div class="latoRegular space-y-2 text-center sm:text-left">
        <h1 class="text-[24px]">Email</h1>
        <a href="mailto:<?php echo get_field('email');?>">
          <p class="text-[14px]"><?php echo get_field('email');?></p>
        </a>
      </div>
      <?php endif; ?>

    </div>
    <!-- Get in Touch  -->
    <div class="w-full sm:w-[70%] md:ml-44 bg-gray-100">

      <div class="w-[95%] sm:w-10/12 md:w-8/12 mx-auto mt-12 p-6 relative sm:right-0">

        <h1 class="text-[24px] sm:text-[30px] latoRegular">
          Get in Touch
        </h1>
        <p class="text-[14px] latoRegular">Reach out for any inquiries or consultation</p>

        <?php echo do_shortcode('[contact-form-7 id="cd00a1a" title="contact"]'); ?>

      </div>
    </div>
  
<?php get_footer(); ?>
