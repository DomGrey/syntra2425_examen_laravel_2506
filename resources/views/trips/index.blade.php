<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Canada Trip Planner - Trips Overview</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        th {
            background: #f8f8f8;
            padding: 12px;
            text-align: left;
            border-bottom: 2px solid #ddd;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }
        tr:hover {
            background: #f9f9f9;
        }
        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 14px;
        }
        .badge-west { background: #e3f2fd; }
        .badge-east { background: #e8f5e9; }
        .badge-north { background: #f3e5f5; }
        .badge-central { background: #fff3e0; }
        .badge-confirmed { background: #e8f5e9; }
        .badge-pending { background: #fff3e0; }
        .badge-cancelled { background: #ffebee; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Trip Overview</h1>
        <table>
            <thead>
                <tr>
                    <th>Regio</th>
                    <th>Titel</th>
                    <th>Startdatum</th>
                    <th>Duur</th>
                    <th>Confirmed</th>
                    <th>Pending</th>
                    <th>Cancelled</th>
                    <th>Omzet</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trips as $trip)
                    @php
                        $confirmed = $trip->bookings->where('status', 'confirmed');
                        $pending = $trip->bookings->where('status', 'pending');
                        $cancelled = $trip->bookings->where('status', 'cancelled');
                        $revenue = $confirmed->sum(fn($b) => $b->number_of_people * $trip->price_per_person);
                    @endphp
                    <tr>
                        <td><span class="badge badge-{{ $trip->region }}">{{ ucfirst($trip->region) }}</span></td>
                        <td>{{ $trip->title }}</td>
                        <td>{{ date('d M Y', strtotime($trip->start_date)) }}</td>
                        <td>{{ $trip->duration_days }} dagen</td>
                        <td><span class="badge badge-confirmed">{{ $confirmed->count() }}</span></td>
                        <td><span class="badge badge-pending">{{ $pending->count() }}</span></td>
                        <td><span class="badge badge-cancelled">{{ $cancelled->count() }}</span></td>
                        <td>C${{ number_format($revenue, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
