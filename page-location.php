<?php
/**
 * Template Name: Plantilla Ubicación 
 * @package WordPress
 * @subpackage plazarecoleta
 * @since plazarecoleta 1.0
 */

get_header(); ?>

<div id="content" class="page-project">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<div class="thumbnail">
			<?php the_post_thumbnail( 'gallery-page-image' ); ?>
		</div>
		
		<?php $rows = get_field('page_gallery');  ?>				
		<?php if($rows) { ?>
		<div id="page-carousel" class="flexslider">
		<?php echo '<ul class="slides">';
		 
			foreach($rows as $row) { 
				$link = wp_get_attachment_image_src( $row['image_gallery'], 'original' );
			?>
			
	 		<li> 
		 		<a href="<?php echo $link[0] ?>" class="fancybox" rel="group">
		 		<?php $attachment_id = $row['image_gallery'];
					echo wp_get_attachment_image( $attachment_id, 'thumbnail'); ?>
		 		</a>
		    </li>
		    
			<?php }; ?> 
		</div>
		<?php  echo '</ul>'; }  ?>

		<?php
			the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header>' ); ?>
				
		<div class="entry-content">
			
			<?php
			if(has_excerpt()) {
				$excerpt = get_the_excerpt(); 
				echo '<h2 class="entry-excerpt">'. $excerpt .'</h2>';
			} ?>
            
             <?php  $rows = get_field('documents');  ?>
             <div class="entry-content-inner">
			 	<?php the_content(); ?>
			 	
			  </div>	
						
			<?php edit_post_link( __( 'Editar', 'plazarecoleta' ), '', '' ); ?>
		</div>
	</article>

<?php endwhile; ?>

</div>

<?php get_footer(); ?>