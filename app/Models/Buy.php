<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Buy",
 *     description="Buy model",
 *     @OA\Xml(
 *         name="Buy"
 *     ),
 *  @OA\Property(
 *     property="date_buy",
 *     title="date_buy",
 *     description="the date when the sample is bought",
 *     format="string"
 * ),
 *  @OA\Property(
 *     property="method_pay",
 *     title="method_pay",
 *     description="Which method is use to buy the sample",
 *     format="string"
 * ),
 *  @OA\Property(
 *     property="id",
 *     title="ID",
 *     description="The Buy´s ID",
 *     format="number"
 * ),
 *  @OA\Property(
 *     property="user_id",
 *     title="user_id",
 *     description="the User´s id that belongs to Buy",
 *      format="number"
 * )
 * )
 *@OA\Required({"method_pay", "method_pay","user_id"})
 */


class Buy extends Model
{
    use HasFactory;

    // The table name
    protected $table = 'buys';
    public $timestamps = false;
    // The primary key
    protected $primaryKey = 'id';

    // The attributes that are mass assignable
    protected $fillable = [
        'id',
        'date_buy',
        'method_pay',
        'user_id',
    ];

    // The attributes that should be mutated to dates
    protected $dates = [
        'date_buy',
    ];

    // The relationship with the User model
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function details()
    {
        return $this->hasMany('App\Models\BuyBill');
    }
}
