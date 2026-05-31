<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Room</title>
</head>
<body>
    <h2>Add New Room</h2>
    <a href="{{ route('admin.rooms.index') }}">← Back to Rooms</a>
    <hr>

    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li style="color:red;">{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('admin.rooms.store') }}" method="POST">
        @csrf
        <label>Room Number:</label><br>
        <input type="text" name="room_number" value="{{ old('room_number') }}" required><br><br>

        <label>Type:</label><br>
        <select name="type" required>
            <option value="">-- Select Type --</option>
            <option value="single"  {{ old('type') === 'single'  ? 'selected' : '' }}>Single</option>
            <option value="double"  {{ old('type') === 'double'  ? 'selected' : '' }}>Double</option>
            <option value="suite"   {{ old('type') === 'suite'   ? 'selected' : '' }}>Suite</option>
        </select><br><br>

        <label>Price Per Night (&#8369;):</label><br>
        <input type="number" name="price_per_night" value="{{ old('price_per_night') }}" required><br><br>

        <label>Status:</label><br>
        <select name="status" required>
            <option value="available"   {{ old('status') === 'available'   ? 'selected' : '' }}>Available</option>
            <option value="occupied"    {{ old('status') === 'occupied'    ? 'selected' : '' }}>Occupied</option>
            <option value="maintenance" {{ old('status') === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
        </select><br><br>

        <label>Description:</label><br>
        <textarea name="description" rows="3">{{ old('description') }}</textarea><br><br>

        <button type="submit">Create Room</button>
    </form>
</body>
</html>