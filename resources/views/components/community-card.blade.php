<div class=" bg-white border-customGray rounded-lg p-6 px-10">
    <div class="text-black text-2xl font-bold">{{$communityName}}</div>
    <div class="text-sm text-communitiesCustomGray font-light mt-2">{{$communityDescription}}</div>
    <div class="flex mt-14">
        @if($joined)
            <div class="w-full flex items-center">
                    <div wire:click="toggleCommunity({{$communityID}})" class="w-fit bg-customRed text-white font-semibold rounded-lg py-2 px-3 active:bg-red-400 cursor-pointer select-none">
                        Leave
                    </div>
            </div>
        @else
            <div class="w-full flex justify-end">
                <div wire:click="joinCommunity({{$communityID}})" class="w-fit bg-black text-white rounded-md px-4 py-2 select-none cursor-pointer hover:bg-gray-800 active:bg-gray-700">
                    Join
                </div>
            </div>
        @endif

    </div>
</div>
