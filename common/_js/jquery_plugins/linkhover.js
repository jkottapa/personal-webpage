/**
 	Created By Scott H O'Brien For Research In Motion
 	Created On Monday, April 4th, 2011 @ 4:29 PM
 */

/**
 	Including This File Will Cause It To Do All The Required Work Automatically; No Additional Coding Is Required
 		However, This File Requires jquery.color.js In Order To Properly Fade To Different Colors
 */

var blue = "#0e8bbb";
var white = "#FFFFFF";
var linkfade = 250;

jQuery(document).ready(function()
{	
	//Set The Inactive Menu Links To Have The Fading Effect
	jQuery(".menulinks").find("a").not(".activemenuitem").hover(function()
	{
		$(this).stop().animate({color:blue}, linkfade);
	}, 
	function()
	{
		$(this).stop().animate({color:white}, linkfade);
	});
});