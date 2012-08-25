	<section id="<?php echo section_id(); ?>" class="step slide" data-x="<?php echo $data_x; ?>" data-y="<?php echo $data_y; ?>">

<!-- counter -->
		<div class="counter">
			<p>1 <span>of</span> 7</p>
		</div>

		<div class="scrollable">

<!-- 1 -->
			<article class="stage pad-top-2x">
				<div class="inner-wrap">
					<p>So where is <code class="inline">global $pages</code> set?</p>
				</div>
			</article>


<!-- 2 -->
			<article class="stage pad-top-1-5x">
				<div class="inner-wrap">
					<h2>You'll recognize this...</h2>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums">
while ( have_posts() ) : the_post();
// ...
endwhile;
</pre>
				</div>
			</article>


<!-- 3 -->
			<article class="stage pad-top-1-5x" id="the-content-stage-the-loop">
				<div class="inner-wrap">
					<h2>The loop...</h2>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums">
while ( have_posts() ) : the_post();
// ...
endwhile;
</pre>
				</div>
			</article>


<!-- 4 -->
			<article class="stage pad-top-1x" id="the-content-stage-the-post">
				<div class="inner-wrap">
					<h2><code>the_post()</code></h2>
					<p class="typ-sm">wp-includes/query.php, line 784</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums">function the_post() {
	global $wp_query;

	$wp_query->the_post();
}</pre>
				</div>
			</article>


<!-- 5 -->
			<article class="stage" id="the-content-stage-wp-query-the-post">
				<div class="inner-wrap">
					<h2><code>$wp_query->the_post()</code></h2>
					<p class="typ-sm">wp-includes/query.php, line 2815</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums">

class WP_Query {

// ...

	function the_post() {
		global $post;
		$this->in_the_loop = true;

		if ( $this->current_post == -1 ) // loop has just started
			do_action_ref_array('loop_start', array(&$this));

		$post = $this->next_post();
		setup_postdata($post);
	}</pre>
				</div>
			</article>


<!-- 6 -->
			<article class="stage" id="the-content-stage-setup-postdata-1">
				<div class="inner-wrap">
					<h2><code>setup_postdata()</code></h2>
					<p class="typ-sm">wp-includes/query.php, line 3589</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums">function setup_postdata($post) {
	global $id, $authordata, $currentday, $currentmonth, $page, $pages, $multipage, $more, $numpages;

	$id = (int) $post->ID;

	$authordata = get_userdata($post->post_author);

	$currentday = mysql2date('d.m.y', $post->post_date, false);
	$currentmonth = mysql2date('m', $post->post_date, false);
	$numpages = 1;
	$page = get_query_var('page');
	if ( !$page )
		$page = 1;
	if ( is_single() || is_page() || is_feed() )
		$more = 1;
	$content = $post->post_content;
	if ( strpos( $content, '<!--nextpage-->' ) ) {</pre>
				</div>
			</article>


<!-- 7 -->
			<article class="stage pad-top-1x" id="the-content-stage-setup-postdata-2">
				<div class="code-block">
<pre class="code prettyprint linenums">		if ( $page > 1 )
			$more = 1;
		$multipage = 1;
		$content = str_replace("\n<!--nextpage-->\n", '<!--nextpage-->', $content);
		$content = str_replace("\n<!--nextpage-->", '<!--nextpage-->', $content);
		$content = str_replace("<!--nextpage-->\n", '<!--nextpage-->', $content);
		$pages = explode('<!--nextpage-->', $content);
		$numpages = count($pages);
	} else {
		$pages = array( $post->post_content );
		$multipage = 0;
	}

	do_action_ref_array('the_post', array(&$post));

	return true;
}</pre>
				</div>
			</article>


		</div>
	</section>
