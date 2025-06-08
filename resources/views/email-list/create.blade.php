<x-layouts.app>
    <x-slot name="header">
        <x-h2>
            {{ __('Email List') }} > {{ __('Create new list') }}
        </x-h2>
    </x-slot>

    <x-card>
    <x-form: action="{{ route('email-list.store') }}" past enctype="multipart/form-data" method="POST">
        @csrf	
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />

        </div>

        <div>
            <x-input-label for="file" :value="__('List File')" />
            <x-text-input id="file" class="block mt-1 w-full" type="text" name="file"  accept= ".csv" :value="old('file')" autofocus />
            <x-input-error :messages="$errors->get('ListFile')" class="mt-2" />

        </div>
                <div class=" flex items-center space-x-4">
                    <x-secundary-button type="reset">
                        {{ __('Cancel') }}
                    </x-secundary-button>
                </div>

                <div class=" flex items-center space-x-4">
                    <x-primary-button type="submit" class="mb-4">
                        {{ __('Save') }}
                    </x-primary-button>
                </div>

            
    </x-form:>

    </x-card>
</x-layouts.app>