$("#region").change(event => {
	//$.get(`newss/cities/${event.target.value}`, function(res, sta){
	$.get(`cities/${event.target.value}`, function(res, sta){
		$("#citie").empty();
		res.forEach(element => {
			$("#citie").append(`<option value=${element.id}> ${element.name} </option>`);
		});
	});
});