<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VFEXPriceSheet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function v_f_e_x()
    {
        return $this->belongsTo(VFEX::class, 'v_f_e_x_e_s_id');
    }
}
