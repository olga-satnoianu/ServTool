<?php

namespace App\JsonApi\V1\Users;

use Illuminate\Validation\Rule;
use LaravelJsonApi\Laravel\Http\Requests\ResourceRequest;
use LaravelJsonApi\Validation\Rule as JsonApiRule;

class UserRequest extends ResourceRequest
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
                'first_name' => ['required', 'string'],
                'last_name' => ['required', 'string'],
                'email' => ['required', 'string', Rule::unique('users', 'email')],
                'email_verified_at' => ['nullable', 'date'],
                'password' => ['required', 'string'],
            ];
        }
        if ($this->isUpdating()) {
            return [
                'first_name' => ['nullable', 'string'],
                'last_name' => ['nullable', 'string'],
                'email_verified_at' => ['nullable', 'date'],
                'password' => ['required', 'string'],
            ];
        }
        if($this->isModifyingRelationship()) {
            return [
//                'admin' => JsonApiRule::toOne(),
            ];
        }
        else{
            return[];
        }
    }

}
