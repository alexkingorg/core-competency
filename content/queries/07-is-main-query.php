	<section id="<?php echo section_id(); ?>" class="step slide" data-x="<?php echo $data_x; ?>" data-y="<?php echo $data_y; ?>">
		<div class="inner-wrap">
			<h2>Bonus tip: <code>is_main_query()</code></h2>
			<p class="typ-sm">wp-includes/query.php, line 724</p>
		</div>
		<div class="code-block">
<pre class="code prettyprint linenums">function is_main_query() {
	global $wp_query;
	return $wp_query->is_main_query();
}</pre>
		</div>
		<div class="inner-wrap">
			<p class="typ-sm">wp-includes/query.php, line 3514</p>
		</div>
		<div class="code-block">
<pre class="code prettyprint linenums">class WP_Query {
	function is_main_query() {
		global $wp_the_query;
		return $wp_the_query === $this;
	}
}</pre>
		</div>
	</section>
