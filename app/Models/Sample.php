<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sample extends Model
{
    protected $table = 'samples';
    use HasFactory;
    public $timestamps = false;
    public $hidden = ['id'];


    protected $fillable = ['description', 'url', 'price', 'group_id', 'type_id', 'gender_id', 'sound_id'];

    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }
    public function sound()
    {
        return $this->belongsTo('App\Models\Sound');
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }
    public function gender()
    {
        return $this->belongsTo('App\Models\Gender');
    }
}
