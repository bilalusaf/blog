    @props(['name'])

    <x-form.field>
        <x-form.label name="{{ $name }}" />
        <textarea {{ $attributes(['class' => 'border border-gray-200 rounded p-2 w-full focus:outline-none focus:ring'])}}
                  name="{{ $name }}"
                  id="{{ $name }}"
                  {{ $attributes }}
                  required
        >{{ $slot ?? old($name) }}</textarea>
        <x-form.error name="{{ $name }}" />
    </x-form.field>
