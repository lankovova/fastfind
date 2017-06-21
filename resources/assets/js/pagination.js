'use strict';

(function () {

	var pageNumber = 1;

	var therIsMorePlaces = true;

	var reqInProgress = false;

	if ($('.cards-map-container').length !== 0) {
		$('.cards-map-container').scroll(function (e) {
			if (therIsMorePlaces && !reqInProgress) {
				if ($('#cards-end-marker').offset().top - $(window).height() === 0) {
					reqInProgress = true;
					$('#cards-preloader').css({ display: 'flex' });

					var filtersData = $('#filters-form').serialize();
					var orderBy = $('#orderBy').val();
					var orderFlow = $('#orderFlow').val();

					$.get("/api/getPlaces?" + filtersData, { page: pageNumber, orderBy: orderBy, orderFlow: orderFlow }).done(function (places) {
						setTimeout(function () {
							var i = 0;
							places.forEach(function (place) {
								// Insert retrived data to places template
								var placeHTML = renderPlace(place);
								// Insert rendered places
								$(placeHTML).appendTo($('.cards'));
								i++;
							});

							if (i < 16) therIsMorePlaces = false;

							// Remove preloader
							$('#cards-preloader').css({ display: 'none' });
							// Request is done
							reqInProgress = false;
							pageNumber++;
						}, 1000);
					});
				}
			}
		});
	}

	function renderPlace(place) {
		var priceHTML = '';

		for (var i = 0; i < 5; i++) {
			priceHTML += i < place.average_price ? "<i class='fa fa-usd filled' aria-hidden='true'></i>\n" : "<i class='fa fa-usd default' aria-hidden='true'></i>\n";
		}

		var dots = '';
		if (place.description > 100) dots = '...';

		return '\n\t\t\t<div class="card-container">\n\t\t\t\t<div class="card">\n\t\t\t\t\t<div class="card-img">\n\t\t\t\t\t\t<a href="/place/' + place.id + '">\n\t\t\t\t\t\t\t<img src="../images/places/' + place.image + '" alt="">\n\t\t\t\t\t\t</a>\n\t\t\t\t\t</div>\n\t\t\t\t\t<div class="card-content">\n\t\t\t\t\t\t<div class="card-title">\n\t\t\t\t\t\t\t<a href="/place/' + place.id + '">' + place.name + '</a>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class="card-top-plate flexbox">\n\t\t\t\t\t\t\t<div class="price">\n\t\t\t\t\t\t\t\t' + priceHTML + '\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t\t<div class="rating">\n\t\t\t\t\t\t\t\t' + place.rating + ' <i class="fa fa-star" aria-hidden="true"></i>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t\t<div class="card-description">\n\t\t\t\t\t\t\t' + place.description.substr(0, 100) + ' ' + dots + '\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</div>\n\t\t\t\t</div>\n\t\t\t</div>\n\t\t\t';
	}
})();
