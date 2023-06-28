<?php

namespace App\JsonApi\V1\Guides;

use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

class GuideResource extends JsonApiResource
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
            'title' => $this->title,
            'description' => $this->description,
            'major_event_id' => $this->major_event_id,
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
            $this->relation('majorEvent'),
        ];
    }

}
