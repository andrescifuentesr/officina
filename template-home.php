<?php
/*
Template Name: Home
*/

get_header(); ?>
			
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<div class="block-home-up">	
				
					<section class="block--home-2-3 item-home-equal" >
					
						<?php the_post_thumbnail('full'); ?>
						<div class="text-home">
							<?php the_content('text-home--news'); ?>
						</div>

					</section><!--

				--><?php endwhile;
						wp_reset_postdata();

						$args2 = array(
							'post_type' 		=> 'projets',		//type / Only the first 20
							'order'				=> 'DESC',			// List in ascending order
							'posts_per_page'	=>   -1,			// Show all pots
						);
						$projectsHome = new WP_Query($args2);

					while ($projectsHome->have_posts()) : $projectsHome->the_post();

						if(get_field('home_layout') == "position_1") { ?><!--
		  
						--><section class="block--home-1-3 item-home-equal" >

								<a href="<?php the_permalink(); ?>" >
									<figure class="effect-ming">
										<?php the_post_thumbnail('imgProject'); ?>
										<figcaption>
											<p><?php the_title(); ?></p>
										</figcaption>			
									</figure>
								</a>

							</section>
						<?php }  
					endwhile; ?>

				</div>

				<div class="block-home-down">

					<?php 

						$args3 = array(
							'post_type' 		=> 'projets',		//type / Only the first 20
							'order'				=> 'ASC',			// List in ascending order
							'posts_per_page'	=>   -1,			// Show all pots
							'orderby' 			=> 'meta_value',
							'meta_key' 			=> 'home_layout'
						);
						$projectsHome = new WP_Query($args3);

						while ($projectsHome->have_posts()) : $projectsHome->the_post();

					if(get_field('home_layout') == "position_2") { ?><!--

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

				--><?php } else if(get_field('home_layout') == "position_3") { ?><!--

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

				--><?php } else if(get_field('home_layout') == "position_4") { ?><!--

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

					--><?php }
					endwhile; 
					wp_reset_postdata();

						$args4 = array(
							'post_type'			=> 'page',			//type / Only the first 20
							'post__in'			=> array(38, 8, 7),			//type / Only the first 20
							'posts_per_page'	=>   -1,			// Show all pots
						);
						$pagesHome = new WP_Query($args4);

						while ($pagesHome->have_posts()) : $pagesHome->the_post(); ?><!--

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

					--><?php endwhile; ?>
				
				</div><!-- .block-home-down -->				

			</main><!-- #main -->
		</div><!-- #primary -->
			
<?php get_footer(); ?>
