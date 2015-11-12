<?php
/**
 * Template Name: Plantilla Inicio
 * @package WordPress
 * @subpackage plazarecoleta
 * @since plazarecoleta 1.0
 */

get_header(); ?>

<div id="content-full" class="homepage">


<?php if ( have_posts() ) : ?>
	
	<div id="home-gallery" class="flexslider"> 
				
				<?php while ( have_posts() ) : the_post(); ?>
				
				<?php  $rows = get_field('home_gallery');  ?>
				
					<?php echo '<ul class="slides">';?>
				
						<?php if($rows) { ?>
						
						<?php foreach($rows as $row) { ?>
		                
					 		<li> 
					 			<?php $attachment_id = $row['home_gallery_image'];
					echo wp_get_attachment_image( $attachment_id, 'featured-home-image'); ?>
						 		 <?php if($row['home_link_gallery']) { //si tiene link ?>	
							 		<a alt="Saber más" href="<?php echo $row['home_link_gallery'] ?>" class="info">

							 			<?php if($row['home_text_gallery']) {?>
							 			<span class="text"><h1><?php echo $row['home_text_gallery'] ?></h1><span class="button">Ver más</span></span>
							 			<?php } ?>
							 		</a>
					 		       <?php } else { //o si no tiene ?>
					 		        <span class="info">
							 									 			
							 			<?php if($row['home_text_gallery']) {?>
							 			<span class="text">
								 			<?php echo $row['home_text_gallery'] ?>
							 			</span>
							 			<?php } ?>
							 		</span>
					 		       
					 		       <?php } ?>
						<?php  }  
							
						} 
						endwhile; ?>

				<?php  endif; ?>
				
				<?php wp_reset_postdata();?>	

		</div>

</div><!--#content-->

<?php get_footer(); ?>