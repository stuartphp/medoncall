<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;
    protected $fillable = [
        'medicine_id',
        'name',
        'unit',
        'strength'
    ];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
