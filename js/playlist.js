$(function () {
	var inputfield = $('#addplist');
	inputfield.keypress(function (e) {
		if (e.which == 13) {
			e.preventDefault();
			$('form#addlist').submit();
		}
	});
});
