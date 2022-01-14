<?php

namespace App\Imports;
use Illuminate\Support\Collection;


class Temp
{
    public Collection $collection;

    public function __construct(Collection $data)
    {
        $this->collection = $data;
    }
}
