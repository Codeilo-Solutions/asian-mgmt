<?php

/**
* Create Custom Settings For Customizer
*/

function starter_customize_register( $wp_customize ) 
{
    $wp_customize->add_section( 'footer_customizer' , array(
        'title'    => __( 'Footer Settings', 'starter' ),
        'priority' => 200
    ) );   

    $wp_customize->add_setting( 'footer_logo' , array(
    	//default value
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo', array(
	    'label' 	=> __( 'Footer Logo', 'placeholderfortextdomain' ),
	    'section' 	=> 'footer_customizer',
	    'settings' 	=> 'footer_logo'
	) ) );


	// DIEMME KITCHEN

    $wp_customize->add_setting( 'footer_title_1' , array(
	    'default' 			=> '',
	    'type' 				=> 'theme_mod',
	    'sanitize_callback' => 'our_sanitize_function',
	) );

	$wp_customize->add_control( 'footer_title_1', array(
	    'label' 	=> __( 'Footer Title 1', 'placeholderfortextdomain' ),
	    'section' 	=> 'footer_customizer',
	    'settings' 	=> 'footer_title_1',
	    'type' 		=> 'text'
	) );

	$wp_customize->add_setting( 'footer_desc_1' , array(
	    'default' 			=> '',
	    'type' 				=> 'theme_mod',
	    'sanitize_callback' => 'our_sanitize_function',
	) );

	$wp_customize->add_control( 'footer_desc_1', array(
	    'label' 	=> __( 'Footer Description 1', 'placeholderfortextdomain' ),
	    'section' 	=> 'footer_customizer',
	    'settings' 	=> 'footer_desc_1',
	    'type' 		=> 'textarea'
	) );


	// CONTACT US

    $wp_customize->add_setting( 'footer_title_2' , array(
	    'default' 			=> '',
	    'type' 				=> 'theme_mod',
	    'sanitize_callback' => 'our_sanitize_function',
	) );

	$wp_customize->add_control( 'footer_title_2', array(
	    'label' 	=> __( 'Footer Title 2', 'placeholderfortextdomain' ),
	    'section' 	=> 'footer_customizer',
	    'settings' 	=> 'footer_title_2',
	    'type' 		=> 'text'
	) );

	$wp_customize->add_setting( 'footer_desc_2' , array(
	    'default' 			=> '',
	    'type' 				=> 'theme_mod',
	    'sanitize_callback' => 'our_sanitize_function',
	) );

	$wp_customize->add_control( 'footer_desc_2', array(
	    'label' 	=> __( 'Footer Description 2', 'placeholderfortextdomain' ),
	    'section' 	=> 'footer_customizer',
	    'settings' 	=> 'footer_desc_2',
	    'type' 		=> 'textarea'
	) );


	// QUICK LINKS

    $wp_customize->add_setting( 'footer_title_3' , array(
	    'default' 			=> '',
	    'type' 				=> 'theme_mod',
	    'sanitize_callback' => 'our_sanitize_function',
	) );

	$wp_customize->add_control( 'footer_title_3', array(
	    'label' 	=> __( 'Footer Title 3', 'placeholderfortextdomain' ),
	    'section' 	=> 'footer_customizer',
	    'settings' 	=> 'footer_title_3',
	    'type' 		=> 'text'
	) );


	// FOLLOW US

    $wp_customize->add_setting( 'footer_title_4' , array(
	    'default' 			=> '',
	    'type' 				=> 'theme_mod',
	    'sanitize_callback' => 'our_sanitize_function',
	) );

	$wp_customize->add_control( 'footer_title_4', array(
	    'label' 	=> __( 'Footer Title 4', 'placeholderfortextdomain' ),
	    'section' 	=> 'footer_customizer',
	    'settings' 	=> 'footer_title_4',
	    'type' 		=> 'text'
	) );

    $wp_customize->add_setting( 'footer_facebook' , array(
	    'default' 			=> '',
	    'type' 				=> 'theme_mod',
	    'sanitize_callback' => 'our_sanitize_function',
	) );

	$wp_customize->add_control( 'footer_facebook', array(
	    'label' 	=> __( 'Facebook URL', 'placeholderfortextdomain' ),
	    'section' 	=> 'footer_customizer',
	    'settings' 	=> 'footer_facebook',
	    'type' 		=> 'text'
	) );

    $wp_customize->add_setting( 'footer_instagram' , array(
	    'default' 			=> '',
	    'type' 				=> 'theme_mod',
	    'sanitize_callback' => 'our_sanitize_function',
	) );

	$wp_customize->add_control( 'footer_instagram', array(
	    'label' 	=> __( 'Instagram URL', 'placeholderfortextdomain' ),
	    'section' 	=> 'footer_customizer',
	    'settings' 	=> 'footer_instagram',
	    'type' 		=> 'text'
	) );

    $wp_customize->add_setting( 'footer_twitter' , array(
	    'default' 			=> '',
	    'type' 				=> 'theme_mod',
	    'sanitize_callback' => 'our_sanitize_function',
	) );

	$wp_customize->add_control( 'footer_twitter', array(
	    'label' 	=> __( 'Twitter URL', 'placeholderfortextdomain' ),
	    'section' 	=> 'footer_customizer',
	    'settings' 	=> 'footer_twitter',
	    'type' 		=> 'text'
	) );

    $wp_customize->add_setting( 'footer_youtube' , array(
	    'default' 			=> '',
	    'type' 				=> 'theme_mod',
	    'sanitize_callback' => 'our_sanitize_function',
	) );

	$wp_customize->add_control( 'footer_youtube', array(
	    'label' 	=> __( 'Youtube URL', 'placeholderfortextdomain' ),
	    'section' 	=> 'footer_customizer',
	    'settings' 	=> 'footer_youtube',
	    'type' 		=> 'text'
	) );


	// COPYRIGHTS

    $wp_customize->add_setting( 'footer_copyrights' , array(
	    'default' 			=> '',
	    'type' 				=> 'theme_mod',
	    'sanitize_callback' => 'our_sanitize_function',
	) );

	$wp_customize->add_control( 'footer_copyrights', array(
	    'label' 	=> __( 'Copyrights', 'placeholderfortextdomain' ),
	    'section' 	=> 'footer_customizer',
	    'settings' 	=> 'footer_copyrights',
	    'type' 		=> 'text'
	) );
}
add_action( 'customize_register', 'starter_customize_register');

