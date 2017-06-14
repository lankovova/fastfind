(function(){
	$(function(){
		$('#header-search-form #header-search-field').keyup(function(e) {
			if (e.keyCode !== 27) {
				searchHandler($(this).val());
			}
		});
		$('#header-search-form #header-search-field').click(function() {
			searchHandler($(this).val());
		});

		$(document).keyup(function(e) {
			if (e.keyCode == 27) {
				clearSearchResults();
			}
		});
	});

	function searchHandler(input) {
		// TODO: Add delay to user input
		if (input === '')
			clearSearchResults();
		else
			searchPlace(input);
	}

	function searchPlace(placeName) {
		// Send request to api
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
			resultsHtml += '<div class="search-result-zero">No such places</div>';
		}

		searchResults.html(resultsHtml);
	}

	function clearSearchResults() {
		$('#search-results').html('');
	}
})();
