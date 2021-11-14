    <x-layout>
        @component('components.admin-panel', [
            'user' => auth()->user(),
            'heading' => "Edit Category: " . ucwords($category->name)])
            <form method="POST" action="/admin/categories/{{ $category->id }}"enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <x-form.input name="name" :value="old('name', $category->name)" />

                <x-form.button>Update</x-form.button>

            </form>
        @endcomponent
    </x-layout>
