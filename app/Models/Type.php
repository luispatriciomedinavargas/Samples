<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @OA\Schema(
 *     title="Type",
 *     description="Type model",
 *     @OA\Xml(
 *         name="Type"
 *     ),
 *  * @OA\Property(
 *     property="description",
 *     title="description",
 *     description="description of the Type",
 *     format="string",
 * )
 * )
 * @OA\Required({"description"})
 */

class Type extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $hidden = ['deleted_at'];
    use SoftDeletes;

    protected $fillable = ['description', 'updated_at'];
}
