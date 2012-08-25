	<section id="<?php echo section_id(); ?>" class="step slide" data-x="<?php echo $data_x; ?>" data-y="<?php echo $data_y; ?>">

<!-- counter -->
		<div class="counter">
			<p>1 <span>of</span> 1</p>
		</div>

		<div class="scrollable">


<!-- 1 -->
			<article class="stage">
				<div class="inner-wrap">
					<p>Get the two most recent posts.</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums">$example = new WP_Query(array(
	'posts_per_page' => 2,
	'orderby' => 'date',
	'order' => 'DESC',
));</pre>
				</div>
			</article>


<!-- 2 -->
			<article class="stage whoa">
				<div class="inner-wrap">
					<p>This actually generates <em>five</em> database queries.</p>
				</div>
			</article>


<!-- 3 -->
			<article class="stage">
				<div class="inner-wrap">
					<p>Query #1: find IDs of posts matching query args</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums lang-sql">SELECT SQL_CALC_FOUND_ROWS wp_posts.ID FROM wp_posts
WHERE 1=1
AND wp_posts.post_type = 'post'
AND (
	wp_posts.post_status = 'publish'
	OR wp_posts.post_status = 'future'
	OR wp_posts.post_status = 'draft'
	OR wp_posts.post_status = 'pending'
	OR wp_posts.post_status = 'private'
)
ORDER BY wp_posts.post_date DESC
LIMIT 0, 2</pre>
				</div>
			</article>


<!-- 4 -->
			<article class="stage">
				<div class="inner-wrap">
					<p>Query #2: check total number of results</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums lang-sql">SELECT FOUND_ROWS()</pre>
				</div>
			</article>


<!-- 5 -->
			<article class="stage">
				<div class="inner-wrap">
					<p>Query #3: get full post data</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums lang-sql">SELECT wp_posts.*
FROM wp_posts
WHERE ID IN (10134,10263)</pre>
				</div>
			</article>


<!-- 6 -->
			<article class="stage">
				<div class="inner-wrap">
					<p>Query #4: find taxonomy terms for selected posts</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums lang-sql">SELECT t.*, tt.*, tr.object_id
FROM wp_terms AS t
INNER JOIN wp_term_taxonomy AS tt
	ON tt.term_id = t.term_id
INNER JOIN wp_term_relationships AS tr
	ON tr.term_taxonomy_id = tt.term_taxonomy_id
WHERE tt.taxonomy IN ('category', 'post_tag', 'post_format')
AND tr.object_id IN (10134, 10263)
ORDER BY t.name ASC</pre>
				</div>
			</article>


<!-- 7 -->
			<article class="stage">
				<div class="inner-wrap">
					<p>Query #5: find postmeta for selected posts</p>
				</div>
				<div class="code-block">
<pre class="code prettyprint linenums lang-sql">SELECT post_id, meta_key, meta_value
FROM wp_postmeta
WHERE post_id IN (10134,10263)</pre>
				</div>
			</article>
		</div>
	</section>
