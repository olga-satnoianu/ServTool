<?php

namespace App\JsonApi\V1\Notifications;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class NotificationRequest extends ResourceRequest
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
                'domain_id' => ['nullable', 'integer'],
                'server_id' => ['nullable', 'integer'],
                'task_id' => ['nullable', 'integer'],
                'major_event_id' => ['nullable', 'integer'],
                'title' => ['required', 'string'],
                'description' => ['nullable', 'string'],
                'importance' => ['nullable', 'string'],
                'status' => ['nullable', 'integer'],
//                'updatedAt' => ['nullable', JsonApiRule::dateTime()],
            ];
        }
        if ($this->isUpdating()) {
            return [
                'domain_id' => ['nullable', 'integer'],
                'server_id' => ['nullable', 'integer'],
                'task_id' => ['nullable', 'integer'],
                'major_event_id' => ['nullable', 'integer'],
                'title' => ['required', 'string'],
                'description' => ['nullable', 'string'],
                'importance' => ['nullable', 'string'],
                'status' => ['nullable', 'integer'],
//                'updatedAt' => ['nullable', JsonApiRule::dateTime()],
            ];
        }
        if($this->isModifyingRelationship()) {
            return [
//                'title' => JsonApiRule::toOne(),
                'domain' => JsonApiRule::toOne(),
                'server' => JsonApiRule::toOne(),
                'task' => JsonApiRule::toOne(),
                'majorEvent' => JsonApiRule::toOne(),
            ];
        }
        else{
            return[];
        }
    }

}
