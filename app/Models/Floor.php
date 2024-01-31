<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;

    protected $table = 'floor';

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    protected static function booted()
    {
        static::deleting(function (Floor $floor) {
            $floor->rooms()->update(['floor_id' => null]);
        });
    }
}
