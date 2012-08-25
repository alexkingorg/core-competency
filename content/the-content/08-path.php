	<section id="<?php echo section_id(); ?>" class="step slide" data-x="<?php echo $data_x; ?>" data-y="<?php echo $data_y; ?>">

<!-- counter -->
		<div class="counter">
			<p>1 <span>of</span> 1</p>
		</div>


		<div class="scrollable">


<!-- 1 -->
			<article class="stage" id="the-content-stage-the-content">
				<div class="inner-wrap">
					<h2><code>the_content()</code></h2>
					<p class="typ-sm">wp-includes/post-template.php, line 164</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums">function the_content($more_link_text = null, $stripteaser = false) {
	$content = get_the_content($more_link_text, $stripteaser);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	echo $content;
}</pre>
				</div>
			</article>


<!-- 2 -->
			<article class="stage" id="the-content-stage-get-content-1">
				<div class="inner-wrap">
					<h2><code>get_the_content()</code></h2>
					<p class="typ-sm">wp-includes/post-template.php, line 180</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums">function get_the_content($more_link_text = null, $stripteaser = false) {
	global $post, $more, $page, $pages, $multipage, $preview;

	if ( null === $more_link_text )
		$more_link_text = __( '(more...)' );

	$output = '';
	$hasTeaser = false;

	// If post password required and it doesn't match the cookie.
	if ( post_password_required($post) )
		return get_the_password_form();

	if ( $page > count($pages) ) // if the requested page doesn't exist
		$page = count($pages); // give them the highest numbered page that DOES exist

	$content = $pages[$page-1];</pre>
				</div>
			</article>


<!-- 3 -->
			<article class="stage" id="the-content-stage-get-content-2">
				<div class="code-block">
<pre class="code prettyprint linenums">	if ( preg_match('/<!--more(.*?)?-->/', $content, $matches) ) {
		$content = explode($matches[0], $content, 2);
		if ( !empty($matches[1]) && !empty($more_link_text) )
			$more_link_text = strip_tags(wp_kses_no_null(trim($matches[1])));

		$hasTeaser = true;
	} else {
		$content = array($content);
	}
	if ( (false !== strpos($post->post_content, '<!--noteaser-->') && ((!$multipage) || ($page==1))) )
		$stripteaser = true;
	$teaser = $content[0];
	if ( $more && $stripteaser && $hasTeaser )
		$teaser = '';
	$output .= $teaser;
	if ( count($content) > 1 ) {
		if ( $more ) {
			$output .= '<span id="more-' . $post->ID . '"></span>' . $content[1];
		} else {
			if ( ! empty($more_link_text) )
				$output .= apply_filters( 'the_content_more_link', ' <a href="' . get_permalink() . "#more-{$post->ID}\" class=\"more-link\">$more_link_text</a>", $more_link_text );
			$output = force_balance_tags($output);
		}
	}</pre>
				</div>
			</article>


<!-- 4 -->
			<article class="stage" id="the-content-stage-get-content-3">
				<div class="code-block">
<pre class="code prettyprint linenums">	if ( $preview ) // preview fix for javascript bug with foreign languages
		$output =	preg_replace_callback('/\%u([0-9A-F]{4})/', '_convert_urlencoded_to_entities', $output);

	return $output;
}</pre>
				</div>
				<div class="inner-wrap">
					<p>So <code>get_the_content()</code> returns <code>$output</code></p>
					<p>Which was created from <code>$content</code></p>
					<p>Which was pulled from <code>global $pages</code></p>
				</div>
			</article>
		</div>
	</section>
