<?php

/**
 * ASIAMANAGEMENT function file
 *
 * @package ASIAMANAGEMENT
 * 
 * @since ASIAMANAGEMENT 1.0
 *
 */
?>
<?php
// AJAX Load More Insights
add_action('wp_ajax_load_more_insights', 'load_more_insights');
add_action('wp_ajax_nopriv_load_more_insights', 'load_more_insights');

function load_more_insights()
{
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $posts_per_page = 8;

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
        'paged' => $page,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        $html = '';
        while ($query->have_posts()) {
            $query->the_post();
            ob_start(); ?>

            <div class=" group ">
                <a href="<?php the_permalink(); ?>">
                    <div class="relative overflow-hidden mb-6 bg-gray-200 h-64">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('full', [
                                'class' => 'w-full h-full object-cover transition-transform duration-500 group-hover:scale-110',
                                'alt' => get_the_title()
                            ]);
                        } else { ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assest/mainImage/default.png"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                alt="Default Image">
                        <?php } ?>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>
                    <div class="space-y-3">
                        <p class="text-sm text-gray-500 font-light"><?php echo get_the_date('d/m/Y'); ?></p>
                        <h3 class="text-2xl font-bold text-gray-900 group-hover:text-[#C41E3A] transition-colors"><?php the_title(); ?></h3>
                        <p class="text-gray-600 leading-relaxed line-clamp-2"><?php echo get_the_excerpt(); ?></p>
                    </div>
                </a>
            </div>

<?php
            $html .= ob_get_clean();
        }
        wp_reset_postdata();
        wp_send_json_success($html);
    } else {
        wp_send_json_error('No more posts');
    }

    wp_die();
}

// Enqueue JS
function enqueue_insights_scripts()
{
    wp_enqueue_script(
        'insights-loadmore',
        DK_JS . '/insights-loadmore.js', // Make sure path is correct
        array('jquery'),
        '1.0',
        true
    );

    wp_localize_script('insights-loadmore', 'INSIGHTS_AJAX', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_insights_scripts');

// add_action('wp_enqueue_scripts', 'enqueue_insights_scripts');


require_once('core/init.php');
