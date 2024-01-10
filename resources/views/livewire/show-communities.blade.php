<div x-data="{ show: false }" class="px-5 py-3 mt-7 w-9/12">
    <div class="flex justify-between">
        <div class="font-bold text-lg text-communitiesCustomGray">My Communities</div>
        <div class="flex items-center">
            <div class="h-fit bg-customRed text-xs text-center text-white px-3 rounded-xl leading-normal">{{count($OwnedCommunities)}}</div>
        </div>
    </div>
    <div>

        @if(count($OwnedCommunities) > 0)
            @php $maxCommunities = 4; @endphp

            @foreach($OwnedCommunities as $key => $community)
                <div x-show="{{ $key >= $maxCommunities ? 'show' : '' }}" class="flex mt-5">
                    <div class="mr-2">
                        <img class="w-10 h-10 rounded-full border border-gray-500" src="{{asset('assets/demo.jpg')}}">
                    </div>
                    <div>
                        <div class="font-medium text-communitiesCustomNamesGray">{{$community->name}}</div>
                        <div class="text-xs text-gray-500">{{ $community->users_count }} members</div>
                    </div>
                </div>
            @endforeach

            @if(count($OwnedCommunities) > $maxCommunities)
                <div x-show="!show" @click="show = true" class="cursor-pointer w-full border-customRed border-2 text-customRed font-bold rounded-lg text-center py-3 mt-5">
                    See all
                </div>
                <div x-show="show" @click="show = false" class="cursor-pointer w-full border-customRed border-2 text-customRed font-bold rounded-lg text-center py-3 mt-5">
                    See less
                </div>
            @endif
        @endif

    </div>
</div>
