<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-6">
        <h1 class="text-2xl font-bold mb-6">Alle Einträge</h1>

        <div class="mb-6 flex flex-wrap gap-6 text-base">
            <div class="flex items-center space-x-3">
                <div class="w-6 h-6 rounded bg-orange-400 border border-orange-600 shadow-inner"></div>
                <span class="text-orange-900 font-medium">Bevorstehende Kategorie</span>
            </div>
            <div class="flex items-center space-x-3">
                <div class="w-6 h-6 rounded bg-green-400 border border-green-600 shadow-inner"></div>
                <span class="text-green-900 font-medium">Aktuelle Kategorie</span>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        @auth
            <form method="POST" action="{{ route('performances.bulkAddFiveMinutes') }}">
                @csrf
                @endauth

                <div class="overflow-x-auto bg-white shadow rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-white">
                        <tr>
                            @auth
                                <th class="px-4 py-3"><input type="checkbox" id="select-all"></th>
                            @endauth
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titel</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start</th>
                            @auth
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aktionen
                                </th>
                            @endauth
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($performances as $performance)
                            <tr class="{{
                        $performance->status === 'upcoming' ? 'bg-orange-100 hover:bg-orange-300' :
                        ($performance->status === 'active' ? 'bg-green-100 hover:bg-green-300' : 'odd:bg-gray-50 even:bg-white hover:bg-gray-100')
                    }}">
                                @auth
                                    <td class="px-4 py-4">
                                        <input type="checkbox" name="performance_ids[]" value="{{ $performance->id }}">
                                    </td>
                                @endauth

                                <td class="px-6 py-4 text-sm text-gray-700">{{ $performance->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                    {{ \Carbon\Carbon::parse($performance->start_time)->format('H:i') }}
                                </td>

                                @auth
                                    <td class="px-6 py-3 text-sm">
                                        <a href="{{ route('performances.edit', $performance) }}" class="text-blue-600 hover:underline">Bearbeiten</a>
                                    </td>
                                @endauth
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                @auth
                    <div class="flex flex-wrap items-center gap-4 my-6">
                        <label for="direction" class="text-sm font-medium text-gray-700">Aktion:</label>

                        <select name="direction" id="direction"
                                class="w-48 appearance-none bg-white border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 px-4 py-2 shadow-sm">
                            <option value="add">+5 Minuten</option>
                            <option value="subtract">-5 Minuten</option>
                        </select>

                        <button type="submit"
                                class="inline-flex items-center bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white text-sm font-semibold px-5 py-2 rounded-lg shadow-md transition-all duration-150">
                            Ausgewählte bearbeiten
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M5 13l4 4L19 7"/>
                            </svg>
                        </button>
                    </div>

            </form>
        @endauth
    </div>

    <script>
        document.getElementById('select-all')?.addEventListener('click', function (e) {
            const checkboxes = document.querySelectorAll('input[name="performance_ids[]"]');
            checkboxes.forEach(cb => cb.checked = e.target.checked);
        });
    </script>
</x-app-layout>
