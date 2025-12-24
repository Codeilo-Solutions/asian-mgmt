<?php
/**
 * Template Name: About Layout
 */
get_header(); 
?>

<!-- Hero Section -->
<section class="relative h-[60vh] md:h-[70vh] flex flex-col justify-center items-start text-white overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center grayscale brightness-[0.5] z-0"
         style="background-image: url('<?php echo get_field('banner_image'); ?>')"></div>
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

<!-- Company Description -->
<section class="max-w-7xl mx-auto px-6 lg:px-12 py-20 md:py-32">
    <div class="max-w-4xl">
        <p class="text-gray-700 text-lg md:text-xl leading-relaxed mb-8">
            <?php echo wp_strip_all_tags(get_the_content()); ?>
        </p>
        <div class="w-36 h-1 bg-black"></div>
    </div>
</section>

<!-- Mission and Vision -->
<section class="max-w-7xl mx-auto bg-gray-200 px-6 pt-20 lg:px-12 pb-20 md:pb-32 md:pt-32">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 md:gap-16">
        <!-- Mission -->
        <div class="reveal">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">
                <?php echo get_field('left_title'); ?>
            </h2>
            <p class="text-gray-600 leading-relaxed">
                <?php echo get_field('left_description'); ?>
            </p>
        </div>
        <!-- Vision -->
        <div class="reveal">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">
                <?php echo get_field('right_title'); ?>
            </h2>
            <p class="text-gray-600 leading-relaxed">
                <?php echo get_field('right_description'); ?>
            </p>
        </div>
    </div>
</section>

<!-- Experience Section -->
<section class="max-w-7xl mx-auto px-6 lg:px-12 pb-20 md:pb-32 mt-20 md:mt-32">
    <div class="max-w-4xl">
        <p class="text-gray-700 text-lg md:text-xl leading-relaxed">
            <?php echo wp_strip_all_tags(get_field('section_2_content')); ?>
        </p>
        <div class="w-36 h-1 bg-black mt-12"></div>
    </div>
</section>

<!-- Team Section -->
<?php
$args = [
    'post_type' => 'team',
    'posts_per_page' => -1,
    'order' => 'ASC'
];
$loop = new WP_Query($args);
$teams = [];
while ($loop->have_posts()) : $loop->the_post();
    $designation = wp_get_post_terms(get_the_ID(), 'designation', ['fields' => 'names']);
    $teams[] = [
        'name' => get_the_title(),
        'image' => get_the_post_thumbnail_url(get_the_ID(), 'full'),
        'designation' => $designation[0] ?? ''
    ];
endwhile;
wp_reset_postdata();
$rows = array_chunk($teams, 4);
?>

<?php foreach ($rows as $row_index => $row) : ?>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8 max-w-7xl mx-auto mb-12">
        <?php foreach ($row as $i => $team) : ?>
            <?php
            // Determine classes per static layout
            $mt_class = ($i == 0 || $i == 2) ? 'md:mt-12' : '';
            // $bg_class = ($i == 0) ? 'bg-[#C8A4A4]' : 'bg-gray-200';
            $bg_class = ($i == 0) ? 'bg-gray-200' : 'bg-gray-200';
            ?>
            <div class="reveal <?php echo $mt_class; ?>">
                <div class="aspect-[3/4] <?php echo $bg_class; ?> overflow-hidden mb-4">
                    <img src="<?php echo esc_url($team['image']); ?>" 
                         class="w-full h-full object-cover <?php echo ($i==0) ? '' : ''; ?>" 
                         alt="<?php echo esc_attr($team['name']); ?>" />
                </div>
                <h3 class="font-bold text-gray-900 text-sm md:text-base"><?php echo esc_html($team['name']); ?></h3>
                <p class="text-xs text-gray-500 uppercase tracking-wider mt-1"><?php echo esc_html($team['designation']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>

<!-- Our Values Section -->
<section class="max-w-7xl mx-auto px-6 lg:px-12 pb-20 md:pb-32">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        <!-- Image -->
        <div class="reveal">
            <img src="<?php echo get_field('section_4_image'); ?>" 
                 class="w-full h-[400px] md:h-[500px] object-cover" 
                 alt="<?php echo esc_attr(get_field('section_4_title')); ?>" />
        </div>
        <!-- Values Content -->
        <div class="reveal">
            <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 mb-12"><?php echo get_field('section_4_title'); ?></h2>
            <div class="space-y-8">
                <?php if( have_rows('section_4_content') ): ?>
                    <?php while( have_rows('section_4_content') ): the_row(); ?>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2"><?php the_sub_field('title'); ?></h3>
                            <p class="text-gray-600 leading-relaxed"><?php the_sub_field('description'); ?></p>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
