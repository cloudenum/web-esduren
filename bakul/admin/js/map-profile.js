// This sample uses the Place Autocomplete widget to allow the user to search
// for and select a place. The sample then displays an info window containing
// the place ID and other information about the place that the user has
// selected.

// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

function initMap() {
	var map = new google.maps.Map(document.getElementById("map"), {
		// Indonesia -1.9595116,118.5539989
		center: { lat: -1.9595116, lng: 118.5539989 },
		zoom: 4.5,
	});

	var input = document.getElementById("pac-input");

	var autocomplete = new google.maps.places.Autocomplete(input);
	autocomplete.bindTo("bounds", map);

	// Specify just the place data fields that you need.
	autocomplete.setFields(["place_id", "geometry", "name"]);

	map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

	var infowindow = new google.maps.InfoWindow();
	var infowindowContent = document.getElementById("infowindow-content");
	infowindow.setContent(infowindowContent);

	var marker = new google.maps.Marker({ map: map });

	marker.addListener("click", function () {
		infowindow.open(map, marker);
	});

	autocomplete.addListener("place_changed", function () {
		infowindow.close();

		var place = autocomplete.getPlace();

		if (!place.geometry) {
			return;
		}

		if (place.geometry.viewport) {
			map.fitBounds(place.geometry.viewport);
		} else {
			map.setCenter(place.geometry.location);
			map.setZoom(17);
		}

		// Set the position of the marker using the place ID and location.
		marker.setPlace({
			placeId: place.place_id,
			location: place.geometry.location,
		});

		marker.setVisible(true);

		infowindowContent.children["place-name"].textContent = place.name;
		infowindowContent.children["place-id"].textContent = place.place_id;
		infowindowContent.children["place-address"].textContent =
			place.formatted_address;
		infowindow.open(map, marker);
	});
}
// function initMap() {
// 	var map;
// 	var myLatLng = {};
// 	var markers = [];

// 	$.ajax({
// 		url: baseURL("crud/get_location"),
// 		dataType: "json", //data format
// 		success: function (data) {
// 			myLatLng = { lat: parseFloat(data[0].Lat), lng: parseFloat(data[0].Lng) };

// 			map = new google.maps.Map(document.getElementById("map_canvas"), {
// 				center: myLatLng,
// 				zoom: 17,
// 				styles: [
// 					{
// 						featureType: "poi.attraction",
// 						stylers: [
// 							{
// 								visibility: "off",
// 							},
// 						],
// 					},
// 					{
// 						featureType: "poi.business",
// 						stylers: [
// 							{
// 								visibility: "off",
// 							},
// 						],
// 					},
// 					{
// 						featureType: "poi.medical",
// 						stylers: [
// 							{
// 								visibility: "off",
// 							},
// 						],
// 					},
// 				],
// 			});

// 			clearMarkers();
// 			markers = [];
// 			addMarker(myLatLng);

// 			google.maps.event.addDomListener(map, "click", function (event) {
// 				console.log("click");
// 				clearMarkers();
// 				markers = [];
// 				addMarker(event.latLng);
// 				$("#save-map").removeAttr("disabled");
// 				map.panTo(markers[0].getPosition());
// 			});
// 		},
// 		error: function (status) {
// 			alert(status);
// 		},
// 	});

// 	console.log(map);

// 	$("#save-map").click(() => {
// 		$.ajax({
// 			url: baseURL("crud/update_location"),
// 			method: "POST",
// 			dataType: "json",
// 			data: {
// 				lat: markers[0].getPosition().lat(),
// 				lng: markers[0].getPosition().lng(),
// 			}, //for example "id=5&parent=6"
// 			dataType: "json", //data format
// 			success: function (data) {
// 				clearMarkers();
// 				markers = [];
// 				myLatLng = {
// 					lat: parseFloat(data.location[0].Lat),
// 					lng: parseFloat(data.location[0].Lng),
// 				};
// 				addMarker(myLatLng);

// 				$("#map-container").prepend(
// 					'<div class="alert alert-warning alert-dismissable" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a><strong>' +
// 						data.status +
// 						"</strong> " +
// 						data.status_msg +
// 						"</div>"
// 				);
// 			},
// 			error: function (data) {
// 				$("#map-container").prepend(
// 					'<div class="alert alert-danger alert-dismissable" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a><strong>' +
// 						data.status +
// 						"</strong> " +
// 						data.status_msg +
// 						"</div>"
// 				);
// 			},
// 		});
// 	});

// 	function clearMarkers() {
// 		setMapOnAll(null);
// 	}

// 	function setMapOnAll(map) {
// 		for (var i = 0; i < markers.length; i++) {
// 			markers[i].setMap(map);
// 		}
// 	}

// 	function addMarker(location) {
// 		var marker = new google.maps.Marker({
// 			position: location,
// 			map: map,
// 		});
// 		markers.push(marker);
// 	}
// }

// function gm_authFailure() {
// 	console.log("failed");
// }
// // ========== END GOOGLE MAP ========== //
