<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sound;
use App\Services\SoundService;
use Illuminate\Http\Request;

class SoundController extends Controller
{
    protected $soundService;
    public function __construct(SoundService $soundService)
    {
        $this->soundService = $soundService;
    }




    /**
     * Store a newly created resource in storage.
     */
        /**
     * @OA\Post(
     *     path="/sound",
     *     summary="Create a sound to insert into DB",
     *     tags={"Sounds"},
     *     @OA\RequestBody(
     *         description=" the description should be at least 4 character.",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Sound")
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

        $sound = $this->soundService->createSound($request->all());
        if ($sound) {
            return response()->json($sound);
        } {
            return response()->json('somesthing was bad, check  it', 400);
        }
    }

    /**
     * Display the specified resource.
     */
            /**
     * @OA\Get(
     *     path="/sound/{id}",
     *     summary="get one resource",
     *     tags={"Sounds"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Sound's id",
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
     *          @OA\JsonContent(ref="#/components/schemas/Sound")
     *       ),
     *     @OA\Response(response=400, description="Invalid request"),
     * )
     */
    public function show($id)
    {
        $sound = $this->soundService->findById($id);
        if (!empty($sound)) {
            return response()->json($sound);
        } else {
            return response()->json('id not found, please check it', 404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
        /**
     * @OA\Put(
     *   path="/sound/{id}",
     *   summary="edit a resource from db",
     *   @OA\RequestBody(
     *         description=" the description should be at least 4 character.",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Sound")
     *     ),
     *   tags={"Sounds"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Sounds id",
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
     *          @OA\JsonContent(ref="#/components/schemas/Sound")
     *       ),
     *     @OA\Response(response=400, description="Invalid request"),
     * 
     * )
     */
    public function edit(Request $request, Sound $id)
    {

        $request->validate([
            'description' => 'required|max:100|min:4'
        ]);

        $sound = $this->soundService->updateSound($request->all(),$id);
        if ($sound) {
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
     *     path="/sound/{id}",
     *     summary="edit a resource from db",
     *     tags={"Sounds"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Sounds id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *               example=2 
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
      
        $sound = $this->soundService->deleteSound($id);

        if ($sound) {
            return response()->json('The id ' . $id . ' was deleted correctly');
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }
     /**
     * @OA\Get(
     *     path="/sound",
     *     summary="Show all resource from DB",
     *     tags={"Sounds"},
     *     @OA\Response(response=200, description="Successful operation")
     * )
     */
    public function showAll(){
        

        return response()->json($this->soundService->returnAllSounds());
    }
}
