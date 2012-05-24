$(function () {

	$('#addplist').keypress(function (e) {
		if (e.which == 13) {
			e.preventDefault();
			$('form#addlist').submit();
		}
	});

	var lists = $('ul#list').find('li');
	lists.live('click', function () {
		$('form#chooseplist').submit();
	});

	var listsa = $('ul#friendList').find('li');
	listsa.live('click', function () {
		var finast = $('#plidd').val();
		var fest = $(this).attr('value');
		console.log('skickat');
	$.post('includes/userActions/inviteFriendToPlaylistAction.php?userid='+fest+'&plid='+finast, function(data) {
        			
			console.log('skickat');
				});
	
	});

});
