<div id="breadcrumbs" class="">
	
	<p><a href="/"> <?php _e('Home') ?></a><span> > </span>
	
	<?php $id = get_id_by_slug('departamentos'); ?>
	<a href="<?php echo get_page_link($id); ?>"><?php _e('Departamentos', 'plazarecoleta'); ?></a><span> > </span>
			
	<?php the_title(); ?>
	
	</p>
</div>