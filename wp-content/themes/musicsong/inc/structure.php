<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */

$options = musicsong_get_theme_options();


if ( ! function_exists( 'musicsong_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Musicsong 1.0.0
	 */
	function musicsong_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'musicsong_doctype', 'musicsong_doctype', 10 );


if ( ! function_exists( 'musicsong_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Musicsong 1.0.0
	 *
	 */
	function musicsong_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;
add_action( 'musicsong_before_wp_head', 'musicsong_head', 10 );

if ( ! function_exists( 'musicsong_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Musicsong 1.0.0
	 *
	 */
	function musicsong_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'musicsong' ); ?></a>

		<?php
	}
endif;
add_action( 'musicsong_page_start_action', 'musicsong_page_start', 10 );

if ( ! function_exists( 'musicsong_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since Musicsong 1.0.0
	 *
	 */
	function musicsong_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'musicsong_page_end_action', 'musicsong_page_end', 10 );

if ( ! function_exists( 'musicsong_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Musicsong 1.0.0
	 *
	 */
	function musicsong_header_start() { ?>
		<header id="masthead" class="site-header" role="banner">
			<div class="wrapper">
		<?php
	}
endif;
add_action( 'musicsong_header_action', 'musicsong_header_start', 10 );

if ( ! function_exists( 'musicsong_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Musicsong 1.0.0
	 *
	 */
	function musicsong_site_branding() {
		$options  = musicsong_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];		
		?>
		<div class="site-menu">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <?php
				echo musicsong_get_svg( array( 'icon' => 'menu' ) );
				echo musicsong_get_svg( array( 'icon' => 'close' ) );
				?>	
                <span class="menu-label"><?php esc_html_e( 'Menu', 'musicsong' ); ?></span>
            </button><!-- .menu-toggle -->

			<div class="site-branding">
				<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) )  ) { ?>
					<div class="site-logo">
						<?php the_custom_logo(); ?>
					</div>
				<?php } 
				if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
					<div id="site-details">
						<?php
						if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
							if ( musicsong_is_latest_posts() ) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
							endif;
						} 
						if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
							<?php
							endif; 
						}?>
					</div>
				<?php endif; ?>
			</div><!-- .site-branding -->
		<?php
	}
endif;
add_action( 'musicsong_header_action', 'musicsong_site_branding', 20 );

if ( ! function_exists( 'musicsong_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Musicsong 1.0.0
	 *
	 */
	function musicsong_site_navigation() { ?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php  
				$social_defaults = wp_nav_menu( array(
        			'theme_location' => 'social',
        			'container' => 'div',
    				'container_class' => 'social-icons',
        			'menu_class' => '',
        			'menu_id' => '',
        			'echo' => false,
        			'depth' => 1,
        			'link_before' => '<span class="screen-reader-text">',
					'link_after' => '</span>',
        		));
        	
        		wp_nav_menu( array(
        			'theme_location' => 'primary',
        			'container' => 'div',
        			'menu_class' => 'menu nav-menu',
        			'menu_id' => 'primary-menu',
        			'echo' => true,
        			'fallback_cb' => 'musicsong_menu_fallback_cb',
        			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s<li class="social-menu-item">' . $social_defaults . '</li></ul>',
        		) );
        	?>
		</nav><!-- #site-navigation -->
		</div><!-- .site-menu -->

		<?php
	}
endif;
add_action( 'musicsong_header_action', 'musicsong_site_navigation', 30 );

if ( ! function_exists( 'musicsong_social_navigation' ) ) :
	/**
	 * Social navigation codes
	 *
	 * @since Musicsong 1.0.0
	 *
	 */
	function musicsong_social_navigation() {
		?>
		 <div id="social-navigation">
			<?php  
        		
        		wp_nav_menu( array(
        			'theme_location' => 'social',
        			'container' => 'div',
    				'container_class' => 'social-icons',
        			'menu_class' => '',
        			'menu_id' => '',
        			'echo' => true,
        			'fallback_cb' => 'musicsong_menu_fallback_cb',
        			'depth' => 1,
        			'link_before' => '<span class="screen-reader-text">',
					'link_after' => '</span>',
        		) );
        	?>
		</div><!-- #social-navigation -->
		<?php
	}
endif;
add_action( 'musicsong_header_action', 'musicsong_social_navigation', 40 );

if ( ! function_exists( 'musicsong_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Musicsong 1.0.0
	 *
	 */
	function musicsong_header_end() {
		?>
			</div><!-- .wrapper -->
		</header><!-- #masthead -->
		<?php
	}
endif;

add_action( 'musicsong_header_action', 'musicsong_header_end', 50 );

if ( ! function_exists( 'musicsong_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Musicsong 1.0.0
	 *
	 */
	function musicsong_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'musicsong_content_start_action', 'musicsong_content_start', 10 );

if ( ! function_exists( 'musicsong_header_image' ) ) :
	/**
	 * Header Image codes
	 *
	 * @since Musicsong 1.0.0
	 *
	 */
	function musicsong_header_image() {
		if ( musicsong_is_frontpage() )
			return;
		$header_image = get_header_image();
		if ( is_singular() ) :
			$header_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $header_image;
		endif;
		?>

		<div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <header class="page-header">
                    <h2 class="page-title"><?php musicsong_custom_header_banner_title(); ?></h2>
                </header>

                <?php musicsong_add_breadcrumb(); ?>
            </div><!-- .wrapper -->
        </div><!-- #page-site-header -->

	<?php
	}
endif;
add_action( 'musicsong_header_image_action', 'musicsong_header_image', 10 );

if ( ! function_exists( 'musicsong_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since Musicsong 1.0.0
	 */
	function musicsong_add_breadcrumb() {
		$options = musicsong_get_theme_options();

		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( musicsong_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >';
				/**
				 * musicsong_simple_breadcrumb hook
				 *
				 * @hooked musicsong_simple_breadcrumb -  10
				 *
				 */
				do_action( 'musicsong_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
	}
endif;

if ( ! function_exists( 'musicsong_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Musicsong 1.0.0
	 *
	 */
	function musicsong_content_end() {
		?>
			<div class="menu-overlay"></div>
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'musicsong_content_end_action', 'musicsong_content_end', 10 );

if ( ! function_exists( 'musicsong_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Musicsong 1.0.0
	 *
	 */
	function musicsong_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
	}
endif;
add_action( 'musicsong_footer', 'musicsong_footer_start', 10 );

if ( ! function_exists( 'musicsong_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Musicsong 1.0.0
	 *
	 */
	function musicsong_footer_site_info() {
		$theme_data = wp_get_theme();
		$options = musicsong_get_theme_options();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_html( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text']; 
		$powered_by_text = esc_html__( ' All Rights Reserved | ', 'musicsong' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'musicsong' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>';
		?>
		<div class="site-info col-3">
            <div class="wrapper">
                <span>
                	<?php 
                	echo musicsong_santize_allow_tag( $copyright_text ); 
                	echo musicsong_santize_allow_tag( $powered_by_text ); 
                	if ( function_exists( 'the_privacy_policy_link' ) ) {
						the_privacy_policy_link( ' | ' );
					}
                	?>
            	</span>

            	<?php  
	        	
	        		wp_nav_menu( array(
	        			'theme_location' => 'footer',
	        			'container' => 'div',
	        			'container_class' => 'custom-menu',
	        			'menu_class' => false,
	        			'menu_id' => false,
	        			'echo' => true,
	        			'fallback_cb' => 'musicsong_menu_fallback_cb',
	        		) );

	        		wp_nav_menu( array(
	        			'theme_location' => 'social',
	        			'container' => 'div',
	    				'container_class' => 'social-icons',
	        			'menu_class' => '',
	        			'menu_id' => '',
	        			'echo' => true,
	        			'fallback_cb' => 'musicsong_menu_fallback_cb',
	        			'depth' => 1,
	        			'link_before' => '<span class="screen-reader-text">',
						'link_after' => '</span>',
	        		) );
            	?>
            </div><!-- .wrapper -->    
        </div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'musicsong_footer', 'musicsong_footer_site_info', 40 );

if ( ! function_exists( 'musicsong_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Musicsong 1.0.0
	 *
	 */
	function musicsong_footer_scroll_to_top() {
		$options  = musicsong_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo musicsong_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'musicsong_footer', 'musicsong_footer_scroll_to_top', 40 );

if ( ! function_exists( 'musicsong_footer_end' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Musicsong 1.0.0
	 *
	 */
	function musicsong_footer_end() {
		?>
		</footer>
		<div class="popup-overlay"></div>
		<?php
	}
endif;
add_action( 'musicsong_footer', 'musicsong_footer_end', 100 );

if ( ! function_exists( 'musicsong_infinite_loader_spinner' ) ) :
	/**
	 *
	 * @since Musicsong 1.0.0
	 *
	 */
	function musicsong_infinite_loader_spinner() { 
		global $post;
		$options = musicsong_get_theme_options();
		if ( $options['pagination_type'] == 'infinite' ) :
			if ( count( $post ) > 0 ) {
				echo '<div class="blog-loader">' . musicsong_get_svg( array( 'icon' => 'spinner-umbrella' ) ) . '</div>';
			}
		endif;
	}
endif;
add_action( 'musicsong_infinite_loader_spinner_action', 'musicsong_infinite_loader_spinner', 10 );
