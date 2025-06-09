<x-app-layout>
    <h1>Neuen Eintrag erstellen</h1>

    <form method="POST" action="{{ route('performances.store') }}">
        @csrf
        <label>Titel</label>
        <input type="text" name="title" required>

        <label>Startzeit</label>
        <input type="datetime-local" name="start_time" required>

        <label>Endzeit</label>
        <input type="datetime-local" name="end_time" required>

        <label>Status</label>
        <select name="status" required>
            <option value="upcoming">Bevorstehend</option>
            <option value="active">Aktiv</option>
            <option value="done">Abgeschlossen</option>
        </select>

        <button type="submit">Speichern</button>
    </form>
</x-app-layout>

