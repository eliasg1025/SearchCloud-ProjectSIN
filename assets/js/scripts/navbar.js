$(document).ready(function() {

	var navbar = $(".navbar");

	$(window).scroll(function() {
		if($(window).scrollTop() <= 40) {
			navbar.removeClass("top-navbar");
		} else {
			navbar.addClass("top-navbar");
		}
	});
});