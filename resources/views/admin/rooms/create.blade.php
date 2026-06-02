<!-- resources/views/admin/rooms/create.blade.php -->
@extends('layouts.admin')

@section('title', 'Add Room')
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
        <h1 class="page-header-title">Add New <em>Room</em></h1>
    </div>
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
        <form action="{{ route('admin.rooms.store') }}" method="POST">
            @csrf
            <div class="form-grid-2">

                <div class="form-group">
                    <label class="form-label" for="room_number">Room Number <span class="req">*</span></label>
                    <input type="text" id="room_number" name="room_number"
                           class="form-input" value="{{ old('room_number') }}"
                           placeholder="e.g. 101" required>
                    @error('room_number')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="type">Room Type <span class="req">*</span></label>
                    <select id="type" name="type" class="form-input" required>
                        <option value="">— Select Type —</option>
                        <option value="single"  {{ old('type') === 'single'  ? 'selected' : '' }}>Single</option>
                        <option value="double"  {{ old('type') === 'double'  ? 'selected' : '' }}>Double</option>
                        <option value="suite"   {{ old('type') === 'suite'   ? 'selected' : '' }}>Suite</option>
                    </select>
                    @error('type')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="price_per_night">Price Per Night (₱) <span class="req">*</span></label>
                    <input type="number" id="price_per_night" name="price_per_night"
                           class="form-input" value="{{ old('price_per_night') }}"
                           placeholder="0.00" step="0.01" min="0" required>
                    @error('price_per_night')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="status">Status <span class="req">*</span></label>
                    <select id="status" name="status" class="form-input" required>
                        <option value="available"   {{ old('status') === 'available'   ? 'selected' : '' }}>Available</option>
                        <option value="occupied"    {{ old('status') === 'occupied'    ? 'selected' : '' }}>Occupied</option>
                        <option value="maintenance" {{ old('status') === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                    </select>
                    @error('status')<span class="form-error">{{ $message }}</span>@enderror
                </div>

                <div class="form-group form-group--full">
                    <label class="form-label" for="description">Description</label>
                    <textarea id="description" name="description" class="form-input" rows="4"
                              placeholder="Room amenities and features…">{{ old('description') }}</textarea>
                    @error('description')<span class="form-error">{{ $message }}</span>@enderror
                </div>

            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-gold">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    Create Room
                </button>
                <a href="{{ route('admin.rooms.index') }}" class="btn btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection
