// ==========  START GOOGLE MAP ========== //

function initMap() {
	var map = new Object();
	var myLatLng = {};

	$.ajax({
		url: baseURL("crud/get_location"),
		dataType: "json", //data format
		success: function (data) {
			myLatLng = { lat: parseFloat(data[0].Lat), lng: parseFloat(data[0].Lng) };

			map = new google.maps.Map(document.getElementById("map_canvas"), {
				center: myLatLng,
				zoom: 17,
				styles: [
					{
						featureType: "poi.attraction",
						stylers: [
							{
								visibility: "off",
							},
						],
					},
					{
						featureType: "poi.business",
						stylers: [
							{
								visibility: "off",
							},
						],
					},
					{
						featureType: "poi.medical",
						stylers: [
							{
								visibility: "off",
							},
						],
					},
				],
			});

			var marker = new google.maps.Marker({
				position: myLatLng,
				map: map,
				title: "Lokasi Kami",
			});
		},
		error: function (status) {
			alert(status);
		},
	});
}

// ========== END GOOGLE MAP ========== //
