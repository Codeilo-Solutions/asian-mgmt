<?php
/**
 * Template Name: Insights Layout
 */
get_header();
?>

<!-- Hero Banner -->
<div class="insight w-full" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>);">
    <?php do_action('asiamanagement_header_content'); ?>
    <?php get_template_part('template-parts/common/banner'); ?>
</div>

<!-- Hero Section -->
<section class="bg-[--hading-color] text-white py-10 latoRegular relative">
    <div class="md:ml-44 px-10">
        <h1 class="text-[28px] md:text-[36px] mb-4"><?php echo get_field('section_1_title'); ?></h1>
        <p class="text-[16px] md:text-[18px]"><?php echo get_field('section_1_description'); ?></p>
    </div>
</section>

<!-- Featured Insights Section -->
<div class="max-w-5xl mx-auto px-4 py-16">
    <div class="text-black text-center md:text-left md:ml-1 md:mr-0 mr-16">
        <h1 class="acta tracking-[2px] text-[28px] sm:text-[34px] md:text-[38px]">Featured Insights</h1>
        <div class="mt-6 md:mr-0 mr-64">
            <div class="w-20 mx-auto md:mx-0 relative 
                after:content-[''] after:absolute after:w-full after:h-[2px] 
                after:bg-black after:bottom-0 md:ml-2">
            </div>
        </div>
    </div>

    <!-- Dynamic Posts Container -->
    <div id="post-container" class="flex flex-wrap -mx-2 mt-24 mb-12">

        <?php
        $posts_per_page = 9;
        $paged = 1; 
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $posts_per_page,
            'orderby' => 'date',
            'order' => 'DESC',
            'paged' => $paged
        );
        $featured_posts = new WP_Query($args);

        if ($featured_posts->have_posts()) :
            while ($featured_posts->have_posts()) : $featured_posts->the_post(); ?>

                <div class="w-full sm:w-1/2 lg:w-1/3 px-2 mb-6">
                    <div class="bg-white shadow-md duration-300 overflow-hidden group">
                        <a href="<?php the_permalink(); ?>">
                            <div class="overflow-hidden">
                                <?php 
                                if (has_post_thumbnail()) {
                                    the_post_thumbnail('full', [
                                        'class' => 'w-full h-60 object-cover transition-transform duration-500 hover:scale-105',
                                        'alt' => get_the_title()
                                    ]);
                                } else { ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assest/mainImage/default.png"
                                        class="w-full h-60 object-cover transition-transform duration-500 hover:scale-105"
                                        alt="Default Image">
                                <?php } ?>
                            </div>
                            <div class="p-4 space-y-3">
                                <h4 class="text-[14px] text-gray-500 latoRegular"><?php echo get_the_date('F d, Y'); ?></h4>
                                <h1 class="text-[20px] latoRegular text-gray-900 transition-colors duration-300 group-hover:text-[--hading-color]">
                                    <?php the_title(); ?>
                                </h1>
                                <p class="text-gray-600 text-sm leading-relaxed lato-light">
                                    <?php echo get_the_excerpt(); ?>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>

            <?php endwhile;
            wp_reset_postdata();
        else : ?>
            <p>No posts found.</p>
        <?php endif; ?>
    </div>

    <?php
    $total_posts = wp_count_posts('post')->publish;
    if ($total_posts > $posts_per_page) :
    ?>
        <div class="md:mt-10 flex justify-center">
            <button
                id="load-more"
                data-page="1"
                data-max="<?php echo ceil($total_posts / $posts_per_page); ?>"
                class="px-6 py-4 text-black border-[--hading-color] border rounded-lg flex items-center gap-2 transition-all duration-300 transform hover:bg-[--hading-color] hover:text-white">
                Load More
                <span class="transition-transform duration-300 group-hover:translate-x-2 inline-block">→</span>
            </button>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
