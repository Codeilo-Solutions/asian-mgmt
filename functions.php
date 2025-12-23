<?php 
/**
 * ASIAMANAGEMENT function file
 *
 * @package ASIAMANAGEMENT
 * 
 * @since ASIAMANAGEMENT 1.0
 *
 */
// AJAX Load More
add_action('wp_ajax_load_more_insights', 'load_more_insights');
add_action('wp_ajax_nopriv_load_more_insights', 'load_more_insights');

function load_more_insights() {
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = 9;

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
        'paged' => $page,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $query = new WP_Query($args);

    if($query->have_posts()){
        ob_start();
        while($query->have_posts()){
            $query->the_post(); ?>

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

        <?php }
        wp_reset_postdata();
        $posts_html = ob_get_clean();
        wp_send_json_success($posts_html);
    } else {
        wp_send_json_error('No more posts');
    }

    wp_die();
}

function enqueue_insights_scripts() {
    wp_enqueue_script(
        'insights-loadmore',
        DK_JS . '/insights-loadmore.js',
        array('jquery'),
        '1.0',
        true
    );

    wp_localize_script('insights-loadmore', 'INSIGHTS_AJAX', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_insights_scripts');


require_once ( 'core/init.php' );