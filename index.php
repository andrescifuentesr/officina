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

	<section role="main">	
		<article id="post-<?php the_ID(); ?>" class="intro" ?> 
			
			<a href="<?php echo get_permalink('14') ?>" class="balloon"></a>
			</article>
		</section>
			
<?php get_footer(); ?>