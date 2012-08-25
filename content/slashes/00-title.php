	<section id="slashes" class="step slide-title" data-x="<?php echo $data_x; ?>" data-y="<?php echo $data_y; ?>">
		<h1>Slashes</h1>
	</section>

<!--

- posts
	example: programatic post creation - Twitter example again
	
	// expected_slashed (everything!)
	$data = compact( array( 'post_author', 'post_date', 'post_date_gmt', 'post_content', 'post_content_filtered', 'post_title', 'post_excerpt', 'post_status', 'post_type', 'comment_status', 'ping_status', 'post_password', 'post_name', 'to_ping', 'pinged', 'post_modified', 'post_modified_gmt', 'post_parent', 'menu_order', 'guid' ) );
	$data = apply_filters('wp_insert_post_data', $data, $postarr);
	$data = stripslashes_deep( $data );

- users
	example: integration with 3rd party auth (LDAP model)

	$data = compact( 'user_pass', 'user_email', 'user_url', 'user_nicename', 'display_name', 'user_registered' );
	$data = stripslashes_deep( $data );

-->