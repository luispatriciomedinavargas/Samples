<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sample;
use App\Services\SamplesService;
use Illuminate\Http\Request;

class SampleController extends Controller
{



    protected $sampleService;
    public function __construct(SamplesService $sampleService)
    {
        $this->sampleService = $sampleService;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "description" => 'required|max:100|min:10',
            "url" => 'required',
            "price" => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            "group_id" => 'numeric|nullable',
            "type_id" => 'numeric|nullable',
            "gender_id" => 'numeric|nullable',
            "sound_id" => 'numeric|nullable',
        ]);
        $newSample = $this->sampleService->createSample($request->all());


        if ($newSample) {
            return response()->json($newSample);
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }

    /**
     * Display allresource.
     */
    public function show()
    {
        return $this->sampleService->returnAllSamples();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Sample $Id)
    {
        $request->validate([
            "description" => 'required|max:100|min:10',
            "url" => 'required',
            "price" => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            "group_id" => 'numeric|nullable',
            "type_id" => 'numeric|nullable',
            "gender_id" => 'numeric|nullable',
            "sound_id" => 'numeric|nullable',
        ]);
        \Log::error($request->all());
        \Log::error($Id);
        
        $updateSample = $this->sampleService->updateSample($request->all(), $Id);

        if ($updateSample) {
            return response()->json($updateSample);
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showByFilter(Request $request)
    {

        return $this->sampleService->findSamples($request->all());
    }
}
