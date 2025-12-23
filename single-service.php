 <?php echo get_header(); ?>
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
</div>
<div class="mt-10 lg:w-full">
    <!-- Top Description -->
    <div class="w-[90%]  mx-auto lg:w-8/12 text-black space-y-6 ">
      <div class=" sm:w-10/12 md:w-[85%]">
        <p class="latoRegular text-[15px] sm:text-[18px] md:text-[20px] text-center md:text-left tracking-[1px]">
          <?php echo nl2br(wp_strip_all_tags( get_field('paragraph_1')) ); ?>
        </p>
      </div>
    </div>

    <!-- Our Approach Section -->
    <div class="w-[90%] sm:w-10/12 md:w-7/12 lg:w-8/12 mx-auto text-black space-y-4 mt-12">
      <h1 class="text-[27px] font-bold text-center md:text-left">
           <?php echo nl2br(wp_strip_all_tags( get_field('title') )); ?>
      </h1>
      <p class="text-[13px] sm:text-[14px] md:text-[15px] leading-relaxed text-gray-700 text-center md:text-left">
        <?php echo nl2br(wp_strip_all_tags( get_field('paragraph_2')) ); ?>
      </p>
    </div>
  </div>


  <div class="relative top-0 w-full mx-auto bg-gray-50 mt-4 sm:mt-6 lg:mt-10 px-4 sm:px-6 lg:px-4">
  <div
    class="w-[90%] sm:w-10/12 md:w-9/12 lg:w-8/12 mx-auto latoRegular mt-10 py-10 flex flex-col md:flex-row gap-10">

    <!-- Our Audit Services Include -->
    <div class="space-y-3 md:w-1/2">
      <h1 class="text-[22px] sm:text-[24px] font-bold">
        <?php echo esc_html(get_field('listing_title')); ?>
      </h1>

      <div class="space-y-2 text-[12px] sm:text-[14px] leading-relaxed text-gray-700">
        <?php 
        $includes = get_field('includes');
        if ($includes):
          foreach ($includes as $item): ?>
            <p>• <?php echo esc_html($item['list']); ?></p>
        <?php 
          endforeach;
        endif; 
        ?>
      </div>
    </div>

    <!-- Why Choose Asia Management -->
    <div class="space-y-3 md:w-1/2">
      <h1 class="text-[22px] sm:text-[24px] font-bold">
        <?php echo esc_html(get_field('why_choose_us_title')); ?>
      </h1>

      <div class="space-y-2 text-[12px] sm:text-[14px] leading-relaxed text-gray-700">
        <?php 
        $why_us = get_field('why_choose_us');
        if ($why_us):
          foreach ($why_us as $item): ?>
            <p>• <?php echo esc_html($item['list']); ?></p>
        <?php 
          endforeach;
        endif; 
        ?>
      </div>
    </div>

  </div>
</div>



  <div class="latoRegular space-y-2 w-full md:w-[840px] ml-0 sm:ml-10 md:ml-64 mt-10">
    <h1 class="text-[27px] text-center md:text-left">
      Let's Discuss Your <?php the_title(); ?> Needs
    </h1>

    <p class="text-[13px] sm:text-[14px] leading-relaxed text-gray-700 text-center md:text-left">
      <span class="underline hover:text-[--hading-color]">
        <a href="<?php echo get_site_url(); ?>/contact-us">Contact us</a>
      </span>
      today to schedule a consultation with our <?php the_title(); ?> specialists
    </p>
  </div>




  <!-- featured insights -->
  <div class="w-full sm:w-[85%] md:w-[75%] mx-auto md:mt-16">
    <div class="relative flex flex-col md:flex-row gap-10 md:gap-20 p-6 rounded-xl md:left-16">

      <!-- Left Section -->
      <div class="md:w-1/3">
        <h1 class="text-[36px] lato-light text-[--text-color]">
          Featured <span class="text-black font-bold">Insights</span>
        </h1>
        <p class="text-[--text-color] latoRegular text-[17px] mt-2">
          Stay informed with expert tips and strategies from our team
        </p>

        <div class="flex items-center mt-8 gap-2 latoRegular tracking-widest cursor-pointer ml-12 group">
          <a href="<?php echo get_site_url(); ?>/insights" class="text-[--text-color] latoRegular transition-colors duration-300 group-hover:text-[--hading-color]">
            View all Articles
          </a>
          <div
            class="w-20 relative after:content-[''] after:absolute after:w-full after:h-[2px] after:bg-black after:bottom-0 after:left-0 group-hover:after:bg-[--hading-color] transition-colors duration-300">
          </div>
        </div>

      </div>

      <!-- Right Section -->
         <div class="md:w-2/3 space-y-6">
<?php

$args = array(
    'post_type'      => 'post',  
    'posts_per_page' => 5,       
    'orderby'        => 'date',
    'order'          => 'DESC',
);
$latest_posts = new WP_Query( $args );

if ( $latest_posts->have_posts() ) :
    while ( $latest_posts->have_posts() ) : $latest_posts->the_post();
?>
    <div class="space-y-1 cursor-pointer latoRegular group">
        <!-- Published Date -->
        <h6 class="text-[--text-color]"><?php echo get_the_date('F d, Y'); ?></h6>

        <!-- Post Title -->
        <h1 class="text-[22px] transition-colors duration-300 group-hover:text-[#FD384F]">
            <a href="<?php the_permalink(); ?>" class="hover:underline">
                <?php the_title(); ?>
            </a>
        </h1>

        <!-- Post Excerpt -->
        <p class="text-[--text-color] text-[18px] lato-light py-1">
            <?php echo get_the_excerpt(); ?>
        </p>

        <!-- Arrow Icon -->
          <a href="<?php the_permalink(); ?>">
        <div class="flex items-center gap-2 group">
           
                <img src="<?php echo DK_IMG; ?>/next.png"
                     class="w-4 h-4 ml-auto transition-transform duration-300 group-hover:translate-x-2" alt="Read More">
            
        </div>
        </a>

        <!-- Divider -->
        <div class="w-full relative after:content-[''] after:absolute after:w-full after:h-[2px] after:bg-[--text-color] after:bottom-0 after:left-0"></div>
    </div>
<?php
    endwhile;
    wp_reset_postdata();
endif;
?>
</div>


    </div>
  </div>
<?php get_footer(); ?>
