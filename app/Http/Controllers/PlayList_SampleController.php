<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PlayList;
use App\Models\PlayListSample;
use App\Models\Sample;
use App\Services\PlayList_SampleService;
use Illuminate\Http\Request;

class PlayList_SampleController extends Controller
{

    public PlayList_SampleService $playList_SampleService;
    public function __construct(PlayList_SampleService $playList_SampleService)
    {
        $this->playList_SampleService = $playList_SampleService;
    }

    /**
     * @OA\Post(
     *     path="/playlist_sample",
     *     summary="Create an PlayList_sample to DB",
     *     tags={"PlayListSample"},
     *     @OA\RequestBody(
     *          description="Details of the new playlist_sample to be created",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(property="playlist_id", type="integer", description="The id of the playlist", example=1),
     *              @OA\Property(property="samples_id", type="integer", description="The id of the sample", example=2)
     *          )
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request"),
     *     @OA\Response(response=422, description="Unprocessable Content")
     * )
     */

    public function create(Request $request, PlayList $playlist_id, Sample $samples_id)
    {
        $request->validate([
            'playlist_id' => 'required|numeric',
            'samples_id' => 'required|numeric'
        ]);

        $newPlayListSample = $this->playList_SampleService->createRelationship($request->playlist_id, $request->samples_id);
        return response()->Json($newPlayListSample, 200);
    }
     /**
     * @OA\Get(
     *     path="/playlist_sample/playlist/{id}",
     *     summary="get one resource",
     *     tags={"PlayListSample"},
     *      @OA\Parameter(
     *          name="id",
     *          description="PlayList's id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *               example=1
     *          )
     *      ),
     *      @OA\Response(
     *          response = 200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/PlayListSample")
     *       ),
     *     @OA\Response(response=400, description="Invalid request"),
     * )
     */
    public function findByPlayList($idPlayList)
    {

        $findByPlaylist = $this->playList_SampleService->findByPlayList($idPlayList);
        return response()->Json($findByPlaylist, 200);
    }
     /**
     * @OA\Get(
     *     path="/playlist_sample/sample/{id}",
     *     summary="get one resource",
     *     tags={"PlayListSample"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Sample's id",
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
     *          @OA\JsonContent(ref="#/components/schemas/PlayListSample")
     *       ),
     *     @OA\Response(response=400, description="Invalid request"),
     * )
     */
    public function findBySample($idSample)
    {  
        $findBySample = $this->playList_SampleService->findBySample($idSample);
        return response()->Json($findBySample, 200);
    }
}
