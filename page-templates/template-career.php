<?php
/**
 * Template Name: Career Layout
 */
get_header();
?>
<div class="career w-full" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>);">
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
</div>
 <!-- Hero Section -->
  <section class="bg-[--hading-color] text-white max-w-5xl  py-10 latoRegular">
    <div class=" text-center px-10">
      <h1 class="text-[28px] md:text-[36px] mb-4"><?php echo get_field('section_1_title');?></h1>
      <p class="text-[16px] md:text-[18px]"><?php echo get_field('section_1_description');?></p>
    </div>
  </section>


  <!-- Apply Form -->
  <div class="w-full sm:w-[70%] md:ml-48 bg-gray-100">

    <div class="w-[95%] sm:w-10/12 md:w-8/12 mx-auto mt-12 p-6 relative sm:right-0">

      <h1 class="text-[24px] sm:text-[30px] latoRegular">
        Apply Now
      </h1>


    <?php echo do_shortcode('[contact-form-7 id="e5124f7" title="Career"]'); ?>

    </div>
  </div>

<?php get_footer(); ?>
