<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'trip_id',
        'name',
        'email',
        'number_of_people',
        'status'
    ];

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
