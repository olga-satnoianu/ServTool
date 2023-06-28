<?php

namespace App\JsonApi\V1\Tasks;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class TaskRequest extends ResourceRequest
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
                'title' => ['required', 'string'],
                'description' => ['nullable', 'string'],
                'time_cicle' => ['nullable', 'integer'],
                'time_unit' => ['nullable', 'string'],
            ];
        }
        if ($this->isUpdating()) {
            return [
                'title' => ['required', 'string'],
                'description' => ['nullable', 'string'],
                'time_cicle' => ['nullable', 'integer'],
                'time_unit' => ['nullable', 'string'],
            ];
        }
        else{
            return[];
        }
    }

}
