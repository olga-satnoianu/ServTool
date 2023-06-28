<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'time_cicle',
        'time_unit',
    ];

    protected static function boot()
    {
        parent::boot();

        if (auth()->user()) {
            Task::creating(function ($model) {
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
