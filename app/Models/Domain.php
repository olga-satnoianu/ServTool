<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'server_id',
    ];

    protected static function boot()
    {
        parent::boot();

        if (auth()->user()) {
            Domain::creating(function ($model) {
                $model->user_id = auth()->user()->id;
            });
        }
    }

    /**
     * @return HasMany
     */
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function domainOperations() : HasMany
    {
        return $this->hasMany(DomainOperation::class);
    }

}
