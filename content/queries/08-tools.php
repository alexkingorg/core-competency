	<section id="<?php echo section_id(); ?>" class="step slide" data-x="<?php echo $data_x; ?>" data-y="<?php echo $data_y; ?>">
<!-- counter -->
		<div class="counter">
			<p>1 <span>of</span> 1</p>
		</div>

		<div class="scrollable">

			<article class="stage">
				<div class="inner-wrap">
					<h2>Tools</h2>
					<p>Roll your own</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums">define('SAVE_QUERIES', true);

global $wpdb;
print_r($wpdb->queries);</pre>
				</div>
			</article>

			<article class="stage">
				<div class="inner-wrap">
					<p>Debug Bar &mdash; <span class="typ-sm">http://wordpress.org/extend/plugins/debug-bar/</span></p>
				</div>
				<p class="center"><img src="content/queries/img/debug-bar.png" alt="debug bar"></p>
			</article>

		</div>
	</section>
