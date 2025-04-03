<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discounts extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'Discounts';

    protected $fillable = [
        'name',
        'discount_value',
        'start_date',
        'end_date',
    ];
}
