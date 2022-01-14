<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VFEX extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function outstanding_shares()
    {
        return $this->hasOne(VFEXOutstandingShare::class, 'v_f_e_x_e_s_id');
    }

    public function price_sheets()
    {
        return $this->hasMany(VFEXPriceSheet::class, 'v_f_e_x_e_s_id');
    }
}
