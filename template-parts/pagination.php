<?php
$pagination = get_the_posts_pagination();

if ( $pagination ) :
	?>
	<div class="pagination aligncenter">
		<?php echo get_the_posts_pagination(); ?>
	</div>
	<?php
endif;
