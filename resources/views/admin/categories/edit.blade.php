    <x-layout>
        <x-setting :heading="'Edit Category: ' . ucwords($category->title)">
            <form method="POST" action="/admin/categories/{{ $category->id }}"enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <x-form.input name="name" :value="old('name', $category->name)" />

                <x-form.button>Update</x-form.button>

            </form>
        </x-setting>
    </x-layout>
