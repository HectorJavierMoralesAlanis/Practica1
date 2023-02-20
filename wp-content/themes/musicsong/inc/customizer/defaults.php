<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 * @return array An array of default values
 */

function musicsong_get_default_theme_options() {
	
	$musicsong_default_options = array(
		// Color Options
		'header_title_color'			=> '#fff',
		'header_tagline_color'			=> '#fff',
		'header_txt_logo_extra'			=> 'show-all',
		
		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',

		// excerpt options
		'long_excerpt_length'           => 25,
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'musicsong' ), '[the-year]', '[site-link]' ),
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// homepage sections sortable
		'sortable' 						=> 'Main Slider,About Us,Services,Latest Release,Call to Action,Testimonial,Blog',

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'musicsong' ),
		'read_more_text' 				=> esc_html__( 'Read Full Article', 'musicsong' ),
		'hide_date' 					=> false,
		'hide_category'					=> false,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		// Slider
		'slider_section_enable'			=> false,

		// About
		'about_section_enable'			=> false,
		'about_content_type'			=> 'page',

		// service
		'service_section_enable'		=> false,

		// latest release
		'latest_release_section_enable'	=> false,
		'latest_release_title'			=> esc_html__( 'Latest Release', 'musicsong' ),

		// Call to action
		'cta_section_enable'			=> false,

		// testimonial
		'testimonial_section_enable'	=> false,
		'testimonial_title'				=> esc_html__( 'Loved by business and individuals across the globe.', 'musicsong' ),

		// blog
		'blog_section_enable'			=> false,
		'blog_content_type'				=> 'category',
		'blog_title'					=> esc_html__( 'Our Latest Blog', 'musicsong' ),

	);

	$output = apply_filters( 'musicsong_default_theme_options', $musicsong_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}