<x-layout>
    @component('components.admin-panel', [
                'user' => $user,
                'heading' => "Hello ".$user->profile->name.", please edit your profile"])

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg p-4">
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
    @endcomponent


</x-layout>
