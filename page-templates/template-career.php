<?php
/**
 * Template Name: Career Dynamic Form
 */
get_header();
?>

<!-- Hero Section -->
<section class="relative h-[60vh] md:h-[70vh] flex items-center justify-center text-white overflow-hidden" 
    style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>');">
    <div class="absolute inset-0 z-0">
        <img src="<?php echo get_template_directory_uri(); ?>/photos/asia mng.png" alt="Career Hero" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-transparent"></div>
    </div>
</section>

<!-- Join Our Team Section -->
<section>
    <div class="max-w-7xl bg-[#C41E3A] py-16 px-6 md:px-12 lg:px-24">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
            <?php echo esc_html(get_field('section_1_title')); ?>
        </h2>
        <p class="text-white text-lg font-light">
            <?php echo nl2br(esc_html(get_field('section_1_description'))); ?>
        </p>
    </div>
</section>

<!-- Apply Form Section -->
<section class="bg-gray-50 py-20 px-6 md:px-12 lg:px-24">
    <div class="max-w-7xl mx-auto">
        <div class="bg-white p-8 md:p-12 shadow-lg">

            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-10">
                <?php echo esc_html(get_field('form_title') ? get_field('form_title') : 'Apply Now'); ?>
            </h2>
<div class="space-y-6 latoRegular mt-10">

            <!-- CF7 Form Start -->
            <?php echo do_shortcode('[contact-form-7 id="e5124f7" title="Career"]'); ?>
            <!-- CF7 Form End -->
             </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
