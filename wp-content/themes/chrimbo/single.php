<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Chrimbo
 */

get_header(); ?>
<div class="wrapper page-inner-title">
	<div class="thumb-overlay">
	<div class="container">
	    <div class="row">
	        <div class="col-md-12 col-sm-12 col-xs-12">
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
	        </div>
	    </div>
	</div>
	</div>
</div>
<?php 
/**
 * chrimbo_action_after_header hook
 * @since chrimbo 1.0.0
 *
 * @hooked null
 */
do_action( 'chrimbo_action_after_header' );
?>
<section class="wrapper wrap-content">
	<div class= "site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'single'  );

				// the_post_navigation();
				// Previous/next post navigation.
			the_post_navigation( array(
				'next_text' => '<span class="post-navi" aria-hidden="true">' . __( 'NEXT POST', 'chrimbo' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'chrimbo' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="post-navi" aria-hidden="true">' . __( 'PREVIOUS POST', 'chrimbo' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'chrimbo' ) . '</span> ' .
					'<span class="post-title">%title</span>',

			) );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php get_sidebar();
		?>
	</div>
</section>
<?php
get_footer();
