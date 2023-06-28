<?php

namespace App\JsonApi\V1\MajorEvents;

use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

class MajorEventResource extends JsonApiResource
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
            'guide_id' => $this->guide_id,
            'title' => $this->title,
            'description' => $this->description,
            'trigger_reason' => $this->trigger_reason,
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
            $this->relation('guide'),
        ];
    }

}
