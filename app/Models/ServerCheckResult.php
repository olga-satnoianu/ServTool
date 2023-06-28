<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerCheckResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'server_id',
        'server_check_id',
        'status',
    ];
}
