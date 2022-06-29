@push('modals')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
@endpush
<x-jet-form-section submit="createBlogPost">
    <x-slot name="title">
        {{ __('Create Blog Post') }}
    </x-slot>

    <x-slot name="description">
        {{ __('You can create blog posts from here, hit post when you\'re done') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span">
            <x-jet-input-error for="title" class="mt-2" />
            <x-jet-input-error for="description" class="mt-2" />
            <x-jet-label for="title" value="{{ __('Upload Image') }}" />
            <x-jet-input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file" wire:model.defer="title" autocomplete="title" />
        </div>

        <!-- Title -->
        <div class="col-span-6 sm:col-span">
            <x-jet-label for="title" value="{{ __('Title') }}" />
            <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="title" autocomplete="title" />
        </div>

        <!-- Description -->
        <div class="col-span-6 sm:col-span" wire:model.debounce.365ms="description" wire:ignore>
            <x-jet-label for="description" value="{{ __('Description') }}" />
            <x-jet-input id="post" name="description" type="hidden" />
            <trix-editor input="post" style="min-height: 300px;"></trix-editor>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Post') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
@push('modals')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
@endpush
