<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi-bold text-xl text-gray-800 leading-tight">
            {{ 'Show' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">{{ 'Name' }}</h2>
                        <p class="mt-1 text-sm text-gray-600">{{ $company->name }}</p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">{{ 'Address' }}</h2>
                        <p class="mt-1 text-sm text-gray-600">{{ $company->address }}</p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">{{ 'Logo' }}</h2>
                        <p class="mt-1 text-sm text-gray-600">
                            <img class="h-64 w-128" src="{{ Storage::url($company->logo) }}" alt="{{ $company->name }}" srcset="">
                        </p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">{{ 'Website' }}</h2>
                        <p class="mt-1 text-sm text-gray-600">
                        <p class="mt-1 text-sm text-gray-600">{{ $company->website }}</p>
                    </div>
                    <a href="{{ route('companies.index') }}" class="bg-blue-500 text-black px-4 py-2 rounded-md">BACK</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
