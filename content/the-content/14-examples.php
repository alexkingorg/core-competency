	<section id="<?php echo section_id(); ?>" class="step slide" data-x="<?php echo $data_x; ?>" data-y="<?php echo $data_y; ?>">

<!-- counter -->
		<div class="counter">
			<p>1 <span>of</span> 7</p>
		</div>

		<div class="scrollable">

<!-- 1 -->
			<article class="stage pad-top-2x">
				<div class="inner-wrap">
					<p><code class="inline pad-left-none">the_content</code> filter is commonly used to prepend and append features to posts/pages.</p>
				</div>
			</article>

<!-- 2 -->
			<article class="stage pad-top-2x">
				<div class="inner-wrap">
					<p class="center"><code>&lt;!--nextpage--></code></p>
				</div>
			</article>

<!-- 3 -->
			<article class="stage pad-top-1-5x">
				<p class="center"><img src="content/the-content/img/new-yorker-page-1-2.png" alt="page 1 and page 2 example"></p>
			</article>


<!-- 4 -->
			<article class="stage" id="the-content-stage-get-posts">
				<div class="inner-wrap">
					<h2><code>get_posts()</code></h2>
					<p class="file-location">wp-includes/query.php, line 2756</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums">if ( !$q['suppress_filters'] )
	$this->posts = apply_filters_ref_array('the_posts', array( $this->posts, &$this ) );

$this->post_count = count($this->posts);

// Always sanitize
foreach ( $this->posts as $i => $post ) {
	$this->posts[$i] = sanitize_post( $post, 'raw' );
}

if ( $q['cache_results'] )
	update_post_caches($this->posts, $post_type, $q['update_post_term_cache'], $q['update_post_meta_cache']);

if ( $this->post_count > 0 ) {
	$this->post = $this->posts[0];
}

return $this->posts;</pre>
				</div>
			</article>


<!-- 5 -->
			<article class="stage pad-top-1x">
				<div class="code-block">
<pre class="code prettyprint linenums">function my_content_first($posts, $query) {
	foreach ($posts as &$post) {
		$post->post_content = '&lt;div class="banner">FIRST!&lt;/div>'
			.$post->post_content;
	}
	return $posts;
}
add_filter('the_posts', 'my_content_first', 10, 2);</pre>
				</div>
			</article>


		</div>
	</section>
