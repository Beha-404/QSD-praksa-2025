<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Colors extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'Colors';

    protected $fillable = [
        'name',
        'hex_code'
    ];
}
