<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_number',
        'name',
        'gender',
        'level_id',
        'division',
        'role'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
