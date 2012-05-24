/*
 Author: Christoffer Älvenstrand
*/

$(window).load(function() {
	
	$('#slider').nivoSlider();


	$(document).ready(function(){
		$('#login-trigger').click(function(){
			$(this).next('#login-content').slideToggle();
			$(this).toggleClass('active');                                  
	
			if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
					else $(this).find('span').html('&#x25BC;')
			})
	});
	
	(function($){
		$.fn.styleddropdown = function(){
			return this.each(function(){
				var obj = $(this)
				obj.find('.field').click(function() { //onclick event, 'list' fadein
				obj.find('.list').fadeIn(400);
	
				$(document).keyup(function(event) { //keypress event, fadeout on 'escape'
					if(event.keyCode == 27) {
					obj.find('.list').fadeOut(400);
					}
				});
	
				obj.find('.list').hover(function(){ },
					function(){
						$(this).fadeOut(400);
					});
				});
	
				obj.find('.list li').click(function() { //onclick event, change field value with selected 'list' item and fadeout 'list'
				var fest = $(this).attr('value');
				var finid = $('.finid').attr('value');
				var namm = $(this).html();
				obj.find('.fest').attr('value', fest);
				console.log(fest);
				console.log(finid);
				console.log(namm);
					 $.post('includes/userActions/addSongToPlaylistAction.php?songid='+finid+'&plid='+fest, function(data) {
            			obj.find('.field')
					.val('Added to: '+namm)
					.css({
						'background':'#fff',
						'color':'#333'
					});
            
        				});



				obj.find('.list').fadeOut(400);
				});
			});
		};
	})(jQuery);
	
	
	$(function(){
		$('.size').styleddropdown();
	});



});