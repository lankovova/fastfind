(function(){

	var pageNumber = 1;

	var therIsMorePlaces = true;

	var reqInProgress = false;

	if ($('.cards-map-container').length !== 0) {
		// Scroll event on places list page
		$('.cards-map-container').scroll(function(e) {
			if (therIsMorePlaces && !reqInProgress) {
				if ($('#cards-end-marker').offset().top - $(window).height() === 0) {
					reqInProgress = true;
					$('#cards-preloader').css({display: 'flex'});

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

								if (i < 16) therIsMorePlaces = false;

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
