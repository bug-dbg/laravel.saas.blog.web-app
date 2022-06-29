<div class='items-center justify-center'>  
    <div class="col-span-6 sm:col-span">
        <x-jet-label for="title" value="{{ __('Write a Comment') }}" />
        <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:keydown.enter="addComment( {{ $posts->id }} )" wire:model="newComment" autocomplete="comment" />
        <x-jet-input-error for="title" class="mt-2" />
    </div>
</div>