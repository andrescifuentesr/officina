<?php

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<nav class="nav-secondaire">
				<ul>
				<?php 
					$args = array(
						'exclude'            => '1,11,19,20,21',
						'hide_empty'         => 0,
						'title_li'           => __( '' ),
						'current_category'   => 1,
					);
					wp_list_categories( $args ); 
				?>
				</ul>		
			</nav>		
		
			<article id="post-<?php the_ID(); ?>" <?php post_class('module-projets'); ?>>	
	
				<?php
					$args = array(
						'post_type'  	 => 'projets', 	//Costum type Proyectos			
						'order'			 => 'DESC',			// List in ascending order
						'orderby'        => 'id',			// List them in their menu order
						'posts_per_page' =>   1, 				// Show the last one
						'p'   			 => $post->ID,
					);
					$Projets = new WP_Query($args);
				?>


				<?php /* Start the Loop */ ?>
				<?php while ($Projets->have_posts()) : $Projets->the_post(); ?>

					<?php
						$args = array(
							'post_parent'    => $post->ID,			// For the current post
							'post_type'      => 'attachment',		// Get all post attachments
							'post_mime_type' => 'image',			// Only grab images
							'order'			 => 'ASC',				// List in ascending order
							'orderby'        => 'menu_order',		// List them in their menu order
							'numberposts'    => -1, 				// Show all attachments
							'post_status'    => null,				// For any post status
						);

						// Retrieve the items that match our query; in this case, images attached to the current post.
						$attachments = get_posts($args); ?>

					<?php // If any images are attached to the current post, do the following: ?>
					<?php if ($attachments) {	?>

						<!-- flexslider -->
						<div class="flexslider-wrapper loading">

							<div class="spinner">
								<div class="bounce1"></div>
								<div class="bounce2"></div>
								<div class="bounce3"></div>
							</div>

							<div class="flexslider imagen-proyectos">
								<ul class="slides">								

									<?php // Now we loop through all of the images that we found ?>
									<?php 	foreach ($attachments as $attachment) { ?>

										<!-- Set the parameters for the image we are about to display. -->
										<?php $default_attr = array(
												'alt' => trim(strip_tags( $attachment->post_title )),
											);
										?>
										<?php $image_attributes = wp_get_attachment_image_src( $attachment->ID, 'full'); // returns an array ?>	
										<li>
											<?php echo wp_get_attachment_image($attachment->ID, 'full', false, $default_attr); ?>
										</li>
									<?php } // End of foreach Loop?>
								</ul>
							</div>
						</div><!-- .flexslider-wrapper -->

					<?php } //End of if loop ?>
					
					<div class="clearfix">
						<div class="module module-contenu-text">
							<h1><?php the_title(); ?></h1>
							<p><?php the_field('fiche_tecnique'); ?></p>
						</div>
					
						<div class="module">
							<div class="scroll-pane-test">
								<?php the_content(); ?>
							</div>
						</div>
					</div>

					<?php wp_reset_postdata(); ?>

					<!--  block similar project -->
					<h1><?php _e( 'Projets Similaires', 'nsi' ); ?></h1>
					<div class="bloc-idem-project">
						
						<?php
							$category = get_the_category();
							$category_id   = $category[0]->cat_ID;
							
							$args3 = array(
								'cat'				=> $category_id,
								'post_type'   		=> 'projets',	
								'order'				=> 'DESC',			// List in ascending order
								'orderby'			=> 'id',			// List them in their menu order
								'posts_per_page'	=> -1, 				// Show all attachments
							);

							$QueryProject = new WP_Query($args3);
						?>
						<?php while ($QueryProject->have_posts()) : $QueryProject->the_post(); ?><!--

						--><section class="block--project-1-3" >

								<a href="<?php the_permalink(); ?>" >
									<figure class="effect-ming">
										<?php the_post_thumbnail('full'); ?>
										<figcaption>
											<p><?php the_title(); ?></p>
										</figcaption>			
									</figure>
								</a>

							</section><!--

						--><?php endwhile; ?>

					</div>					

				<?php endwhile; ?>

			</article><!-- #post-## -->
	
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>