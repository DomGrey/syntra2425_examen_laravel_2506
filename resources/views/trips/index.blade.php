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
                <td>{{ $trip->region }}</td>
                <td>{{ $trip->title }}</td>
                <td>{{ $trip->start_date }}</td>
                <td>{{ $trip->duration_days }} dagen</td>
                <td>{{ $confirmed->count() }}</td>
                <td>{{ $pending->count() }}</td>
                <td>{{ $cancelled->count() }}</td>
                <td>C${{ number_format($revenue, 2) }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
