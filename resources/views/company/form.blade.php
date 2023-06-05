<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semi-bold text-xl text-gray-800 leading-tight">
            {{ isset($company) ? 'Edit' : 'Create' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white py-4 px-4 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="post" action="{{ isset($company) ? route('companies.update', $company->id) : route('companies.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                    @csrf
                    @isset($company)
                        @method('put')
                    @endisset
                    <div>
                        <x-input-label for="name" :value="__('Company Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$company->name ?? old('name')" required autofocus/>
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>
                    <div>
                        <x-input-label for="address" :value="__('Company Address')" />
                        <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="$company->address ?? old('address')" required autofocus/>
                        <x-input-error class="mt-2" :messages="$errors->get('address')" />
                    </div>
                    <div>
                        <x-input-label for="email" :value="__('Company Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$company->email ?? old('email')" required autofocus/>
                        <x-input-error class="mt-2" :messages="$errors->get('email')" />
                    </div>
                    <div>
                        <x-input-label for="logo" value="Logo" />
                        <label class="block mt-2">
                            <span class="sr-only">Choose image</span>
                            <input type="file" id="logo" name="logo" accept=".jpg, .jpeg, .png"
                                   class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semi-bold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100
                                "/>
                        </label>
                        <div class="shrink-0 my-2">
                            <img id="logo_preview" class="h-64 w-128 object-cover rounded-md"
                                 src="{{ isset($company) ? Storage::url($company->logo) : '' }}"/>
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('logo')" />
                    </div>
                    <div>
                        <x-input-label for="website" :value="__('Company website')" />
                        <x-text-input id="website" class="block mt-1 w-full" type="text" name="website" :value="$company->website ?? old('website')" required autofocus/>
                    </div>
                    <div class="flex items-center gap-5">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // create onchange event listener for featured_image input
        document.getElementById('logo').onchange = function(evt) {
            const [file] = this.files
            if (file) {
                // if there is an image, create a preview in featured_image_preview
                document.getElementById('logo_preview').src = URL.createObjectURL(file)
            }
        }
    </script>
</x-app-layout>
