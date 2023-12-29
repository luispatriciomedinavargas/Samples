<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Services\AddressService;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    protected $addressService;
    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }




    /**
     * Store a newly created resource in storage.
     */
    /**
     * @OA\Post(
     *     path="/address",
     *     summary="Create a address to insert into DB",
     *     tags={"Address"},
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="description", type="string",example="Street fake 123456"),
     *             @OA\Property(property="user_id", type="integer",example=1)
     *         )
     *     ),
     *     @OA\Response(response="200", description="Successful operation")
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|max:100|min:15',
            'user_id' => 'required|numeric',
        ]);

        $address = $this->addressService->createAddress($request->all());
        if ($address) {
            return response()->json($address, 200);
        } {
            return response()->json('somesthing was bad, check  it', 400);
        }
    }

    /**
     * Display the specified resource.
     */
    /**
     * @OA\Get(
     *     path="/address/{id}",
     *     summary="get one resource",
     *     tags={"Address"},
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
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Address")
     *       ),
     *     @OA\Response(response=400, description="Invalid request"),
     * )
     */
    public function show($id)
    {

        $address = $this->addressService->findById($id);
        if (!empty($address)) {
            return response()->json($address);
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
/**
 * @OA\Put(
 *   path="/address/{id}",
 *   summary="edit a resource from db",
 *   tags={"Address"},
 *   @OA\RequestBody(
 *     @OA\JsonContent(
 *       type="object",
 *       @OA\Property(property="description", type="string",example="Street fake 123456"),
 *       @OA\Property(property="user_id", type="integer",example=1)
 *     )
 *   ),
 *   @OA\Parameter(
 *     name="id",
 *     description="Address id",
 *     required=true,
 *     in="path",
 *     @OA\Schema(
 *       type="integer",
 *       example=1
 *     )
 *   ),
 *   @OA\Response(
 *     response=200,
 *     description="Successful operation",
 *     @OA\JsonContent(ref="#/components/schemas/Address")
 *   ),
 *   @OA\Response(response=400, description="Invalid request")
 * )
 */
    public function edit(Request $request, Address $id)
    {

        $request->validate([
            'description' => 'required|max:100|min:15'
        ]);

        $address = $this->addressService->updateAddress($request->all(), $id);
        if ($address) {
            return response()->json('The id ' . $id->id . ' was updated correctly');
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    /**
     * @OA\Delete(
     *     path="/address/{id}",
     *     summary="edit a resource from db",
     *     tags={"Address"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Address id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *              example=2 
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *       ),
     *     @OA\Response(response=400, description="Invalid request"),
     * 
     * )
     */
    public function destroy(string $id)
    {

        $address = $this->addressService->deleteAddress($id);

        if ($address) {
            return response()->json('The id ' . $id . ' was deleted correctly');
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }
    /**
     * @OA\Get(
     *     path="/address",
     *     summary="Show all resource from DB",
     *     tags={"Address"},
     *     @OA\Response(response=200, description="Successful operation")
     * )
     */
    public function showAll()
    {
        return response()->json($this->addressService->returnAllAddresss());
    }
}
