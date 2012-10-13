	<section id="<?php echo section_id(); ?>" class="step slide pad-top-2x" data-x="<?php echo $data_x; ?>" data-y="<?php echo $data_y; ?>">
		<div class="code-block">
<pre class="code prettyprint linenums">$my_guid = 'http://'.$service_name.'-'.$service_item_id;
// 'http://twitter-256996758964563968'

wp_insert_post(array(
	'post_title' => $my_title,
	'post_content' => $my_content,
	'guid' => $my_guid
));</pre>
		</div>
	</section>
