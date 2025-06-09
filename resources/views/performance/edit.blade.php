<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Performance bearbeiten</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto bg-white p-8 rounded shadow-md">
            <form method="POST" action="{{ route('performances.update', $performance) }}" class="space-y-6">
                @method('PUT')
                @include('performance._form', ['buttonText' => 'Aktualisieren'])
            </form>
        </div>
    </div>
</x-app-layout>
