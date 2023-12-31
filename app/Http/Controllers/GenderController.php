<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gender;
use App\Services\GenderService;
use Illuminate\Http\Request;

class GenderController extends Controller
{



    protected $genderService;
    public function __construct(GenderService $genderService)
    {
        $this->genderService = $genderService;
    }


   
    /**
     * Store a newly created resource in storage.
     */
    /**
     * @OA\Post(
     *     path="/gender",
     *     summary="Create a gender to insert into DB",
     *     tags={"Genders"},
     *     @OA\RequestBody(
     *         description=" the description should be at least 4 character.",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Gender")
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request"),
     *     @OA\Response(response=422, description="Unprocessable Content")
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|max:100|min:4'
        ]);
        $gender = $this->genderService->createGender($request->all());
        if ($gender) {
            return response()->json($gender,200);
        } {
            return response()->json('somesthing was bad, check  it', 400);
        }
    }

    /**
     * Display the specified resource.
     */
     /**
     * @OA\Get(
     *     path="/gender/{id}",
     *     summary="get one resource",
     *     tags={"Genders"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Gender's id",
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
     *          @OA\JsonContent(ref="#/components/schemas/Gender")
     *       ),
     *     @OA\Response(response=400, description="Invalid request"),
     * )
     */
    public function show($id)
    {


        $gender = $this->genderService->findById($id);
        if (!empty($gender)) {
            return response()->json($gender);
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * @OA\Put(
     *   path="/gender/{id}",
     *   summary="edit a resource from db",
     *   @OA\RequestBody(
     *         description=" the description should be at least 4 character.",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Gender")
     *     ),
     *   tags={"Genders"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Genders id",
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
     *          @OA\JsonContent(ref="#/components/schemas/Gender")
     *       ),
     *     @OA\Response(response=400, description="Invalid request"),
     * 
     * )
     */
    public function edit(Request $request, Gender $id)
    {

        $request->validate([
            'description' => 'required|max:100|min:4'
        ]);

        $gender = $this->genderService->updateGender($request->all(), $id);
        if ($gender) {
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
     *     path="/gender/{id}",
     *     summary="edit a resource from db",
     *     tags={"Genders"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Genders id",
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

        $gender = $this->genderService->deleteGender($id);

        if ($gender) {
            return response()->json('The id ' . $id . ' was deleted correctly');
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }
     /**
     * @OA\Get(
     *     path="/gender",
     *     summary="Show all resource from DB",
     *     tags={"Genders"},
     *     @OA\Response(response=200, description="Successful operation")
     * )
     */
    public function showAll()
    {


        return response()->json($this->genderService->returnAllGenders());
    }
}
