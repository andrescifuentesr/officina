<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package officina
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<nav class="nav-secondaire">
				<ul>
					<?php 
						$args = array(
							'child_of'		=> 8,
							'title_li'		=> __( '' ),
						);
						wp_list_pages( $args ); 
					?>
					<li><a target="_blank" href="http://localhost:8888/officina/wp-content/uploads/2013/07/Officina-book-AO-Présentation-2013-CS6.pdf">CV</a></li>
				</ul>
			</nav>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->			

<?php get_footer(); ?>
