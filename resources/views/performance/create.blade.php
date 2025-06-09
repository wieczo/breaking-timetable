<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Neuer Performance-Eintrag</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded shadow-md">
            <form method="POST" action="{{ route('performances.store') }}" class="space-y-6">
                @include('performance._form', ['buttonText' => 'Erstellen'])
            </form>
        </div>
    </div>
</x-app-layout>
