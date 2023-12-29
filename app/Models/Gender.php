<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @OA\Schema(
 *     title="Gender",
 *     description="Gender model",
 *     @OA\Xml(
 *         name="Gender"
 *     ),
 *  * @OA\Property(
 *     property="description",
 *     title="description",
 *     description="description of the Gender",
 *     format="Jazz"
 * )
 * )
 *@OA\Required({"description"})
 */
class Gender extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $hidden = ['deleted_at'];
    use SoftDeletes;

    protected $fillable = ['description', 'updated_at'];
}
