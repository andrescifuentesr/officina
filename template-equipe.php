<?php
/*
Template Name: Equipe
*/

get_header(); ?>
			
	<?php if ( have_posts() ) : ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

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
		
				<!--  block similar project -->
				<div class="bloc-idem-project">		

					<?php

						$args = array(
							'post_type'			=> 'page',			//type / Only the first 20
							'posts_per_page'	=>  -1,			// Show all pots'
							'post_parent'		=> 8,			//type / Only the first 20
							'post__not_in'		=> array(38),
							'orderby'			=> 'menu_order',
							'order'				=> 'ASC'
						);
						$pagesEquipe = new WP_Query($args);

					?>
					<?php while ($pagesEquipe->have_posts()) : $pagesEquipe->the_post(); ?><!--
				
					--><section class="block--project-1-3" >

							<a href="<?php the_permalink(); ?>" >
								<figure class="effect-ming">
									<?php the_post_thumbnail('imgProject'); ?>
									<figcaption>
										<p><?php the_title(); ?></p>
									</figcaption>			
								</figure>
							</a>

						</section><!--

					--><?php endwhile; // end of the loop. ?>

				</div><!-- .bloc-idem-project -->
		
			</main><!-- #main -->
		</div><!-- #primary -->

	<?php endif; ?>

<?php get_footer(); ?>
