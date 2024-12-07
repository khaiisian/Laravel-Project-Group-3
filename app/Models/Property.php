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
        return $this->belongsTo(Township::class, 'township_id');
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function images()
    {
        return $this->hasMany(PropertyImage::class);
    }
    use HasFactory;

    protected $fillable = [
        'property_type_id',
        'house_owner_id',
        'township_id',
        'selection_type',
        'content',
        'address',
        'bedroom',
        'bathroom',
        'area',
        'price',
        'status',
        'description',
        'room',
        'image',
    ];
}
