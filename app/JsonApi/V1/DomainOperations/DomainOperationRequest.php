<?php

namespace App\JsonApi\V1\DomainOperations;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class DomainOperationRequest extends ResourceRequest
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
                'domain_id' => ['required', 'integer'],
                'domain_check_id' => ['required', 'integer'],
                'enabled' => ['required', 'integer'],
            ];
        }
        if ($this->isUpdating()) {
            return [
                'domain_id' => ['required', 'integer'],
                'domain_check_id' => ['required', 'integer'],
                'enabled' => ['required', 'integer'],
            ];
        }

        else {
            return [];
        }
    }

}
