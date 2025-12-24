<?php get_header(); ?>

<?php if( have_posts() ): while( have_posts() ): the_post(); ?>

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

<!-- Introduction Section -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto w-full px-6 lg:px-12">
        <div class="max-w-4xl mx-auto text-gray-700 font-light leading-relaxed text-lg md:text-xl">
            <?php echo nl2br(wp_strip_all_tags(get_field('paragraph_1'))); ?>
        </div>
    </div>
</section>
 <section class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto w-full px-6 lg:px-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-10"><?php echo get_field('title'); ?></h2>
        <?php 
$paragraph_2 = get_field('paragraph_2'); 
if($paragraph_2): ?>
    <div class="paragraph-2-style">
        <?php echo nl2br(esc_html($paragraph_2)); ?>
    </div>
<?php endif; ?>

        </div>
    </section>

<!-- Industry Challenges Section -->
<?php $challenges = get_field('industry_challenges'); ?>
<?php if($challenges): ?>
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto w-full px-6 lg:px-12">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-10">Industry Challenges</h2>
        <ul class="space-y-4">
            <?php foreach($challenges as $item): ?>
            <li class="flex items-start gap-3">
                <span class="text-[#C41E3A] text-xl mt-1">•</span>
                <p class="text-gray-700 text-lg font-light"><?php echo esc_html($item['challenge']); ?></p>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</section>
<?php endif; ?>

<!-- Services & Why Choose Us Section -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto w-full px-6 lg:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

            <!-- Our Services Include -->
            <?php $services = get_field('includes'); ?>
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-10">Our Services Include:</h2>
                <?php if($services): ?>
                <ul class="space-y-5">
                    <?php foreach($services as $item): ?>
                        <li class="flex items-start gap-3">
                            <span class="text-[#C41E3A] text-xl mt-1">•</span>
                            <p class="text-gray-700 text-lg font-light"><?php echo esc_html($item['list']); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>

            <!-- Why Choose Us -->
            <?php $why_us = get_field('why_choose_us'); ?>
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-10">Why Choose Us</h2>
                <?php if($why_us): ?>
                <ul class="space-y-5">
                    <?php foreach($why_us as $item): ?>
                        <li class="flex items-start gap-3">
                            <span class="text-[#C41E3A] text-xl mt-1">•</span>
                            <p class="text-gray-700 text-lg font-light"><?php echo esc_html($item['list']); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>

<!-- Let's Discuss Section -->
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto w-full px-6 lg:px-12">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Let's Discuss Your <?php the_title(); ?> Needs</h2>
        <p class="text-lg text-gray-700">
            <a href="<?php echo get_site_url(); ?>/contact-us" class="text-[#C41E3A] underline hover:text-black transition-colors">Contact us</a> today to schedule a consultation with our <?php the_title(); ?> specialists
        </p>
    </div>
</section>

<!-- Featured Insights Section -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto w-full px-6 lg:px-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">

            <!-- Left Column -->
            <div class="lg:col-span-4">
                <h2 class="text-4xl md:text-5xl mb-4">
                    <span class="text-gray-400 font-light">Featured</span> 
                    <span class="font-serif-custom italic font-normal text-gray-900">Insights</span>
                </h2>
                <p class="text-gray-500 text-base font-light mb-8">
                    Stay informed with expert tips and strategies from our team
                </p>
                <a href="<?php echo get_site_url(); ?>/insights" class="inline-flex items-center gap-3 text-gray-600 hover:text-[#C41E3A] transition-colors group">
                    <div class="w-24 h-px bg-gray-400 group-hover:bg-[#C41E3A] transition-colors"></div>
                    <span class="text-sm font-light tracking-wider">View all Articles</span>
                </a>
            </div>

            <!-- Right Column - Latest Posts -->
            <div class="lg:col-span-8 space-y-0">
                <?php
                $args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => 3,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                );
                $latest_posts = new WP_Query( $args );
                if ( $latest_posts->have_posts() ) :
                    while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
                    <div class="py-8 border-b border-gray-200">
                        <div class="flex justify-between items-start gap-6">
                            <div class="flex-1">
                                <p class="text-sm text-gray-500 mb-3 font-light"><?php echo get_the_date('d/m/Y'); ?></p>
                                <h3 class="text-2xl md:text-3xl font-light text-gray-900 mb-3">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="text-gray-500 leading-relaxed font-light text-base line-clamp-2">
                                    <?php echo get_the_excerpt(); ?>
                                </p>
                            </div>
                            <svg class="w-8 h-8 text-gray-400 flex-shrink-0 mt-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

        </div>
    </div>
</section>
<style>
    .paragraph-2-style {
    position: relative;
    /* padding-left: 1.5rem;      Space for the bullet */
    color: #4B5563;             /* Tailwind text-gray-700 */
    font-size: 1.125rem;        /* Tailwind text-lg */
    font-weight: 300;           /* Tailwind font-light */
    line-height: 1.6;
}

</style>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
