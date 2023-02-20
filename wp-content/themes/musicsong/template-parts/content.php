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
$read_more = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : esc_html__( 'Read Full Article', 'musicsong' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-wrapper">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'large' ) ?>');">
                <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
            </div><!-- .featured-image -->
        <?php endif; ?>

        <div class="entry-container">
            <div class="entry-meta">
                <?php musicsong_posted_on(); ?>

                <span class="cat-links">
                    <?php echo musicsong_article_footer_meta(); ?>
                </span><!-- .cat-links --> 
            </div><!-- .entry-meta -->

            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>

            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div><!-- .entry-content -->

            <div class="read-more">
                <a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_html( $read_more ); ?></a>
            </div><!-- .read-more -->
        </div><!-- .entry-container -->
    </div><!-- .post-wrapper -->
</article>
