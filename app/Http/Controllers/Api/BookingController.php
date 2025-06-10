<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    //
    public function store(Request $request)
{
    $request->validate([
        'trip_id' => 'required|exists:trips,id',
        'name' => 'required|string',
        'email' => 'required|email',
        'number_of_people' => 'required|integer|min:1',
        'token' => 'required|string',
    ]);

    $expectedToken = md5($request->email . 'canadarocks');

    if (!$request->has('token')) {
        return response()->json(['message' => 'Token is missing'], 401);
    }

    if ($request->token !== $expectedToken) {
        return response()->json(['message' => 'Invalid token'], 403);
    }

    $booking = Booking::create([
        'trip_id' => $request->trip_id,
        'name' => $request->name,
        'email' => $request->email,
        'number_of_people' => $request->number_of_people,
        'status' => 'pending'
    ]);

    return response()->json($booking, 201);
}

}
