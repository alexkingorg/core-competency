	<section id="return-values" class="step slide-title" data-x="<?php echo $data_x; ?>" data-y="<?php echo $data_y; ?>">
		<h1>Return Values</h1>
	</section>
<!--

- explain what WP_Error is
- show example with wp_insert_post error

wp_insert_post() will return 0 or WP_Error object
wp_update_post() calls wp_insert_post, but without the $wp_error flag (can't get WP_Error back)

update_metadata() returns same response on error and on "was already set to this value"


-->