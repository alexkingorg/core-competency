<?php

include('config.php');

function section_id() {
	$trace = debug_backtrace();
	return basename(dirname($trace[0]['file'])).'-'.str_replace('.php', '', basename($trace[0]['file']));
}

?>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=1024" />
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<link href="lib/impress.js/css/impress-demo.css" rel="stylesheet" />
	<link href="lib/google-code-prettify/prettify.css" rel="stylesheet" />
	
	<link href="css/global.css" rel="stylesheet" />

<?php
// bring in CSS first
foreach ($sections as $section) {
	foreach (glob('content/'.$section.'/css/*.html') as $file) {
		include($file);
	}
}
?>

</head>
<body class="impress-not-supported" onload="prettyPrint();">

<div class="fallback-message">
	<p>Your browser <b>doesn't support the features required</b> by impress.js, so you are presented with a simplified version of this presentation.</p>
	<p>For the best experience please use the latest <b>Chrome</b>, <b>Safari</b> or <b>Firefox</b> browser.</p>
</div>

<div id="impress">

<?php

// load content
$data_y = 0;
foreach ($sections as $section) {
	$data_x = 0;
	foreach (glob('content/'.$section.'/*.php') as $file) {
		include($file);
		echo PHP_EOL.PHP_EOL;
		$data_x += 1200;
	}
	$data_y += 900;
}

?>

</div>

<script src="lib/impress.js/js/impress.js"></script>
<script>impress().init();</script>
<script src="lib/google-code-prettify/prettify.js"></script>
<script src="lib/google-code-prettify/lang-sql.js"></script>
<script src="lib/jquery/jquery-1.7.2.min.js"></script>
<script src="lib/jquery/jquery.scrollTo-1.4.2-min.js"></script>
<script src="js/step-stages.js"></script>
<script>
// tabs to spaces
$('pre.prettyprint').html(function() {
	return this.innerHTML.replace(/\t/g, '&nbsp;&nbsp;&nbsp;&nbsp;');
});
// console.log('# of slides: ' + ($('.step').size() + $('.stage').size()));
</script>

<?php
// bring in JS last
foreach ($sections as $section) {
	foreach (glob('content/'.$section.'/js/*.html') as $file) {
		include($file);
	}
}
?>

</body>
</html>