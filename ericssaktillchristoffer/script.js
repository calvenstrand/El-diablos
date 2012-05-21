$(function () {
	
	var a = $('#click');
	var b = $('#otherthing');
	var c = 0;
	var d = $('#space');

	function binds () {
		setTimeout(function () {
			if (c == 1) {
				d.bind('click', function () {
					b.css({'display': 'none'});
					c = 0;
					repeat();
				});
			} else if (c == 0) {
				a.bind('click', function () {
					b.css({'display': 'block'});
					c = 1;
					repeat();
				});
			}
		}, 10);
	}
	
	function repeat () {
		a.off('click');
		d.off('click');
		binds();
	}

	binds();

});
