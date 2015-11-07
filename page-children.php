<?php
/**
 * Template Name: Plantilla Subnivel
 * @package WordPress
 * @subpackage plazarecoleta
 * @since plazarecoleta 1.0
 */

get_header(); ?>

<div id="content">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php
				the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header>' ); ?>
					
			<div class="entry-content">
				
				<?php
					if(has_excerpt()) {
						$excerpt = get_the_excerpt(); 
						echo '<h2 class="entry-excerpt">'. $excerpt .'</h2>';
					}
 				?>
                
                <div class="entry-content-inner">
					<?php the_content(); ?>
                </div>
				
			</div>
		</article>

<?php endwhile; ?>

</div>

<?php get_footer(); ?>