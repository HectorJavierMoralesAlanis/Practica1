<?php
/**
 * Blog Section options
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */

// Add Blog section
$wp_customize->add_section( 'musicsong_blog_section', array(
	'title'             => esc_html__( 'Blog','musicsong' ),
	'description'       => esc_html__( 'Blog Section options.', 'musicsong' ),
	'panel'             => 'musicsong_front_page_panel',
) );

// Blog content enable control and setting
$wp_customize->add_setting( 'musicsong_theme_options[blog_section_enable]', array(
	'default'			=> 	$options['blog_section_enable'],
	'sanitize_callback' => 'musicsong_sanitize_switch_control',
) );

$wp_customize->add_control( new Musicsong_Switch_Control( $wp_customize, 'musicsong_theme_options[blog_section_enable]', array(
	'label'             => esc_html__( 'Blog Section Enable', 'musicsong' ),
	'section'           => 'musicsong_blog_section',
	'on_off_label' 		=> musicsong_switch_options(),
) ) );

// blog title setting and control
$wp_customize->add_setting( 'musicsong_theme_options[blog_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'musicsong_theme_options[blog_title]', array(
	'label'           	=> esc_html__( 'Title', 'musicsong' ),
	'section'        	=> 'musicsong_blog_section',
	'active_callback' 	=> 'musicsong_is_blog_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'musicsong_theme_options[blog_title]', array(
		'selector'            => '#latest-posts .section-header h2.section-title',
		'settings'            => 'musicsong_theme_options[blog_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'musicsong_blog_title_partial',
    ) );
}

// Blog content type control and setting
$wp_customize->add_setting( 'musicsong_theme_options[blog_content_type]', array(
	'default'          	=> $options['blog_content_type'],
	'sanitize_callback' => 'musicsong_sanitize_select',
) );

$wp_customize->add_control( 'musicsong_theme_options[blog_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'musicsong' ),
	'section'           => 'musicsong_blog_section',
	'type'				=> 'select',
	'active_callback' 	=> 'musicsong_is_blog_section_enable',
	'choices'			=> array( 
		'category' 	=> esc_html__( 'Category', 'musicsong' ),
		'recent' 	=> esc_html__( 'Recent', 'musicsong' ),
	),
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'musicsong_theme_options[blog_content_category]', array(
	'sanitize_callback' => 'musicsong_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Musicsong_Dropdown_Taxonomies_Control( $wp_customize,'musicsong_theme_options[blog_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'musicsong' ),
	'description'      	=> esc_html__( 'Note: Latest five posts will be shown from selected category', 'musicsong' ),
	'section'           => 'musicsong_blog_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'musicsong_is_blog_section_content_category_enable'
) ) );

// Add dropdown categories setting and control.
$wp_customize->add_setting( 'musicsong_theme_options[blog_category_exclude]', array(
	'sanitize_callback' => 'musicsong_sanitize_category_list',
) ) ;

$wp_customize->add_control( new Musicsong_Dropdown_Category_Control( $wp_customize,'musicsong_theme_options[blog_category_exclude]', array(
	'label'             => esc_html__( 'Select Excluding Categories', 'musicsong' ),
	'description'      	=> esc_html__( 'Note: Select categories to exclude. Press Shift key select multilple categories.', 'musicsong' ),
	'section'           => 'musicsong_blog_section',
	'type'              => 'dropdown-categories',
	'active_callback'	=> 'musicsong_is_blog_section_content_recent_enable'
) ) );
