<?php
/**
 * @package WordPress
 * @subpackage plazarecoleta
 * @since plazarecoleta 1.0
 */

get_header(); ?>

<div id="content">
	
	<?php include('include/share.php'); ?>
	
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
				
				<?php  $rows = get_field('galeria_imagenes_general');  ?>
				
					<?php if($rows) { ?>
					<div id="page-gallery" class="flexslider">
					<?php echo '<ul class="slides">';
					 
						foreach($rows as $row) { ?>
	
				 		<li> <img src="<?php bloginfo('template_url') ?>/timthumb.php?src=<?php echo $row['imagen_galeria_general'] ?>&w=786&h=430"/> </li>
	
						<?php  } ; ?> 
					</div>
					<?php  echo '</ul>'; }  ?>

				
				<?php edit_post_link( __( 'Editar', 'plazarecoleta' ), '', '' ); ?>
			</div>
		</article>

<?php endwhile; ?>

</div>

<?php get_footer(); ?>