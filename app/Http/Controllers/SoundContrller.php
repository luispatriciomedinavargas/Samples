<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sound;
use App\Services\SoundService;
use Illuminate\Http\Request;

class SoundContrller extends Controller
{
    protected $soundService;
    public function __construct(SoundService $soundService)
    {
        $this->soundService = $soundService;
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|max:100|min:15'
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
    public function edit(Request $request,Sound $id)
    {

        $request->validate([
            'description' => 'required|max:100|min:15'
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
    public function destroy(string $id)
    {
      
        $sound = $this->soundService->deleteSound($id);

        if ($sound) {
            return response()->json('The id ' . $id . ' was deleted correctly');
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }

    public function showAll(){
        

        return response()->json($this->soundService->returnAllSounds());
    }
}
