<!-- resources/views/hotels/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Hotel Details</title>
</head>
<body>
    <h1>{{ $hotel->nama }}</h1>
    <img src="{{ asset('storage/' . $hotels->gambar) }}" alt="{{ $hotels->nama }}" style="width:300px;"><br>
    <p>Lokasi: {{ $hotels->lokasi }}</p>
    <p>Penilaian: {{ $hotels->penilaian }}</p>
    <p>Harga per malam: ${{ $hotel->harga_permalam }}</p>
    <p>Alamat: {{ $hotels->alamat }}</p>
    <div id="map" style="height: 400px; width: 600px;"></div>
    <script>
        function initMap() {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({'alamat': '{{ $hotels->alamat }}'}, function(results, status) {
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
