'use strict';

$(function(){
	
	$('input[name="edit-logo"]').change(function (){ 
		if( $('input[name="edit-logo"]').val() != ""){
			// $('input[name="edit-logo"]').on(function(){
				$('label[for="edit-logo"]').html($('input[name="edit-logo"]').val());
				$('#form-logo').submit(); 
			// });
		}
	});

	// ==========  START GOOGLE MAP ========== // 

});

    function initMap() {
		// MAP LOCATION-7.417356,109.2443453,
	var myLatLng = {lat: -7.417356, lng: 109.2443453};

	// STYLE MAP
	var map = new google.maps.Map(document.getElementById('map_canvas'), {
		center: myLatLng, 
		zoom: 17,
		styles:
			[
				{
				"featureType": "poi.attraction",
				"stylers": [
					{
					"visibility": "off"
					}
				]
				},
				{
				"featureType": "poi.business",
				"stylers": [
					{
					"visibility": "off"
					}
				]
				},
				{
				"featureType": "poi.medical",
				"stylers": [
					{
					"visibility": "off"
					}
				]
				}
			]
			  
	});
	// Change this depending on the name of your PHP or XML file
	// downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
	// 	var xml = data.responseXML;
	// 	var markers = xml.documentElement.getElementsByTagName('marker');
		
	// 	Array.prototype.forEach.call(markers, function(markerElem) {
		
	// 		var name = markerElem.getAttribute('name');
	// 		var address = markerElem.getAttribute('address');
	// 		var type = markerElem.getAttribute('type');
			
	// 		var point = new google.maps.LatLng(
	// 			parseFloat(markerElem.getAttribute('lat')),
	// 			parseFloat(markerElem.getAttribute('lng')));

	// 		var infowincontent = document.createElement('div');
	// 		var strong = document.createElement('strong');
			
	// 		strong.textContent = name
	// 		infowincontent.appendChild(strong);
	// 		infowincontent.appendChild(document.createElement('br'));

	// 		var text = document.createElement('text');
			
	// 		text.textContent = address
	// 		infowincontent.appendChild(text);
			
	// 		var icon = customLabel[type] || {};
	// 		var marker = new google.maps.Marker({
	// 			map: map,
	// 			position: point,
	// 			label: icon.label
	// 		});
			
	// 		marker.addListener('click', function() {
	// 			infoWindow.setContent(infowincontent);
	// 			infoWindow.open(map, marker);
	// 		});
	// 	});
	// });

	

	// function downloadUrl(url, callback) {
	// 	var request = window.ActiveXObject ?
	// 		new ActiveXObject('Microsoft.XMLHTTP') :
	// 		new XMLHttpRequest;

	// 	request.onreadystatechange = function() {
	// 	if (request.readyState == 4) {
	// 		request.onreadystatechange = doNothing;
	// 		callback(request, request.status);
	// 	}
	// 	};

	// 	request.open('GET', url, true);
	// 	request.send(null);
	// }

	// function doNothing() {}
	var markers = [];

	$.ajax({                                      
		url: 'http://localhost/esduren/crud/get_location',
//		data: 'lat='+event.latLng.lat()+'&long='+event.latLng.lng(),
										//for example "id=5&parent=6"
		dataType: 'json',                //data format      
		success: function(data){
			clearMarkers();
			markers= [];
			addMarker({lat: data[0].Lat, lng: data[0].Long});
			console.log('success');
		}

	});
	var marker = new google.maps.Marker({
		position: myLatLng,
		map: map,
		title:"Lokasi Kami"
	});
	
	markers.push(marker);

	google.maps.event.addListener(map, 'click', function(event) {
		$.ajax({                                      
			url: 'http://localhost/esduren/crud/update_location',
			data: 'lat='+event.latLng.lat()+'&long='+event.latLng.lng(),
											//for example "id=5&parent=6"
			dataType: 'json',                //data format      
			success: function(data){
				clearMarkers();
				markers= [];
				addMarker(event.latLng);
				console.log('success');
			}

		});
		console.log( "Latitude: "+event.latLng.lat()+" "+", longitude: "+event.latLng.lng()); // Get separate lat long.
	});

	function clearMarkers() {
		setMapOnAll(null);
	}

	function setMapOnAll(map) {
		for (var i = 0; i < markers.length; i++) {
			markers[i].setMap(map);
		}
	}

	function addMarker(location) {
		var marker = new google.maps.Marker({
			position: location,
			map: map
		});
		markers.push(marker);
	}
}



// ========== END GOOGLE MAP ========== //
