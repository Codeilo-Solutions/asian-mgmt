<?php get_header(); ?>

<div class="about w-full " >
       <?php

    /**
     * asiamanagement_header_content hook
     *
     * @hooked asiamanagement_output_header_content()
     *
     */
    do_action( 'asiamanagement_header_content' );

?>
</div>
 <div class="absolute top-64 sm:top-48 md:top-60 lg:top-60 w-full">
      <div class="grid place-items-center md:block w-[90%] sm:w-8/12 md:w-7/12 mx-auto md:ml-2 text-white">

        <!-- Small Title -->
        <p class="uppercase latoRegular tracking-[3px] 
              text-[14px] sm:text-[16px] md:text-[18px] 
              text-center md:text-left">
          <?php // echo get_field('banner_title'); ?>
        </p>

        <!-- Big Heading -->
        <p class="text-[24px] sm:text-[32px] md:text-[40px] lg:text-[46px] 
              acta tracking-wide leading-tight text-black
                mt-2 relative md:left-64 left-4 md:w-[880px]">
          404 NOT FOUND
          
        </p>
         <p class="uppercase latoRegular  tracking-wide leading-tight 
              text-[14px] sm:text-[16px] md:text-[18px] 
              text-center md:text-left text-black mt-4">
          <?php // echo get_field('banner_title'); ?>
          The Url you requested could not be found on this server.
        </p>

        <!-- Underline -->
        <div class=" mt-8 md:ml-0 ml-16">
          <div
            class="w-20 relative after:content-[''] after:absolute after:w-full after:h-[2px] after:bg-white after:bottom-0 after:right-36">
          </div>
        </div>

      </div>
    </div>

<?php get_footer(); ?>