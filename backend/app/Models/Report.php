<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function companies_in_report()
    {
        return $this->hasMany(CompaniesInReport::class);
    }

    public function report_type()
    {
        return $this->belongsTo(ReportTypes::class);
    }


}
