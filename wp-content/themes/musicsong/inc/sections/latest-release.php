<?php
/**
 * Latest Release section
 *
 * This is the template for the content of latest_release section
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */
if ( ! function_exists( 'musicsong_add_latest_release_section' ) ) :
    /**
    * Add latest_release section
    *
    *@since Musicsong 1.0.0
    */
    function musicsong_add_latest_release_section() {
    	$options = musicsong_get_theme_options();
        // Check if latest_release is enabled on frontpage
        $latest_release_enable = apply_filters( 'musicsong_section_status', true, 'latest_release_section_enable' );

        if ( true !== $latest_release_enable ) {
            return false;
        }
        // Get latest_release section details
        $section_details = array();
        $section_details = apply_filters( 'musicsong_filter_latest_release_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render latest_release section now.
        musicsong_render_latest_release_section( $section_details );
    }
endif;

if ( ! function_exists( 'musicsong_get_latest_release_section_details' ) ) :
    /**
    * latest_release section details.
    *
    * @since Musicsong 1.0.0
    * @param array $input latest_release section details.
    */
    function musicsong_get_latest_release_section_details( $input ) {
        $options = musicsong_get_theme_options();

        $content = array();
        $cat_id = ! empty( $options['latest_release_content_category'] ) ? $options['latest_release_content_category'] : '';
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 3,
            'cat'               => absint( $cat_id ),
            'ignore_sticky_posts'   => true,
            );                    


        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['excerpt']   = musicsong_trim_content( 10 );
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

                // Push to the main array.
                array_push( $content, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// latest_release section content details.
add_filter( 'musicsong_filter_latest_release_section_details', 'musicsong_get_latest_release_section_details' );


if ( ! function_exists( 'musicsong_render_latest_release_section' ) ) :
  /**
   * Start latest_release section
   *
   * @return string latest_release content
   * @since Musicsong 1.0.0
   *
   */
   function musicsong_render_latest_release_section( $content_details = array() ) {
        $options = musicsong_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="latest-albums" class="relative page-section">
            <div class="wrapper col-1">
                <div class="hentry">
                    <?php if ( ! empty( $options['latest_release_title'] ) ) : ?>
                        <div class="section-header">
                            <h2 class="section-title"><?php echo esc_html( $options['latest_release_title'] ); ?></h2>
                        </div><!-- .section-header -->
                    <?php endif; ?>
                </div><!-- .hentry -->

                <div class="hentry">
                    <div class="albums-wrapper">
                        <?php foreach ( $content_details as $content ) : ?>
                            <article>
                                <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header>
                                </div><!-- .featured-image -->
                            </article>
                        <?php endforeach; ?>
                    </div><!-- .albums-wrapper -->
                </div><!-- .hentry -->
            </div><!-- .wrapper -->
        </div><!-- #latest-albums -->
    
    <?php }
endif;