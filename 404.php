<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage plazarecoleta
 * @since plazarecoleta 1.0
 */

get_header(); ?>

<div id="content">
			<article style="margin-bottom:60px;" id="post-0" class="post error404 not-found" role="main">
				<h1 class="entry-title"><?php _e( 'This is somewhat embarrassing, isn&rsquo;t it?', 'plazarecoleta' ); ?></h1>
				<div class="entry-content">
					<p style="text-align: center;"><?php _e( 'Parece que no podemos encontrar lo que estás buscando. <br/> Puedes utilizar el menú principal o lateral para encontrar información sobre nuestro proyecto.', 'plazarecoleta' ); ?></p>
				</div>

			</article>
</div>
<?php get_footer(); ?>
