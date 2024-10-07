<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Township extends Model
{
    protected $fillable = ['region_id', 'name'];

    public function region()
    {
        return $this->belongsTo(Region::class); // a township belongs to one region
    }
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
    use HasFactory;
}
