@props(['messages'])

@if ($messages)
    <div {{ $attributes->merge(['class' => 'text-sm text-red-600 pt-4']) }}>
        @foreach ((array) $messages as $message)
            <h5 style="color: red; padding:5px">{{ $message }}</h5>
        @endforeach
    </div>
@endif
