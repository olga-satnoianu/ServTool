<?php

namespace App\JsonApi\V1\MajorEvents;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class MajorEventRequest extends ResourceRequest
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
                'guide_id' => ['nullable', 'integer'],
                'title' => ['required', 'string'],
                'description' => ['required', 'string'],
                'trigger_reason' => ['required', 'string'],
            ];
        }
        if ($this->isUpdating()) {
            return [
                'guide_id' => ['nullable', 'integer'],
                'title' => ['required', 'string'],
                'description' => ['required', 'string'],
                'trigger_reason' => ['required', 'string'],
            ];
        }
        if ($this->isModifyingRelationship()) {
            return [
                'guide' => JsonApiRule::toOne(),
            ];
        }
        else {
            return [];
        }
    }

}
