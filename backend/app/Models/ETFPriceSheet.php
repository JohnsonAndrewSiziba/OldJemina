<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ETFPriceSheet extends Model
{
    use HasFactory;

    protected  $guarded = [];

    public function etf()
    {
        return $this->belongsTo(ETF::class, 'e_t_f_s_id');
    }
}
