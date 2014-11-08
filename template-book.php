<?php
/*
Template Name: Book
*/

get_header(); ?>
			
	<?php if ( have_posts() ) : ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<nav class="nav-secondaire">
					<a href="<?php the_field('fichier_book_pdf') ?>" target="_blank" class="">
						<?php the_field('fichier_book_txt'); ?>
					</a>
				</nav>
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
					
						<?php the_post_thumbnail('full'); ?>

					<?php endwhile; ?>

				</article><!-- #post-## -->
		
			</main><!-- #main -->
		</div><!-- #primary -->

	<?php endif; ?>

<?php get_footer(); ?>
