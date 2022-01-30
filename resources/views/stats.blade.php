<x-app-layout title="Stats">
    <div class="flex min-h-screen max-w-3xl mx-auto">
        <div class="m-auto">
            <div class="mb-8">
                <img class="h-16 w-auto mx-auto" src="/logo.svg"/>
            </div>
            <livewire:shorten.stats-panel :link="$link" />

            <div class="flex justify-center mt-12 text-sm text-zinc-400">
                <a class="flex items-center hover:text-emerald-600" href="https://github.com/liamondo/shorten" target="_blank">
                    View on Github
                    <svg class="w-5 h-5 ml-0.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.75 12C4.75 10.7811 5.05079 9.63249 5.58219 8.62429L4.80156 6.0539C4.53964 5.19151 5.46262 4.44997 6.24833 4.89154L8.06273 5.91125C9.1965 5.17659 10.5484 4.75 12 4.75C13.4526 4.75 14.8054 5.17719 15.9396 5.91278L17.7624 4.8911C18.549 4.45014 19.4715 5.19384 19.2075 6.05617L18.42 8.62837C18.95 9.63558 19.25 10.7828 19.25 12C19.25 16.0041 16.0041 19.25 12 19.25C7.99594 19.25 4.75 16.0041 4.75 12Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
