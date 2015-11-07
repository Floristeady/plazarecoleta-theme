<?php
/**
 * Template Name: Plantilla Listado (Subsidio)
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
                
				<?php the_content(); ?>
			
			</div>
			
			<?php $args = array(
		        'child_of' => $post->ID, 
		        'parent' => $post->ID,
		        'hierarchical' => 0,
		        'sort_column' => 'menu_order',
		        'sort_order' => 'ASC'
		        );
				          
				$mypages = get_pages( $args );?>
					
				<ul id="children-content" class="">
					
				<?php foreach( $mypages as $postpage ) {
					$content = apply_filters('the_content', $postpage->post_content);
					$childtitle = $postpage->post_title;
					$childexcerpt= $postpage->post_excerpt;
					$childid = $postpage->ID;
					$permalink = get_permalink( $childid );
					$childslug = $postpage->post_name; 
					$alttitle = get_field('additional_title', $childid); 
				?>

					<li>
			 			<div class="text">
				 			<h3 class="entry-title list-title">
					 			<a href="<?php echo $permalink; ?>">
						 		<?php if(get_field('additional_title', $childid)) : ?>	
						 			<?php echo $alttitle; ?>
						 		<?php else : ?>
						 			<?php echo $childtitle; ?>
						 		<?php endif; ?>
						 		</a>
					 		</h3>	
							
							<a class="button" title="<?php _e('saber más', 'plazarecoleta');?>" href="<?php echo $permalink; ?>" class="more-list"><?php _e('saber más', 'plazarecoleta');?></a>
						
			 			</div>
				 	</li>
				 	
				<?php  }  ?>
				
				</ul>
		</article>

<?php endwhile; ?>

</div>

<?php get_footer(); ?>