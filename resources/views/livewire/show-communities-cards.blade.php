<div>
    <div class="flex justify-center mb-5">
        <div class="relative text-gray-600 focus-within:text-gray-400">
        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
            <button wire:click="searchCommunities" type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 text-gray-900">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </span>
            <input wire:model="search" type="search" name="q" class="py-2 w-96 text-sm text-gray-900 bg-white rounded-md pl-10 focus:outline-none focus:bg-white focus:text-gray-900" placeholder="Search..." autocomplete="off">
        </div>
    </div>
    @if(count($communities) >0)
    <div class="grid xs:grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 px-4">
            @foreach($communities as $community)
            <x-community-card :joined="auth()->user()->communities->contains($community->id)"
                              communityID="{{ $community->id }}"
                              communityName="{{ $community->name }}"
                              communityDescription="{{ $community->description }}" />
            @endforeach
                <x-confirmation-modal wire:model="confirmingUserLeaving">
                    <x-slot name="title">
                        Leaving community
                    </x-slot>

                    <x-slot name="content">
                        Are you sure you want to leave community?
                    </x-slot>

                    <x-slot name="footer">
                        <x-secondary-button wire:click="$toggle('confirmingUserLeaving')" wire:loading.attr="disabled">
                            Nevermind
                        </x-secondary-button>

                        <x-danger-button class="ml-2" wire:click="leaveCommunity" wire:loading.attr="disabled">
                            Leave group
                        </x-danger-button>
                    </x-slot>
                </x-confirmation-modal>
    </div>
    @else
        <div class="flex justify-center text-customRed font-semibold">Sorry there are no communites at the moment!</div>
    @endif
</div>
