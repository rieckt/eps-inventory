<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'room';

    protected $perPage = 24;

    protected $fillable = [
        'name',
        'floor_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }
}
