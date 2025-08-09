<?php

namespace App\Livewire;

use App\Models\ProjectUpdate;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\WireLinkColumn;

class ProjectUpdateTable extends DataTableComponent
{
    protected $model = ProjectUpdate::class;

    protected $listeners = ['refreshProjectUpdateTable' => '$refresh'];

    /**
     * @inheritDoc
     */
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setSearchIcon('heroicon-m-magnifying-glass');

        $this->setSearchIconAttributes([
            'class' => 'h-4 w-4',
            'style' => 'color: #000000',
        ]);
    }

    public function builder(): Builder
    {
        return ProjectUpdate::query()
            ->with(['vendor', 'project']);
    }

    public function delete($id): void
    {
        $user = ProjectUpdate::find($id);

        $user->delete();

        $this->dispatch('refreshProjectUpdateTable')->self();
    }

    /**
     * @inheritDoc
     */
    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Vendor")
                ->format(fn($row) => '<strong>' . e(optional($row->vendor)->name ?? '-') . '</strong>')
                ->html(),
            Column::make("Project")
                ->format(fn($row) => '<strong>' . $row->project->contract_number . '</strong>')
                ->html(),
            Column::make("Job Status", "job_status")
                ->sortable()
                ->searchable(),
            Column::make("Problem Status", "problem_status")
                ->sortable()
                ->searchable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
            WireLinkColumn::make("Delete Item")
                ->title(fn($row) => 'Delete Item')
                ->confirmMessage('Are you sure you want to delete this item?')
                ->action(fn($row) => 'delete("' . $row->id . '")')
                ->attributes(fn($row) => [
                    'class' => 'focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900',
                ]),
        ];
    }
}
