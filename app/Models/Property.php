<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
// Property.php (Model)
protected $fillable = [
    'house_owner_id', 'property_type_id', 'township_id', 'selection_type_id',
    'content', 'address', 'bedroom', 'bathroom', 'area', 'price', 'status',
    'description', 'room', 'image',
];



    public function houseOwner()
    {
        return $this->belongsTo(HouseOwner::class, 'house_owner_id');
    }

    public function township()
    {
        return $this->belongsTo(Township::class, 'township_id');
    }

    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class, 'property_type_id');
    }

    public function selectionType()
    {
        return $this->belongsTo(SelectionType::class, 'selection_type_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    use HasFactory;


}