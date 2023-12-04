<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayList extends Model
{
    protected $table = 'playlists';
    use HasFactory;
    public $timestamps = false;
    public $hidden = ['id'];
    use SoftDeletes;


    protected $fillable = ['name', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
