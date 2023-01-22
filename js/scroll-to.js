
var $ = jQuery.noConflict(); // Add this to resolve $ undefined issue.

/*$(document).ready(function() {
	$(".scrollto").click(function () {
		$('html,body').animate({
				scrollTop: $(".second").offset().top
			},
			'slow');
	});
}); */

function scrolldiv() {
	var elem = document.getElementById("ele");
	elem.scrollIntoView({ behavior: 'smooth', block: 'start' });
}
