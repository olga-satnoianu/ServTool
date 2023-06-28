<?php

namespace App\JsonApi\V1\DomainCheckResults;

use App\Models\DomainCheckResult;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Number;
use LaravelJsonApi\Eloquent\Filters\Where;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use LaravelJsonApi\Eloquent\Filters\WhereIn;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;

class DomainCheckResultSchema extends Schema
{

    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = DomainCheckResult::class;

    /**
     * Get the resource fields.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            ID::make(),
            Number::make('domain_id')->sortable(),
            Number::make('domain_check_id')->sortable(),
            Number::make('status')->sortable(),
            DateTime::make('createdAt')->sortable()->readOnly(),
            DateTime::make('updatedAt')->sortable()->readOnly(),
        ];
    }

    /**
     * Get the resource filters.
     *
     * @return array
     */
    public function filters(): array
    {
        return [
            WhereIdIn::make($this),
            WhereIn::make('domain_id')->delimiter(","),
            WhereIn::make('domain_check_id')->delimiter(","),
            WhereIn::make('domain_check_status', 'status')->delimiter(","),
        ];
    }

    public function indexQuery(?Request $request, Builder $query): Builder
    {
        $sevenDaysAgo = Carbon::now()->subDays(7)->format('Y-m-d H:i:s');

        return $query->where('created_at', '>=', $sevenDaysAgo);
    }

    /**
     * Get the resource paginator.
     *
     * @return Paginator|null
     */
    public function pagination(): ?Paginator
    {
        return PagePagination::make();
    }

}
