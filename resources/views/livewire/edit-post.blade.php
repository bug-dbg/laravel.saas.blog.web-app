@push('modals')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
@endpush
<form action="{{ route('blog.update-post', $posts->id) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- {{ dd(Auth::user()->team) }} --}}
 
    <x-slot name="title">
        {{ __('Edit Post') }}
    </x-slot>

    <x-slot name="description">
        {{ __('You can edit blog post from here, hit edit button when you\'re done') }}
    </x-slot>

        <!-- Title -->
        <div class="col-span-6 sm:col-span">
            <x-jet-label for="title" value="{{ __('Title') }}" />
            <x-jet-input id="title" type="text" class="mt-1 block w-full" value="{{ $posts->title }}"  autocomplete="title" />
            <x-jet-input-error for="title" class="mt-2" />
        </div>

        <!-- Description -->
        <div class="col-span-6 sm:col-span" wire:model.debounce.365ms="description" wire:ignore>
            <x-jet-label for="description" value="{{ __('Description') }}" />
            <x-jet-input id="post" name="description" type="hidden" />
            <trix-editor input="post" style="min-height: 300px;" value=" {{$posts->description}} ">{!!$posts->description!!}</trix-editor>
            <x-jet-input-error for="description" class="mt-2" />
        </div>

        <x-jet-button>
            {{ __('Edit post') }}
        </x-jet-button>

</form>
@push('modals')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
@endpush
