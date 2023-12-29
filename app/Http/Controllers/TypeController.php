<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Services\TypeService;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    protected $soundService;
    public function __construct(TypeService $soundService)
    {
        $this->soundService = $soundService;
    }




    /**
     * Store a newly created resource in storage.
     */
        /**
     * @OA\Post(
     *     path="/type",
     *     summary="Create a type to insert into DB",
     *     tags={"Types"},
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

        $sound = $this->soundService->createType($request->all());
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
     *     path="/type/{id}",
     *     summary="get one resource",
     *     tags={"Types"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Gender's id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *              example=1
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
    

        $sound = $this->soundService->findById($id);
        if ($sound) {
            return response()->json($sound);
        } {
            return response()->json('somesthing was bad, check it', 400);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
        /**
     * @OA\Put(
     *   path="/type/{id}",
     *   summary="edit a resource from db",
     *   @OA\RequestBody(
     *         description=" the description should be at least 4 character.",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Gender")
     *     ),
     *   tags={"Types"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Types id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *              example=1
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
    public function edit(Request $request,Type $id)
    {

        $request->validate([
            'description' => 'required|max:100|min:4'
        ]);

        $sound = $this->soundService->updateType($request->all(),$id);
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
     *     path="/type/{id}",
     *     summary="edit a resource from db",
     *     tags={"Types"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Types id",
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
      
        $sound = $this->soundService->deleteType($id);

        if ($sound) {
            return response()->json('The id ' . $id . ' was deleted correctly');
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }
     /**
     * @OA\Get(
     *     path="/type",
     *     summary="Show all resource from DB",
     *     tags={"Types"},
     *     @OA\Response(response=200, description="Successful operation")
     * )
     */
    public function showAll(){
        

        return response()->json($this->soundService->returnAllTypes());
    }
}
