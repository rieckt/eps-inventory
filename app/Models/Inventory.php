<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';

    protected $perPage = 24;

    protected $fillable = [
        'name',
        'description',
        'barcode',
        'room_id',
        'category_id',
    ];

    protected $casts = [
        'room_id' => 'integer',
        'category_id' => 'integer',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
