<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guide extends Model
{
    use HasFactory;

    protected $fillable = [
        'major_event_id',
        'title',
        'description',
    ];

    /**
     * @return BelongsTo
     */
    public function majorEvent()
    {
        return $this->belongsTo(MajorEvent::class);
    }
}
