jQuery(document).ready(function($){
	// $ = jQuery
	$(".toggle-menu-mobile").click(function(e)
	{
		e.preventDefault();
		$("body").toggleClass("mobile");

	});

});

function collage() {
        $('.Collage').removeWhitespace().collagePlus(
            {
                'fadeSpeed'     : 2000,
                'targetHeight'  : 200
            }
        );
    };

$(window).load(function () {
	$('.galerie').collagePlus();
});
$(window).load(function () {
        $(document).ready(function(){
            collage();
            $('.galerie').collageCaption();
        });
    });

var resizeTimer = null;
    $(window).bind('resize', function() {
        // hide all the images until we resize them
        $('.Collage .Image_Wrapper').css("opacity", 0);
        // set a timer to re-apply the plugin
        if (resizeTimer) clearTimeout(resizeTimer);
        resizeTimer = setTimeout(collage, 200);
    });