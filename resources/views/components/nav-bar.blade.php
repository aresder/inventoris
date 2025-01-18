<nav class="w-full bg-transparent top-0 sticky z-50">
    <div class="container mx-auto py-6 bg-transparent">
        <div
            class="md:w-[650px] bg-[#f8f5ed]/60 backdrop-blur-lg w-1/2 mx-auto flex justify-between items-center gap-6 border border-slate-500 rounded-full py-3 px-6">
            <div class="flex gap-4" x-data="{ scrollPosition: 0 }" @scroll.window="scrollPosition = window.scrollY">
                <x-nav-link href="#" id="home"
                    x-bind:class="scrollPosition < 635 ? 'text-red-500' : ''">Home</x-nav-link>
                <x-nav-link href="#features" id="feat"
                    x-bind:class="scrollPosition > 635 ? 'text-red-500' : ''">Features</x-nav-link>
            </div>
            <div>
                <a href="/login"
                    class="border border-slate-900 py-1 px-4 rounded-full bg-[#f6f7ed] hover:bg-[#fbeee8]">Sign
                    in</a>
            </div>
        </div>
    </div>
</nav>
