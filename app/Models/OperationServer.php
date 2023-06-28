<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationServer extends Model
{
    use HasFactory;

    protected $fillable = [
        'server_id',
        'server_check_id',
        'enabled',
    ];

}
