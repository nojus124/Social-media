<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Home
        </h2>
    </x-slot>
    <div class="flex w-full h-full">
        <div class="w-full flex justify-center">
            <div class="w-8/12 flex justify-center">
                <livewire:show-posts />
            </div>
            <div class="w-3/12 flex justify-center">
                <livewire:show-people-you-may-know :peoples="$peoples" />
            </div>
        </div>
    </div>
</x-app-layout>
