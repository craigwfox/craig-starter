/* *******************************************************
   ___          _        ___                              
  / __|_ _ __ _(_)__ _  | __|____ __                      
 | (__| '_/ _` | / _` | | _/ _ \ \ /                      
  \___|_| \__,_|_\__, | |_|\___/_\_\                      
  ___ _          |___/           _____ _                  
 / __| |_ __ _ _ _| |_ ___ _ _  |_   _| |_  ___ _ __  ___ 
 \__ \  _/ _` | '_|  _/ -_) '_|   | | | ' \/ -_) '  \/ -_)
 |___/\__\__,_|_|  \__\___|_|     |_| |_||_\___|_|_|_\___|

******************************************************* */
$(function(){
	$("ul.dropdown li").hover(function(){
		$(this).addClass("hover");
		$('ul:first',this).css('visibility', 'visible');
	}, function(){
		$(this).removeClass("hover");
		$('ul:first',this).css('visibility', 'hidden');
	});
	$("ul.dropdown li ul li:has(ul)").find("a:first").append(" &raquo; ");
});