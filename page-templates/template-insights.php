<?php
/**
 * Template Name: Insights Layout
 */
get_header();
?>

<!-- Hero Banner -->
<div class="insight w-full relative h-[60vh] md:h-[70vh] flex items-center bg-cover bg-center overflow-hidden"
     style="background-image: linear-gradient(rgba(20,30,50,0.7), rgba(20,30,50,0.7)), url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">
    <div class="absolute inset-0 bg-gradient-to-b from-[#1a1f2e]/80 to-[#242a3a]/80"></div>
    <div class="relative z-10 max-w-7xl mx-auto w-full px-6 md:px-12">
        <div class="reveal">
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold text-white mb-4">Insight</h1>
            <div class="w-20 h-1 bg-[#C41E3A]"></div>
        </div>
    </div>
</div>

<!-- Insights & Articles Section -->
<section class="bg-[#C41E3A] py-16 md:py-20">
    <div class="max-w-7xl mx-auto px-6 md:px-12">
        <div class="reveal">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Insights & Articles</h2>
            <p class="text-white/90 text-lg">Stay updated with the latest trends, tips, and insights from our experts</p>
        </div>
    </div>
</section>

<!-- Featured Insights Section -->
<section class="bg-white py-20 md:py-28">
    <div class="max-w-7xl mx-auto px-6 md:px-12">
        <!-- Section Title -->
        <div class="text-center mb-16 reveal">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Featured Insights</h2>
            <div class="w-20 h-1 bg-[#C41E3A] mx-auto"></div>
        </div>

      <div id="post-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 8,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $featured_posts = new WP_Query($args);
    if($featured_posts->have_posts()):
        while($featured_posts->have_posts()): $featured_posts->the_post(); ?>
            
            <div class="reveal group cursor-pointer">
                <a href="<?php the_permalink(); ?>">
                <div class="relative overflow-hidden mb-6 bg-gray-200 h-64">
                    <?php 
                    if(has_post_thumbnail()) {
                        the_post_thumbnail('full', [
                            'class'=>'w-full h-full object-cover transition-transform duration-500 group-hover:scale-110',
                            'alt'=>get_the_title()
                        ]);
                    } else { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assest/mainImage/default.png"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                            alt="Default Image">
                    <?php } ?>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <div class="space-y-3">
                    <p class="text-sm text-gray-500 font-light"><?php echo get_the_date('F d, Y'); ?></p>
                    <h3 class="text-2xl font-bold text-gray-900 group-hover:text-[#C41E3A] transition-colors"><?php the_title(); ?></h3>
                    <p class="text-gray-600 leading-relaxed line-clamp-2"><?php echo get_the_excerpt(); ?></p>
                </div>
                </a>
            </div>

        <?php endwhile; wp_reset_postdata(); endif; ?>
</div>

<?php
$total_posts = wp_count_posts('post')->publish;
if($total_posts > 8): ?>
<div class="flex justify-center mt-10">
    <button id="load-more" data-page="1" data-max="<?php echo ceil($total_posts/8); ?>"
        class="px-6 py-4 text-black border-[#C41E3A] border rounded-lg flex items-center gap-2 transition-all duration-300 transform hover:bg-[#C41E3A] hover:text-white">
        Load More
        <span class="transition-transform duration-300 inline-block">→</span>
    </button>
</div>
<?php endif; ?>

    </div>
</section>

<?php get_footer(); ?>


