<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @OA\Schema(
 *     title="Sound",
 *     description="Sound model",
 *     @OA\Xml(
 *         name="Sound"
 *     ),
 *  * @OA\Property(
 *     property="description",
 *     title="description",
 *     description="description of the Sound",
 *     format="string",
 * )
 * )
 * @OA\Required({"description"})
 */

class Sound extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $hidden = ['deleted_at'];
    use SoftDeletes;

    protected $fillable = ['description', 'updated_at'];
}
