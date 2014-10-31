<?php

get_header(); ?>
			
	<?php if ( have_posts() ) : ?>

		<section role="main">
		
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

						<!-- Slideshow 2 -->
						<div class="flexslider carousel imagen-proyectos">
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
										<a href="<?php echo $image_attributes[0]; ?>" class="fancybox" rel="group">
											<?php echo wp_get_attachment_image($attachment->ID, 'full', false, $default_attr); ?>
										</a>
						        	</li>
								<?php } // End of foreach Loop?>
							</ul>
						</div>									
						<?php } //End of if loop ?>
					
						<div class="">
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

				<?php endwhile; ?>

			</article><!-- #post-## -->
	
		</section>

	<?php endif; ?>

<?php get_footer(); ?>