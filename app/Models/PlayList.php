<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @OA\Schema(
 *     title="Playlist",
 *     description="Playlist model",
 *     @OA\Xml(
 *         name="Playlist"
 *     ),
 *  * @OA\Property(
 *     property="name",
 *     title="name",
 *     description="description of the PayList",
 *     format="string",
 * ),
 *  *  * @OA\Property(
 *     property="user_id",
 *     title="user_id",
 *     description="The user Id Who made the playlist",
 *     format="string",
 * )
 * )
 * @OA\Required({"name"}),
 * @OA\Required({"user_id"}),
 */
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