function our_sanitize_function( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}



function menu_customize_register( $wp_customize ) 
{
    $wp_customize->add_section( 'menu_customizer' , array(
        'title'    => __( 'Menu Image Settings', 'starter' ),
        'priority' => 200
    ) );   

    $wp_customize->add_setting( 'alno_menu_logo' , array(
    	//default value
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'alno_menu_logo', array(
	    'label' 	=> __( 'Alno Image', 'placeholderfortextdomain' ),
	    'section' 	=> 'menu_customizer',
	    'settings' 	=> 'alno_menu_logo'
	) ) );
	
    $wp_customize->add_setting( 'diemme_menu_logo' , array(
    	//default value
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'diemme_menu_logo', array(
	    'label' 	=> __( 'Diemme Image', 'placeholderfortextdomain' ),
	    'section' 	=> 'menu_customizer',
	    'settings' 	=> 'diemme_menu_logo'
	) ) );
	
    $wp_customize->add_setting( 'fronts_menu_logo' , array(
    	//default value
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fronts_menu_logo', array(
	    'label' 	=> __( 'Fronts Image', 'placeholderfortextdomain' ),
	    'section' 	=> 'menu_customizer',
	    'settings' 	=> 'fronts_menu_logo'
	) ) );
	
    $wp_customize->add_setting( 'handles_menu_logo' , array(
    	//default value
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'handles_menu_logo', array(
	    'label' 	=> __( 'Handles Image', 'placeholderfortextdomain' ),
	    'section' 	=> 'menu_customizer',
	    'settings' 	=> 'handles_menu_logo'
	) ) );
	
    $wp_customize->add_setting( 'appliances_menu_logo' , array(
    	//default value
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appliances_menu_logo', array(
	    'label' 	=> __( 'Appliances Image', 'placeholderfortextdomain' ),
	    'section' 	=> 'menu_customizer',
	    'settings' 	=> 'appliances_menu_logo'
	) ) );
	
	    $wp_customize->add_setting( 'accessories_menu_logo' , array(
    	//default value
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'accessories_menu_logo', array(
	    'label' 	=> __( 'Accessories Image', 'placeholderfortextdomain' ),
	    'section' 	=> 'menu_customizer',
	    'settings' 	=> 'accessories_menu_logo'
	) ) );

}
add_action( 'customize_register', 'menu_customize_register');