<?php

namespace App\Livewire;

use App\Enums\StatusPekerjaan;
use App\Enums\TipeKendala;
use App\Models\ProjectUpdate;
use App\Models\Vendor;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\WireLinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

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

        $this->setFilterLayoutSlideDown();
        $this->setBulkActions([
            'exportSelected' => 'Export',
        ]);
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
            Column::make("Vendor", "vendor.code")
                ->sortable()
                ->searchable(),
            Column::make("Project", "project.pa_number")
                ->sortable()
                ->searchable(),
            Column::make("Tanggal", "date")
                ->sortable()
                ->searchable(),
            Column::make("Job Status", "job_status")
                ->format(function ($value, $row, Column $column) {
                    $status = StatusPekerjaan::from($row->job_status);
                    $desc = $status->description();
                    $class = $status->badgeColor();

                    return "<span class=\"$class text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm\">$desc</span>";
                })
                ->html()
                ->sortable()
                ->searchable(),
            Column::make("Problem Status", "problem_status")
                ->format(function ($value, $row, Column $column) {
                    $problem = TipeKendala::from($row->problem_status);
                    $desc = $problem->description();

                    return "<span class=\"text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm\">$desc</span>";
                })
                ->html()
                ->sortable()
                ->searchable(),
            Column::make("Detail Kendala", "problem_details")
                ->searchable(),
            Column::make("Est. Tarikan", "estimated_pull")
                ->sortable()
                ->searchable(),
            Column::make("Real Tarikan", "actual_pull")
                ->sortable()
                ->searchable(),
            Column::make("Est. Tracing", "estimated_tracing")
                ->sortable()
                ->searchable(),
            Column::make("Real Tracing", "actual_tracing")
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

    public function filters(): array
    {
        return [
            DateRangeFilter::make('Tanggal')
                ->config([
                    'allowInput' => true,   // Allow manual input of dates
                    'altFormat' => 'F j, Y', // Date format that will be displayed once selected
                    'ariaDateFormat' => 'F j, Y', // An aria-friendly date format
                    'dateFormat' => 'Y-m-d', // Date format that will be received by the filter
                    'earliestDate' => '2020-01-01', // The earliest acceptable date
                    'placeholder' => 'Enter Date Range', // A placeholder value
                    'locale' => 'en',
                ])
                ->setFilterPillValues([0 => 'minDate', 1 => 'maxDate']) // The values that will be displayed for the Min/Max Date Values
                ->filter(function (Builder $builder, array $dateRange) { // Expects an array.
                    $builder
                        ->whereDate('date', '>=', $dateRange['minDate']) // minDate is the start date selected
                        ->whereDate('date', '<=', $dateRange['maxDate']); // maxDate is the end date selected
                }),
            MultiSelectFilter::make('Problem Status')
                ->options(
                    TipeKendala::toSelectOptionsV2()
                )->filter(function (Builder $builder, array $values) {
                    $builder->whereIn('job_status', $values);
                })
                ->setFilterSlidedownColspan('2')
                ->setInputAttributes([
                    'id' => 'table-filter-problem_status-wrapper',
                    'placeholder' => 'Cari Status...',
                    'class' => 'text-white bg-red-500 dark:bg-red-500',
                    'default-colors' => false,
                    'default-styling' => true,
                ]),
            MultiSelectFilter::make('Job Status')
                ->options(
                    StatusPekerjaan::toSelectOptionsV2()
                )->filter(function (Builder $builder, array $values) {
                    $builder->whereIn('job_status', $values);
                })->setInputAttributes([
                    'id' => 'table-filter-job_status-wrapper',
                    'class' => 'text-white bg-red-500 dark:bg-red-500',
                    'default-colors' => false,
                    'default-styling' => true,
                ]),
            SelectFilter::make('Vendor')
                ->options(['' => 'All'] +
                    $vendors = Vendor::query()
                        ->orderBy('name')
                        ->get()
                        ->keyBy('id')
                        ->map(fn($vendor) => $vendor->name)
                        ->toArray()
                )
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('vendor_id', $value);
                }),
//            SelectFilter::make('Job Status')
//                ->options(
//                    ['' => 'All'] + StatusPekerjaan::toSelectOptionsV2()
//                )
//                ->filter(function (Builder $builder, string $value) {
//                    $builder->where('job_status', $value);
//                }),
//            SelectFilter::make('Problem Status')
//                ->options(
//                    ['' => 'All'] + TipeKendala::toSelectOptionsV2()
//                )
//                ->filter(function (Builder $builder, string $value) {
//                    $builder->where('problem_status', $value);
//                }),
        ];
    }

}
