<?php
/**
 * The Template for depts
 *
 * @package WordPress
 * @subpackage plazarecoleta
 * @since plazarecoleta 1.0
 */

get_header(); ?>

<div id="content">
	
<?php include('include/share.php'); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
		<header class="entry-header">
			<h1 class="entry-title <?php if(get_field('price_dept') or get_field('m2_dept') or get_field('m2totales_dept')) : ?> with-subtitle<?php endif; ?> "><?php the_title(); ?></h1>
				
				<?php if(get_field('price_dept') or get_field('m2_dept') or get_field('m2totales_dept')) : ?>	
				<h4 class="entry-subtitle">
				<?php if(get_field('price_dept')) : ?>	
					<span><?php the_field('price_dept'); ?> | </span>
				<?php endif; ?> 
				
				<?php if(get_field('m2_dept')) : ?>	
				  	<span><?php the_field('m2_dept'); ?> m<sup>2</sup><?php _e(' útiles', 'plazarecoleta');?> </span>
				<?php endif; ?> 
				
				<?php if(get_field('m2total_dept')) : ?>	
					<span>| <?php the_field('m2total_dept'); ?> m<sup>2</sup><?php _e(' totales', 'plazarecoleta');?></span> <?php endif; ?> </h4>
				<?php endif; ?> 
		     
		</header>
			
		<div class="entry-content">
				
			<?php
				if(has_excerpt()) {
					$excerpt = get_the_excerpt(); 
					echo '<h2 class="entry-excerpt">'. $excerpt .'</h2>';
				}
				?>
            
            <div class="<?php if(get_field('floor_dept')) : ?>one_half <?php endif; ?>">
				<div class="entry-content-inner">
					<?php the_content(); ?>
            	</div>
            </div>
            <?php if(get_field('floor_dept')) : 
	            $linkcard = wp_get_attachment_image_src( get_field('floor_card'), 'original' );  
	            $link = wp_get_attachment_image_src( get_field('floor_dept'), 'original' );  
            ?>
            <div class="entry-floor one_half">
	            <?php if(get_field('floor_card')) : ?>
	             	<a href="<?php echo $linkcard[0] ?>" class="fancybox" rel="group">
				 	<span class="icon-search"></span>
		        <?php endif; ?>
	            <?php $attachment_id = get_field('floor_dept');
					echo wp_get_attachment_image( $attachment_id, 'thumbnail-floor'); ?>
					<span class="text"><?php _e('Ver Planta', 'plazarecoleta');?></span>
				<?php if(get_field('floor_card')) : ?>
					</a>
				<?php endif; ?>
            </div>
            <?php endif; ?>
				
		</div>
			
	</article>
<?php endwhile; // end of the loop. ?>

</div><!--#content-->

<?php get_footer(); ?>
