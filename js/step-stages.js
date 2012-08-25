jQuery(function($) {
	// trigger first stage active
	$(document).on('impress:stepenter', function(e) {
		$(e.target).find('.stage:eq(0)').trigger('impress-stage-active');
	});
	// stages within a slide, each stage should be 1 screen or less
	$('body').on('keydown', function(e) {
		var $step = $('#impress .step.active .scrollable'),
			$stages = $step.find('.stage'),
			$active = $stages.filter('.active');
	
		if ($stages.size()) {
			if (!$active.size()) {
				$active = $stages.filter(':first').addClass('active');
			}
			switch (e.keyCode) {
				case 190: // forward
					var $next = $active.next('.stage');
					if ($next.size()) {
						$step.scrollTo($next, 1000, {
							offset: { left: 0, top: 0 }
						});
						$active.removeClass('active');
						$next.addClass('active').trigger('impress-stage-active');
					}
				break;
				case 188: // back
					var $prev = $active.prev('.stage');
					if ($prev.size()) {
						$step.scrollTo($prev, 1000, {
							offset: { left: 0, top: 0 }
						});
						$active.removeClass('active');
						$prev.addClass('active').trigger('impress-stage-active');
					}
				break;
			}
		}
	});
	$('.stage').on('impress-stage-active', function() {
		var $step = $(this).closest('.step'),
			$stages = $step.find('.stage'),
			$counter = $step.find('.counter');
		if ($counter.size() && $stages.size() > 1) {
			$counter.html('<p>' + ($stages.index(this) + 1) + ' <span>of</span> ' + $stages.size() + '</p>');
		}
	});
});
