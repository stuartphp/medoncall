<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = [
        'nappi_code',
        'regno',
        'schedule',
        'generic_name',
        'product_name',
        'description',
        'category',
        'dosage_form',
        'pack_size',
        'num_packs',
        'cost_per_unit',
        'cost_price',
        'dispensing_fee',
        'add_on_fee',
        'image',
        'is_active'
    ];
    public function ingredients()
    {
        return $this->hasMany(Ingredient::class);
    }
}
