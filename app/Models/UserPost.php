<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPost extends Model
{
    protected $fillable = ['end_user_id','township_id','selection_type_id', 'content', 'currentDate', 'requirement', 'status'];

    public function enduser()
    {
        return $this->belongsTo(EndUser::class);
    }
    public function township()
    {
        return $this->belongsTo(Township::class);
    }
    public function propertyType()
    {
        return $this->belongsTo(PropertyType::class);
    }
    public function selectionType()
    {
        return $this->belongsTo(SelectionType::class);
    }
    use HasFactory;
}
