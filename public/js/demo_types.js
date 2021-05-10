$("#countrie").change(event => {
	//$.get(`newss/regions/${event.target.value}`, function(res, sta){
	$.get(`regions/${event.target.value}`, function(res, sta){
		$("#region").empty();
		res.forEach(element => {
			$("#region").append(`<option value=${element.id}> ${element.name} </option>`);
		});
	});
});