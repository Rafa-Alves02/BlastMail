<x-layouts.app>
    <x-slot name="header">

        <x-h2>

            {{ __('Email Lists') }}


        </x-h2>

    </x-slot>

    <x-card>

        @unless($emailLists->isnotEmpty())

        <x-table :headers="[]">
            <x-slot:name:"body">
                @foreach ($emailLists as $list)
                <tr>
                    <x-td class="p-4">{{ $list->id }}</x-td>
                    <x-td class="p-4">{{ $list->name }}</x-td>
                    <x-td class="p-4">{{ $list->subscribers->count() }}</x-td>
                    <x-td class="p-4">{{}} 
                    </x-td>
                </tr>
                @endforeach
                </x-slot>

        </x-table>

        <div class="overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
            <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
                <thead class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
                    <tr>
                        <th scope="col" class="p-4">#c</th>
                        <th scope="col" class="p-4">{{ __('Email List') }}</th>
                        <th scope="col" class="p-4">{{ __('#Subscribers') }}</th>
                        <th scope="col" class="p-4">{{__('Action')}}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
                    @foreach ($emailLists as $list)
                    <tr>
                        <td class="p-4">{{ $list->id }}</td>
                        <td class="p-4">{{ $list->name }}</td>
                        <td class="p-4">{{ $list->subscribers->count() }}</td>
                        <td class="p-4">{{}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @else
        <div class="flex justify center">

            <x-link-button href="{{ route('email-list.create') }}">
                {{ __('Create your first email list') }}
            </x-link-button>

        </div>
        @endunless


    </x-card>

</x-layouts.app>