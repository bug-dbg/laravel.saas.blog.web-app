<x-app-layout>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 my-12 mx-12 w-2xl container px-2">
        <aside class="">
            @livewire('team-profile', ['team' => $team])
        </aside>
        <article class="">
            <div class="bg-white shadow rounded-lg mb-6">
                @livewire('posts', ['posts' => $posts])
            </div>
        </article>
    </div>
</x-app-layout>
