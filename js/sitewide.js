$(document).ready(function() {
	expand_hash(window.location.hash);
	$('a[href*=#]:not([href=#])').each(function() {
		var hash = $(this).attr("href");
		if ($(hash+"_answer").length) {
			$(this).click(function() {
				expand_hash(hash);
			});
		}
	});
});

function expand_hash(hash) {
	//var hash = window.location.hash;
	$(hash+"_answer").collapse("show");
}
