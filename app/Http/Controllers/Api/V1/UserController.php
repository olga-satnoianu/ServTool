<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use LaravelJsonApi\Laravel\Http\Controllers\Actions;
use LogicException;

class UserController extends Controller
{

    use Actions\FetchMany;
    use Actions\FetchOne;
    use Actions\Store;
    use Actions\Update;
    use Actions\Destroy;
    use Actions\FetchRelated;
    use Actions\FetchRelationship;
    use Actions\UpdateRelationship;
    use Actions\AttachRelationship;
    use Actions\DetachRelationship;

    public function created($model, $request, $query)
    {
        $inputs = $request->validated();

        try {
            $response = Http::
            accept("application/vnd.api+json")
                ->contentType("application/vnd.api+json")
                ->post(
                    env('LARAVELPASSPORT_HOST') . "/api/v1/users",
                    [
                        "data" => [
                            "type" => "users",
                            "attributes" => [
                                "name" => $inputs['first_name'] . ' ' . $inputs['last_name'],
                                "email" => $inputs['email'],
                                "password" => $inputs['password']
                            ]
                        ],
                        "jsonapi" => [
                            "version" => "1.0"
                        ]
                    ]
                );

            $response_data = $response->json();

            $model->oauth_id = $response_data['data']['id'];
            $model->password = null;

            $model->save();

        } catch (\Exception $e) {
//            throw new LogicException("Unable to create user", Response::HTTP_INTERNAL_SERVER_ERROR);
            throw new LogicException("Unable to create user: " . $e->getMessage() . ' --- ' . env('LARAVELPASSPORT_HOST') . "/api/v1/users");
//            return $e->getMessage();
        }

    }
}
