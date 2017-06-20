(function(){
	$('#filters-form').submit(function(e){
		e.preventDefault();

		var filtersData = $('#filters-form').serialize();
		window.location.href = '/list?' + filtersData;
	});
})();
