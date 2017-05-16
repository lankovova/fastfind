$(function(){

	$(".mobile-menu .burger").click(function(){
		$(".mobile-menu .dropdown").toggle();
	});

});

$(document).ready(function(){

	$('.toggle-filters-btn').click(function() {
		var filtersContainer = $('.filters-container');

		filtersContainer.toggle();
		if (filtersContainer.attr('style') == 'display: none;') {
			filtersContainer.removeAttr('style');
		}
	});

});
