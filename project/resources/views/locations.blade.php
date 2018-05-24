@include('header')
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
<div id="map"></div>
<script>

    // The following example creates complex markers to indicate beaches near
    // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
    // to the base of the flagpole.


    var markerscenter = [

       @forEach($data as $contact)
        ['{{$contact->name.", ".$contact->address->suite.", ".$contact->address->street.", ".$contact->address->city}}', {{$contact->address->geo->lat}}, {{$contact->address->geo->lng}},],
        @endforeach
    ];
    function initMap() {
      var  map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: markerscenter[0][1], lng: markerscenter[0][2]},
            zoom: 2
        });
        setMarkers(map);
    }

    // Data for the markers consisting of a name, a LatLng and a zIndex for the
    // order in which these markers should display on top of each other.


    var markers = [
            @forEach($data as $contact)
               ['{{$contact->name.", ".$contact->address->suite.", ".$contact->address->street.", ".$contact->address->city}}', {{$contact->address->geo->lat}}, {{$contact->address->geo->lng}},],
            @endforeach

    ];

    function setMarkers(map) {

        var image = 'markeimage.png';



        var infoWindow = new google.maps.InfoWindow(), marker, i;
        for (var i = 0; i < markers.length; i++) {


            //var beach = beaches[i];
            var marker = new google.maps.Marker({
                position: {lat:markers[i][1], lng: markers[i][2]},
                map: map,
                title:markers[i][0],
                icon: '{{ asset('images/icon.png') }}',

            });

            google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
                return function() {
                    infoWindow.setContent(markers[i][0]);
                    infoWindow.open(map, marker);
                }
            })(marker, i));
        }

    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8IhrrmASx12EtQ-u2_1Et-1fa0m_H4Ks&callback=initMap"
        async defer></script>
@include('footer')