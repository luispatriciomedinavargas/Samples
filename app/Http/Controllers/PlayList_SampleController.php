<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PlayList;
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


    public function create(Request $request, PlayList $playlist_id, Sample $samples_id)
    {
        // $request->validate([
        //     'playlist_id' => 'required|numeric',
        //     'samples_id' => 'required|numeric'
        // ]);

        $newPlayListSample = $this->playList_SampleService->createRelationship($request->playlist_id, $request->samples_id);
        return response()->Json($newPlayListSample, 200);
    }
}
