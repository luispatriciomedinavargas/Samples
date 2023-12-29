<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @OA\Schema(
 *     title="Address",
 *     description="Address model",
 *     @OA\Xml(
 *         name="Address"
 *     ),
 *  @OA\Property(
 *     property="description",
 *     title="description",
 *     description="description of the Address",
 *     format="string"
 * ),
 *  @OA\Property(
 *     property="user_id",
 *     title="user_id",
 *     description="the User´s id that belongs to address",
 *      format="number"
 * )
 * )
 *@OA\Required({"description", "user_id"})
 */
class Address extends Model
{
    protected $table = 'address';
    use HasFactory;
    public $timestamps = false;
    public $hidden = ['deleted_at',  "created_at","updated_at"];
    use SoftDeletes;

    protected $fillable = ['description', 'user_id'];



    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
