////////////////////////////////////////////////////////
///////////////// google map start ///////////////////////////
////////////////////////////////////////////////////////	


google.maps.event.addDomListener(window, 'load', init);

var map;

function init() {
    var mapOptions = {
        center: new google.maps.LatLng(32.9349868,72.845192),
        zoom: 15,
        zoomControl: false,
		disableDefaultUI: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.DEFAULT,
        },
        disableDoubleClickZoom: false,
        mapTypeControl: false,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
        },
        scaleControl: true,
        scrollwheel: false,
        streetViewControl: false,
        draggable : true,
        overviewMapControl: false,
    }

    var mapElement = document.getElementById('contact_map');
    var map = new google.maps.Map(mapElement, mapOptions);
     
	var i= 0;
	 
	 
      var  marker = new google.maps.Marker({
            icon: 'assets/images/map-pin.png', 
            position: new google.maps.LatLng(32.9349868,72.845192),
            map: map
        });
     
    
	// Create an InfoWindow for the marker
		var contentString = "<p class='map-info'>48800 Chakwal, Punjab, Pakistan</p>";	// HTML text to display in the InfoWindow
		var infowindow = new google.maps.InfoWindow( { content: contentString } );
		
		// Set event to display the InfoWindow anchored to the marker when the marker is clicked.
		google.maps.event.addListener( marker, 'click', function() { infowindow.open( map, marker ); });
	
}