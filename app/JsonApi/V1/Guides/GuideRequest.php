<?php

namespace App\JsonApi\V1\Guides;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class GuideRequest extends ResourceRequest
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
                'description' => ['required', 'string'],
                'major_event_id' => ['nullable', 'integer'],
                'event' => JsonApiRule::toOne(),
            ];
        }
        if ($this->isUpdating()) {
            return [
                'title' => ['required', 'string'],
                'description' => ['required', 'string'],
                'major_event_id' => ['nullable', 'integer'],
                'event' => JsonApiRule::toOne(),
            ];
        }
        if ($this->isModifyingRelationship()) {
            return [
                'majorEvent' => JsonApiRule::toOne(),
            ];
        }
        else {
            return [];
        }
    }
}
