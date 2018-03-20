<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Shudh
 */

get_header(); ?>

<div class="container">
     <div class="page_content <?php if( get_theme_mod( 'hide_slides' ) != '') { echo'topspacesingle'; } ?>">
        <section class="site-main">
            <div class="blog-post">
				<?php if ( have_posts() ) : ?>
                    <header>
                        <h1 class="entry-title"><?php printf( __( 'Search Results for: %s', 'shudh' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                    </header>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', 'search' ); ?>
                    <?php endwhile; ?>
                    <?php  
					// Previous/next post navigation.
					the_posts_pagination( array(
								'mid_size' => 2,
								'prev_text' => __( 'Back', 'shudh' ),
								'next_text' => __( 'Next', 'shudh' ),
								'screen_reader_text' => __( 'Posts navigation', 'shudh' )
					) );
			    	?>
                <?php else : ?>
                    <?php get_template_part( 'no-results', 'search' ); ?>
                <?php endif; ?>
            </div><!-- blog-post -->
        </section>      
       <?php get_sidebar();?>       
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- container -->

<?php get_footer(); ?>