<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Musicsong
* @since Musicsong 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'musicsong_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'musicsong_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'musicsong_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'musicsong' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'musicsong' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
) );