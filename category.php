<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage plazarecoleta
 * @since plazarecoleta 1.0
 */

get_header(); ?>
<div id="content">
				<h1><?php
					printf( __( 'Category Archives: %s', 'plazarecoleta' ), '' . single_cat_title( '', false ) . '' );
				?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '' . $category_description . '';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'content');
				?>

</div><!--#content-->

<?php get_footer(); ?>