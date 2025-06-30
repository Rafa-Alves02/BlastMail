 @props(['post' => null])


@php
    $method = $post ? 'POST': 'GET';
@endphp
 
 <form {{ $attributes->class(['gap-4 flex flex-row ']) }} method="{{ $method }}">
        @csrf
        @if ($method === 'GET')
            @method('POST')



        {{ $slot }}
    </form>