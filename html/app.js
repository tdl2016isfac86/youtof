jQuery(document).ready(function($){
	// $ = jQuery
	$(".toggle-menu-mobile").click(function(e)
	{
		e.preventDefault();
		$("body").toggleClass("mobile");

	});

});