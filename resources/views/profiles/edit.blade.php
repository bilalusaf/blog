<x-layout>
    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">
                Hello {{ $user->profile->name }}, please update your profile.
        </h1>
        <div class="flex">
            <aside class="w-48 flex-shrink-0">
                <h4 class="font-semibold mb-4">
                    Navigation
                </h4>
                <ul style="max-width: 75%">
                    <li>
                        <a href="/profiles/{{ $user->profile->id }}" class="{{ request()->is('profiles/'.$user->profile->id) ? 'text-blue-500' : '' }}">View Profile</a>
                    </li>
                    <li>
                        @if ($user->id == auth()->user()->id)
                            <a href="/profiles/{{ $user->profile->id }}/edit" class="{{ request()->is('profiles/'.$user->profile->id.'/edit') ? 'text-blue-500' : '' }}">Edit Profile</a>
                        @endif
                    </li>
                </ul>
            </aside>
            <main class="flex-1">
                <x-panel>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <form method="POST" action="/profiles/{{ $user->profile->id }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')

                                        <x-form.input name="name" :value="old('name', $user->profile->name)" />

                                        <x-form.input name="email" :value="old('email', $user->profile->email)" />

                                        <div class="flex mt-6">
                                            <div class="flex-1">
                                                <x-form.input name="image" type="file" :value="old('image', $user->profile->image)" />
                                            </div>
                                            <img src="{{ asset('storage/' . $user->profile->image) }}" alt="" class="rounded-xl ml-6" width="100">
                                        </div>

                                        <x-form.textarea name="description" rows="4">{{ old('description', $user->profile->description) }}</x-form.textarea>

                                        <x-form.button>Update</x-form.button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-panel>
            </main>
        </div>
    </section>


</x-layout>
