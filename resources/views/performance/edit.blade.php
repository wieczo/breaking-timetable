<x-app-layout>
    <h1>Performance bearbeiten</h1>

    <form method="POST" action="{{ route('performances.update', $performance) }}">
        @csrf
        @method('PUT')

        <label for="title">Titel:</label>
        <input type="text" name="title" value="{{ old('title', $performance->title) }}" required>

        <label for="start_time">Startzeit:</label>
        <input type="datetime-local" name="start_time"
               value="{{ old('start_time', $performance->start_time) }}" required>

        <label for="end_time">Endzeit:</label>
        <input type="datetime-local" name="end_time"
               value="{{ old('end_time', $performance->end_time) }}" required>

        <label for="status">Status:</label>
        <select name="status" required>
            @foreach(['upcoming', 'active', 'done'] as $status)
                <option value="{{ $status }}"
                    @selected(old('status', $performance->status) === $status)>
                    {{ ucfirst($status) }}
                </option>
            @endforeach
        </select>

        <button type="submit">Speichern</button>
    </form>
</x-app-layout>
