<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Sample",
 *     description="Sample model",
 *     @OA\Xml(
 *         name="Sample"
 *     ),
 *    @OA\Property(
 *     property="description",
 *     title="description",
 *     description="description of the Sample",
 *     format="string"
 * ),
 *    @OA\Property(
 *     property="url",
 *     title="url",
 *     description="the url where it is storage",
 *     format="string"
 * ),
 * @OA\Property(
 *     property="price",
 *     title="price",
 *     description="how many cost it",
 *     format="string"
 * ),
 * @OA\Property(
 *     property="group_id",
 *     title="group_id",
 *     description="the Group´s which belong",
 *     format="string"
 * ),
 * @OA\Property(
 *     property="type_id",
 *     title="type_id",
 *     description="the Type´s which belong",
 *     format="string"
 * ),
 * @OA\Property(
 *     property="gender_id",
 *     title="gender_id",
 *     description="the Gender´s which belong",
 *     format="string"
 * ),
 * @OA\Property(
 *     property="sound_id",
 *     title="sound_id",
 *     description="the Sound´s which belong",
 *     format="string"
 * ),
 * )
 * @OA\Required({"description", "url", "price"}),
 */

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
