<x-layout>
    @component('components.admin-panel', [
                'user' => auth()->user(),
                'heading' => "Manage Users"])
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <x-table.outer>
                            @foreach($users as $user)
                                <x-table.row>
                                    <x-table.data>
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                <a href="#">
                                                    {{ ucwords($user->name) }}
                                                </a>
                                            </div>
                                        </div>
                                    </x-table.data>
                                    <x-table.data>
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            @if($user->admin == 1)
                                                Admin
                                            @else
                                                User
                                            @endif
                                        </span>
                                    </x-table.data>
                                    <x-table.data class="text-right text-sm font-medium">
                                        <form method="POST" action="/admin/users/{{ $user->id }}">
                                            @csrf
                                            @method('PATCH')

                                            <input type="hidden" name="admin" value="{{ $user->admin }}">

                                            @if($user->admin == 1)
                                                <button class="text-xs text-blue-500 hover:text-blue-600">Remove Admin</button>
                                            @else
                                                <button class="text-xs text-blue-500 hover:text-blue-600">Make Admin</button>
                                            @endif
                                        </form>
                                    </x-table.data>
                                    <x-table.data class="text-right text-sm font-medium">
                                        <form method="POST" action="/admin/users/{{ $user->id }}">
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
