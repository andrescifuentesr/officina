<?php
/*
Template Name: Info
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			
			<?php if ( have_posts() ) : ?>

				<section <?php post_class('info'); ?>>
					
					<article id="post-<?php the_ID(); ?>">
										
						<?php
							$args = array(
								'post_type' 		=> 'page', 	//Costum type Proyectos			
								'p'					=> '7',			// List in ascending order
								'order'				=> 'DESC',			// List in ascending order
								'orderby'      		=> 'id',			// List them in their menu order
							);

							$queryContacto = new WP_Query($args);
						?>

						<?php /* Start the Loop */ ?>
						<?php while ($queryContacto->have_posts()) : $queryContacto->the_post(); ?>
							
					    	<div id="map_canvas"></div>

					    	<div id="text_info">

					    		<div class="module-1">
						        	<h2>NOUS VISITER</h2>

						        	<h3>ADRESSE</h3> 
									<p><?php the_field('adresse_agence'); ?></p>

						        	<h3>ARRIVER À L'AGENCE</h3> 

									<div>
						            	<div>
											<img src="<?php bloginfo('template_directory'); ?>/img/picto_metro.gif" alt="" id="picto_metro" />
											<span class="texto_metro"><?php the_field('arriver_a_lagence'); ?></span>
										</div>
						            </div>

					            </div>

					        	<div class="module-2">
						        	<h2>NOUS CONTACTER</h2>
						        	<h3>TÉLÉPHONE</h3>
									<p><?php the_field('telephone'); ?></p>
								

						        	<h3>FAX</h3>
									<p><?php the_field('fax'); ?></p>

						        	<h3>MAIL</h3> 
						        	<a href="<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
					        	</div>

					        	<div class="module-3">
						        	<h2>ÉCHANGE DE FICHIERS</h2>
						        	<h3><?php the_field('ftp'); ?></h3>
						        	<a href="<?php the_field('ftp'); ?>" target="_blank">Cliquez ici </a>
					        	</div>

					         </div>

					      	<!-- fin div text_info -->

						<?php endwhile; ?>

					</article><!-- #post-## -->
				
				</section>
			
			<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
