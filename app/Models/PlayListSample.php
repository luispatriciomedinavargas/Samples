<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *     title="PlayListSample",
 *     description="PlayListSample model. Here we do relationship beetween playlist and sample",
 *     @OA\Xml(
 *         name="PlayListSample"
 *     ),
 *     @OA\Property(
 *         property="playlist_id",
 *         title="playlist_id",
 *         description="Playlist´s id",
 *         format="number"
 *     ),
 *     @OA\Property(
 *         property="samples_id",
 *         title="samples_id",
 *         description="Samples´s id",
 *         format="number"
 *     )
 * )
 * @OA\Required({"playlist_id","samples_id"})
 */
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
