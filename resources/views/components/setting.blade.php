    @props(['heading'])
    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">
            {{ $heading }}
        </h1>
        <div class="flex">
            <aside class="w-48 flex-shrink-0">
                <h4 class="font-semibold mb-4">
                    Navigation
                </h4>
                <x-list.unordered>
                    <x-list.item>
                        <x-list.link link="admin/posts" name="All Posts" />
                    </x-list.item>
                    <x-list.item>
                        <x-list.link link="admin/posts/create" name="New Post" />
                    </x-list.item>
                    <x-list.item class="pt-2 border-t mt-2">
                        <x-list.link link="admin/categories" name="All Categories" />
                    </x-list.item>
                    <x-list.item>
                        <x-list.link link="admin/categories/create" name="New Category" />
                    </x-list.item>
                    <x-list.item class="pt-2 border-t mt-2">
                        <x-list.link link="admin/users" name="All Users" />
                    </x-list.item>
                </x-list.unordered>
            </aside>
            <main class="flex-1">
                <x-panel>
                    {{ $slot }}
                </x-panel>
            </main>
        </div>
    </section>
