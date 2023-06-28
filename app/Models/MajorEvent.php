<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MajorEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'guide_id',
        'title',
        'description',
        'trigger_reason',
    ];

    /**
     * @return HasOne
     */
    public function guide()
    {
        return $this->hasOne(Guide::class);
    }
}
