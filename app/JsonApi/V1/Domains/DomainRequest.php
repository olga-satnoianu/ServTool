<?php

namespace App\JsonApi\V1\Domains;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class DomainRequest extends ResourceRequest
{

    /**
     * Get the validation rules for the resource.
     *
     * @return array
     */
    public function rules(): array
    {
        if ($this->isCreating()) {
            return [
                'name' => ['required', 'string'],
                'server_id' => ['nullable', 'integer'],
            ];
        }
        if ($this->isUpdating()) {
            return [
                'name' => ['required', 'string'],
                'server_id' => ['nullable', 'integer'],
            ];
        }
        if ($this->isModifyingRelationship()) {
            return [
                'notifications' => JsonApiRule::toMany(),
            ];
        }
        else {
            return [];
        }
    }

}
