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
var owner;
	var listsa = $('ul#friendList').find('li');
	listsa.live('click', function () {
		var finast = $('#plidd').val();
		var fest = $(this).attr('value');
		console.log('skickat');
		console.log($('#owner').attr('checked'));
		if($('#owner').attr('checked') == 'checked'){
			owner = 1;
		}else{
			owner = 0;
		}
	$.post('includes/userActions/inviteFriendToPlaylistAction.php?userid='+fest+'&plid='+finast+'&owner='+owner, function(data) {
        			
			console.log('skickat');
				});
	
	});

});
