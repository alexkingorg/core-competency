	<section id="<?php echo section_id(); ?>" class="step slide" data-x="<?php echo $data_x; ?>" data-y="<?php echo $data_y; ?>">
<!-- counter -->
		<div class="counter">
			<p>1 <span>of</span> 1</p>
		</div>
		<div class="scrollable">
			<article class="stage">
				<div class="inner-wrap">
					<p>You may have seen this in plugins/themes, etc.</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums">update_post_meta($post->ID, '_my_meta_key', $_POST['_my_meta_key']);</pre>
				</div>
			</article>
			<article class="stage" id="slashes-update-metadata">
				<div class="inner-wrap">
					<h2><code>update_metadata()</code></h2>
					<p class="typ-sm">wp-includes/meta.php, line 101</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums">function update_metadata($meta_type, $object_id, $meta_key, $meta_value, $prev_value = '') {

// [...]

	// expected_slashed ($meta_key)
	$meta_key = stripslashes($meta_key);
	$passed_value = $meta_value;
	$meta_value = stripslashes_deep($meta_value);
	$meta_value = sanitize_meta( $meta_key, $meta_value, $meta_type );

// [...]

}</pre>
				</div>
			</article>
			<article class="stage">
				<div class="inner-wrap">
					<p>1. Make API call to Twitter, Facebook, etc.</p>
					<p>2. Store data in post meta.</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums">$my_api_data = get_twitter_data();
update_post_meta($post->ID, '_my_meta_key', $my_api_data);</pre>
				</div>
			</article>
			<article class="stage">
				<div class="inner-wrap">
					<p>Stripping slashes on JSON data is problematic.</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums lang-json">// before
{"profile_image_url":"http:\/\/a0.twimg.com\/profile_images\/17084282\/alex_king_normal.jpg"}

// after
{"profile_image_url":"http://a0.twimg.com/profile_images/17084282/alex_king_normal.jpg"}</pre>
				</div>
			</article>
			<article class="stage" id="slashes-more-slashes">
				<div class="inner-wrap">
					<p>We're gonna need more slashes.</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums">$my_api_data = get_twitter_data();
update_post_meta($post->ID, '_my_meta_key', add_magic_quotes($my_api_data));</pre>
				</div>
			</article>
		</div>
	</section>
