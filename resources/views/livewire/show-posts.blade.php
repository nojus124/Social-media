<div class="w-11/12 animate-fade-up animate-once animate-duration-[350ms] animate-ease-linear ">
    @foreach($posts as $post)
        <div x-data="{SeeComments: false}" class="mt-7 w-full bg-white rounded-lg p-5 mb-7">
            <div class="flex space-x-1.5 text-sm mt-4">
                <img class="border-black border shadow-2xl shadow-black w-9 h-9 rounded-full object-cover" src="{{ optional($post->user)->profile_photo_url }}" alt="{{ optional($post->user)->name }}">
                <div>{{ optional($post->user)->name }}</div>
                <x-icon class="w-5 h-5" name="chevron-right"></x-icon>
                <div class="text-customRed">
                    {{ optional($post->community)->name ?? 'Community Name Not Found' }}
                </div>
            </div>
            <div class="mt-3">
                {{ $post->text }}
            </div>
            @if($post->image)
                <div class="mt-5">
                    <img class="rounded-lg" src="{{ asset($post->image) }}">
                </div>
            @endif
            <div x-data="{ open: false }">
                <div class="mt-3 flex space-x-1.5">
                    <x-icon @click="open = !open" class="h-6 cursor-pointer" name="chat-bubble-left-ellipsis"></x-icon>

                    <button type="button" wire:click="likePost({{ $post->id }})">
                        <x-icon class="h-6 cursor-pointer {{ $this->isPostLiked($post->id) ? 'text-red-500 fill-current' : '' }}" name="heart"></x-icon>
                    </button>

                    <div class="text-sm">
                        @if ($post->likes->count() > 0)
                            @php
                                $likedUsers = $post->likes->take(2)->pluck('user.name')->toArray();
                                $firstNames = array_map(function ($fullName) {
                                    return explode(' ', $fullName)[0];
                                }, $likedUsers);
                            @endphp
                            {{ implode(', ', $firstNames) }}
                            @if ($post->likes->count() > 2)
                                & {{ $post->likes->count() - 2 }} others like this
                            @endif
                        @else
                            <div class="select-none">
                                No likes
                            </div>
                        @endif
                    </div>
                </div>
                <div x-show="open">
                    <label for="commentInput" class="block text-sm font-medium text-gray-700">Your Comment:</label>
                    <div class="text-wrap mt-1 relative rounded-md shadow-sm">
                        <input
                            wire:model="message" type="text"
                            id="commentInput"
                            class="h-auto text-wrap py-2 px-4 pr-10 block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 border-gray-300 rounded-md focus:outline-none focus:border-gray-500 focus:shadow-outline-blue active:bg-gray-100"
                            required
                        >
                        <div class="justify-center absolute bottom-2 right-0 pr-3 flex items-center">
                            <!-- Add any icon or indicator for when the input is open -->
                            <!-- For example, a downward-facing arrow -->
                            <x-icon wire:click="CommentPost({{$post->id}})" class="cursor-pointer" name="paper-airplane"></x-icon>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-customRed font-bold mt-4 text-sm">@if(count($post->comments) >1) {{count($post->comments)}} @endif Comments:</div>
            <div class="w-11/12">
                @if(count($post->comments) > 0)
                    @php
                        $comment = $post->comments[0];
                    @endphp
                    <x-comment :comment="$comment" :hidden="false"></x-comment>
                    @for ($i = 1; $i < count($post->comments); $i++)
                        @php
                            $comment = $post->comments[$i];
                        @endphp
                        <x-comment :comment="$comment" :hidden="true"></x-comment>
                    @endfor
                @endif
            </div>
            @if(count($post->comments) > 1)
                <div x-show="!SeeComments" @click="SeeComments = true" class="mt-3 text-end text-customBlack text-sm cursor-pointer select-none">See all...</div>
                <div x-show="SeeComments" @click="SeeComments = false" class="mt-3 text-end text-customBlack text-sm cursor-pointer select-none">See less</div>
            @endif
        </div>
    @endforeach
</div>
