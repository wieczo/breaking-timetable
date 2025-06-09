<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 px-6">
        <h1 class="text-2xl font-bold mb-6">Alle Einträge</h1>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titel
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start
                    </th>
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
    $performance->status === 'active' ? 'bg-orange-100 hover:bg-orange-300' :
    ($performance->status === 'upcoming' ? 'bg-green-100 hover:bg-green-300' : 'odd:bg-gray-50 even:bg-white hover:bg-gray-100')
}}
                    ">
                        <td class="px-6 py-4  text-sm text-gray-700">{{ $performance->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ \Carbon\Carbon::parse($performance->start_time)->format('H:i') }}</td>

                        @auth
                            <td class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <a href="{{ route('performances.edit', $performance) }}">Bearbeiten</a></td>
                        @endauth
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
