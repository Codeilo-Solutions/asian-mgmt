<?php
/**
 * Template Name: Service Layout
 */
?>
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
 <div class="absolute top-64 sm:top-48 md:top-60 lg:top-60 w-full">
      <div class="grid place-items-center md:block 
              w-[90%] sm:w-8/12 md:w-7/12 mx-auto md:ml-40 text-white">

        <!-- Small Title -->
        <p class="uppercase latoRegular tracking-[3px]
       text-[14px] sm:text-[18px] md:text-[18px] text-center md:text-left md:mr-36">
        <?php echo get_field('banner_title'); ?>
        </p>

        <!-- Big Heading -->
        <h1 class="text-[28px] sm:text-[40px] md:text-[48px]
               acta tracking-wide leading-tight 
               text-center md:text-left mt-2">
          <?php echo get_field('banner_subtitle'); ?>
        </h1>

        <div class=" mt-8">
          <div
            class="w-20 relative after:content-[''] after:absolute after:w-full after:h-[2px] after:bg-white after:bottom-0 after:right-72">
          </div>

        </div>


      </div>
    </div>
</div>

  <!-- page  -->
  <div class="grid md:block mt-10
            w-[90%] sm:w-10/12 md:w-7/12 mx-auto md:ml-0 lg:ml-28
            text-black space-y-4 lg:w-8/12">

    <div class="w-full sm:w-10/12 md:w-[75%] mx-auto">

      <p class="latoRegular tracking-[1px]
       text-[15px] sm:text-[18px] md:text-[20px]
       text-center md:text-left">
<?php echo nl2br(wp_strip_all_tags(get_the_content())); ?>
      </p>

      <!-- <p class="latoRegular tracking-[1px]
       text-[15px] sm:text-[18px] md:text-[20px]
       text-center md:text-left mt-10">
        
      </p> -->

    </div>

  </div>

<div class="md:mt-20 md:ml-28">

<?php
$args = [
  'post_type' => 'service',
  'posts_per_page' => -1,
  'order' => 'ASC'
];
$query = new WP_Query($args);

$index = 0;

if ($query->have_posts()):
  while ($query->have_posts()):
    $query->the_post();
    
    $listing_title = get_field('listing_title');
    $includes = get_field('includes');
    $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
    $content = wpautop(get_the_content());
?>

<div class="w-full py-4 md:py-12">
  <div class="flex flex-col md:flex-row items-center gap-8 md:gap-10 
              w-[90%] sm:w-10/12 md:w-9/12 mx-auto">

   
    <?php if ($index % 2 == 0): ?>

      <!-- LEFT IMAGE -->
      <div class="w-full md:w-1/2 md:h-96 flex">
        <img src="<?php echo esc_url($image); ?>" 
             alt="<?php the_title(); ?>" 
             class="w-full max-w-[420px] h-full object-cover">
      </div>

      <!-- RIGHT CONTENT -->
      <div class="w-full md:w-1/2 space-y-6 max-md:order-1">

        <!-- Title -->
        <div>
          <h1 class="text-[24px] sm:text-[32px] md:text-[30px] latoRegular">
            <?php the_title(); ?>
          </h1>

          <div class="mt-2">
            <div class="w-22 relative 
                 after:content-[''] after:absolute after:w-full after:h-[2px] 
                 after:bg-black after:bottom-0 after:left-0">
            </div>
          </div>
        </div>

        <!-- Description -->
        <div class="text-[12px] sm:text-[15px] leading-relaxed text-gray-700 latoRegular">
          <?php echo $content; ?>
        </div>

        <!-- Bullet Section Title -->
        <?php if ($listing_title): ?>
        <div class="space-y-2 latoRegular">
          <h2 class="text-[20px]"><?php echo esc_html($listing_title); ?></h2>

          <?php if ($includes): ?>
            <?php foreach ($includes as $item): ?>
              <p class="text-[12px] sm:text-[14px] text-gray-700">
                • <?php echo esc_html($item['list']); ?>
              </p>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <?php endif; ?>

        <!-- Learn More -->
        <div class="mt-6 flex items-center gap-4 group">
          <div class="w-16 relative 
               after:content-[''] after:absolute after:w-full after:h-[1.5px] 
               after:bg-[--hading-color] 
               after:bottom-0 after:left-0 mt-2 group-hover:after:bg-black 
               transition-colors duration-300">
          </div>

          <a href="<?php the_permalink(); ?>" class="text-[17px] latoRegural text-[--hading-color] 
                        transition-colors duration-300 group-hover:text-black">
            Learn More
          </a>
        </div>

      </div>


    <!-- ========================================= -->
    <!-- ODD INDEX → CONTENT LEFT | IMAGE RIGHT -->
    <!-- ========================================= -->
    <?php else: ?>

      <!-- CONTENT LEFT -->
      <div class="w-full md:w-1/2 space-y-6">

        <!-- Title -->
        <div>
          <h1 class="text-[24px] sm:text-[32px] md:text-[30px] latoRegular">
            <?php the_title(); ?>
          </h1>

          <div class="mt-2">
            <div class="w-22 relative 
                 after:content-[''] after:absolute after:w-full after:h-[2px] 
                 after:bg-black after:bottom-0 after:left-0">
            </div>
          </div>
        </div>

        <!-- Description -->
        <div class="text-[12px] sm:text-[15px] leading-relaxed text-gray-700 latoRegular">
          <?php echo $content; ?>
        </div>

        <!-- Bullet Section Title -->
        <?php if ($listing_title): ?>
        <div class="space-y-2 latoRegular">
          <h2 class="text-[20px]"><?php echo esc_html($listing_title); ?></h2>

          <?php if ($includes): ?>
            <?php foreach ($includes as $item): ?>
              <p class="text-[12px] sm:text-[14px] text-gray-700">
                • <?php echo esc_html($item['list']); ?>
              </p>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <?php endif; ?>

        <!-- Learn More -->
        <div class="mt-6 flex items-center gap-4 group">
          <div class="w-16 relative 
               after:content-[''] after:absolute after:w-full after:h-[1.5px] 
               after:bg-[--hading-color] 
               after:bottom-0 after:left-0 mt-2 group-hover:after:bg-black 
               transition-colors duration-300">
          </div>

          <button class="text-[17px] latoRegural text-[--hading-color] 
                        transition-colors duration-300 group-hover:text-black">
            Learn More
          </button>
        </div>

      </div>

      <!-- IMAGE RIGHT -->
      <div class="w-full md:w-1/2 md:h-96 flex">
        <img src="<?php echo esc_url($image); ?>" 
             alt="<?php the_title(); ?>" 
             class="w-full max-w-[420px] h-full object-cover">
      </div>

    <?php endif; ?>

  </div>
</div>

<?php
  $index++; 
  endwhile;
  wp_reset_postdata();
endif;
?>

</div>

  

    <?php get_footer(); ?>