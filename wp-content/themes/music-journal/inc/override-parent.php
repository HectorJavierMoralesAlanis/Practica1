<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Photo_Journal
 */

/**
 * Display Sections on header and footer with respect to the section option set in music_journal_sections_sort
 */
function photo_journal_sections( $selector = 'header' ) {
	get_template_part( 'template-parts/header/header', 'media' );
	get_template_part( 'template-parts/header/site', 'branding' );
	get_template_part( 'template-parts/slider/content', 'slider' );
	get_template_part( 'template-parts/playlist/content-playlist' ); 
	get_template_part( 'template-parts/featured-content/display','featured' );
	get_template_part( 'template-parts/service/content','service' );
	get_template_part( 'template-parts/hero-content/content','hero' );
	get_template_part( 'template-parts/portfolio/display', 'portfolio' );
	get_template_part( 'template-parts/sticky-playlist/content-playlist' ); 
    get_template_part( 'template-parts/testimonial/display', 'testimonial' );
}

/**
 * Override parent fonts load.
 */
function photo_journal_fonts_url() {
	/* Translators: If there are characters in your language that are not
	* supported by Poppins, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$poppins = _x( 'on', 'Poppins: on or off', 'photo-journal' );

	if ( 'off' === $poppins ) {
		return;
	}
	
	$font_families = array();

	$font_families[] = 'Poppins::300,400,600,700';

	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	// Load google font locally.
	require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
			
	return esc_url_raw( wptt_get_webfont_url( $fonts_url ) );
}
