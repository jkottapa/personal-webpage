/**
 	Created By Scott H O'Brien For Research In Motion
 	Created On Friday, March 11th, 2011 @ 8:07 PM
 */

/**
 	This Section Will Auto-Set Functions To Display The ModalWindow For Editing
 	In Order To Activate, You Need The Following:
 		- An Element That Has The Name "modalform" (Can Be Any Type Of Element)
 		- Set The Previously Stated Element To Have A Specified Width (Either Via Class Or Style)
 		- <a> Tags That When Clicked Open The Modal Form: 
 			- To Set These Up, Name Them "modal"; The href Will Be The Location Of The Window To Open
 		- You Then Will Need To Include The Following On The Page That Opens (Or Something Very Similar):
 			- This Will Allow You To Create A Tag In The Format <h2 name="close"> That Will Close The ModalBox:
		 		jQuery("h2[name=close]").click(function(e) {
					e.preventDefault();
					$("#modalwindow").slideUp(500);
					$("#mask").delay(500).fadeOut(500);
				});
			
			- This Will Allow You To Create A Tag In The Format <input name="cancelButton"> That Will Close 
				The ModalBox:
				jQuery("input[name=cancelButton]").click(function() {
					$("#modalwindow").slideUp(500);
					$("#mask").delay(500).fadeOut(500);
				}); 		
 */
var maskActive = false;
var modalLeftOffset = 0;
var modalTopOffset = 0;
var fadeTime = 500;

function setMaskDimensions(mask) {
	
	//Get The Current Views Width And Height
	var width = $(document).width();
	var height = $(document).height();
	
	//Reset The Mask To Encompass The Whole Page
	mask.css({"width":width, "height":height});
}

function setModalWindowPosition(modalWindow, fadeIn) {

	//Get The Window Dimensions
	var windowWidth = $(window).width();
	var windowHeight = $(window).height();
	
	//Get The ModalWindow Dimensions
	var height = modalWindow.height();
	var width = modalWindow.width();

	modalLeftOffset = $(window).scrollLeft() + ((windowWidth - width) / 2);
	
	modalTopOffset = $(window).scrollTop() + ((windowHeight - height) / 2);
	
	if (modalTopOffset < $(window).scrollTop())
	{
		modalTopOffset = $(window).scrollTop() + 10;
	}
	
	//Position The modalwindow
	modalWindow.css({"left":modalLeftOffset, "top":modalTopOffset});
	
	if (fadeIn)
	{
		//Fade In The ModalBox, While Animating It Into Position
		modalWindow.delay(fadeTime).slideDown(height * 3);
	}
}

$(window).resize(function() {
	if (maskActive)
	{
		var modalWindow = $("#modalwindow");
		var mask = $("#mask");
		
		setMaskDimensions(mask);
		setModalWindowPosition(modalWindow);
	}
});

jQuery("modalform").ready(function() {
	jQuery("a[name=modal]").click(function(e) {
		e.preventDefault();
		
		var modalWindow = $("#modalwindow");
		var mask = $("#mask");
		
		setMaskDimensions(mask);
		
		//Get The URL Of The Page To Display
		var page = $(this).attr("href");

		//Make The Mask Fade To Approximately 80% Opacity
		mask.fadeTo(fadeTime, 0.8);
		
		maskActive = true;
		
		modalWindow.load(page, function() {
			setModalWindowPosition(modalWindow, true);
		});
	});
});