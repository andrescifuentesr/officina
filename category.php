<?php


get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<nav class="nav-secondaire">
				<ul>
				<?php 
					$args = array(
						'exclude'            => '1,11,19,20,21',
						'hide_empty'         => 0,
						'title_li'           => __( '' ),
					);
					wp_list_categories( $args ); 
				?>
				</ul>		
			</nav>

			<!--  block similar project -->
			<div class="bloc-idem-project">		

				<?php
					$category 		= get_category( get_query_var( 'cat' ) );
					$category_id 	= $category->cat_ID;
					$args = array(
						'cat'				=> $category_id, 		//the current category
						'posts_per_page'	=> -1,					// all
						'post_type'   		=> 'projets'
					);

					$ProjectPosts = new WP_Query($args);

				?>
				<?php while ($ProjectPosts->have_posts()) : $ProjectPosts->the_post(); ?><!--
			
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

				--><?php endwhile; // end of the loop. ?>

			</div><!-- .bloc-idem-project -->

		</div><!-- #content -->
	</div><!-- #primary -->			

<?php get_footer(); ?>
