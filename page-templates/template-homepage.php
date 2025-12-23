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
do_action('asiamanagement_header_content');

?>

<!-- Hero -->
<section class="relative h-[100vh] md:h-[95vh] flex flex-col justify-center items-start text-white overflow-hidden">
  <div id="hero-bg" class="absolute inset-0 bg-cover bg-center grayscale brightness-[0.4] contrast-[1.1] z-0 scale-105"
    style="background-image: url('<?php echo get_field('banner_image'); ?>')"></div>
  <div class="z-10 max-w-7xl mx-auto w-full px-6 lg:px-12">
    <div class="text-start max-w-2xl">
      <p id="hero-tag" class="uppercase font-serif-custom tracking-[0.3em] md:tracking-[0.5em] text-[10px] md:text-sm mb-4 md:mb-6 font-bold text-gray-200 uppercase"><?php echo get_field('banner_title'); ?></p>
      <h1 id="hero-title" class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-serif-custom mb-8 md:mb-6 leading-[1.1] tracking-wide"><?php echo get_field('banner_subtitle'); ?></h1>
      <div id="hero-btn" class="flex flex-col items-end md:items-end">
        <a href="<?php echo get_field('banner_link'); ?>" class="group flex items-center space-x-4 md:space-x-6 hover:opacity-80 transition-all duration-300 md:mr-8">
          <span class="text-base md:text-xl lg:text-2xl font-serif-custom tracking-wide"><?php echo get_field('banner_link_text'); ?></span>
          <span class="h-[1px] w-16 md:w-24 bg-red-600 opacity-90 group-hover:w-24 md:group-hover:w-40 transition-all duration-500"></span>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Consultant Info -->
<section class="relative max-w-7xl mx-auto px-6 lg:px-12 py-12 lg:py-0 md:-mt-24">
  <div class="parent grid gap-0" style="display: grid; grid-template-columns: repeat(7, 1fr); grid-template-rows: repeat(10, 1fr); min-height: 900px;">

    <!-- div1: Red Box with Text -->
    <div class="div1 bg-[#C41E3A] text-white flex flex-col justify-start p-8 md:p-12 lg:p-20 reveal" style="grid-area: 1 / 1 / 5 / 6;">
      <p class="text-sm uppercase tracking-[0.15em] font-light mt-24"><?php echo get_field('section_1_title'); ?></p>
      <h2 class="text-3xl md:text-4xl lg:text-5xl font-light leading-[1.15] "><?php echo get_field('section_1_subtitle'); ?></h2>
    </div>

    <!-- div2: Top Right Image (overlapping) -->
    <div class="div2 -mt-[148px] overflow-hidden reveal hidden lg:block" style="grid-area: 3 / 6 / 5 / 8;">
      <img src="<?php echo get_field('section1_right_image'); ?>"
        class="w-full h-full object-cover grayscale"
        alt="Business Detail" />
    </div>

    <!-- div3: Bottom Left Image -->
    <div class="div3 mt-12 overflow-hidden reveal aspect-square lg:aspect-auto" style="grid-area: 3 / 2 / 7 / 4;">
      <img src="<?php echo get_field('section1_left_image'); ?>"
        class="w-full h-full object-cover"
        alt="Chess" />
    </div>

    <!-- div4: Bottom Right Image -->
    <div class="div4 overflow-hidden reveal aspect-square lg:aspect-auto" style="grid-area: 4 / 4 / 8 / 6;">
      <img src="<?php echo get_field('section1_center_image'); ?>"
        class="w-full h-full object-cover grayscale"
        alt="Handshake" />
    </div>

    <!-- Expertises List -->
    <div class="reveal p-6 lg:p-0 mt-8 lg:mt-0" style="grid-area: 7 / 2 / 11 / 4;">
      <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-6 lg:mt-8">
        <?php echo esc_html(get_field('section1_left_title')); ?>
      </h3>

      <?php
      $items = get_field('section1_left_content');
      if ($items):
      ?>
        <ul class="space-y-3 text-sm md:text-base text-gray-500 font-light">
          <?php foreach ($items as $item):
            $title = get_the_title($item->ID);
            $link  = get_permalink($item->ID);
          ?>
            <li class="hover:text-[#C41E3A] hover:translate-x-2 cursor-pointer transition-all flex items-start group">
              <span class="mr-2 opacity-0 group-hover:opacity-100 transition-all">›</span>
              <a href="<?php echo esc_url($link); ?>" class="text-inherit no-underline">
                <?php echo esc_html($title); ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>


    <!-- Services by Sector List -->
    <div class="reveal p-6 lg:p-0 mt-8 lg:mt-0 mb-8 lg:mb-0" style="grid-area: 7 / 4 / 11 / 8;">
      <h3 class="text-xl md:text-2xl font-bold text-gray-800 mb-6 lg:mt-36">
        <?php echo get_field('section1_right_title'); ?>
      </h3>
      <?php
      $items = get_field('section1_right_content');
      if ($items):
        foreach ($items as $item):
          $title = get_the_title($item->ID);
          $link  = get_permalink($item->ID);
      ?>
          <ul class="space-y-3 text-sm md:text-base text-gray-500 font-light mb-12">
            <li class="hover:text-[#C41E3A] hover:translate-x-2 cursor-pointer transition-all flex items-start group">
              <span class="mr-2 opacity-0 group-hover:opacity-100 transition-all">›</span> <a href="<?php echo $link; ?>" class="inherit text-inherit no-underline"><?php echo $title; ?></a>
            </li>
        <?php
        endforeach;
      endif;
        ?>
          </ul>
    </div>

  </div>
