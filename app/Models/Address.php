<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $hidden = ['deleted_at'];
    use SoftDeletes;

    protected $fillable = ['description', 'user_id '];
}
