<?php

namespace App\Models;

use App\Models\User;
use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    public function package()
    {
        return $this->belongsTo(Package::class)->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
