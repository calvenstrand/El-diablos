function init() {

	death = document.getElementById('buttonOfDeath');
	
	death.onclick = function() {
			havoc();                               
		}
	
	function havoc () {
		$.fool({
			rick: true,               //  The synonymous Rick Astley video, hidden off-screen
			vanishingElements: true,  //  Hide random elements as they interact
			upsideDown: true,         //  Flip the page upside down!
			flash: true,              //  Makes the site flash on and off
			crashAndBurn: true,       //  Runs an endless loop. This will kill your browser!
			shutter: true,            //  Forces a shutter on the screen
			unclickable: true        //  Makes the page unclickable
		});
	}
}
	
window.onload = init();