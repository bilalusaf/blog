    <x-layout>
        @component('components.admin-panel', [
                    'user' => auth()->user(),
                    'heading' => "Create New Category"])
            <form method="POST" action="/admin/categories" enctype="multipart/form-data">
                @csrf

                <x-form.input name="name" />

                <x-form.button>Publish</x-form.button>

            </form>
        @endcomponent
    </x-layout>
