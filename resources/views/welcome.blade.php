<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <style>
    </style>
</head>
<body>
<div class="flex flex-col h-screen w-full items-center justify-center bg-[#f3f4f6] animate-fade-down animate-once animate-duration-[1000ms] animate-ease-in-out animate-normal">
    <div class="bg-[#f9fafb] rounded-lg shadow-lg p-10 w-full max-w-lg">
        <h1 class="mb-6 text-5xl font-bold text-[#1f2937] ">
            Welcome to <span class="text-[#f33c4c]">Universe</span>
        </h1>
        <p class="mb-4 text-lg text-[#4b5563]">
            Your journey to the stars begins here. Connect with us to stay updated.
        </p>
        <blockquote class="mb-4 text-lg italic text-[#6b7280]">
            "The universe is full of magical things patiently waiting for our wits to grow sharper." - Eden Phillpotts
        </blockquote>
        <button class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 h-10 px-4 py-2 bg-[#f33c4c] text-[#1f2937] hover:bg-[#1f2937] hover:text-white font-bold mt-6 w-full">
            <a href="{{route('register')}}">Get Started</a>
        </button>
    </div>
</div>

<script>
</script>
</body>
</html>
