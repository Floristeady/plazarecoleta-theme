<div id="breadcrumbs" class="">
	<p><a href="/"> 
	<?php _e('Home') ?></a> <span> / </span> 
	<?php if($post->post_parent) {
					$parent_title = get_the_title($post->post_parent);
					$parent_url = get_permalink($post->post_parent);?>
					<a href="<?php echo $parent_url ?>"><?php echo $parent_title; ?></a><span class="separator"> / </span>
			<?php } ?> 
	<?php the_title(); ?></p>
</div>