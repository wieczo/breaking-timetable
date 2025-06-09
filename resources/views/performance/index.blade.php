<x-app-layout>
    <h1>Alle Einträge</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
        <tr>
            <th>Titel</th>
            <th>Start</th>
            <th>Ende</th>
            <th>Erstellt</th>
        </tr>
        </thead>
        <tbody>
        @foreach($performances as $performance)
            <tr>
                <td>{{ $performance->title }}</td>
                <td>{{ $performance->start_time }}</td>
                <td>{{ $performance->end_time }}</td>
                <td>{{ $performance->created_at->format('d.m.Y H:i') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app-layout>
