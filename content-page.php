<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package officina
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('equipe'); ?> >
	
	<?php if( is_page( array(8, 882) )  ) {  ?>
		<?php the_post_thumbnail('full'); ?>
	<?php } else { ?>
		<div class="block-1-2-left">
			<?php the_post_thumbnail('full'); ?>
		</div>
		<div class="block-1-2-right">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div>
	<?php  } ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
