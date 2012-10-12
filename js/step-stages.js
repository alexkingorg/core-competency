jQuery(function($) {
	var impressAPI = impress();
	// trigger first stage active
	$(document).on('impress:stepenter', function(e) {
		$(e.target).find('.stage:eq(0)').trigger('impress-stage-active');
	});
	// stages within a slide, each stage should be 1 screen or less
	$('body').on('keydown', function(e) {
		var $step = $('#impress .step.active'),
			$scrollable = $step.find('.scrollable'),
			$stages = $step.find('.stage'),
			$active = $stages.filter('.active');
	
		if ($stages.size()) {
			if (!$active.size()) {
				$active = $stages.filter(':first').addClass('active');
			}
			switch (e.keyCode) {
// 				case 40: // down arrow
				case 190: // . = forward
					var $next = $active.next('.stage');
					if ($next.size()) {
						$scrollable.scrollTo($next, 1000, {
							offset: { left: 0, top: 0 }
						});
						$active.removeClass('active');
						$next.addClass('active').trigger('impress-stage-active');
					}
				break;
// 				case 38: // up arrow
				case 188: // , = back
					var $prev = $active.prev('.stage');
					if ($prev.size()) {
						$scrollable.scrollTo($prev, 1000, {
							offset: { left: 0, top: 0 }
						});
						$active.removeClass('active');
						$prev.addClass('active').trigger('impress-stage-active');
					}
				break;
			}
		}
		// jump nav support
		switch (e.keyCode) {
			case 221: // ] = next section
			case 78: // n = next section
				var $next = $step.closest('section.step').nextAll('section.step[data-x="0"]');
				impressAPI.goto($next.attr('id'));
			break;
			case 219: // [ = next section
			case 80: // p = previous section
				var $prev = $step.closest('section.step').prevAll('section.step[data-x="0"]');
				impressAPI.goto($prev.attr('id'));
			break;
			case 49: // 1 = first slide
				impressAPI.goto($('section.step:first').attr('id'));
			break;
			case 48: // 0 = last slide
				impressAPI.goto($('section.step:last').attr('id'));
			break;
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
