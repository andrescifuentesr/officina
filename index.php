<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package officina
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<section class="block--home-2-3" >

					<a href="<?php echo $image_attributes[0]; ?>" class="fancybox" rel="group">
						<div class="text-home">
							<?php the_content('text-home'); ?>
						</div>
					</a>

				</section>

				<?php wp_reset_postdata(); ?>

				<?php
					$args2 = array(
						'post_type' 		=> 'projets',		//type / Only the first 20
						'order'				=> 'DESC',			// List in ascending order
						'posts_per_page'	=>   4,				// Show all pots
					);

					$projectsHome = new WP_Query($args2);
				?>

				<?php while ($projectsHome->have_posts()) : $projectsHome->the_post(); ?><!--

				--><section class="block--home-1-3" >

					<a href="<?php echo $image_attributes[0]; ?>" class="fancybox" rel="group">
						<div class="text-home">
							<?php the_title(); ?>
						</div>
					</a>

				</section><!--

			--><section class="block--home-1-3" >

					<a href="<?php echo $image_attributes[0]; ?>" class="fancybox" rel="group">
						<div class="text-home">
							<?php the_title(); ?>
						</div>
					</a>

				</section><!--

			--><section class="block--home-1-3" >

					<a href="<?php echo $image_attributes[0]; ?>" class="fancybox" rel="group">
						<div class="text-home">
							<?php the_title(); ?>
						</div>
					</a>

				</section><!--

			--><section class="block--home-1-3" >

					<a href="<?php echo $image_attributes[0]; ?>" class="fancybox" rel="group">
						<div class="text-home">
							<?php the_title(); ?>
						</div>
					</a>

				</section>

			<?php endwhile; ?>

			<?php endwhile; ?>

			</main><!-- #main -->
		</div><!-- #primary -->
			
<?php get_footer(); ?>