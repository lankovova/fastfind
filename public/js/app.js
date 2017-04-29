$(function(){

	$(".flip-entrance-card").click(function(){
		$("#entrance-page .flip").toggleClass("flipped");
	});

});

$(document).ready(function(){

	$('.toggle-filters-btn').click(function() {
		$('.filters-container').toggle();
	});

});
