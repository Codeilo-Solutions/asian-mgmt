<?php
/**
 * Template Name: Contact Layout
 */
get_header();
?>

<!-- Hero Section -->
<section class="relative h-[60vh] min-h-[500px] overflow-hidden pt-32">
    <div class="absolute inset-0 z-0">
        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="Contact Us" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/40 to-transparent"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-12 h-full flex items-center">
        <div class="text-white max-w-2xl">
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-serif-custom font-bold mb-6 leading-tight">
                <?php the_title(); ?>
            </h1>
            <div class="w-20 h-1 bg-white"></div>
        </div>
    </div>
</section>

<!-- Contact Information Section -->
<section class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

            <?php if(get_field('address')): ?>
            <div class="text-center md:text-left">
                <h3 class="text-lg font-bold uppercase tracking-wider text-gray-900 mb-4">Address</h3>
                <p class="text-gray-600 leading-relaxed"><?php echo esc_html(get_field('address')); ?></p>
            </div>
            <?php endif; ?>

            <?php if(get_field('phone')): ?>
            <div class="text-center md:text-left">
                <h3 class="text-lg font-bold uppercase tracking-wider text-gray-900 mb-4">Phone</h3>
                <a href="tel:<?php echo esc_attr(get_field('phone')); ?>" class="text-gray-600 hover:text-[#C41E3A] transition-colors">
                    <?php echo esc_html(get_field('phone')); ?>
                </a>
            </div>
            <?php endif; ?>

            <?php if(get_field('email')): ?>
            <div class="text-center md:text-left">
                <h3 class="text-lg font-bold uppercase tracking-wider text-gray-900 mb-4">Email</h3>
                <a href="mailto:<?php echo esc_attr(get_field('email')); ?>" class="text-gray-600 hover:text-[#C41E3A] transition-colors break-words">
                    <?php echo esc_html(get_field('email')); ?>
                </a>
            </div>
            <?php endif; ?>

        </div>
    </div>
</section>

<!-- Get In Touch Form Section -->
<section>
    <div class="max-w-7xl mx-auto bg-gray-100 py-20 px-6 lg:px-12 mb-12">

        <div class="mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Get In Touch</h2>
            <p class="text-gray-600">Reach out for any inquiries or consultation</p>
        </div>

        <?php
        // Dynamic Contact Form via ACF shortcode or default Contact Form 7
        $contact_form_shortcode = get_field('contact_form_shortcode') ?: '[contact-form-7 id="cd00a1a" title="contact"]';
        echo do_shortcode($contact_form_shortcode);
        ?>

        <p class="mt-8 text-gray-600 text-sm">
            Contact us today to schedule a consultation with our specialists.
        </p>
    </div>
</section>
<style>
  .wpcf7-not-valid-tip{
    display: none;
  }
  /* Input fields */
.wpcf7 .form-input,
.wpcf7 .form-textarea {
    width: 100%;
    padding: 0.75rem 0;
    border: 0;
    border-bottom: 2px solid #D1D5DB; /* Tailwind gray-300 */
    background: transparent;
    outline: none;
    transition: border-color 0.3s;
}

.wpcf7 .form-input:focus,
.wpcf7 .form-textarea:focus {
    border-bottom-color: #C41E3A; /* Tailwind red-600 */
}
.wpcf7-not-valid{
    border-bottom-color: #C41E3A !important; /* Tailwind red-600 */
}
.wpcf7 .form-textarea {
    resize: none;
}

/* Submit Button */
.wpcf7 .form-submit {
    background-color: #000;
    color: #fff;
    padding: 1rem 3rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    transition: background-color 0.3s;
}

.wpcf7 .form-submit:hover {
    background-color: #C41E3A;
}
</style>
<?php get_footer(); ?>
