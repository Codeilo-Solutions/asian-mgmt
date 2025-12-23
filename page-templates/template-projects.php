<?php
/**
 * Template Name: project Layout
 */
  get_header(); ?>
<section
      class="w-full min-h-[100dvh] relative overflow-clip -mt-(--headerHeight) z-10 max-[1000px]:pb-(--section-gap)">
      <div
        class="absolute inset-0 m-auto darkgradOverlay min-h-[100dvh] overflow-clip">
        <img
          src="<?php echo get_field('banner_image') ?>"
          class="object-center w-full h-auto aspect-video bannerVid" />
      </div>
      <div class="container absolute inset-0 grid m-auto place-content-center">
        <div class="bannerContent">
          <h1
            class="grid text-center place-content-center max-w-[19ch] font-light text-5xl md:text-6xl">
            <span
              class="content-center block mx-auto mb-2 text-4xl uppercase max-w-max text-yellow"
              ><?php the_title();?></span
            >
            <span
              class="text-5xl md:text-6xl uppercase font-extralight leading-[1.1]">
              <?php echo get_field('banner_content');?>
            </span>
          </h1>
        </div>
      </div>
    </section>

    <section class="w-full min-h-[100dvh] relative overflow-x-clip">
    <!-- Category Buttons -->
    <div class="flex flex-wrap justify-center gap-4 my-8">
        <!-- All Category Button -->
        <button data-category="all" data-active="true" class="filter-btn px-4 min-w-[100px] text-center py-2 my-auto transition bg-transparent border border-yellow rounded-full cursor-pointer text-white hover:bg-yellow bg-yellow max-h-max">
            All
        </button>

        <?php
        // Get categories for filtering projects
        $categories = get_terms([
            'taxonomy' => 'project_category', // Your custom taxonomy
            'hide_empty' => true,
        ]);

        if (!empty($categories)) :
            foreach ($categories as $category) : ?>
                <button data-category="<?php echo $category->term_id; ?>" class="filter-btn px-4 min-w-[100px] text-center py-2 my-auto transition bg-transparent border border-yellow rounded-full cursor-pointer text-white hover:bg-yellow max-h-max">
                    <?php echo esc_html($category->name); ?>
                </button>
        <?php endforeach;
        endif;
        ?>
    </div>

    <!-- Projects Grid (Isotope container) -->
    <div id="projects-container" class="container grid gap-4 mx-auto md:grid-cols-3">
        <?php
        // WP_Query to fetch all projects
        $args = [
            'post_type'      => 'project',
            'posts_per_page' => -1,
        ];
        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                // Get the post thumbnail
                $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                
                // Get project categories
                $categories = get_the_terms(get_the_ID(), 'project_category');
                $category_classes = '';
                if ($categories) {
                    foreach ($categories as $category) {
                        $category_classes .= ' category-' . $category->term_id;
                    }
                }
        ?>
                <div class="relative z-10 projectsCard <?php echo esc_attr($category_classes); ?>">
                    <a href="<?php the_permalink(); ?>" class="contents">
                        <!-- Image Wrapper -->
                        <div class="inset-0 overflow-hidden imgWrapper absolute">
                            <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" class="object-cover object-center w-full h-full" />
                        </div>

                        <!-- Project Title -->
                        <div class="absolute inset-0 txtWrapper p-[min(5%,_2rem)] lg:p-[min(10%,_4rem)]">
                            <h1 class="text-lg text-white uppercase md:text-xl max-w-[25ch] font-medium">
                                <?php the_title(); ?>
                            </h1>
                        </div>
                    </a>
                </div>
        <?php endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</section>



<?php get_footer();?>
