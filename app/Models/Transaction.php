<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['end_user_id','property_id', 'date'];
    public function enduser()
{
    return $this->belongsTo(EndUser::class, 'end_user_id');
}

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    use HasFactory;
}
