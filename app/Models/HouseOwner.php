<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseOwner extends Model
{
    protected $fillable = ['user_id', 'address', 'phNo', 'fbLink', 'profile', 'NRC', 'NRCImage'];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
