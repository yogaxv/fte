<?php

use App\Enums\JenisUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Volt\Component;

new class extends Component {
    public $tanggal_input;
    public $vendor_id;
    public $no_project_aktivasi;
    public $status_pekerjaan;
    public $kode_kendala;
    public $detail_kendala;
    public $estimasi_tarikan;
    public $estimasi_tracing;
    public $realisasi_tarikan;
    public $realisasi_tracing;


    public string $errorTitle = '';
    public array $errorMessages = [];


    public function addInput(): void
    {
        $this->errorTitle = '';
        $this->errorMessages = [];

        $validated = $this->validate([
            'date' => ['required', 'date'],
            'vendor_id' => ['required', 'string', 'max:255'],
            'number_project' => ['required', 'string', 'max:255'],
            'status_pekerjaan' => ['required', 'string', 'max:255'],
            'kode_kendala' => ['nullable', 'string', 'max:255'],
            'detail_kendala' => ['nullable', 'string'],
            'estimasi_tarikan' => ['nullable', 'date'],
            'estimasi_tracing' => ['nullable', 'date'],
            'realisasi_tarikan' => ['nullable', 'date'],
            'realisasi_tracing' => ['nullable', 'date'],
        ]);




        $this->dispatch('refreshProjectUpdateTable');

        // Reset input fields
        $this->tanggal_input = null;
        $this->vendor_id = null;
        $this->no_project_aktivasi = null;
        $this->status_pekerjaan = null;
        $this->kode_kendala = null;
        $this->detail_kendala = null;
        $this->estimasi_tarikan = null;
        $this->estimasi_tracing = null;
        $this->realisasi_tarikan = null;
        $this->realisasi_tracing = null;
    }
};
?>


<div xmlns:flux="http://www.w3.org/1999/html">
    <flux:modal.trigger name="add-user">
        <flux:button class="w-full" variant="primary" color="zinc">
            <flux:icon.plus/>
            Input
        </flux:button>
    </flux:modal.trigger>

    <flux:modal name="add-user" class="md:min-w-2xl" submit="addUser">
        <div class="space-y-6">
            <div class="py-2">
                <flux:heading size="lg">Data Form Input</flux:heading>
                <flux:text class="mt-2">Isi informasi di bawah ini.</flux:text>
            </div>


            @if (!empty($errorMessages))
                <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                     role="alert">
                    <svg class="shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <div>
                        <span class="font-medium">{{ $errorTitle }}</span>
                        <ul class="mt-1.5 list-disc list-inside">
                            @foreach ($errorMessages as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif


            <flux:input type="date" label="Tanggal Input" wire:model.defer="tanggal_input" />

            <flux:input label="ID Vendor" placeholder="ID Vendor" wire:model.defer="vendor_id" />

            <flux:input label="No. Project Aktivasi" placeholder="No. Project Aktivasi" wire:model.defer="no_project_aktivasi" />

            <flux:input label="Status Pekerjaan" placeholder="Status Pekerjaan" wire:model.defer="status_pekerjaan" />

            <flux:input label="Kode Kendala" placeholder="Kode Kendala" wire:model.defer="kode_kendala" />

            <flux:textarea style="resize:none" label="Detail Kendala" placeholder="Detail Kendala"
                           wire:model.defer="detail_kendala" />

            <flux:input label="Estimasi Tarikan" placeholder="Estimasi Tarikan" wire:model.defer="estimasi_tarikan" />

            <flux:input label="Estimasi Tracing" placeholder="Estimasi Tracing" wire:model.defer="estimasi_tracing" />

            <flux:input label="Realisasi Tarikan" placeholder="Realisasi Tarikan" wire:model.defer="realisasi_tarikan" />

            <flux:input label="Realisasi Tracing" placeholder="Realisasi Tracing" wire:model.defer="realisasi_tracing" />

            <div class="flex">
                <flux:spacer/>
                <flux:button wire:click="addInput" variant="primary">Simpan</flux:button>
            </div>
        </div>
    </flux:modal>
</div>

