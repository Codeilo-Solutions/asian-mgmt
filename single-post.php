<?php
get_header();
if( have_posts() ): while( have_posts() ): the_post(); 
?>

<!-- Hero Section -->
<section class="relative h-[60vh] md:h-[70vh] flex flex-col justify-center items-start text-white overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center grayscale brightness-[0.5] z-0"
        style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>')"></div>
    <div class="z-10 max-w-7xl mx-auto w-full px-6 lg:px-12">
        <div class="text-start md:max-w-5xl">
            <h1 class="text-4xl sm:text-5xl font-light mb-6 leading-[1.1]"><?php the_title(); ?></h1>
            <div class="w-36 h-px bg-white"></div>
        </div>
    </div>
</section>

<!-- Blog Content Section -->
<section class="detail-page py-16 md:py-24 bg-white">
    <div class="max-w-4xl mx-auto px-6 lg:px-12">
        <div class="blog-content">
            <!-- Featured Image -->
            <!-- <?php if(has_post_thumbnail()): ?>
            <div class="mb-12">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" 
                     alt="<?php the_title(); ?>" 
                     class="w-full h-auto object-cover">
            </div> -->
            <!-- <?php endif; ?> -->

            <!-- Article Content -->
            <article class="prose ">
                <?php the_content(); ?>
            </article>

            <!-- Related Articles -->
            <?php 
            $related = new WP_Query([
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'post__not_in'   => [get_the_ID()],
                'orderby'        => 'date',
                'order'          => 'DESC',
            ]);
            if($related->have_posts()): ?>
            <div class="related-section mt-16 pt-16 border-t border-gray-200">
                <h3 class="text-2xl font-bold mb-8 text-gray-900">Related</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <?php while($related->have_posts()): $related->the_post(); ?>
                        <div class="group">
                            <div class="mb-4 overflow-hidden">
                                <?php if(has_post_thumbnail()): ?>
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium_large'); ?>" 
                                         alt="<?php the_title(); ?>" 
                                         class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assest/mainImage/default.png" 
                                         alt="Default Image" 
                                         class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300">
                                <?php endif; ?>
                            </div>
                            <p class="text-xs uppercase tracking-wider text-[#C41E3A] mb-2"><?php echo get_the_date('m/d/Y'); ?></p>
                            <h4 class="text-lg font-bold mb-3 group-hover:text-[#C41E3A] transition-colors">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                            <p class="text-sm text-gray-600 leading-relaxed line-clamp-2"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<?php 
endwhile; endif;
get_footer();
?>
