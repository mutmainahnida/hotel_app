<!-- resources/views/hotels/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Hotel Details</title>
</head>
<body>
    <h1>{{ $hotel->name }}</h1>
    <img src="{{ asset('storage/' . $hotel->image) }}" alt="{{ $hotel->name }}" style="width:300px;"><br>
    <p>Location: {{ $hotel->location }}</p>
    <p>Rating: {{ $hotel->rating }}</p>
    <p>Price per Night: ${{ $hotel->price_per_night }}</p>
    <p>Address: {{ $hotel->address }}</p>
    <div id="map" style="height: 400px; width: 600px;"></div>
    <script>
        function initMap() {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({'address': '{{ $hotel->address }}'}, function(results, status) {
                if (status === 'OK') {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 15,
                        center: results[0].geometry.location
                    });
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap"></script>
    <p>Room Types:</p>
    <ul>
        @foreach(json_decode($hotel->room_types, true) as $roomType)
            <li>{{ $roomType['type'] }} - Available: {{ $roomType['available'] }}</li>
        @endforeach
    </ul>
</body>
</html>
