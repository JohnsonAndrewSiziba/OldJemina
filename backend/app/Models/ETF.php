<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ETF extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function price_sheets()
    {
        return $this->hasMany(ETFPriceSheet::class);
    }
}
