<div class="">
    @if(is_null($requestedLink))
        <p class="text-center text-lg text-zinc-500 dark:text-zinc-300 font-medium mb-12">Enter the link to want to shorten below.</p>
        <form wire:submit.prevent="submit" class="">
            <div class="flex rounded-md shadow-sm">
                <div class="relative flex items-stretch flex-grow focus-within:z-10">
                    <input wire:model="link" class="text-3xl bg-white text-zinc-800 dark:bg-zinc-700 dark:text-zinc-50 px-4 py-2 rounded-l-md" type="text" placeholder="google.com"/>
                </div>
                <button wire:loading.delay.attr="disabled" type="submit" class="flex items-center bg-white text-zinc-400 dark:bg-zinc-700 dark:text-zinc-300 hover:bg-zinc-200 hover:dark:bg-zinc-600 px-4 py-2 rounded-r-md disabled:opacity-50 disabled:cursor-not-allowed">
                    <svg wire:loading.delay.remove class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 12H4.75"></path>
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.75 6.75L19.25 12L13.75 17.25"></path>
                    </svg>
                    <svg wire:loading.delay class="h-8 w-8 animate-spin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M12 4.75V6.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M17.1266 6.87347L16.0659 7.93413" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M19.25 12L17.75 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M17.1266 17.1265L16.0659 16.0659" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M12 17.75V19.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M7.9342 16.0659L6.87354 17.1265" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M6.25 12L4.75 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M7.9342 7.93413L6.87354 6.87347" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>

            @error('link')
            <span class="text-red-400 dark:text-red-600 text-sm mt-1">{{ $message }}</span>
            @enderror
        </form>
    @else
        <p class="text-center text-lg text-zinc-500 dark:text-zinc-300 font-medium mb-12">Heres your short link!</p>
        <div class="flex rounded-md shadow-sm">
            <div class="relative flex items-stretch flex-grow focus-within:z-10">
                <input value="{{ $requestedLink }}" class="text-3xl bg-white text-zinc-800 dark:bg-zinc-700 dark:text-zinc-50 px-4 py-2 rounded-l-md" type="text" readonly/>
            </div>
            <button
                x-data="{ link: '{{ $requestedLink }}'}"
                @click="window.navigator.clipboard.writeText(link); $refs.text.innerText = 'Copied!'; setTimeout(() => { $refs.text.innerText = 'Copy' }, 2000);"
                type="submit"
                class="flex items-center bg-white text-lg font-bold text-zinc-400 dark:bg-zinc-700 dark:text-zinc-300 hover:bg-zinc-200 hover:dark:bg-zinc-600 px-4 py-2 rounded-r-md disabled:opacity-50 disabled:cursor-not-allowed"
            >
                <span x-ref="text">Copy</span>
                <svg class="h-6 w-6 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.75 13.25L18 12C19.6569 10.3431 19.6569 7.65685 18 6V6C16.3431 4.34315 13.6569 4.34315 12 6L10.75 7.25"></path>
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.25 10.75L6 12C4.34315 13.6569 4.34315 16.3431 6 18V18C7.65685 19.6569 10.3431 19.6569 12 18L13.25 16.75"></path>
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.25 9.75L9.75 14.25"></path>
                </svg>
            </button>
        </div>
        <button wire:click="$set('requestedLink', null)" class="text-zinc-500 dark:text-zinc-400 text-sm mt-2">
            Get another code
        </button>
    @endif
</div>
