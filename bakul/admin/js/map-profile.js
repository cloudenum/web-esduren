
function initMap() {
	var map = new Object();
	var myLatLng = {};
	var markers = [];
	
	$.ajax({                                      
		url: 'http://localhost/esduren/crud/get_location',
		dataType: 'json',                //data format      
		success: function (data) {
			myLatLng = {lat: parseFloat(data[0].Lat), lng: parseFloat(data[0].Lng)};

			map = new google.maps.Map(document.getElementById('map_canvas'), {
				center: myLatLng, 
				zoom: 17,
				styles:
					[{
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
					}]	
				}
			);
	
			clearMarkers();
			markers= [];
			addMarker(myLatLng);


			google.maps.event.addDomListener(map,'click', function(event) {
				console.log('click');
				clearMarkers();
				markers= [];
				addMarker(event.latLng);
				$('#save-map').removeAttr('disabled');
				map.panTo(markers[0].getPosition());
			});
		},
		error : function (status) { 
			alert(status)
		}

	});

	console.log(map);

	$('#save-map').click(()=>{
		$.ajax({                                      
			url: 'http://localhost/esduren/crud/update_location',
			method: 'POST',
			dataType: 'json',
			data: {
				lat: markers[0].getPosition().lat(),
				lng: markers[0].getPosition().lng()
			},                                //for example "id=5&parent=6"
			dataType: 'json',                //data format      
			success: function(data){
				clearMarkers();
				markers = [];
				myLatLng = {lat: parseFloat(data.location[0].Lat), lng: parseFloat(data.location[0].Lng)};
				addMarker(myLatLng);

				$('#map-container').prepend('<div class="alert alert-warning alert-dismissable" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a><strong>'+data.status+'</strong> '+data.status_msg+'</div>');
			},
			error : function (data) { 
				$('#map-container').prepend('<div class="alert alert-danger alert-dismissable" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a><strong>'+data.status+'</strong> '+data.status_msg+'</div>');
			 }

		});
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

function gm_authFailure() { console.log('failed') }
// ========== END GOOGLE MAP ========== //
