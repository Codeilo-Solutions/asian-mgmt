
   <?php

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

// get_template_part('template-parts/common/banner');
?>
</div>
   <div class="absolute 
            top-40 sm:md:top-56 md:top-64 
            left-1/2 md:left-56 
            -translate-x-1/2 md:translate-x-0">

      <div class="text-white text-center md:text-left">
        <h1 class="acta tracking-[2px] text-[28px] sm:text-[34px] md:text-[38px]">
          <?php the_title(); ?>
        </h1>

        <div class="mt-6">
          <div class="w-20 mx-auto md:mx-0 relative 
               after:content-[''] after:absolute after:w-full after:h-[2px] 
               after:bg-white after:bottom-0 md:ml-2">
          </div>
        </div>
      </div>

    </div>

  </div>

  <!-- blog -->
  <div class="max-w-5xl mx-auto px-4 sm:px-6 py-10">

    <!-- Header -->
    <div class="mb-12">
        <h1 class="text-[30px] sm:text-[38px] acta mb-2 text-[--hading-color]">
            <?php the_title(); ?>
        </h1>

        <span class="text-[11px] sm:text-[12px] text-gray-400">
            <?php echo get_the_date('F d, Y'); ?>
        </span>
    </div>

    <!-- Blog Content -->
    <div class="prose max-w-none text-gray-700 acta leading-relaxed">
        <?php
$content = get_the_content();
$content = preg_replace('/^<p>(.*)<\/p>$/s', '$1', $content);
echo $content
?>

    </div>

</div>


  </div>

  <!-- Related  -->

<div class="max-w-5xl mx-auto px-4 py-16">

    <div class="text-black text-center md:text-left">
        <h1 class="acta tracking-[2px] text-[28px] sm:text-[34px] md:text-[38px]">Related</h1>

        <div class="mt-6">
            <div class="w-20 mx-auto md:mx-0 relative 
                 after:content-[''] after:absolute after:w-full after:h-[2px] 
                 after:bg-black after:bottom-0 md:ml-2">
            </div>
        </div>
    </div>

    <?php
    $related = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'post__not_in'   => [get_the_ID()],
    ]);
    ?>

    <div class="flex flex-col md:flex-row md:space-x-6 space-y-6 md:space-y-0 flex-wrap mb-12 mt-24">

        <?php while ($related->have_posts()) : $related->the_post(); ?>
            <div class="flex-1 duration-300 overflow-hidden group">

                <div class="overflow-hidden">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>" 
                         class="w-full h-60 object-cover transition-transform duration-500 hover:scale-105">
                </div>

                <div class="p-4 space-y-3">
                    <h4 class="text-[14px] text-gray-500 latoRegular">
                        <?php echo get_the_date('F d, Y'); ?>
                    </h4>

                    <a href="<?php the_permalink(); ?>">
                        <h1 class="text-[20px] latoRegular text-gray-900 transition-colors duration-300 group-hover:text-[--hading-color]">
                            <?php the_title(); ?>
                        </h1>
                    </a>

                    <p class="text-gray-600 text-sm leading-relaxed lato-light">
                        <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                    </p>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>

    </div>

</div>

<?php
get_footer();
?>