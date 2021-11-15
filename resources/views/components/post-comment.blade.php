    @props(['comment'])

    <x-panel class="bg-gray-50">
        <article class="flex space-x-4">
            <div class="flex-shrink-0">
                <img src="{{ asset($comment->author->profile->profileImage() ?? '/storage/default/profile.jpg') }}" alt="" width="" height="" class="rounded-xl h-16 w-16 m-2">
            </div>

            <div>
                <header class="mb-4">
                    <h3 class="font-bold">{{ $comment->author->username }}</h3>
                    <p class="text-xs">
                        Posted
                        <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time>
                    </p>
                </header>
                <p>
                    {{ $comment->body }}
                </p>
            </div>
        </article>
    </x-panel>

