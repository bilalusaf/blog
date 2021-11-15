    @auth
        <x-panel>

            <form action="/posts/{{ $post->slug }}/comments" method="POST">

                @csrf
                <heaader class="flex items-center">
                    <img src="{{ asset(auth()->user()->profile->profileImage()) }}"
                         alt="" width="" height="" class="rounded-full h-12 w-12 m-2"
                    >
                    <h2 class="ml-4">Want to participate?</h2>
                </heaader>

                <div class="mt-6">
                    <textarea name="body"
                              class="w-full text-sm focus:outline-none focus:ring"
                              rows="5"
                              placeholder="Quick, think of something to say!" required
                    ></textarea>
                    @error('body')
                    <span class="text-xs text-red-500">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
                    <x-form.button>
                        Post
                    </x-form.button>
                </div>

            </form>

        </x-panel>

    @else
                <p class="pb-6 font-semibold">
                    <a href="/register" class="hover:underline">Register</a>
                    or
                    <a href="/login" class="hover:underline">Log in</a>
                    to leave a comment.
                </p>
    @endauth
