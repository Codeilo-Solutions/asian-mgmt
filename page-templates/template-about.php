<?php
/**
 * Template Name: About Layout
 */
 get_header(); ?>

<div class="about w-full " style="    background-image: url(<?php echo get_field('banner_image'); ?>);">
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
          <?php echo get_field('banner_title'); ?>
        </p>

        <!-- Big Heading -->
        <p class="text-[24px] sm:text-[32px] md:text-[40px] lg:text-[46px] 
              acta tracking-wide leading-tight 
                mt-2 relative md:left-64 left-4 md:w-[880px]">
           <?php echo get_field('banner_subtitle'); ?>
        </p>

        <!-- Underline -->
        <div class=" mt-8 md:ml-0 ml-16">
          <div
            class="w-20 relative after:content-[''] after:absolute after:w-full after:h-[2px] after:bg-white after:bottom-0 after:right-36">
          </div>
        </div>

      </div>
    </div>


    <div class="md:block mt-10 
           sm:w-8/12 md:w-7/12 mx-auto md:ml-60  ml-10
            text-black ">

      <p class="latoRegular
     text-[14px] sm:text-[20px] md:text-[20px]
    md:text-left latoRegular tracking-[1px]">
       <?php echo wp_strip_all_tags( get_the_content() ); ?>
      </p>
      <div class=" mt-8">
        <div
          class="w-20 relative after:content-[''] after:absolute after:w-full after:h-[2px] after:bg-black after:bottom-0 after:right-0">
        </div>
      </div>
    </div>


    <div class="w-full px-4 sm:px-6 lg:px-20 py-12">
      <div class="max-w-[1000px] mx-auto grid md:grid-cols-2 gap-4 bg-gray-50 md:ml-36">

        <!-- Our Mission -->
        <div class="p-6 ">
          <h2 class="text-[24px] latoRegular sm:text-[27px] mb-4">
           <?php echo get_field('left_title'); ?>
          </h2>
          <p class="text-black latoRegular md:text-[15px] sm:text-[15px] leading-relaxed">
           <?php echo get_field('left_description'); ?>
          </p>
        </div>

        <!-- Our Vision -->
        <div class="p-6 ">
          <h2 class="text-[24px] latoRegular sm:text-[27px] mb-4">
           <?php echo get_field('right_title'); ?>
          </h2>
          <p class="text-black latoRegular md:text-[15px] sm:text-[15px] leading-relaxed">
            <?php echo get_field('right_description'); ?>
          </p>
        </div>

      </div>
    </div>

    <div class="md:block 
            w-[90%] sm:w-7/12 md:w-7/12 mx-auto md:ml-60 ml-10
            text-black ">

      <p class="latoRegular
     text-[14px] sm:text-[20px] md:text-[20px]
    md:text-left latoRegular tracking-[1px]">
 <?php echo wp_strip_all_tags(get_field('section_2_content')); ?>
      </p>
      <div class=" mt-8">
        <div
          class="w-20 relative after:content-[''] after:absolute after:w-full after:h-[2px] after:bg-black after:bottom-0 after:right-0">
        </div>
      </div>
    </div>
<?php
$args = array(
    'post_type' => 'team',
    'posts_per_page' => -1,
    'order' => 'ASC'
);
$loop = new WP_Query($args);

$teams = [];
while ($loop->have_posts()) : $loop->the_post();

    $designations = wp_get_post_terms(get_the_ID(), 'designation', ['fields' => 'names']);
    $teams[] = [
        'title' => get_the_title(),
        'thumb' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
        'designation' => $designations[0] ?? ''
    ];

endwhile;
wp_reset_postdata();

$rows = array_chunk($teams, 4);
?>

<?php foreach ($rows as $row_index => $row) : ?>

    <div class="relative flex flex-col sm:flex-row gap-0 md:gap-10 
        <?php echo ($row_index == 0) ? 'md:top-16' : 'md:top-24'; ?>
        sm:w-[70%] md:w-[65%] mx-auto sm:items-start items-center">

        <?php foreach ($row as $i => $team) : ?>

            <?php
            // STYLES PER STATIC LAYOUT
            if ($row_index == 0) { 
                // Row 1 original static
                $wrapper = ($i == 0) ? 'w-56 ' : 'w-64';
                if ($i == 1 || $i == 3) $wrapper .= ' sm:bottom-10';
                $top_offset = 'top-10';
                $img_height = ($i == 2) ? 'h-[211px]' : 'h-[210px]';

            } else {
                // Row 2 and onwards → same pattern
                $wrapper = 'w-64';
                if ($i == 1 || $i == 3) $wrapper .= ' sm:bottom-10';
                $top_offset = ($i == 0 || $i == 2) ? 'top-14' : 'top-10';
                $img_height = ($i == 0) ? 'h-[193px]' :
                              (($i == 2) ? 'h-[194px]' : 'h-[210px]');
            }
            ?>

            <div class="group relative <?php echo $wrapper; ?>">

                <div class="relative h-[250px] top-1 bg-[#E4E4E4]">
                    <div class="w-full relative <?php echo $top_offset; ?>">
                        <img src="<?php echo $team['thumb']; ?>" 
                             alt="<?php echo $team['title']; ?>" 
                             class="w-[250px] <?php echo $img_height; ?> object-contain mt-11">
                    </div>

                    <div class="absolute inset-0 bg-[--hading-color] opacity-0 group-hover:opacity-40 transition-opacity duration-300"></div>

                    <p class="absolute bottom-24 left-16 text-white px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <?php echo esc_html($team['designation']); ?>
                    </p>
                </div>

                <p class="mt-4 text-black latoRegular"><?php echo $team['title']; ?></p>

            </div>

        <?php endforeach; ?>

    </div>

<?php endforeach; ?>



    <div class=" py-12 md:mt-36 mt-10 ml-4">
      <div class="flex flex-col md:flex-row items-center gap-10 md:gap-16 
              w-[80%] sm:w-9/12 md:w-8/12 mx-auto">

        <!-- Image Section -->
        <div class="w-full md:w-[450px] md:h-[500px] flex">
          <img src="<?php echo get_field('section_4_image'); ?>" alt="Audit Service" class="max-w-full h-[500px] object-cover">
        </div>

        <!-- Text Section -->
        <div class="max-w-xl">
          <h1 class="text-[27px] latoRegular mb-6">
            <?php echo get_field('section_4_title'); ?>
          </h1>

         <?php if( have_rows('section_4_content') ): ?>
    <?php while( have_rows('section_4_content') ): the_row(); 

        // Subfields
        $value_title = get_sub_field('title');
        $value_desc  = get_sub_field('description');
    ?>
        <div class="mb-6">
            <h2 class="text-[18px] latoRegular mb-1"><?php echo esc_html($value_title); ?></h2>
            <p class="text-black text-[15px] lato-light"><?php echo esc_html($value_desc); ?></p>
        </div>
    <?php endwhile; ?>
<?php endif; ?>

        </div>

      </div>
    </div>


<?php get_footer(); ?>