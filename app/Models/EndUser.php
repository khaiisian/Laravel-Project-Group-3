<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EndUser extends Model
{
    protected $fillable = ['user_id', 'phNo', 'address'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function userposts()
    {
        return $this->hasMany(UserPost::class, 'end_user_id');
    }
    use HasFactory;
}
