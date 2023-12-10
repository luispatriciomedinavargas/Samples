<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PlayListSample extends Model
{

    protected $table = 'playlist_samples';
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['playlist_id', 'samples_id'];


    public function sample()
    {
        return $this->belongsTo('App\Models\Sample');
    }

    public function playList()
    {
        return $this->belongsTo('App\Models\PlayList');
    }
}
