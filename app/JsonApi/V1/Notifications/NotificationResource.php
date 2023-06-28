<?php

namespace App\JsonApi\V1\Notifications;

use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

class NotificationResource extends JsonApiResource
{

    /**
     * Get the resource's attributes.
     *
     * @param Request|null $request
     * @return iterable
     */
    public function attributes($request): iterable
    {
        return [
            'domain_id' => $this->domain_id,
            'server_id' => $this->server_id,
            'task_id' => $this->task_id,
            'major_event_id' => $this->major_event_id,
            'title' => $this->title,
            'description' => $this->description,
            'importance' => $this->importance,
            'status' => $this->status,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }

    /**
     * Get the resource's relationships.
     *
     * @param Request|null $request
     * @return iterable
     */
    public function relationships($request): iterable
    {
        return [
            $this->relation('domain'),
            $this->relation('server'),
            $this->relation('task'),
            $this->relation('majorEvent'),
        ];
    }

}
