<?php
/*
Template Name: Projets
*/

get_header(); ?>
			
	<?php if ( have_posts() ) : ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<nav class="nav-secondaire">
					<ul>
					 <?php 
						$args = array(
							'exclude'            => '1',
							'hide_empty'         => 0,
							'title_li'           => __( '' ),
						);
						wp_list_categories( $args ); 
					?>
					</ul>		
				</nav>
		
				<article id="post-<?php the_ID(); ?>" <?php post_class('module-projets'); ?>>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
					
						<?php the_post_thumbnail('full'); ?>

					<?php endwhile; ?>

				</article><!-- #post-## -->
		
			</main><!-- #main -->
		</div><!-- #primary -->

	<?php endif; ?>

<?php get_footer(); ?>
