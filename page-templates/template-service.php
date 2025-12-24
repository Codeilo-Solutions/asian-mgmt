<?php
/**
 * Template Name: Service Layout
 */
get_header(); 
?>

<!-- Hero Section -->
<section class="relative h-[60vh] md:h-[70vh] flex flex-col justify-center items-start text-white overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center grayscale brightness-[0.5] z-0"
        style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>')"></div>
    <div class="z-10 max-w-7xl mx-auto w-full px-6 lg:px-12">
        <div class="text-start md:max-w-5xl">
            <p class="uppercase tracking-[0.3em] text-xs md:text-sm mb-4 font-light text-gray-300">
                <?php echo get_field('banner_title'); ?>
            </p>
            <h1 class="text-4xl sm:text-5xl font-light mb-6 leading-[1.1]">
                <?php echo get_field('banner_subtitle'); ?>
            </h1>
            <div class="w-36 h-px bg-white"></div>
        </div>
    </div>
</section>

<!-- Introduction Section -->
<section class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 max-w-3xl gap-12">
            <div>
                <p class="text-gray-700 leading-relaxed text-lg mb-6">
                    <?php echo nl2br(wp_strip_all_tags(get_the_content())); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<?php
if(is_page('Service')){
$args = [
  'post_type' => 'service',
  'posts_per_page' => -1,
  'order' => 'ASC'
]; }
else
{
$args = [
  'post_type' => 'industry',
  'posts_per_page' => -1,
  'order' => 'ASC'
];    
}
$query = new WP_Query($args);
if ($query->have_posts()):
    $index = 0;
    while ($query->have_posts()): $query->the_post();

        $listing_title = get_field('listing_title');
        $includes = get_field('includes');
        $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
        $content = wpautop(get_the_content());
?>

<section class="py-20 <?php echo $index % 2 === 0 ? 'bg-gray-50' : 'bg-white'; ?>">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <?php if ($index % 2 === 0): ?>
                <!-- EVEN: Image Left | Content Right -->
                <div>
                    <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" class="w-full h-[400px] object-cover grayscale" />
                </div>
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6"><?php the_title(); ?></h2>
                    <div class="w-36 h-1 mb-6 bg-black"></div>
                    <div class="text-gray-600 leading-relaxed mb-6"><?php echo $content; ?></div>

                    <?php if ($listing_title): ?>
                        <div class="mb-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4"><?php echo esc_html($listing_title); ?></h3>
                            <?php if ($includes): ?>
                                <ul class="space-y-2 text-gray-700">
                                    <?php foreach ($includes as $item): ?>
                                        <li class="flex items-start">
                                            <span class="text-black mr-2">•</span>
                                            <span><?php echo esc_html($item['list']); ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <a href="<?php the_permalink(); ?>" class="text-[#C41E3A] gap-2 font-semibold hover:underline inline-flex items-center group">
                       <div class="w-16 h-px bg-red-600"></div>
                        Learn More
                         
                    </a>
                </div>

            <?php else: ?>
                <!-- ODD: Content Left | Image Right -->
                <div class="order-2 lg:order-1">
                    <h2 class="text-4xl font-bold text-gray-900 mb-6"><?php the_title(); ?></h2>
                    <div class="w-36 h-1 mb-6 bg-black"></div>
                    <div class="text-gray-600 leading-relaxed mb-6"><?php echo $content; ?></div>

                    <?php if ($listing_title): ?>
                        <div class="mb-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4"><?php echo esc_html($listing_title); ?></h3>
                            <?php if ($includes): ?>
                                <ul class="space-y-2 text-gray-700">
                                    <?php foreach ($includes as $item): ?>
                                        <li class="flex items-start">
                                            <span class="text-black mr-2">•</span>
                                            <span><?php echo esc_html($item['list']); ?></span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <a href="<?php the_permalink(); ?>" class="text-[#C41E3A] gap-2 font-semibold hover:underline inline-flex items-center group">
                        
                        Learn More
                        <div class="w-16 h-px bg-red-600"></div>
                    </a>
                </div>
                <div class="order-1 lg:order-2">
                    <img src="<?php echo esc_url($image); ?>" alt="<?php the_title(); ?>" class="w-full h-[400px] object-cover grayscale" />
                </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<?php
    $index++;
    endwhile;
    wp_reset_postdata();
endif;
?>

<?php get_footer(); ?>
