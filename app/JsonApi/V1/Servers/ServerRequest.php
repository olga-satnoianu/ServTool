<?php

namespace App\JsonApi\V1\Servers;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class ServerRequest extends ResourceRequest
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
                'ip' => ['required', 'ip'],
                'name' => ['required', 'string'],
            ];
        }
        if ($this->isUpdating()) {
            return [
                'ip' => ['required', 'ip'],
                'name' => ['required', 'string'],
            ];
        }
        else {
            return [];
        }
    }

}
