<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BuyBillService;
use Illuminate\Support\Facades\Log;

class BuyBillController extends Controller
{


    protected $buyBillService;
    public function __construct(BuyBillService $buyBillService)
    {
        $this->buyBillService = $buyBillService;
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * @OA\Post(
     *     path="/buy",
     *     summary="Create a Buy-BuyBill to insert into DB",
     *     tags={"BuyBill"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="date_buy", type="date", description="the date when samples are buy.", example="2024-01-01"),
     *             @OA\Property(property="method_pay", type="string", description="the method which pays the user", example="Paypal"),
     *             @OA\Property(property="user_id", type="integer", description="The user ID who made the playlist.", example=1),
     *             @OA\Property(property="idsample", type="array", @OA\Items(type="integer"), description="The user ID who made the playlist.", example={1,2,3})
     *         )
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request"),
     *     @OA\Response(response=422, description="Unprocessable Content")
     * )
     */
    public function store(Request $request)
    {

        $buyBill = $this->buyBillService->createBuy($request->all());
        if (!empty($buyBill)) {
            return response()->json($buyBill, 200);
        } {
            return response()->json('somesthing was bad, check  it', 400);
        }
    }


    /**
     * @OA\Get(
     *     path="/buy/{id}",
     *     summary="get all Buy-BuyBill to insert into DB",
     *     tags={"BuyBill"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Address's id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *               example=1
     *          )
     *      ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request"),
     *     @OA\Response(response=422, description="Unprocessable Content")
     * )
     */
    public function show(string $id)
    {

        return response()->json($this->buyBillService->showById($id), 200);
    }

    /**
     * @OA\Get(
     *     path="/buy",
     *     summary="get all Buy-BuyBill to insert into DB",
     *     tags={"BuyBill"},
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request"),
     *     @OA\Response(response=422, description="Unprocessable Content")
     * )
     */
    public function showAll()
    {

        return response()->json($this->buyBillService->showAll(), 200);
    }
}
