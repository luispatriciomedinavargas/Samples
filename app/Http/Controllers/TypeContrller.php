<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Services\TypeService;
use Illuminate\Http\Request;

class TypeContrller extends Controller
{
    protected $soundService;
    public function __construct(TypeService $soundService)
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
    public function edit(Request $request,Type $id)
    {

        $request->validate([
            'description' => 'required|max:100|min:15'
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
    public function destroy(string $id)
    {
      
        $sound = $this->soundService->deleteType($id);

        if ($sound) {
            return response()->json('The id ' . $id . ' was deleted correctly');
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }

    public function showAll(){
        

        return response()->json($this->soundService->returnAllTypes());
    }
}
