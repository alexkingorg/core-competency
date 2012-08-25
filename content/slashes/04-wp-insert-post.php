	<section id="<?php echo section_id(); ?>" class="step slide" data-x="<?php echo $data_x; ?>" data-y="<?php echo $data_y; ?>">
<!-- counter -->
		<div class="counter">
			<p>1 <span>of</span> 1</p>
		</div>
		<div class="scrollable">
			<article class="stage">
				<div class="inner-wrap">
					<h2><code>wp_insert_post()</code></h2>
					<p class="typ-sm">wp-includes/post.php, line 2460</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums">function wp_insert_post($postarr, $wp_error = false) {

// [...]

	// expected_slashed (everything!)
	$data = compact( array( 'post_author', 'post_date', 'post_date_gmt', 'post_content',
		'post_content_filtered', 'post_title', 'post_excerpt', 'post_status', [...] ) );
	$data = apply_filters('wp_insert_post_data', $data, $postarr);
	$data = stripslashes_deep( $data );

// [...]

}</pre>
				</div>
			</article>
			<article class="stage pad-top-1x">
				<div class="code-block">
<pre class="code prettyprint linenums">$post_data = array(
	'post_status' => 'publish',
	'post_type' => 'post',
	'post_title' => 'This is my title',
	'post_content' => 'Crazy with the backslashes \\\\\\\\',
);

// wrong

wp_insert_post($post_data);

// right (as of WP 3.4.1)

wp_insert_post(add_magic_quotes($post_data));</pre>
				</div>
			</article>
		</div>
	</section>
