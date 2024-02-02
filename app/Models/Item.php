<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
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

    public function itemStatus()
    {
        return $this->belongsTo(ItemStatus::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
