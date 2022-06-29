<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog Details') }}
        </h2>
    </x-slot>

    <div class="pt-6">
        <div class="flex justify-center h-screen">
            <div class=" ">
                @livewire('details', ['posts' => $posts])
            </div>
        </div>
        <div class="items-center w-full max-w-md px-6 mx-auto lg:w-1/6">
                <div class="grid grid-cols-1 gap-6 my-4 px-4 md:px-6 lg:px-8">
                    @livewire('write-comment', ['posts' => $posts])
                    @livewire('comments', ['comments' => $comments])
                </div>
        </div>
    </div>
</x-app-layout>
