	<section id="<?php echo section_id(); ?>" class="step slide" data-x="<?php echo $data_x; ?>" data-y="<?php echo $data_y; ?>">
<!-- counter -->
		<div class="counter">
			<p>1 <span>of</span> 1</p>
		</div>
		<div class="scrollable">
			<article class="stage">
				<div class="inner-wrap">
					<h2><code>wp_delete_post()</code></h2>
					<p class="typ-sm">wp-includes/post.php, line 2022</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums">function wp_delete_post( $postid = 0, $force_delete = false ) {

// [...]

	do_action('before_delete_post', $postid);

// [...]

	wp_delete_object_term_relationships($postid, get_object_taxonomies($post->post_type));

// [...]

	$comment_ids = $wpdb->get_col( $wpdb->prepare( "SELECT comment_ID FROM $wpdb->comments WHERE comment_post_ID = %d", $postid ));
	foreach ( $comment_ids as $comment_id )
		wp_delete_comment( $comment_id, true );

	$post_meta_ids = $wpdb->get_col( $wpdb->prepare( "SELECT meta_id FROM $wpdb->postmeta WHERE post_id = %d ", $postid ));
	foreach ( $post_meta_ids as $mid )
		delete_metadata_by_mid( 'post', $mid );

	do_action( 'delete_post', $postid );</pre>
				</div>
			</article>
			<article class="stage pad-top-1x">
				<div class="code-block">
<pre class="code prettyprint linenums">	do_action( 'delete_post', $postid );
	$wpdb->delete( $wpdb->posts, array( 'ID' => $postid ) );
	do_action( 'deleted_post', $postid );

// [...]

	do_action('after_delete_post', $postid);

	return $post;
}
</pre>
				</div>
			</article>
		</div>
	</section>
