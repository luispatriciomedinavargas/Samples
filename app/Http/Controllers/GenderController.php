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
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|max:100|min:15'
        ]);

        $gender = $this->genderService->createGender($request->all());
        if ($gender) {
            return response()->json($gender);
        } {
            return response()->json('somesthing was bad, check  it', 400);
        }
    }

    /**
     * Display the specified resource.
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
    public function edit(Request $request,Gender $id)
    {

        $request->validate([
            'description' => 'required|max:100|min:15'
        ]);

        $gender = $this->genderService->updateGender($request->all(),$id);
        if ($gender) {
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
      
        $gender = $this->genderService->deleteGender($id);

        if ($gender) {
            return response()->json('The id ' . $id . ' was deleted correctly');
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }

    public function showAll(){
        

        return response()->json($this->genderService->returnAllGenders());
    }
}
