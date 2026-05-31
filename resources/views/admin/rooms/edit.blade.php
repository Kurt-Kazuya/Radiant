<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Room</title>
</head>
<body>
    <h2>Edit Room {{ $room->room_number }}</h2>
    <a href="{{ route('admin.rooms.index') }}">← Back to Rooms</a>
    <hr>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li style="color:red;">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.rooms.update', $room) }}" method="POST">
        @csrf @method('PUT')

        <label>Room Number:</label><br>
        <input type="text" name="room_number" value="{{ old('room_number', $room->room_number) }}" required><br><br>

        <label>Type:</label><br>
        <select name="type" required>
            <option value="single"  {{ $room->type === 'single'  ? 'selected' : '' }}>Single</option>
            <option value="double"  {{ $room->type === 'double'  ? 'selected' : '' }}>Double</option>
            <option value="suite"   {{ $room->type === 'suite'   ? 'selected' : '' }}>Suite</option>
        </select><br><br>

        <label>Price Per Night (&#8369;):</label><br>
        <input type="number" name="price_per_night"
               value="{{ old('price_per_night', $room->price_per_night) }}" required><br><br>

        <label>Status:</label><br>
        <select name="status" required>
            <option value="available"   {{ $room->status === 'available'   ? 'selected' : '' }}>Available</option>
            <option value="occupied"    {{ $room->status === 'occupied'    ? 'selected' : '' }}>Occupied</option>
            <option value="maintenance" {{ $room->status === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
        </select><br><br>

        <label>Description:</label><br>
        <textarea name="description" rows="3">{{ old('description', $room->description) }}</textarea><br><br>

        <button type="submit">Update Room</button>
    </form>
</body>
</html>