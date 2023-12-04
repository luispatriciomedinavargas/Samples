<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Services\GroupService;
use Illuminate\Http\Request;

class GroupContrller extends Controller
{
    protected $groupService;
    public function __construct(GroupService $groupService)
    {
        $this->groupService = $groupService;
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|max:100|min:15'
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
    public function show($id)
    {
    

        $group = $this->groupService->findById($id);
        if ($group) {
            return response()->json($group);
        } {
            return response()->json('somesthing was bad, check it', 400);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,Group $id)
    {

        $request->validate([
            'description' => 'required|max:100|min:15'
        ]);

        $group = $this->groupService->updateGroup($request->all(),$id);
        if ($group) {
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
      
        $group = $this->groupService->deleteGroup($id);

        if ($group) {
            return response()->json('The id ' . $id . ' was deleted correctly');
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }

    public function showAll(){
        

        return response()->json($this->groupService->returnAllGroups());
    }
}
