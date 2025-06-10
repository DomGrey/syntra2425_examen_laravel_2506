<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trip;

class TripController extends Controller
{
    //
    public function index()
{
    return Trip::select('id', 'title', 'region', 'start_date', 'duration_days', 'price_per_person')->get();
}

}
