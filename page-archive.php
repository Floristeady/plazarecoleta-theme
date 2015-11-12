<?php
/**
 *
 Template Name: Plantilla General Departamentos
 *
 * The template for displaying Archive pages.
 
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage plazarecoleta
 * @since plazarecoleta 1.0
 */

get_header(); ?>


<div id="content">

	<?php if ( have_posts() ) : ?>
	
	    <?php while ( have_posts() ) : the_post(); ?>
	    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<?php $rows = get_field('page_gallery');  ?>				
			<?php if($rows) { ?>
			<div id="page-gallery" class="flexslider">
				
			<?php include('include/share.php'); ?>	
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
					}
				?>
		    
				<div class="entry-content-inner">
			 		<?php the_content(); ?>
	         	</div>
	         	
			</div>	
		
	    </article>
		<?php endwhile; ?>
		
    <?php endif; ?>
    
    
	<?php //loop deptos
		
		$args = array(
		'post_type' => 'depts', // enter your custom post type
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page'=> '12',  // overrides posts per page in theme settings
	);
	$loop = new WP_Query( $args );
	if( $loop->have_posts() ): ?>
	<ul id="list-depts">
		
		<?php while( $loop->have_posts() ): $loop->the_post(); global $post; ?>
		
		<li>	
			<article class="inner">
					
				<?php if(has_post_thumbnail()) : ?>
				<a class="img" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'allcampers' ), the_title_attribute( 'echo=0' ) ); ?>">					<span></span>
					<?php the_post_thumbnail('thumbnail-dept'); ?>

				</a>
				<?php endif; ?>
				
				<div class="text">
		
					<h3 class="dept-title <?php if(get_field('m2_dept')) : ?> with-m2<?php endif; ?>"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'allcampers' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
					<?php if(get_field('m2_dept')) : ?>
					<h4> <?php the_field('m2_dept'); ?> m<sup>2</sup> </h4>
					<?php endif; ?>
					<a class="button" href="<?php the_permalink(); ?>"><?php _e('Saber Más', 'plazarecoleta');?></a>
					 
				</div>
			</article>
		</li>
		<?php endwhile; ?>
		
	<?php endif; ?>

</div><!--#content-->
<?php get_footer(); ?>