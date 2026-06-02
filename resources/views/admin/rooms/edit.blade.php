<!-- resources/views/admin/rooms/edit.blade.php -->
@extends('layouts.admin')

@section('title', 'Edit Room ' . $room->room_number)
@section('topbar-title', 'Rooms')

@section('content')

<a href="{{ route('admin.rooms.index') }}" class="back-link">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <polyline points="15,18 9,12 15,6"/>
    </svg>
    Back to Rooms
</a>

<div class="page-header">
    <div class="page-header-left">
        <span class="eyebrow">Inventory</span>
        <h1 class="page-header-title">Edit Room <em>{{ $room->room_number }}</em></h1>
    </div>
    <span class="badge badge--{{ strtolower($room->status) }}" style="font-size:0.75rem;padding:0.3rem 0.9rem;">
        {{ ucfirst($room->status) }}
    </span>
</div>

@if($errors->any())
    <div class="alert alert--error">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="flex-shrink:0;margin-top:2px">
            <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
        </svg>
        <ul style="list-style:none;display:flex;flex-direction:column;gap:0.3rem;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-header">
        <div class="card-title">Room <em>Details</em></div>
    </div>
    <div class="form-wrap">
        <form action="{{ route('admin.rooms.update', $room) }}" method="POST">
            @csrf @method('PUT')
            <div class="form-grid-2">

                <div class="form-group">
                    <label class="form-label" for="room_number">Room Number <span class="req">*</span></label>
                    <input type="text" id="room_number" name="room_number"
                           class="form-input"
                           value="{{ old('room_number', $room->room_number) }}" required>
                    @error('room_number')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="type">Room Type <span class="req">*</span></label>
                    <select id="type" name="type" class="form-input" required>
                        <option value="single"  {{ (old('type', $room->type) === 'single')  ? 'selected' : '' }}>Single</option>
                        <option value="double"  {{ (old('type', $room->type) === 'double')  ? 'selected' : '' }}>Double</option>
                        <option value="suite"   {{ (old('type', $room->type) === 'suite')   ? 'selected' : '' }}>Suite</option>
                    </select>
                    @error('type')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="price_per_night">Price Per Night (₱) <span class="req">*</span></label>
                    <input type="number" id="price_per_night" name="price_per_night"
                           class="form-input"
                           value="{{ old('price_per_night', $room->price_per_night) }}"
                           step="0.01" min="0" required>
                    @error('price_per_night')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="status">Status <span class="req">*</span></label>
                    <select id="status" name="status" class="form-input" required>
                        <option value="available"   {{ (old('status', $room->status) === 'available')   ? 'selected' : '' }}>Available</option>
                        <option value="occupied"    {{ (old('status', $room->status) === 'occupied')    ? 'selected' : '' }}>Occupied</option>
                        <option value="maintenance" {{ (old('status', $room->status) === 'maintenance') ? 'selected' : '' }}>Maintenance</option>
                    </select>
                    @error('status')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group form-group--full">
                    <label class="form-label" for="description">Description</label>
                    <textarea id="description" name="description" class="form-input" rows="4">{{ old('description', $room->description) }}</textarea>
                    @error('description')<span class="form-error">{{ $message }}</span>@enderror
                </div>

            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-gold">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/>
                        <polyline points="17,21 17,13 7,13 7,21"/><polyline points="7,3 7,8 15,8"/>
                    </svg>
                    Update Room
                </button>
                <a href="{{ route('admin.rooms.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection
