<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'musicsong_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'musicsong' ),
		'priority'   			=> 900,
		'panel'      			=> 'musicsong_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'musicsong_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'musicsong_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'musicsong_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'musicsong' ),
		'section'    			=> 'musicsong_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'musicsong_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright p',
		'settings'            => 'musicsong_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'musicsong_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'musicsong_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback' => 'musicsong_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Musicsong_Switch_Control( $wp_customize, 'musicsong_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'musicsong' ),
		'section'    			=> 'musicsong_section_footer',
		'on_off_label' 		=> musicsong_switch_options(),
    )
) );