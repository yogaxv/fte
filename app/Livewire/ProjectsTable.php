<?php

namespace App\Livewire;

use App\Enums\StatusPekerjaan;
use App\Models\Project;
use App\Models\User;
use App\Models\Vendor;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\WireLinkColumn;

class ProjectsTable extends DataTableComponent
{
    protected $model = Project::class;

    protected $listeners = ['refresh-vendor-table' => '$refresh'];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchIcon('heroicon-m-magnifying-glass');

        $this->setSearchIconAttributes([
            'class' => 'h-4 w-4',
            'style' => 'color: #000000',
        ]);
    }


    public function delete($id): void
    {
        $vendor = Vendor::with('projects')->find($id);
        $user = User::find($vendor->user_id);

        if ($vendor->projects->count() > 0){
            return;
        }

        $userManagement = new \WorkOS\UserManagement();

        $userManagement->deleteUser($user->workos_id);
        $user->delete();

        $this->dispatch('refresh-vendor-table')->self();
    }

    public function columns(): array
    {
        return [
            Column::make('Type')
                ->format(function ($value, $row, Column $column) {
                    $status = StatusPekerjaan::from($row->type);
                    $desc = $status->description();
                    $class = $status->badgeColor();

                    return "<span class=\"$class text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm\">$desc</span>";
                })
                ->html(),

            Column::make("No. PA", "pa_number")
                ->sortable(),
            Column::make("No. Kontrak", "contract_number"),
            Column::make("Pelanggan", "customer_name")
                ->sortable()
                ->searchable(),
            Column::make("Alamat", "customer_address")
                ->sortable()
                ->searchable(),
            Column::make("ptl"),
            Column::make("Tgl Disposisi", 'disposition_date'),
            Column::make("Tgl Target", 'target_date'),
            Column::make("vendor", 'vendor.name'),
            Column::make("Created at", "created_at")
                ->sortable(),
        ];
    }
}
