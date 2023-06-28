<?php

namespace App\JsonApi\V1\Notifications;

use App\Models\Domain;
use App\Models\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use LaravelJsonApi\Eloquent\Contracts\Paginator;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Number;
use LaravelJsonApi\Eloquent\Fields\Relations\MorphTo;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Fields\Boolean;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsTo;
use LaravelJsonApi\Eloquent\Filters\WhereIdIn;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use LaravelJsonApi\Eloquent\Schema;

class NotificationSchema extends Schema
{

    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = Notification::class;

    /**
     * Get the resource fields.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            ID::make(),
            Number::make('domain_id'),
            Number::make('server_id'),
            Number::make('task_id'),
            Number::make('major_event_id'),
//            Number::make('title_id'),
//            Str::make('title_type'),
//            MorphTo::make('title')->types('tasks', 'major-events'),
            Str::make('title'),
            Str::make('description'),
            Str::make('importance'),
            Number::make('status'),
            BelongsTo::make('task'),
            BelongsTo::make('majorEvent'),
            BelongsTo::make('domain'),
            BelongsTo::make('server'),
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
        ];
    }

    public function indexQuery(?Request $request, Builder $query): Builder
    {
        if ($request->query('domain_id'))
        {
            return $query->whereHas('domain', function ($query) {
                    $query->where('user_id', auth()->user()->id);
                });
        }
        elseif ($request->query('server_id'))
        {
            return $query->whereHas('server', function ($query) {
                    $query->where('user_id', auth()->user()->id);
                });
        }
        elseif ($request->query('task_id'))
        {
            return $query->whereHas('task', function ($query) {
                    $query->where('user_id', auth()->user()->id);
                });

        }

        return $query;
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
