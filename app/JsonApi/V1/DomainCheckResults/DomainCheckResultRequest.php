<?php

namespace App\JsonApi\V1\DomainCheckResults;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class DomainCheckResultRequest extends ResourceRequest
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
                'status' => ['required', 'integer'],
            ];
        }
        if ($this->isUpdating()) {
            return [
                'domain_id' => ['required', 'integer'],
                'domain_check_id' => ['required', 'integer'],
                'status' => ['required', 'integer'],
            ];
        }

        else {
            return [];
        }
    }

}
