<?php

namespace App\JsonApi\V1\ServerCheckResults;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class ServerCheckResultRequest extends ResourceRequest
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
                'status' => ['required', 'integer'],
            ];
        }
        if ($this->isUpdating()) {
            return [
                'server_id' => ['required', 'integer'],
                'server_check_id' => ['required', 'integer'],
                'status' => ['required', 'integer'],
            ];
        }

        else {
            return [];
        }
    }

}
