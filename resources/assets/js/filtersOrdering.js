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
