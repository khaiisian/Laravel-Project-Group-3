<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['name'];

    public function townships()
    {
        return $this->hasMany(Township::class); // one region has many townships
    }
    use HasFactory;
}
