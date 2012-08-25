	<section id="<?php echo section_id(); ?>" class="step slide" data-x="<?php echo $data_x; ?>" data-y="<?php echo $data_y; ?>">
		<div class="inner-wrap">
			<p>Put <code class="inline">WP_Query</code> on a diet.</p>
		</div>
		<div class="code-block">
<pre class="code prettyprint linenums">$example = new WP_Query(array(
	'posts_per_page' => 2,
	'orderby' => 'date',
	'order' => 'DESC',
	'no_found_rows' => true,
	'update_post_term_cache' => false,
	'update_post_meta_cache' => false,
));</pre>
		</div>
		<div class="inner-wrap">
			<p>Brings it down to <em>two</em> queries.</p>
		</div>
	</section>
