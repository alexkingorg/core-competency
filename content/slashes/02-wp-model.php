	<section id="<?php echo section_id(); ?>" class="step slide" data-x="<?php echo $data_x; ?>" data-y="<?php echo $data_y; ?>">
		<div class="inner-wrap">
			<p class="typ-big mar-top-2x mar-bottom-2x">Push $_POST directly into functions that save.</p>
			<ul class="typ-intro">
				<li>
					WordPress forces slashes on $_POST data<br>
					<span class="typ-sm"><code class="inline pad-left-none">wp_magic_quotes()</code> defined wp-includes/load.php, line 531</span><br>
					<span class="typ-sm">called in wp-settings.php, line 218</span><br>
					
				</li>
				<li><code>stripslashes_deep()</code></li>
				<li><code>add_magic_quotes()</code></li>
			</ul>
		</div>
	</section>
