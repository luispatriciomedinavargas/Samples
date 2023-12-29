<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Services\GroupService;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    protected $groupService;
    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }




    /**
     * Store a newly created resource in storage.
     */
        /**
     * @OA\Post(
     *     path="/group",
     *     summary="Create a group to insert into DB",
     *     tags={"Groups"},
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

        $group = $this->groupService->createGroup($request->all());
        if ($group) {
            return response()->json($group);
        } {
            return response()->json('somesthing was bad, check  it', 400);
        }
    }

    /**
     * Display the specified resource.
     */
            /**
     * @OA\Get(
     *     path="/group/{id}",
     *     summary="get one resource",
     *     tags={"Groups"},
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


        $group = $this->groupService->findById($id);
        if (!empty($group)) {
            return response()->json($group);
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
        /**
     * @OA\Put(
     *   path="/group/{id}",
     *   summary="edit a resource from db",
     *   @OA\RequestBody(
     *         description=" the description should be at least 4 character.",
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Gender")
     *     ),
     *   tags={"Groups"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Groups id",
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
    public function edit(Request $request, Group $id)
    {

        $request->validate([
            'description' => 'required|max:100|min:4'
        ]);

        $group = $this->groupService->updateGroup($request->all(), $id);
        if ($group) {
            return response()->json('The id ' . $id->id . ' was updated correctly');
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
        /**
     * Remove the specified resource from storage.
     */
     /**
     * @OA\Delete(
     *     path="/group/{id}",
     *     summary="edit a resource from db",
     *     tags={"Groups"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Groups id",
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

        $group = $this->groupService->deleteGroup($id);

        if ($group) {
            return response()->json('The id ' . $id . ' was deleted correctly');
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }
     /**
     * @OA\Get(
     *     path="/group",
     *     summary="Show all resource from DB",
     *     tags={"Groups"},
     *     @OA\Response(response=200, description="Successful operation")
     * )
     */
    public function showAll()
    {


        return response()->json($this->groupService->returnAllGroups());
    }
}
