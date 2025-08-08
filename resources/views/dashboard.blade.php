<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="relative overflow-hidden rounded-xl border bg-white border-neutral-200 dark:border-neutral-700 p-5">
            <h1>Welcome to, Monitoring FTE!</h1>
        </div>
        <div class="relative overflow-hidden rounded-xl border bg-white border-neutral-200 dark:border-neutral-700 p-5">
            <div class="grid grid-cols-4 gap-4">
                <flux:field>
                    <flux:label>Company</flux:label>
                    <flux:select wire:model="industry" placeholder="Choose industry...">
                        <flux:select.option>Photography</flux:select.option>
                        <flux:select.option>Design services</flux:select.option>
                        <flux:select.option>Web development</flux:select.option>
                        <flux:select.option>Accounting</flux:select.option>
                        <flux:select.option>Legal services</flux:select.option>
                        <flux:select.option>Consulting</flux:select.option>
                        <flux:select.option>Other</flux:select.option>
                    </flux:select>
                    <flux:error name="username"/>
                </flux:field>
                <flux:field>
                    <flux:label>Work Area</flux:label>
                    <flux:select wire:model="industry" placeholder="Choose industry...">
                        <flux:select.option>Photography</flux:select.option>
                        <flux:select.option>Design services</flux:select.option>
                        <flux:select.option>Web development</flux:select.option>
                        <flux:select.option>Accounting</flux:select.option>
                        <flux:select.option>Legal services</flux:select.option>
                        <flux:select.option>Consulting</flux:select.option>
                        <flux:select.option>Other</flux:select.option>
                    </flux:select>
                    <flux:error name="username"/>
                </flux:field>
                <flux:field>
                    <flux:label>Status For Week</flux:label>
                    <flux:select wire:model="industry" placeholder="Choose industry...">
                        <flux:select.option>Photography</flux:select.option>
                        <flux:select.option>Design services</flux:select.option>
                        <flux:select.option>Web development</flux:select.option>
                        <flux:select.option>Accounting</flux:select.option>
                        <flux:select.option>Legal services</flux:select.option>
                        <flux:select.option>Consulting</flux:select.option>
                        <flux:select.option>Other</flux:select.option>
                    </flux:select>
                    <flux:error name="username"/>
                </flux:field>
                <flux:field>
                    <flux:label>Status For Month</flux:label>
                    <flux:select wire:model="industry" placeholder="Choose industry...">
                        <flux:select.option>Photography</flux:select.option>
                        <flux:select.option>Design services</flux:select.option>
                        <flux:select.option>Web development</flux:select.option>
                        <flux:select.option>Accounting</flux:select.option>
                        <flux:select.option>Legal services</flux:select.option>
                        <flux:select.option>Consulting</flux:select.option>
                        <flux:select.option>Other</flux:select.option>
                    </flux:select>
                    <flux:error name="username"/>
                </flux:field>
            </div>
        </div>

        <div class="relative items-end overflow-hidden rounded-xl border bg-white border-neutral-200 dark:border-neutral-700 p-5">
            <div class="grid gap-4 md:grid-cols-4">
                <!-- Total Company -->
                <div
                    class="flex justify-center items-center bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 rounded-xl px-4 py-6 shadow">
                    <div class="w-14 flex-1 justify-items-center-safe">
                        <flux:icon.users/>
                    </div>
                    <div class="w-64 flex-2">
                        <div class="text-xl font-medium text-gray-700">Total Company</div>
                        <div class="flex justify-center items-end">
                            <div class=" w-16 flex-0 text-3xl font-bold text-gray-900">18</div>
                            <div class="flex-1 text-sm text-gray-500 m-1">mitra</div>
                        </div>
                    </div>
                </div>

                <!-- Active Project -->
                <div
                    class="flex justify-center items-center bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 rounded-xl px-4 py-6 shadow">
                    <div class="w-14 flex-1 justify-items-center-safe">
                        <flux:icon.timer/>
                    </div>
                    <div class="w-64 flex-2">
                        <div class="text-xl font-medium text-gray-700">Active Project</div>
                        <div class="flex justify-center items-end">
                            <div class=" w-16 flex-0 text-3xl font-bold text-gray-900">18</div>
                            <div class="flex-1 text-sm text-gray-500 m-1">active</div>
                        </div>
                    </div>
                </div>

                <!-- Impediment -->
                <div
                    class="flex justify-center items-center bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 rounded-xl px-4 py-6 shadow">
                    <div class="w-14 flex-1 justify-items-center-safe">
                        <flux:icon.timer-off/>
                    </div>
                    <div class="w-64 flex-2">
                        <div class="text-xl font-medium text-gray-700">Impediment</div>
                        <div class="flex justify-center items-end">
                            <div class=" w-16 flex-0 text-3xl font-bold text-gray-900">18</div>
                            <div class="flex-1 text-sm text-gray-500 m-1">issued</div>
                        </div>
                    </div>
                </div>

                <!-- Data ABK -->
                <a href="{{ route('data-abk') }}">
                    <div
                        class="flex flex-col justify-center  items-center bg-zinc-200 dark:border-zinc-700 dark:bg-zinc-900 rounded-xl px-4 py-6 shadow">
                        <div class="text-3xl font-bold text-gray-900">
                            <flux:icon.database/>
                        </div>
                        <div class="mt-2 w-full flex items-center justify-center">
                            <div class="text-sm text-gray-700 font-bold">Data ABK</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div
            class="relative h-full flex-1 overflow-hidden bg-white rounded-xl border border-neutral-200 dark:border-neutral-700 p-5">
            <h3>Dashboard Status Vendor</h3>
            {{--            <livewire:dashboard-table />--}}
        </div>
    </div>
</x-layouts.app>
