<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function balance_sheet()
    {
        return $this->hasOne(BalanceSheet::class);
    }


    public function top_counters()
    {
        return $this->hasMany(ETFCounters::class);
    }

    public function outstanding_shares()
    {
        return $this->hasOne(OutstandingShares::class);
    }

    public function price_sheets()
    {
        return $this->hasMany(PriceSheet::class);
    }

    public function historic_data()
    {
        return $this->hasMany(AllPrices::class);
    }

    public function top_shareholders()
    {
        return $this->hasMany(TopShareholders::class);
    }

    public function company_logo()
    {
        return $this->hasOne(CompanyLogo::class);
    }



}
