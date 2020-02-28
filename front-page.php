<?php
/**
 * The template for displaying all page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Astral
 * @since 0.1
 */
get_header();
/* 
* Functions hooked into astral_top_banner action
* 
* @hooked astral_inner_banner
*/
do_action( 'astral_top_banner' );
/* 
* Functions hooked into astral_breadcrumb_area action
* 
* @hooked astral_breadcrumb_area
*/
do_action( 'astral_breadcrumb_area' );
?>
<div id="content">
    <section class="align-blog" id="blog">
        <div class="container">
            <div class="row">
                <!-- left side -->
                <div class="col-lg-8 single-left mt-lg-0 mt-4">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
						get_template_part( 'post', 'page' );
					endwhile;
                    endif;
                    
                    ///////////////////////nouvelles///////////////
        echo "<h2>" .category_description( get_category_by_slug( 'nouvelle' )). "</h2>";
 
        // The Query
        $args = array(
            "category_name" => "nouvelle",
            "posts_per_page" => "3",
            "orderby" => "date",
            "order" => "ASC"
        );
        $query1 = new WP_Query( $args );
        
        // The Loop
        while ( $query1->have_posts() ) {
            $query1->the_post();
            echo '<h2>' . get_the_title() . '</h2>';
            /*echo '<p>' . get_the_excerpt() . '</p>';*/
            echo '<p>' . SUBSTR(get_the_excerpt(),0,300) . '</p>';
        }

					?>
                </div>
                <!-- right side -->
                <div class="col-lg-4 event-right">
					<?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
get_footer();