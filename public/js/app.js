(function(){
	var prevSearchText;

	$(function(){
		$('#header-search-form #header-search-field').keyup(function(e) {
			searchHandler($(this).val());
		});
		$('#header-search-form #header-search-field').click(function() {
			prevSearchText = undefined;
			searchHandler($(this).val());
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
		var searchResults = $('#search-results');

		var resultsHtml = '';

		if (placesData !== '') {
			$.each( JSON.parse(placesData), function( key, value ) {
				resultsHtml += '<div class="search-result"><a href="/place/' + value.id + '">' + value.name + '</div>';
			});
		}
		else {
			// Zero results case
			resultsHtml += '<div class="search-result-zero">No such places</div>';
		}

		// Put results into html
		searchResults.html(resultsHtml);
	}

	function clearSearchResults() {
		$('#search-results').html('');
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
