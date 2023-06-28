<?php

namespace App\JsonApi\V1\Domains;

use Illuminate\Http\Request;
use LaravelJsonApi\Core\Resources\JsonApiResource;

class DomainResource extends JsonApiResource
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
            'name' => $this->name,
            'server_id' => $this->server_id,
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
            $this->relation('notifications'),
        ];
    }

}
