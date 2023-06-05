<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi-bold text-xl text-gray-800 leading-tight">
            {{ isset($employee) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white py-4 px-4 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ isset($employee) ? route('employees.update', $employee->id) : route('employees.store') }}" class="mt-6 space-y-6">
                    @csrf
                    @isset($employee)
                        @method('put')
                    @endisset
                    <div>
                        <x-input-label for="first_name" :value="__('First Name')" />
                        <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="$employee->first_name ?? old('first_name')" required autofocus/>
                        <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                    </div>
                    <div>
                        <x-input-label for="last_name" :value="__('Last Name')" />
                        <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="$employee->last_name ?? old('last_name')" required autofocus/>
                        <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                    </div>
                    <div>
                        <x-input-label for="company_name" :value="__('Company Name')" />
                        <div class="col-span-3 sm:col-span-2">
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <select name="company_id" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                    <option disabled="disabled">Select Company Name</option>
                                    @foreach($companies as $company)
                                        <option value="{{ $company->id }}" {{ isset($employee) ? $employee->company_id == $company->id  ? 'selected' : '' : '' }}>
                                            {{ $company->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$employee->email ?? old('email')" required autofocus/>
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>
                    <div>
                        <x-input-label for="phone" :value="__('Phone')" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="$employee->phone ?? old('phone')" required autofocus/>
                    </div>
                    <div class="flex items-center gap-5">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
