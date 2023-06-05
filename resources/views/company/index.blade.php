<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Company' }}
            </h2>
            <a href="{{ route('companies.create') }}" class="bg-gray-100 text-white-600 px-4 py-2 rounded-md">ADD</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="border-collapse table-auto w-full text-sm">
                        <thead>
                        <tr>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Name</th>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Address</th>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Email</th>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Website</th>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left"></th>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-center">Action</th>
                            <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach ($companies as $company)
                            <tr>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $company->name }}</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $company->address }}</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $company->email }}</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{ $company->website }}</td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    <a href="{{ route('companies.show', $company->id) }}"
                                       class="border border-blue-500 hover:bg-blue-500 hover:text-white px-4 py-2 rounded-md">SHOW</a>
                                </td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    <a href="{{ route('companies.edit', $company->id) }}"
                                       class="border border-yellow-500 hover:bg-yellow-500 hover:text-white px-4 py-2 rounded-md">EDIT</a>
                                </td>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                    {{-- add delete button using form tag --}}
                                    <form method="post" action="{{ route('companies.destroy', $company->id) }}"
                                          class="inline">
                                        @csrf
                                        @method('delete')
                                        <button
                                            class="border border-red-500 hover:bg-red-500 hover:text-white px-4 py-2 rounded-md">
                                            DELETE
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
