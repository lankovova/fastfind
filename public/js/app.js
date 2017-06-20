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

(function(){

	var pageNumber = 1;

	var therIsMorePlaces = true;

	var reqInProgress = false;

	// Scroll event on places list page
	$('.cards-map-container').scroll(function(e) {
		if (therIsMorePlaces && !reqInProgress) {
			if ($('#cards-end-marker').offset().top - $(window).height() === 0) {
				console.log('Load more places');

				var filtersData = $('#filters-form').serialize();
				var orderBy = $('#orderBy').val();
				var orderFlow = $('#orderFlow').val();

				$.get("/api/getPlaces?" + filtersData, { page: pageNumber, orderBy: orderBy, orderFlow: orderFlow })
					.done(function(places) {
						setTimeout(function() {
							var i = 0;
							places.forEach(function(place) {
								// Insert retrived data to places template
								var placeHTML = renderPlace(place);

								// Remove preloader
								$('#cards-preloader').css({display: 'none'});

								// Insert rendered places
								$(placeHTML).appendTo($('.cards'));

								i++;
							});

							if (i < 12) therIsMorePlaces = false;

							// Request is done
							reqInProgress = false;
							pageNumber++;
						}, 1000);
					});

					reqInProgress = true;
					$('#cards-preloader').css({display: 'flex'});
				}
		}
	});

	function renderPlace(place) {
		let priceHTML = '';

		for (let i = 0; i < 5; i++) {
			priceHTML += (i < place.average_price) ? "<i class='fa fa-usd filled' aria-hidden='true'></i>\n"
													: "<i class='fa fa-usd default' aria-hidden='true'></i>\n";
		}

		let dots = '';
		if (place.description > 100)
			dots = '...';

		return `
			<div class="card-container">
				<div class="card">
					<div class="card-img">
						<a href="/place/${place.id}">
							<img src="../images/places/${place.image}" alt="">
						</a>
					</div>
					<div class="card-content">
						<div class="card-title">
							<a href="/place/${place.id}">${place.name}</a>
						</div>
						<div class="card-top-plate flexbox">
							<div class="price">
								${priceHTML}
							</div>
							<div class="rating">
								${place.rating} <i class="fa fa-star" aria-hidden="true"></i>
							</div>
						</div>
						<div class="card-description">
							${place.description.substr(0,100)} ${dots}
						</div>
					</div>
				</div>
			</div>
			`;
	}


})();

$(document).ready(function(){

	$('.toggle-filters-btn').click(function() {
		var filtersContainer = $('.filters-container');

		filtersContainer.toggle();
		if (filtersContainer.attr('style') == 'display: none;') {
			filtersContainer.removeAttr('style');
		}
	});

});
