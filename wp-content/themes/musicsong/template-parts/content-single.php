<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */
$options = musicsong_get_theme_options();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear' ); ?>>
	<div class="entry-meta">
        <?php 
        if ( ! $options['single_post_hide_date'] ) : 
        	musicsong_posted_on();
        endif; ?>
    </div><!-- .entry-meta -->

	<div class="entry-container">
		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'musicsong' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'musicsong' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div><!-- .entry-container -->
	
	<div class="entry-meta">
		<?php 
			if ( ! $options['single_post_hide_author'] ) : 
	        	echo musicsong_author(); 
	        endif; 
			musicsong_single_categories();
			musicsong_entry_footer(); 
		?>
	</div>
</article><!-- #post-## -->
