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
