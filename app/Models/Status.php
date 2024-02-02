<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function itemStatus()
    {
        return $this->hasMany(ItemStatus::class);
    }

    public function item()
    {
        return $this->hasManyThrough(Item::class, ItemStatus::class);
    }
}
