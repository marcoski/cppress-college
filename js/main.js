(function($){
	$('.flexslider').flexslider({
        animation: "fade"
    });
	$('#courses-carousel').carousel();
	//$('#bookmarks-carousel').carousel();
	//$('[data-toggle="tooltip"]').tooltip();
	$('[data-toggle="tooltip"]').tooltip({
		container: 'body',
		template: '<div class="tooltip "><div class="tooltip-inner box box-theme"></div></div>'
	});
})(jQuery);