<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutstandingShares extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function historic_prices()
    {
        return $this->hasOne(HistoricPrice::class);
    }
}
