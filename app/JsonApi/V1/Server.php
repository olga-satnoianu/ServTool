<?php

namespace App\JsonApi\V1;

use App\JsonApi\V1\DomainCheckResults\DomainCheckResultSchema;
use App\JsonApi\V1\DomainChecks\DomainCheckSchema;
use App\JsonApi\V1\DomainOperations\DomainOperationSchema;
use App\JsonApi\V1\Domains\DomainSchema;
use App\JsonApi\V1\Guides\GuideSchema;
use App\JsonApi\V1\MajorEvents\MajorEventSchema;
use App\JsonApi\V1\Notifications\NotificationSchema;
use App\JsonApi\V1\ServerCheckResults\ServerCheckResultSchema;
use App\JsonApi\V1\ServerChecks\ServerCheckSchema;
use App\JsonApi\V1\OperationServers\OperationServerSchema;
use App\JsonApi\V1\Servers\ServerSchema;
use App\JsonApi\V1\Tasks\TaskSchema;
use App\JsonApi\V1\Users\UserSchema;
use LaravelJsonApi\Core\Server\Server as BaseServer;

class Server extends BaseServer
{

    /**
     * The base URI namespace for this server.
     *
     * @var string
     */
    protected string $baseUri = '/api/v1';

    /**
     * Bootstrap the server when it is handling an HTTP request.
     *
     * @return void
     */
    public function serving(): void
    {
        // no-op
    }

    /**
     * Get the server's list of schemas.
     *
     * @return array
     */
    protected function allSchemas(): array
    {
        return [
            Users\UserSchema::class,
            NotificationSchema::class,
            GuideSchema::class,
            MajorEventSchema::class,
            TaskSchema::class,
            DomainSchema::class,
            DomainCheckSchema::class,
            DomainOperationSchema::class,
            ServerSchema::class,
            ServerCheckSchema::class,
            OperationServerSchema::class,
            DomainCheckResultSchema::class,
            ServerCheckResultSchema::class,
        ];
    }
}
