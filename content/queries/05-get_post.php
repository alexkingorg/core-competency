	<section id="<?php echo section_id(); ?>" class="step slide" data-x="<?php echo $data_x; ?>" data-y="<?php echo $data_y; ?>">
		<div class="inner-wrap">
			<h2><code>get_post()</code></h2>
			<p class="typ-sm">wp-includes/post.php, line 380</p>
		</div>
		<div class="code-block">
<pre class="code prettyprint linenums">function &get_post(&$post, $output = OBJECT, $filter = 'raw') {
// [...]
	if ( ! $_post = wp_cache_get($post_id, 'posts') ) {
		$_post = $wpdb->get_row($wpdb->prepare("
			SELECT * FROM $wpdb->posts
			WHERE ID = %d LIMIT 1
		", $post_id));
		if ( ! $_post )
			return $null;
		_get_post_ancestors($_post);
		$_post = sanitize_post($_post, 'raw');
		wp_cache_add($_post->ID, $_post, 'posts');
	}
// [...]
}</pre>
		</div>
	</section>
