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
                        <h2 class="text-lg font-medium text-gray-900">{{ 'Firstname' }}</h2>
                        <p class="mt-1 text-sm text-gray-600">{{ $employee->first_name }}</p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">{{ 'Lastname' }}</h2>
                        <p class="mt-1 text-sm text-gray-600">{{ $employee->last_name }}</p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">{{ 'Company Name' }}</h2>
                        <p class="mt-1 text-sm text-gray-600">{{ $employee->company->name }}</p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">{{ 'Email' }}</h2>
                        <p class="mt-1 text-sm text-gray-600">{{ $employee->email }}</p>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-lg font-medium text-gray-900">{{ 'Phone' }}</h2>
                        <p class="mt-1 text-sm text-gray-600">{{ $employee->phone }}</p>
                    </div>
                    <a href="{{ route('employees.index') }}" class="bg-blue-500 text-black px-4 py-2 rounded-md">BACK</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
