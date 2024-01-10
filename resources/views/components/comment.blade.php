@props(['comment', 'hidden'])
    <div {!! $hidden ? 'x-show="SeeComments"' : '' !!} class="animate-fade-right animate-once animate-duration-[450ms] animate-ease-linear flex space-x-1.5 bg-customGray rounded-lg p-3 mt-3">
        <img class="border-black border shadow-2xl shadow-black w-6 h-6 rounded-full object-cover" src="{{ optional($comment->user)->profile_photo_url }}" alt="{{ optional($comment->user)->name }}">
        <div class="flex-grow">
            <div class="text-customRed text-sm font-bold">{{ optional($comment->user)->name }}</div>
            <div>{{ $comment->text }}</div>
            <div class="flex space-x-2 mt-1 text-gray-400 text-xs">
                <x-icon class="h-6 cursor-pointer text-red-500 fill-current" name="heart"></x-icon>
                <div class="w-full flex justify-end">
                    <div class="text-xs text-gray-400">
                        {{ optional($comment->created_at)->format('m-d H:i') }}
                    </div>
                </div>
            </div>
        </div>
    </div

@isset($message)
    {{ $message }}
@endisset
