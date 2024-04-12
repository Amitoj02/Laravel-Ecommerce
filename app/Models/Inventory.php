<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_code',
        'item_name',
        'image',
        'report_id',
        'gross_weight',
        'net_weight',
        'gender',
        'karat',
        'diamond_quality',
        'diamond_weight',
        'diamond_pcs',
        'color_stone',
        'in_stock',
        'others',
    ];

    protected $casts = [
        'others' => 'array',
        'in_stock' => 'boolean'
    ];
}
