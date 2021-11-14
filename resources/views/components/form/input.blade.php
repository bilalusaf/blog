    @props(['name'])
    <x-form.field>

        <x-form.label name="{{ $name }}" />

        <input {{ $attributes(['class' => 'border border-gray-200 rounded p-2 w-full focus:outline-none focus:ring'])}}
               name="{{ $name }}"
               id="{{ $name }}"
               {{ $attributes(['value' => old($name)]) }}
        >

        <x-form.error name="{{ $name }}" />

    </x-form.field>
