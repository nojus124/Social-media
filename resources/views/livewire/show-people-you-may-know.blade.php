<div class="p-5 text-sm font-medium bg-white mt-5 w-11/12 rounded-xl h-fit">
    <div class="text-customRed w-full">People you may know</div>
    @if(count($Peoples) > 0)
        @foreach($Peoples as $People)
            <div class="flex mt-5">
                <img class="w-10 h-10 mr-1 object-cover border border-gray-400 rounded-full" alt="demo" src="{{ asset($People->profile_photo_url) }}">
                <div class="flex justify-between w-full">
                    <div>
                        <div class="font-medium text-communitiesCustomNamesGray">{{ $People->name }}</div>
                        <div class="text-xs text-gray-500">Following {{count(json_decode($People->friends))}}</div>
                    </div>
                    <div x-data="{ Followed: false }" class="text-communitiesCustomGray">
                        <div x-show="!Followed" class="cursor-pointer text-communitiesCustomGray flex flex-col items-center" wire:click.prevent="addFriend({{ $People->id }})">
                            <x-icon @click="Followed = true" name="plus-circle"></x-icon>
                            <div>Follow</div>
                        </div>
                        <div x-show="Followed" class="cursor-pointer text-communitiesCustomGray flex flex-col items-center">
                            <x-icon name="check-circle"></x-icon>
                            <div>Followed</div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="flex mt-5">
            <div class="flex justify-between w-full text-sm text-gray-500">Sorry, there are no users at the moment to offer</div>
        </div>
    @endif
</div>
