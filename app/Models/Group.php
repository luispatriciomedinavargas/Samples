<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * @OA\Schema(
 *     title="Group",
 *     description="Group model",
 *     @OA\Xml(
 *         name="Group"
 *     ),
 *  * @OA\Property(
 *     property="description",
 *     title="description",
 *     description="description of the PlayList",
 *     format="string",
 * )
 * )
 * @OA\Required({"description"})
 */
class Group extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $hidden = ['deleted_at'];
    use SoftDeletes;

    protected $fillable = ['description', 'updated_at'];

}
