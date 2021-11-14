    <x-layout>
        <x-setting heading="Publish New Post">
            <form method="POST" action="/admin/posts"enctype="multipart/form-data">
                @csrf

                <x-form.input name="title" />

                <x-form.input name="thumbnail" type="file" />

                <x-form.textarea name="excerpt" rows="4" />

                <x-form.field>
                    <x-form.label name="category" />
                    <select name="category_id" id="category_id" class="relative focus:outline-none focus:ring">

                        @foreach(\App\Models\Category::all() as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >{{ ucwords($category->name) }}</option>
                        @endforeach

                    </select>
                    <x-form.error name="category" />
                </x-form.field>

                <x-form.textarea name="body" rows="10" />

                <x-form.button>Publish</x-form.button>

            </form>
        </x-setting>
    </x-layout>
