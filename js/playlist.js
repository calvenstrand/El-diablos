$(function () {

	$('#addplist').keypress(function (e) {
		if (e.which == 13) {
			e.preventDefault();
			$('form#addlist').submit();
		}
	});

	var lists = $('ul#list').find('li');
	lists.live('click', function () {
		setTimeout(function () {
			$('form#chooseplist').submit();
		}, 500);
	});








var owner;
	var listsa = $('ul#friendList').find('li #blueButton');
	listsa.live('click', function () {
		var finast = $(this).parent('li').attr('value');
		var festa = $(this).parent('li').children('span').text();
		var playId = $('#plidd').attr('value');
		//attr('value')
		console.log(festa);
		console.log(finast);
		//console.log('skickat');
		console.log($('#owner').attr('checked'));
		if($('#owner').attr('checked') == 'checked'){
			owner = 1;
		}else{
			owner = 0;
		}
	$.post('includes/userActions/inviteFriendToPlaylistAction.php?userid='+finast+'&plid='+playId+'&owner='+owner, function(data) {
        			
			//console.log('skickat');
				});
	
	});



(function($){
		$.fn.styleddropdown = function(){
			return this.each(function(){
				var obj = $(this)
				obj.find('.fieldShare').click(function() { //onclick event, 'list' fadein
				obj.find('.listShare').fadeIn(400);

	
				$(document).keyup(function(event) { //keypress event, fadeout on 'escape'
					if(event.keyCode == 27) {
					obj.find('.listShare').fadeOut(400);
					}
				});
	
				obj.find('.listShare').hover(function(){ },
					function(){
						$(this).fadeOut(400);
					});
				});
	
				obj.find('.listShare #blueButton').click(function() { //onclick event, change field value with selected 'list' item and fadeout 'list'
				var fest = $(this).attr('value');
				obj.find('.fest').attr('value', fest);
				console.log('yeah');
				console.log(fest);
				obj.find('.fieldShare')
					.val('added: '+$(this).parent('li').children('span').html())
					.css({
						'background':'#fff',
						'color':'#333'
					});

				obj.find('.listShare').fadeOut(400);
				});
			});
		};
	})(jQuery);
	
	
	$(function(){
		$('.size').styleddropdown();
	});








	

});
