<div>
    <div class="flex item-center justify-between mb-4">
        <a class="flex items-center" href="/">
            <svg class="h-4 w-4 mr-1 text-zinc-500 dark:text-zinc-400" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.25 6.75L4.75 12L10.25 17.25"></path>
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.25 12H5"></path>
            </svg>
            Back
        </a>
        <button wire:click="$refresh" wire:loading.attr="disabled" class="flex items-center disabled:opacity-50 disabled:cursor-not-allowed">
            <svg wire:loading.class="animate-spin" class="h-4 w-4 mr-1 text-zinc-500 dark:text-zinc-400" fill="none" viewBox="0 0 24 24">
                <path d="M6.87347 6.87299C9.70477 4.04169 14.2952 4.04169 17.1265 6.87299C19.9578 9.70429 19.9578 14.2947 17.1265 17.126C14.2952 19.9573 9.70477 19.9573 6.87347 17.126C6.23967 16.4922 5.74775 15.7703 5.39771 14.9996" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M4.75 19.249V15.749C4.75 15.1967 5.19772 14.749 5.75 14.749H9.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            Refresh
        </button>
    </div>
    <div class="bg-white dark:bg-zinc-800 shadow overflow-hidden sm:rounded-lg grow">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-zinc-900 dark:text-zinc-300">
                Link Stats For:
            </h3>
            <p class="mt-1 max-w-2xl text-sm text-zinc-500 dark:text-zinc-400">
                {{ $link->shortenedUrl() }}
            </p>
        </div>
        <div class="border-t border-zinc-200 dark:border-zinc-700 px-4 py-5 sm:p-0">
            <dl class="sm:divide-y sm:divide-zinc-200 dark:sm:divide-zinc-700">
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-zinc-500 dark:text-zinc-400">
                        Destination URL:
                    </dt>
                    <dd class="mt-1 text-sm text-zinc-900 dark:text-zinc-300 sm:mt-0 sm:col-span-2 break-all">
                        {{ $link->original_url }}
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-zinc-500 dark:text-zinc-400">
                        Times requested:
                    </dt>
                    <dd class="mt-1 text-sm text-zinc-900 dark:text-zinc-300 sm:mt-0 sm:col-span-2">
                        {{ $link->requested_count }}
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-zinc-500 dark:text-zinc-400">
                        Times followed:
                    </dt>
                    <dd class="mt-1 text-sm text-zinc-900 dark:text-zinc-300 sm:mt-0 sm:col-span-2">
                        {{ $link->used_count }}
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-zinc-500 dark:text-zinc-400">
                        Last requested:
                    </dt>
                    <dd class="mt-1 text-sm text-zinc-900 dark:text-zinc-300 sm:mt-0 sm:col-span-2">
                        {{ $link->updated_at }}
                    </dd>
                </div>
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-zinc-500 dark:text-zinc-400">
                        First requested:
                    </dt>
                    <dd class="mt-1 text-sm text-zinc-900 dark:text-zinc-300 sm:mt-0 sm:col-span-2">
                        {{ $link->created_at }}
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
