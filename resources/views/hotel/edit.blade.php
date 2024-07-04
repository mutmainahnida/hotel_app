<form action="{{ route('hotels.update', $hotel->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ $hotel->name }}" required><br>

    <label for="location">Location:</label>
    <input type="text" id="location" name="location" value="{{ $hotel->location }}" required><br>

    <label for="rating">Rating:</label>
    <input type="number" id="rating" name="rating" value="{{ $hotel->rating }}" required><br>

    <label for="price_per_night">Price per Night:</label>
    <input type="number" step="0.01" id="price_per_night" name="price_per_night" value="{{ $hotel->price_per_night }}" required><br>

    <label for="image">Image URL:</label>
    <input type="url" id="image" name="image" value="{{ $hotel->image }}" required><br>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" value="{{ $hotel->address }}" required><br>

    <label for="room_types">Room Types:</label>
    <select id="room_types" name="room_types[]" multiple required>
        @foreach(json_decode($hotel->room_types) as $room_type)
            <option value="{{ $room_type }}" selected>{{ $room_type }}</option>
        @endforeach
    </select><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="{{ $hotel->email }}" required><br>

    <button type="submit">Update Hotel</button>
</form>
