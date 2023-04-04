<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content_Type extends Model
{
    use HasFactory;

    protected $primaryKey = 'content_type_id';
    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->hasMany(Test_Object::class, 'content_type_id', 'content_type_id');
    }
}
