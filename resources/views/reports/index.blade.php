<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - Hotel Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">📊 Reports Dashboard</h2>
            <p class="text-muted">Hotel Reservation System — Generated {{ now()->format('F d, Y') }}</p>
        </div>
        <a href="/" class="btn btn-outline-secondary">← Back to Home</a>
    </div>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Stats Cards --}}
    <div class="row g-3 mb-5">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm text-center p-3">
                <div class="fs-1">🛎️</div>
                <h3 class="fw-bold text-primary">{{ $totalReservations }}</h3>
                <p class="text-muted mb-0">Total Reservations</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm text-center p-3">
                <div class="fs-1">✅</div>
                <h3 class="fw-bold text-success">{{ $confirmed }}</h3>
                <p class="text-muted mb-0">Confirmed</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm text-center p-3">
                <div class="fs-1">⏳</div>
                <h3 class="fw-bold text-warning">{{ $pending }}</h3>
                <p class="text-muted mb-0">Pending</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm text-center p-3">
                <div class="fs-1">❌</div>
                <h3 class="fw-bold text-danger">{{ $cancelled }}</h3>
                <p class="text-muted mb-0">Cancelled</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm text-center p-3">
                <div class="fs-1">💰</div>
                <h3 class="fw-bold text-success">₱{{ number_format($totalRevenue, 2) }}</h3>
                <p class="text-muted mb-0">Total Revenue</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm text-center p-3">
                <div class="fs-1">🏨</div>
                <h3 class="fw-bold text-info">{{ $totalRooms }}</h3>
                <p class="text-muted mb-0">Total Rooms</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm text-center p-3">
                <div class="fs-1">🟢</div>
                <h3 class="fw-bold text-success">{{ $availableRooms }}</h3>
                <p class="text-muted mb-0">Available Rooms</p>
            </div>
        </div>
    </div>

    {{-- Export Buttons --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">📥 Export Reports</h5>
            <div class="d-flex gap-2 flex-wrap">
                <a href="{{ route('reports.pdf') }}" class="btn btn-danger">
                    <i class="bi bi-file-earmark-pdf"></i> Export PDF
                </a>
                <a href="{{ route('reports.excel') }}" class="btn btn-success">
                    <i class="bi bi-file-earmark-excel"></i> Export Excel
                </a>
                <a href="{{ route('reports.csv') }}" class="btn btn-primary">
                    <i class="bi bi-file-earmark-spreadsheet"></i> Export CSV
                </a>
            </div>
        </div>
    </div>

    {{-- Import Section --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">📤 Import Data</h5>
            <form action="{{ route('reports.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex gap-2 align-items-center">
                    <input type="file" name="file" accept=".csv,.xlsx,.xls"
                           class="form-control w-auto" required>
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-upload"></i> Import
                    </button>
                </div>
                <small class="text-muted mt-1 d-block">Accepted formats: .csv, .xlsx, .xls</small>
                @error('file')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </form>
        </div>
    </div>

    {{-- Recent Reservations Table --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h5 class="fw-bold mb-3">🕐 Recent Reservations (Last 10)</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Guest</th>
                            <th>Room</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Nights</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservations as $r)
                        <tr>
                            <td>{{ $r->id }}</td>
                            <td>{{ $r->user->name ?? 'N/A' }}</td>
                            <td>Room {{ $r->room->room_number ?? 'N/A' }}</td>
                            <td>{{ $r->check_in_date }}</td>
                            <td>{{ $r->check_out_date }}</td>
                            <td>{{ $r->total_nights }}</td>
                            <td>₱{{ number_format($r->total_price, 2) }}</td>
                            <td>
                                <span class="badge bg-{{
                                    $r->status === 'confirmed' ? 'success' :
                                    ($r->status === 'pending' ? 'warning' : 'danger')
                                }}">
                                    {{ ucfirst($r->status) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                No reservations yet.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>