	<section id="<?php echo section_id(); ?>" class="step slide" data-x="<?php echo $data_x; ?>" data-y="<?php echo $data_y; ?>">
		<div class="inner-wrap">
			<p>Easy solution via filter.</p>
		</div>
		<div class="code-block">
<pre class="code prettyprint linenums">function excerpt_sanity($excerpt) {
	if (strlen($excerpt) > 550) {

// take care of it.

	}
	return $excerpt;
}
add_filter('get_the_excerpt', 'excerpt_sanity', 50);</pre>
		</div>
	</section>
