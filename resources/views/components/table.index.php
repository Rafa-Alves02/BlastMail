@props([
    'heders',
    'body'
    ]) 
 
 
 <div class="overflow-hidden w-full overflow-x-auto rounded-radius border border-outline dark:border-outline-dark">
            <table class="w-full text-left text-sm text-on-surface dark:text-on-surface-dark">
                <thead class="border-b border-outline bg-surface-alt text-sm text-on-surface-strong dark:border-outline-dark dark:bg-surface-dark-alt dark:text-on-surface-dark-strong">
                    <tr>
                        @foreach ($heders as $heder)
                         <th scope="col" class="p-4">{{$heder}}</th>
                        @endforeach
                       
                        <th scope="col" class="p-4">{{ __('Email List') }}</th>
                        <th scope="col" class="p-4">{{ __('#Subscribers') }}</th>
                        <th scope="col" class="p-4">{{__('Action')}}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-300 dark:divide-slate-700">
                   {{ $body }}
                </tbody>
            </table>
        </div>