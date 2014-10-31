<?php
/*
Template Name: Projets
*/

get_header(); ?>
			
	<?php if ( have_posts() ) : ?>

		<section role="main">
		
			<article id="post-<?php the_ID(); ?>" <?php post_class('module-projets'); ?>>
							
				<?php
					$args = array(
						'post_type' 		=> 'page', 			//Costum type Proyectos			
						'p'					=> '378',		// Local
						//'p'					=> '379',			// Alive
					);

					$proyectos = new WP_Query($args);
				?>


				<?php /* Start the Loop */ ?>
				<?php while ($proyectos->have_posts() ) : $proyectos->the_post(); ?>
				
					<?php the_post_thumbnail('full'); ?>

				<?php endwhile; ?>

			</article><!-- #post-## -->
	
		</section>

	<?php endif; ?>

<?php get_footer(); ?>
