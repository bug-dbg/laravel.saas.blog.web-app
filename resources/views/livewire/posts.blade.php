<div class="p-4 border-t border-gray-200 md:border-t-0 md:border-l">
  @forelse ($posts as $post)
  <div class="grid grid-cols-1 gap-6 my-6 px-4 md:px-6 lg:px-8">
    <div class="max-w-xl mx-auto px-4 py-4 bg-white shadow-md rounded-lg">
      <div class="py-2 flex flex-row items-center justify-between">
        <div class="flex flex-row px-2 py-3 mx-3">
          <div class="w-auto h-auto rounded-full">
              <img class="w-12 h-12 object-cover rounded-full shadow cursor-pointer" alt="User avatar" src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2000&amp;q=80">
          </div>
          <div class="flex flex-col mb-2 ml-4 mt-1">
              <div class="text-gray-600 text-sm font-semibold">{{$post->user->name}}</div>
              <div class="flex w-full mt-1">
                <a href="{{ route('blog.team-profile', $post->team->id) }}">
                  <div class="text-blue-700 font-base text-xs mr-1 cursor-pointer">
                    {{ $post->team->name }}
                  </div> 
                </a>    
              </div>
          </div>
        </div>
        <div class="flex flex-row items-center">
          <div class="flex flex-col mb-2 ml-4 mt-1">
            <x-jet-dropdown align="left" width="48">
              <x-slot name="trigger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                  <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                </svg>
              </x-slot>
                <x-slot name="content">
                  <!-- Account Management -->
                  <div class="block px-4 py-2 text-xs text-gray-400">
                      {{ __('Manage Post') }}
                  </div>

                  <x-jet-dropdown-link href="{{ route('blog.edit-post', $post->id) }}">
                    {{ __('Edit') }}
                  </x-jet-dropdown-link>

                  <x-jet-dropdown-link href="{{ route('blog.delete-post', $post->id) }}">
                    {{ __('Delete') }}
                  </x-jet-dropdown-link>
              </x-slot>
            </x-jet-dropdown>
            <p class="text-xs font-semibold text-gray-500">{{$post->publication_date->diffForHumans()}}</p>
          </div>
        </div>
      </div>
      <div class="mt-2">
        <img class="object-cover w-full rounded-lg" src="https://images.unsplash.com/photo-1586398710270-760041494553?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1280&q=80" alt="">
        <div class="py-2 flex flex-row items-center">
          <button class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg ml-3">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5"><path d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
            <span class="ml-1">340</span>
          </button>
          <a href="{{ route('blog.details', $post->id) }}">
            <button class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg ml-3">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
              <span class="ml-1">{{$post->comments->count()}}</span>
            </button>
          </a>
          <button class="flex flex-row items-center focus:outline-none focus:shadow-outline rounded-lg ml-3">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5"><path d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path></svg>
            <span class="ml-1">340</span>
          </button>
        </div>

      </div>
      <div class="py-2">
        <div class="mt-4 mb-6">
            <div class="mb-3 text-xl font-bold">
              <a href="{{ route('blog.details', $post->id) }}">
                  {{$post->title}}
              </a>
            </div>
            {{-- <p class="leading-snug">{{\Illuminate\Support\Str::limit(strip_tags($post->description), 250, $end='...')}} --}}
            <p class="leading-snug">{!!$post->description!!}
        </div>
      </div>
    </div>
    @empty
    <br />
    There are no posts in this blog yet!
    @endforelse
  </div>
</div>