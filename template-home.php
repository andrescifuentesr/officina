<?php
/*
Template Name: Home
*/

get_header(); ?>
			
<?php if ( have_posts() ) : ?>

	<?php
		$args2 = array(
			'post_type' 	=> 'page',		//type / Only the first 20
			'page_id'   	=> '14',			// For the home ID					
			'order'			=> 'DESC',		// List in ascending order
			'orderby'       => 'id'			// List them in their menu order
		);

		$carouselHome = new WP_Query($args2);
	?>


	<?php /* Start the Loop */ ?>
	<?php while ($carouselHome->have_posts()) : $carouselHome->the_post(); ?>

	<section role="main">	
		<article id="post-<?php the_ID(); ?>" <?php post_class('home-pag'); ?> >

			<?php
				$args = array(
					'post_parent'    => $post->ID,			// For the current post
					'post_type'      => 'attachment',		// Get all post attachments
					'post_mime_type' => 'image',			// Only grab images
					'order'			 => 'ASC',				// List in ascending order
					'orderby'        => 'rand',		// List them in their menu order
					'numberposts'    => -1, 				// Show all attachments
					'post_status'    => null,				// For any post status
				);

				// Retrieve the items that match our query; in this case, images attached to the current post.
				$attachments = get_posts($args); ?>

			<?php // If any images are attached to the current post, do the following: ?>
			<?php if ($attachments) {	?>

				<!-- Slideshow 2 -->
				<div class="callbacks_container">
					<ul class="rslides" id="slider-index">								

						<?php // Now we loop through all of the images that we found ?>
						<?php 	foreach ($attachments as $attachment) { ?>
							<?php $image_attributes = wp_get_attachment_image_src( $attachment->ID, 'full'); // returns an array ?>	
							<li>
								<a href="<?php echo $image_attributes[0]; ?>" class="fancybox" rel="group">
									<?php echo wp_get_attachment_image($attachment->ID, 'sliderHome', false, $default_attr); ?>
									<?php
										$cc = get_the_content();
										if($cc != '') { ?>
											<div class="text-home caption">
												<?php the_content('text-home'); ?>
											</div>
									<?php } ?>
								</a>
				        	</li>

						<?php } // End of foreach Loop?>	
					</ul>
				</div>
			
				<div style="clear:both"></div>
			
				<?php //we check if there is a intro text or not ?>
			
								
			<?php } //End of if loop ?>
		</article>
	</section>

	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
