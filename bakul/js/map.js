// ==========  START GOOGLE MAP ========== // 

      function initMap() {
      
          // MAP LOCATION
          var myLatLng = {lat: -7.78291666666667, lng: 110.367027777778};

            // STYLE MAP
            var map = new google.maps.Map(document.getElementById('map_canvas'), {
            center: myLatLng, 
            zoom: 14,
            disableDefaultUI: true,
            scrollwheel: true,
            navigationControl: false,
            mapTypeControl: false,
            scaleControl: false,
            draggable: true,
            mapTypeControlOptions: {
            mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'roadatlas']
            },
              styles: [
    {
        "featureType": "administrative",
        "elementType": "all",
        "stylers": [
            {
                "hue": "#0060ff"
            },
            {
                "lightness": -100
            },
            {
                "visibility": "off"
            },
            {
                "saturation": "-77"
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#848ea4"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "hue": "#0060ff"
            },
            {
                "saturation": "-70"
            },
            {
                "lightness": "0"
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "hue": "#0050ff"
            },
            {
                "saturation": "0"
            },
            {
                "lightness": "0"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "labels",
        "stylers": [
            {
                "hue": "#0060ff"
            },
            {
                "saturation": "-80"
            },
            {
                "lightness": "-90"
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "hue": "#0060ff"
            },
            {
                "saturation": "-80"
            },
            {
                "lightness": "-70"
            },
            {
                "visibility": "off"
            },
            {
                "gamma": "1"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
            {
                "hue": "#0060ff"
            },
            {
                "saturation": "-85"
            },
            {
                "lightness": "60"
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels",
        "stylers": [
            {
                "hue": "#0060ff"
            },
            {
                "saturation": "-70"
            },
            {
                "lightness": "50"
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "all",
        "stylers": [
            {
                "hue": "#0060ff"
            },
            {
                "saturation": "0"
            },
            {
                "lightness": "-11"
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "visibility": "simplified"
            },
            {
                "hue": "#0060ff"
            },
            {
                "lightness": "0"
            },
            {
                "saturation": "0"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "labels",
        "stylers": [
            {
                "hue": "#0060ff"
            },
            {
                "lightness": -100
            },
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "hue": "#0066ff"
            },
            {
                "saturation": "0"
            },
            {
                "lightness": 100
            },
            {
                "visibility": "on"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels",
        "stylers": [
            {
                "hue": "#000000"
            },
            {
                "saturation": -100
            },
            {
                "lightness": -100
            },
            {
                "visibility": "off"
            }
        ]
    }
]
            });


        // CUSTOM MAP MARKER. 
        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            icon: 'img/location-icon.png',
            title: '',
        });


    }
// ========== END GOOGLE MAP ========== //
