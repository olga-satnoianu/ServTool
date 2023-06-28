<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Server extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'name',
    ];

    protected static function boot()
    {
        parent::boot();

        if (auth()->user()) {
            Server::creating(function ($model) {
                $model->user_id = auth()->user()->id;
            });
        }
    }

    /**
     * @return HasMany
     */
    public function operationServers()
    {
        return $this->hasMany(OperationServer::class);
    }

}
