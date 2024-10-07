<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['house_owner_id','township_id','property_type_id','transaction_id','content', 'address', 'bedRoom', 'bathRoom', 'area', 'price', 'status', 'description', 'room', 'images'];

    public function houseOwner()
    {
        return $this->belongsTo(HouseOwner::class);
    }

    public function township()
    {
        return $this->belongsTo(Township::class);
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    use HasFactory;
}
