<?php

/**
 * Template Name: Homepage Layout
 */

get_header();
  

    /**
     * asiamanagement_header_content hook
     *
     * @hooked asiamanagement_output_header_content()
     *
     */
    do_action( 'asiamanagement_header_content' );

?>
<div class="heroSection" style="background-image: url('<?php echo get_field('banner_image'); ?>');"></div>
 <div class="w-full px-3 sm:px-6 lg:md:px-10  ">
    <div class="absolute top-64 max-sm:top-64 md:top-60 lg:top-70
         lg:md:left-72 left-20  md:text-center text-[#FFFFFD] lg:sm:w-4/12 lg:md:w-4/12  -translate-x-1/5 md:translate-x-0 
         w-[90%]  lg:md:text-left">
      <p class="uppercase latoRegular tracking-[3px]
       text-[14px] max-sm:text-[12px] md:text-[18px]">
        <?php echo get_field('banner_title'); ?>
      </p>

      <h1 class="text-[44px] max-sm:mr-9  lg:md:text-[44px] acta tracking-[3px] max-sm:text-[24px] lg:text-[42px] ">
        <?php echo get_field('banner_subtitle'); ?> 
      </h1>
      <div class="flex border-4md:w-75 w-max
       
            group text-[20px] sm:text-[22px] md:text-[24px] latoRegular relative 
            items-center gap-2 tracking-wide cursor-pointer md:ml-32 mx-auto sm:mx-0">

        <a href="<?php echo get_field('banner_link'); ?>" class="text-[20px] max-sm:text-[16px] md:text-[24px] lato-light">
          <?php echo get_field('banner_link_text'); ?>
        </a>
        <div class="w-20 relative 
              after:content-[''] after:absolute after:w-full after:h-[2px] after:bg-white after:left-0 
              group-hover:after:bg-[--hading-color] transition-colors duration-300">
        </div>
      </div>
    </div>
  </div>
<!-- heroSection end -->
<!-- main -->
<div class="bg-[--hading-color] mx-auto md:h-[250px] sm:w-[860px] md:w-[860px] py-16 relative md:bottom-20 md:right-[278px]">
  <div class="px-5 text-center  ">
    <p class="text-white text-[22px] lato-light md:mb-2 md:mr-56">

      <?php echo get_field('section_1_title'); ?>
    </p>

    <h1 class="text-white text-[35px] sm:text-[30px] xs:text-[28px] md:text-2xl latoRegular leading-tight">

      <?php echo get_field('section_1_subtitle'); ?>
    </h1>

  </div>

</div>

<!-- main end  -->

<!-- banner -->
 <div class="w-full max-w-4xl mx-auto">
 <?php
  $section1_left_image = get_field('section1_left_image');
  $section1_right_image = get_field('section1_right_image');
  $section1_center_image = get_field('section1_center_image');
  ?>
    <!-- IMAGES SECTION -->
    <div class="flex justify-center">

      <div class="relative w-full flex flex-col items-center justify-center md:flex-row md:justify-between md:bottom-40 
             gap-6 md:gap-0">

        <!-- Left Image -->
        <img src="<?php echo $section1_left_image; ?>" class="w-full max-w-[300px] max-h-[300px] shadow mx-auto 
               md:absolute md:top-0 md:left-0 
               lg:md:max-w-[320px] md:max-h-[400px] md:z-30 
               sm:max-w-[280px] sm:max-h-[340px]">

        <!-- Center Image -->
        <img src="<?php echo $section1_center_image; ?>" class="w-full max-w-[260px] max-h-[200px] shadow mx-auto mt-6 
               md:mt-20 md:relative md:left-[12px] 
               lg:md:max-w-[280px] md:max-h-[200px] 
               sm:max-w-[280px] sm:max-h-[240px] bg-black">

        <!-- Right Image -->
        <img src="<?php echo $section1_right_image; ?>" class="w-full max-w-[260px] max-h-[300px] shadow mx-auto 
               md:mt-0 md:absolute md:right-0 md:bottom-[62%] md:-z-10 
               md:max-w-[296px] md:max-h-[410px] 
               sm:max-w-[300px] sm:max-h-[340px] bg-black">
      </div>

    </div>

    <!-- expertises  -->
    <div class="flex w-full flex-col md:flex-row lg:md:gap-20 mt-10 md:mt-10">
      <!-- Column 1 -->
      <div class="relative md:bottom-52 sm:bottom-20 bottom-6 md:w-1/3 lg:md:right-8 cursor-pointer ml-4 
       order-2 md:order-1">

        <h1 class="text-[36px] latoRegular ml-3"><?php echo get_field('section1_left_title'); ?></h1>
<div class="lato-light">
    <div class="text-[--text-color] text-sm mt-1.5 space-y-2">

        <?php 
        // Get ACF relationship field (Section1 Left Content)
        $items = get_field('section1_left_content');

        if ( $items ) :
            foreach ( $items as $item ) : 
                $title = get_the_title($item->ID);
                $link  = get_permalink($item->ID);
        ?>

        <a href="<?php echo esc_url($link); ?>" 
           class="flex items-center gap-2 text-[18px] hover:text-[--hading-color] group">

            <img src="<?php echo DK_IMG; ?>/003-chevron.png" 
                 class="w-[6px] h-3 opacity-0 -translate-x-1
                        group-hover:opacity-100 group-hover:translate-x-0 
                        transition-all duration-300">

            <?php echo esc_html($title); ?>
        </a>

        <?php 
            endforeach; 
        endif; 
        ?>

    </div>
</div>

      </div>

      <!-- Column 2 -->
      <div class="md:w-1/2 relative md:bottom-32 sm:bottom-40 bottom-6 cursor-pointer lg:md:right-10 
             order-1 md:order-2 ml-4 md:ml-4">

        <h1 class="text-[36px] latoRegular mb-2 ml-3"><?php echo get_field('section1_right_title'); ?></</h1>

        <div class=" lato-light mt-4">
          <div class="space-y-2 text-[--text-color] text-sm">

            <?php 
        // Get ACF relationship field (Section1 Left Content)
        $items = get_field('section1_right_content');

        if ( $items ) :
            foreach ( $items as $item ) : 
                $title = get_the_title($item->ID);
                $link  = get_permalink($item->ID);
        ?>

        <a href="<?php echo esc_url($link); ?>" 
           class="flex items-center  text-[18px] hover:text-[--hading-color] group">

            <img src="<?php echo DK_IMG; ?>/003-chevron.png" 
                 class="w-[6px] h-3 opacity-0 -translate-x-1 
            group-hover:opacity-100 transition-all duration-300">

            <?php echo esc_html($title); ?>
        </a>

        <?php 
            endforeach; 
        endif; 
        ?>

          </div>
        </div>
      </div>

    </div>

  </div>
<!-- conbanner -->
 <div class="relatie w-full">
    <!-- Banner -->
    <div class="conbanner" style="background-image: url('<?php echo get_field('section_2_image'); ?>');"></div>
    <!-- Content Box -->
    <div class="w-full px-4 sm:px-6 lg:px-8 -mt-26">
      <div class=" lg:max-w-7xl w-full sm:w-[85%] md:w-[75%] mx-auto bg-white shadow-xl rounded-b-2xl py-10 px-6">

        <!-- Heading -->
        <div class="text-center mb-8">
          <h1 class="text-[46px] lg:md:text-[46px] text-black lato-light">
            <?php echo get_field('section_2_title'); ?>
          </h1>
        </div>

        <!-- Grid Boxes -->
     <div class="grid grid-cols-2 max-sm:grid-cols-2 lg:md:grid-cols-4 gap-6 text-center">

    <?php if (have_rows('counter')) : 
        while (have_rows('counter')) : the_row();

            $number = get_sub_field('number_');
            $symbol = get_sub_field('symbol'); // e.g. "+"
            $title  = get_sub_field('title');
            $dollar_img = get_sub_field('dollar'); // image field, optional
    ?>

    <div class="transition duration-300 p-4">

        <?php if ($dollar_img) : ?>
            <div class="md:flex flex justify-center items-center gap-2">
                <img src="<?php echo esc_url($dollar_img); ?>" 
                     alt="<?php $title; ?>"
                     class="lato-light relative left-2 align-super w-6 md:w-6 md:h-6 sm:w-8 sm:h-8 mt-3 lg:md:mt-3">

                <p class="text-[50px] sm:text-[64px] din-alternate font-bold text-[--hading-color]">
                    <?php echo esc_html($number); ?> 
                    <sup class="lato-light relative top-1 align-super leading-1">
                        <?php echo esc_html($symbol); ?>
                    </sup>
                </p>
            </div>

        <?php else : ?>

            <p class="text-[50px] sm:text-[64px] din-alternate font-bold text-[--hading-color]">
                <?php echo esc_html($number); ?> 
                <sup class="lato-light relative top-1 align-super leading-1">
                    <?php echo esc_html($symbol); ?>
                </sup>
            </p>

        <?php endif; ?>

        <h2 class="text-[17px] lato-light text-[--text-color]">
            <?php echo esc_html($title); ?>
        </h2>
    </div>

    <?php endwhile; endif; ?>

</div>


      </div>
    </div>
  </div>
</div>

<!-- power -->
<div class="w-full sm:w-[85%] md:w-[75%] mx-auto ">
  <div class=" flex flex-col md:flex-row items-center gap-20 p-4 mt-20 md:p-6 "> <!-- Buttons -->
    <div class="flex items-center gap-0.5"> <!-- Left Button --> <button
     id="teamPrev"   class="btn w-14 h-14 flex items-center justify-center hover:bg-[--hading-color] hover:bg-transition bg-[#E4E4E4]">
        <img src="<?php echo DK_IMG; ?>/003-chevronright.png" class="w-4 h-6  " alt=""> </button> <!-- Right Button -->
      <button  id="teamNext"
        class="btn w-14 h-14 flex hover:bg-transition items-center justify-center bg-[#E4E4E4] hover:bg-[--hading-color] transition">
        <img src="<?php echo DK_IMG; ?>/003-chevronleft.png" class="w-4 h-6 " alt=""> </button>
    </div>
    <!-- Text Section -->
    <div class="text-center md:text-left">
      <?php echo get_field('section_3_title'); ?>
    </div>
  </div>

 <div class="owl-carousel owl-theme relative w-full max-sm:w-[90%] lg:md:w-[90%] mx-auto px-4 sm:px-0">

<?php
// Query Teams
$teams_query = new WP_Query(array(
    'post_type' => 'team',
    'posts_per_page' => -1, // all posts
));

if ($teams_query->have_posts()) :
    while ($teams_query->have_posts()) : $teams_query->the_post();
        $team_name = get_the_title();
        $team_image = get_the_post_thumbnail_url(get_the_ID(), 'medium'); // you can use 'full' or custom size
        $designations = wp_get_post_terms(get_the_ID(), 'designation', array('fields' => 'names'));
        $team_designation = !empty($designations) ? $designations[0] : ''; // get first designation
        ?>

        <div class="group w-48 item mx-auto">
            <div class="relative w-full h-[250px] bg-[#E4E4E4]">
                <?php if ($team_image) : ?>
                    <img src="<?php echo esc_url($team_image); ?>" alt="<?php echo esc_attr($team_name); ?>" class="w-full h-full object-cover">
                <?php endif; ?>
                <div class="absolute inset-0 bg-[--hading-color] opacity-0 group-hover:opacity-40 transition-opacity duration-300"></div>
                
                <!-- Designation overlay -->
                <?php if ($team_designation) : ?>
                      <p
            class="absolute bottom-24 md:left-[65%] -translate-x-1/2 text-white px-3 py-1 rounded opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <?php echo esc_html($team_designation); ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Name -->
            <p class="mt-4 text-black latoRegular text-center"><?php echo esc_html($team_name); ?></p>
        </div>

<?php
    endwhile;
    wp_reset_postdata();
endif;
?>
</div>

  <!-- Discover link -->
  <div class="flex justify-center md:justify-end items-center mt-8 gap-2 tracking-widest group">
    <a href="<?php echo get_field('section_3_link')?>" class="transition-colors latoRegular text-lg md:text-xl group-hover:text-[--hading-color]">
      <?php echo get_field('section_3_link_text'); ?>
    </a>
    <div
      class="w-20 relative after:content-[''] after:absolute after:w-full after:h-[2px] after:bg-[--text-color] after:bottom-0 after:left-0 group-hover:after:bg-[--hading-color] transition-colors duration-300">
    </div>
  </div>


</div>


<!-- featured insights -->
<div class="w-full sm:w-[85%] md:w-[75%] mx-auto">
  <div class="relative flex flex-col md:flex-row gap-10 md:gap-20 p-6 rounded-xl">

    <!-- Left Section -->
    <div class="md:w-1/3">
      <h1 class="text-[36px] lato-light text-[--text-color]">
       <?php echo get_field('section_4_title'); ?>
      </h1>
      <p class="text-[--text-color] latoRegular text-[17px] mt-2">
        <?php echo get_field('section_4_description'); ?>
      </p>

      <div class="flex items-center mt-8 gap-2 latoRegular tracking-widest cursor-pointer ml-12 group">
        <a href="<?php echo get_field('section_4_button_link'); ?>"class="text-[--text-color] latoRegular transition-colors duration-300 group-hover:text-[--hading-color]">
          <?php echo get_field('section_4_button_text'); ?>
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
<!-- <script>
  const nav = document.querySelector("nav");

  window.addEventListener("scroll", () => {
    if (window.scrollY > 5) {
      nav.classList.add( "top-0", "shadow-lg", "animate-slideDown" , "relative");
    } else {
      nav.classList.remove( "shadow-lg", "animate-slideDown" , "absolute");
    }
  });
</script> -->
<script>
    jQuery(document).ready(function ($) {

  var slider = $('.owl-carousel').owlCarousel({
     nav: false,
      loop: true,
      autoplay: true,

      autoplayTimeout: 3000,
      autoplaySpeed: 800,
      smartSpeed: 800,

      dots: false,
      margin: 15,

      responsive: {
        0: { items: 1 },
        600: { items: 4 },
        1000: { items: 4 }
      }
  });

  // Custom navigation buttons
  $('#teamPrev').click(function () {
    slider.trigger('prev.owl.carousel');
  });

  $('#teamNext').click(function () {
    slider.trigger('next.owl.carousel');
  });

});

  </script>