</section>

<!-- Stats -->
<section class="relative min-h-[500px] md:h-[700px] w-full flex items-center justify-center py-12 md:py-20 overflow-hidden">
  <div class="absolute inset-0 bg-cover bg-fixed bg-center grayscale brightness-50 z-0"
    style="background-image: url('<?php echo get_field('section_2_image'); ?>')"></div>
  <div class="relative z-10F bg-white shadow-2xl p-8 md:p-12 lg:p-20 max-w-6xl w-full mx-4 md:mx-6 reveal">
    <h3 class="text-center text-2xl md:text-3xl lg:text-4xl font-serif-custom mb-8 md:mb-16 text-gray-800"><?php echo get_field('section_2_title'); ?></h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-12 text-center divide-y sm:divide-y-0 sm:divide-x divide-gray-100">
      <?php if (have_rows('counter')) :
        while (have_rows('counter')) : the_row();

          // $number = get_sub_field('number_');
          $value = get_sub_field('number_');

          // Extract number
          preg_match('/\d+/', $value, $numberMatch);
          $number = $numberMatch[0] ?? '';

          // Extract text
          $text = trim(preg_replace('/\d+/', '', $value));
          $symbol = get_sub_field('symbol');
          $title  = get_sub_field('title');
          $dollar_img = get_sub_field('dollar');
      ?>
          <div class="pt-6 sm:pt-0">
            <div class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-[#C41E3A] mb-2 md:mb-3">
              <?php if ($dollar_img): ?>
                <img src="<?php echo esc_url($dollar_img); ?>" alt="" class="inline-block w-6 h-6 md:w-8 md:h-8  align-end mr-1" />
              <?php endif; ?>
              <span class="count font-din-numbers"><?php echo esc_html($number); ?></span><span class="font-din-numbers"><?php echo esc_html($text); ?></span>
              <span class="text-2xl md:text-3xl align-top font-din-numbers"><?php echo esc_html($symbol); ?></span>
            </div>
            <div class="text-[9px] md:text-[10px] uppercase tracking-[0.2em] md:tracking-[0.25em] text-gray-400 font-medium"><?php echo esc_html($title); ?></div>
          </div>
      <?php
        endwhile;
      endif;
      ?>
    </div>
  </div>
  </div>
</section>

<!-- Team -->
<section class="max-w-7xl mx-auto px-6 lg:px-12 py-32 overflow-hidden">
  <div class="flex flex-col md:flex-row md:items-center justify-between mb-20 space-y-8 md:space-y-0 reveal">
    <div class="flex items-center space-x-6">
      <div class="flex shadow-lg">
        <button id="team-prev" class="bg-gray-50 p-6 text-gray-400 hover:text-gray-900 transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
          </svg></button>
        <button id="team-next" class="bg-[#C41E3A] p-6 text-white hover:bg-black transition-colors"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg></button>
      </div>
      <div class="text-3xl md:text-4xl leading-tight font-light text-gray-800">
        <?php echo get_field('section_3_title'); ?>
      </div>
    </div>
  </div>

  <div class="overflow-hidden">
    <div id="team-carousel" class="flex gap-8">

      <?php
      // Query Teams
      $teams_query = new WP_Query(array(
        'post_type' => 'team',
        'posts_per_page' => -1, // all posts
      ));

      if ($teams_query->have_posts()) :
        while ($teams_query->have_posts()) : $teams_query->the_post();
          $team_name = get_the_title();
          $team_image = get_the_post_thumbnail_url(get_the_ID(), 'full'); // 'full' if needed
          $designations = wp_get_post_terms(get_the_ID(), 'designation', array('fields' => 'names'));
          $team_designation = !empty($designations) ? $designations[0] : '';
          $team_link = get_permalink();
      ?>

          <div class="group cursor-pointer reveal flex-shrink-0 w-full sm:w-[calc(50%-1rem)] lg:w-[calc(25%-1.5rem)]">
            <div class="relative aspect-[3/4] overflow-hidden grayscale brightness-90 group-hover:grayscale-0 group-hover:brightness-100 transition-all duration-1000">

              <?php if ($team_image) : ?>
                <img src="<?php echo $team_image; ?>" alt="<?php echo esc_attr($team_name); ?>" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110" />
              <?php endif; ?>

              <div class="absolute inset-0 bg-[#C41E3A] mix-blend-multiply opacity-20 transition-opacity group-hover:opacity-0"></div>

              <div class="absolute inset-x-0 bottom-0 bg-white translate-y-[calc(100%-80px)] group-hover:translate-y-0 transition-transform duration-500 p-6 flex flex-col justify-between h-32 shadow-xl">
                <div>
                  <h4 class="font-bold text-gray-900 text-lg"><?php echo esc_html($team_name); ?></h4>
                  <?php if ($team_designation): ?>
                    <p class="text-[10px] uppercase tracking-widest text-gray-400 font-bold mt-1"><?php echo esc_html($team_designation); ?></p>
                  <?php endif; ?>
                </div>

                <?php /* if ($team_link): ?>
                <div class="text-[#C41E3A] text-sm font-bold flex items-center opacity-0 group-hover:opacity-100 transition-opacity">View profile →</div>
                <?php endif; */ ?>
              </div>

            </div>
          </div>

      <?php
        endwhile;
        wp_reset_postdata();
      endif;
      ?>
    </div>

  </div>

  <div class="flex justify-end mt-20 reveal">
    <a href="<?php echo get_field('section_3_link') ?>" class="flex items-center text-[11px] font-bold uppercase tracking-[0.3em] text-gray-900 group">
      <?php echo get_field('section_3_link_text'); ?> <span class="ml-6 h-[1px] w-20 bg-gray-200 group-hover:bg-[#C41E3A] transition-all transform group-hover:scale-x-125"></span>
    </a>
  </div>
</section>

<!-- Insights -->
<section class="max-w-7xl mx-auto px-6 lg:px-12 py-32 grid grid-cols-1 lg:grid-cols-12 gap-20">
  <div class="lg:col-span-5 reveal">
    <h2 class="text-4xl md:text-5xl font-light mb-6 leading-tight"><?php echo get_field('section_4_title'); ?>
      <!-- Featured <span class="font-bold text-black">Insights</span> -->
    </h2>
    <p class="text-gray-500 text-base mb-12 leading-relaxed"> <?php echo get_field('section_4_description'); ?></p>
    <a href="<?php echo get_field('section_4_button_link'); ?>" class="inline-flex items-center text-xs font-normal text-gray-700 group hover:text-[#C41E3A] transition-colors">
      <?php echo get_field('section_4_button_text'); ?> <span class="ml-6 h-[1px] w-16 bg-gray-900 group-hover:w-24 group-hover:bg-[#C41E3A] transition-all"></span>
    </a>
  </div>

  <div class="lg:col-span-7 space-y-0 divide-y divide-gray-200">
    <?php

    $args = array(
      'post_type'      => 'post',
      'posts_per_page' => 3,
      'orderby'        => 'date',
      'order'          => 'DESC',
    );
    $latest_posts = new WP_Query($args);

    if ($latest_posts->have_posts()) :
      while ($latest_posts->have_posts()) : $latest_posts->the_post();
    ?>

        <div class="group cursor-pointer py-8 hover:opacity-80 transition-all reveal flex items-start justify-between gap-6">
          <a href="<?php the_permalink(); ?>">
            <div class="flex-1">
              <p class="text-sm text-gray-500 mb-3"><?php echo get_the_date('d/m/Y'); ?></p>
              <h3 class="text-2xl font-bold text-gray-900 mb-3 leading-tight"><?php echo get_the_title(); ?></h3>
              <p class="text-gray-600 leading-relaxed"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
            </div>
          </a>
          <a href="<?php the_permalink(); ?>">
            <div class="flex-shrink-0 pt-2">
              <span class="inline-block text-gray-900 group-hover:translate-x-2 transition-transform text-2xl">→</span>
            </div>
          </a>
        </div>
        <!-- </a> -->
    <?php
      endwhile;
      wp_reset_postdata();
    else :
      echo '<p>No posts found.</p>';
    endif;
    ?>

  </div>
</section>



<?php get_footer(); ?>