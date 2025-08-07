<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-5">
            <h1>Welcome to, Monitoring FTE!</h1>
        </div>
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20"/>
            </div>
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20"/>
            </div>
            <div
                class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern
                    class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20"/>
            </div>
        </div>
        <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-5">
            <div class="grid gap-4 md:grid-cols-4">
                <!-- Total Company -->
                <div class="flex flex-col justify-center items-start bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 rounded-xl px-4 py-6 shadow">
                    <div class="text-3xl font-bold text-gray-900">72</div>
                    <div class="text-sm text-gray-500">mitra</div>
                    <div class="mt-2 flex items-center text-sm text-gray-700 font-medium">
                        <svg class="w-6 h-6 mr-2 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M9 20H4v-2a3 3 0 015.356-1.857M15 11a3 3 0 100-6 3 3 0 000 6zm-6 0a3 3 0 100-6 3 3 0 000 6zm6 8H9v-2a3 3 0 016 0v2z"/>
                        </svg>
                        Total Company
                    </div>
                </div>

                <!-- Active Project -->
                <div class="flex flex-col justify-center items-center bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 rounded-xl px-4 py-6 shadow text-center">
                    <div class="text-3xl font-bold text-gray-900">102</div>
                    <div class="text-sm text-gray-500">active</div>
                    <div class="mt-2 w-full flex items-center justify-center">
                        <div class="text-sm font-medium text-gray-700">Active Project</div>
                        <div class="ml-2 text-xs text-gray-500">60%</div>
                    </div>
                </div>

                <!-- Impediment -->
                <div class="flex flex-col justify-center items-center bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 rounded-xl px-4 py-6 shadow text-center">
                    <div class="text-3xl font-bold text-gray-900">28</div>
                    <div class="text-sm text-gray-500">issued</div>
                    <div class="mt-2 w-full flex items-center justify-center">
                        <div class="text-sm font-medium text-gray-700">Impediment</div>
                        <div class="ml-2 text-xs text-gray-500">50%</div>
                    </div>
                </div>

                <!-- Data ABK -->
                <div class="flex flex-col justify-center  items-center bg-zinc-200 dark:border-zinc-700 dark:bg-zinc-900 rounded-xl px-4 py-6 shadow">
                    <div class="text-3xl font-bold text-gray-900">
                        <svg class="w-6 h-6 mr-2 text-gray-600" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M9 20H4v-2a3 3 0 015.356-1.857M15 11a3 3 0 100-6 3 3 0 000 6zm-6 0a3 3 0 100-6 3 3 0 000 6zm6 8H9v-2a3 3 0 016 0v2z"/>
                        </svg>
                    </div>
                    <div class="mt-2 w-full flex items-center justify-center">
                        <div class="text-sm font-medium text-gray-700">Data ABK</div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20"/>
        </div>
    </div>
</x-layouts.app>
