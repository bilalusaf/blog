    <x-layout>
        @component('components.admin-panel', ['user' => auth()->user(), 'heading' => "Create New Post"])

            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf

                <x-form.input name="title" :value="old('title', $post->title)" />

                <div class="flex mt-6">
                    <div class="flex-1">
                        <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                    </div>
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
                </div>

                <x-form.textarea name="excerpt" rows="4">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>

                <x-form.field>
                    <x-form.label name="category" />
                    <select name="category_id" id="category_id" class="relative focus:outline-none focus:ring">

                        @foreach(\App\Models\Category::all() as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                            >{{ ucwords($category->name) }}</option>
                        @endforeach

                    </select>
                    <x-form.error name="category" />
                </x-form.field>

                <x-form.textarea name="body" rows="10">{{ old('body', $post->body) }}</x-form.textarea>

                <x-form.button>Publish</x-form.button>

            </form>
        @endcomponent
    </x-layout>
