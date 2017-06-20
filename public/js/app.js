(function(){
	$('#filters-form').submit(function(e){
		e.preventDefault();

		var filtersData = $('#filters-form').serialize();
		window.location.href = '/list?' + filtersData;
	});

	$('#order-by-name').click(function() {
		order('name');
	});
	$('#order-by-rating').click(function() {
		order('rating');
	});
	$('#order-by-price').click(function() {
		order('average_price');
	});

	function order(orderBy) {
		var filtersData = $('#filters-form').serialize();

		var newOrderFlow = ($('#orderFlow').val() === "desc") ? "asc" : "desc";
		if ($('#orderBy').val() === orderBy) {
			window.location.href = '/list?' + filtersData + '&orderBy=' + orderBy + '&orderFlow=' + newOrderFlow;
		} else {
			window.location.href = '/list?' + filtersData + '&orderBy=' + orderBy + '&orderFlow=desc';
		}
	}

})();

(function(){
	var prevSearchText;

	$(function(){
		$('#header-search-form #header-search-field').keyup(function() {
			searchHandler($(this).val());
		});

		$('#header-search-form #header-search-field').click(function() {
			prevSearchText = undefined;
			searchHandler($(this).val());
		});

		// Mobile
		$('#mob-header-search-form #mob-header-search-field').keyup(function() {
			searchHandler($(this).val());
		});

		$('#mob-header-search-form #mob-header-search-field').click(function() {
			prevSearchText = undefined;
			searchHandler($(this).val());
		});

		$('#mob-search-link').click(function() {
			$('#mob-header-search-form').fadeIn();
		});

		$('#mob-close-layer').click(function() {
			clearSearchResults();
			$('#mob-header-search-form').fadeOut();
		});


		$(document).keyup(function(e) {
			if (e.keyCode == 27) {
				clearSearchResults();
			}
		});
	});

	function searchHandler(input) {
		if (input === '') {
			clearSearchResults();
		} else if (input !== prevSearchText) {
			getMatchablesPlaces(input);
		}
		prevSearchText = input;
	}

	function getMatchablesPlaces(placeName) {
		// Get matchable places from server api
		$.get("/api/search", { searchText: placeName } )
			.done(function(data) {
				outputSearchResults(data);
			})
			.fail(function() {
				console.log('Search failed');
			});
	}

	function outputSearchResults(placesData) {
		var searchResults;
		if (window.matchMedia("(min-width: 500px)").matches) {
			/* the viewport is at least 500 pixels wide */
			searchResults = $('#search-results');
		} else {
			/* the viewport is less than 500 pixels wide */
			searchResults = $('#mob-search-results');
		}

		var resultsHtml = '';
		if (placesData !== '') {
			$.each( JSON.parse(placesData), function( key, value ) {
				resultsHtml += '<div class="search-result"><a href="/place/' + value.id + '">' + value.name + '</div>';
			});
		} else {
			// Zero results case
			resultsHtml += '<div class="search-result-zero">No such places</div>';
		}

		// Put results into html
		searchResults.html(resultsHtml);
	}

	function clearSearchResults() {
		if (window.matchMedia("(min-width: 500px)").matches) {
			$('#search-results').html('');
		} else {
			$('#mob-search-results').html('');
		}
	}
})();

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
