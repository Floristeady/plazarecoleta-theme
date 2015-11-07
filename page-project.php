<?php
/**
 * Template Name: Plantilla Proyecto 
 * @package WordPress
 * @subpackage plazarecoleta
 * @since plazarecoleta 1.0
 */

get_header(); ?>

<div id="content" class="page-project">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php $rows = get_field('page_gallery');  ?>				
		<?php if($rows) { ?>
		<div id="page-gallery" class="flexslider">
		<?php echo '<ul class="slides">';
		 
			foreach($rows as $row) { ?>
			
	 		<li> 
	 		<?php $attachment_id = $row['image_gallery'];
				echo wp_get_attachment_image( $attachment_id, 'gallery-page-image'); ?>
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
             <div class="entry-content-inner  <?php if($rows) { ?> two_thirds <?php } ?>">
			 	<?php the_content(); ?>
			 	
			  </div>	
			
				<?php if($rows) { ?>
				
				<?php echo '<ul id="list-documents" class="one_third">';
				 
					foreach($rows as $row) { ?>

			 		<li> 
				 		<?php if( $row['file_doc']  ): ?>
			 				<a target="_blank"  title="<?php echo $row['nombre_del_proyecto'] ?>" href="<?php echo $row['file_doc'] ?>"><i class="icon-doc"></i><?php _e('DESCARGAR ', 'plazarecoleta') ?><?php echo $row['name_doc'] ?></a>
			 			<?php endif;?>
			 		</li>

					<?php  } ;  
					
				echo '</ul>'; }  ?>
            
			
			<?php edit_post_link( __( 'Editar', 'plazarecoleta' ), '', '' ); ?>
		</div>
	</article>

<?php endwhile; ?>

</div>

<?php get_footer(); ?>