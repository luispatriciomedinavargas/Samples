<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PlayList;
use App\Services\PlayListService;
use Illuminate\Http\Request;

class PlayListController extends Controller
{



    protected $playListService;
    public function __construct(PlayListService $playListService)
    {
        $this->playListService = $playListService;
    }


    /**
     * Store a newly created resource in storage.
     */
    /**
     * @OA\Post(
     *     path="/playList",
     *     summary="Create a playlist to insert into DB",
     *     tags={"Playlist"},
     *     @OA\RequestBody(
     *         description="The name should be at least 6 characters.",
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string", description="The name of the playlist. It should be at least 6 characters.", example="MyPlaylist"),
     *             @OA\Property(property="user_id", type="integer", description="The user ID who made the playlist.", example=1)
     *         )
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request"),
     *     @OA\Response(response=422, description="Unprocessable Content")
     * )
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20|min:6',
            'user_id' => 'required'
        ]);
        $newPlayList = $this->playListService->newPlayList($request->all());

        if ($newPlayList) {
            return response()->json($newPlayList);
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }

    /**
     * Display the specified resource.
     */

    /**
     * @OA\Get(
     *     path="/playList/{id}",
     *     summary="get one resource",
     *     tags={"Playlist"},
     *      @OA\Parameter(
     *          name="id",
     *          description="User's id",
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
    public function show(string $idUser)
    {
        $playList = $this->playListService->findByUser($idUser);
        if ($playList) {
            return response()->json($playList);
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * @OA\Put(
     *     path="/playList/{id}",
     *     summary="Edit a playlist in DB",
     *     tags={"Playlist"},
     *        @OA\Parameter(
     *          name="id",
     *          description="User's id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *               example=1
     *          )
     *      ),
     *     @OA\RequestBody(
     *         description="The name should be at least 6 characters.",
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="name", type="string", description="The name of the playlist. It should be at least 6 characters.", example="MyPlaylist"),
     *         )
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request"),
     *     @OA\Response(response=422, description="Unprocessable Content")
     * )
     */
    public function edit(Request $request, PlayList $id)
    {
        $request->validate([
            'name' => 'required|max:20|min:6'
        ]);
        $playList = $this->playListService->updateName($request->all(), $id);
        if ($playList) {
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
     *     path="/playList/{id}",
     *     summary="Delete an Playlist from DB",
     *     tags={"Playlist"},
     *     @OA\Parameter(
     *          name="id",
     *          description="User's id",
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
    public function destroy(string $id)
    {
        $group = $this->playListService->deletePlayList($id);

        if ($group) {
            return response()->json('The id ' . $id . ' was deleted correctly');
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }
}
