<?php
/**
 * Template Name: Policy Layout
 */

get_header();
?>
<div class="insight w-full" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>);">
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

  <!-- TERMS & CONDITIONS SECTION -->
  <section class="w-full bg-gray-50 py-16 latoRegular">
    <div class="max-w-5xl mx-auto px-6">

      <!-- Heading -->
      <div class="text-center mb-10">
        <h1 class="text-[20px] sm:text-[22px] acta text-[--hading-color]">
          <?php echo get_field('section_title'); ?>
        </h1>
        <div class="w-24 h-1 bg-[--hading-color] mx-auto mt-4 rounded-full"></div>
      </div>

      <!-- Card -->
      <div
        class="bg-white rounded-2xl shadow-lg p-6 sm:p-10 space-y-6 leading-relaxed text-[15px] sm:text-[16px] text-gray-600">

       <?php the_content(); ?>
      </div>
    </div>
  </section>

<?php get_footer(); ?>