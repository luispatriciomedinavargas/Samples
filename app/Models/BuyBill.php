<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="BuyBill",
 *     description="BuyBill model",
 *     @OA\Xml(
 *         name="BuyBill"
 *     ),
 *  @OA\Property(
 *     property="id_sample",
 *     title="id_sample",
 *     description="the Sample´s id that belongs to Bill",
 *      format="number"
 * ),
 *  @OA\Property(
 *     property="id_buy",
 *     title="id_buy",
 *     description="the Buy´s id that belongs to Bill",
 *      format="number"
 * )
 * )
 *@OA\Required({"id_sample", "id_buy"})
 */
class BuyBill extends Model
{
    use HasFactory;

    // The table name
    protected $table = 'buy_details';
    public $timestamps = false;
    // The attributes that are mass assignable
    protected $fillable = [
        'buy_id',
        'sample_id',
    ];

    public function buy()
    {
        return $this->belongsTo('App\Models\Buy');
    }

    // The relationship with the Sample model

    public function user()
    {
        return $this->belongsTo('App\Models\Sample');
    }
}
