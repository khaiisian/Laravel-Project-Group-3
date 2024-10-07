<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectionType extends Model
{
    protected $fillable=['name'];
    public function property()
    {
        return $this->hasMany(Property::class);
    }
    public
    use HasFactory;
}
