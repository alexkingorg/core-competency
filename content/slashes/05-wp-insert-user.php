	<section id="<?php echo section_id(); ?>" class="step slide" data-x="<?php echo $data_x; ?>" data-y="<?php echo $data_y; ?>">
		<div class="inner-wrap">
			<h2><code>wp_insert_user()</code></h2>
			<p class="typ-sm">wp-includes/user.php, line 1251</p>
		</div>
		<div class="code-block">
<pre class="code prettyprint linenums">function wp_insert_user($userdata) {

// [...]

	$data = compact( 'user_pass', 'user_email', 'user_url', 'user_nicename', 'display_name',
		'user_registered' );
	$data = stripslashes_deep( $data );

// [...]

}</pre>
		</div>
	</section>
