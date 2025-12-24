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
<style>
/* Inputs and textarea */
.form-input, .form-textarea, .form-file {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    font-size: 16px;
    outline: none;
    transition: all 0.3s ease;
    font-family: inherit;
}

.form-input:focus, .form-textarea:focus, .form-file:focus {
    border-color: #C41E3A;
    box-shadow: 0 0 0 1px #C41E3A;
}

.form-textarea {
    resize: none;
    min-height: 120px;
}

.form-submit {
    background-color: #C41E3A;
    color: #fff;
    padding: 14px 32px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.form-submit:hover {
    background-color: #000;
}

/* File input custom style */
.wpcf7 input[type=file].form-file {
    opacity: 0;
    position: absolute;
    width: 100%;
    height: 100%;
    cursor: pointer;
}

.wpcf7 input[type=file].form-file + span {
    display: block;
    padding: 12px 16px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    background-color: #fff;
    cursor: pointer;
    font-size: 16px;
    transition: all 0.3s ease;
}

.wpcf7 input[type=file].form-file:focus + span,
.wpcf7 input[type=file].form-file:hover + span {
    border-color: #C41E3A;
    color: #C41E3A;
}
.wpcf7-not-valid{
    border-bottom-color: #C41E3A !important; /* Tailwind red-600 */
}
.wpcf7-not-valid-tip{
    display: none;
  }
</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const input = document.querySelector('#resume-upload');
    const label = document.querySelector('#resume-file-name');

    input.addEventListener('change', function() {
        if(this.files && this.files.length > 0){
            label.textContent = this.files[0].name;
        } else {
            label.textContent = 'Choose File';
        }
    });
});
</script>
<?php get_footer(); ?>
