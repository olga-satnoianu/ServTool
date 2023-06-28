<?php

namespace App\JsonApi\V1\OperationServers;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class OperationServerRequest extends ResourceRequest
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
                'server_id' => ['required', 'integer'],
                'server_check_id' => ['required', 'integer'],
                'enabled' => ['required', 'integer'],
            ];
        }
        if ($this->isUpdating()) {
            return [
                'server_id' => ['required', 'integer'],
                'server_check_id' => ['required', 'integer'],
                'enabled' => ['required', 'integer'],
            ];
        }

        else {
            return [];
        }
    }

}
