    <x-layout>
        @component('components.admin-panel', [
                    'user' => auth()->user(),
                    'heading' => "Manage Posts"])
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <x-table.outer>
                                @foreach($posts as $post)
                                    <x-table.row>
                                        <x-table.data>
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="/posts/{{ $post->slug }}">
                                                        {{ ucwords($post->title) }}
                                                    </a>
                                                </div>
                                            </div>
                                        </x-table.data>
                                        <x-table.data class="text-right text-sm font-medium">
                                            <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </x-table.data>
                                        <x-table.data class="text-right text-sm font-medium">
                                            <form method="POST" action="/admin/posts/{{ $post->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-xs text-gray-400">Delete</button>
                                            </form>
                                        </x-table.data>
                                    </x-table.row>
                                    @endforeach
                            </x-table.outer>
                        </div>
                    </div>
                </div>
            </div>
        @endcomponent
    </x-layout>
