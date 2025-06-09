@csrf

<div>
    <label for="title" class="block text-sm font-medium text-gray-700">Titel</label>
    <input type="text" name="title" id="title" required value="{{ old('title', $performance->title ?? '') }}"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
</div>

<div>
    <label for="start_time" class="block text-sm font-medium text-gray-700">Startzeit</label>
    <input type="datetime-local" name="start_time" id="start_time" required
           value="{{ old('start_time', isset($performance) ? $performance->start_time : '') }}"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
</div>

<div>
    <label for="end_time" class="block text-sm font-medium text-gray-700">Endzeit</label>
    <input type="datetime-local" name="end_time" id="end_time" required
           value="{{ old('end_time', isset($performance) ? $performance->end_time : '') }}"
           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
</div>

<div>
    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
    <select name="status" id="status" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        @foreach (['upcoming' => 'Bevorstehend', 'active' => 'Aktiv', 'done' => 'Abgeschlossen'] as $key => $label)
            <option value="{{ $key }}" @selected(old('status', $performance->status ?? '') === $key)>{{ $label }}</option>
        @endforeach
    </select>
</div>

<div>
    <button type="submit"
            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        {{ $buttonText ?? "Speichern" }}
    </button>
</div>
