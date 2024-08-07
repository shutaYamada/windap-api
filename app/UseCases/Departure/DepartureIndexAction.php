<?php

namespace App\UseCases\Departure;

use App\Http\Requests\Departure\DepartureIndexRequest;
use App\Models\Departure;

class DepartureIndexAction
{
    public function __invoke(DepartureIndexRequest $request)
    {
        $departures = Departure::orderBy('created_at', 'desc')->get();

        return $departures;
    }
}