<x-layout>
    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">
            @if ($user->id == auth()->user()->id)
            Hello {{ $user->profile->name }}, welcome to your profile.
            @else
            {{ $user->name }}'s Profile.
            @endif
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
                                    <div class="grid grid-cols-12">
                                            <div class="grid col-span-4">
                                                <img src="{{ asset('storage/' . $user->profile->image) }}" alt="" width="" height="" class="rounded-full h-24 w-24 m-2">
                                            </div>
                                            <div class="grid col-span-8 pt-2">
                                                <div class="grid grid-rows-3">
                                                    <div class="grid row-span-1">
                                                        <div class="grid grid-cols-1 col-auto">
                                                            {{ $user->profile->name ?? $user->name }}
                                                        </div>
                                                    </div>
                                                    <div class="grid row-span-1">
                                                        <div class="grid grid-cols-1 col-auto">
                                                            {{ $user->profile->email ?? $user->email }}
                                                        </div>
                                                    </div>
                                                    <div class="grid row-span-1">
                                                        <div class="grid grid-cols-1 col-auto">
                                                            {{ $user->profile->description ?? 'I will soon update my profile to add a little something about myself.' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-panel>
            </main>
        </div>
    </section>


</x-layout>
