<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sample;
use App\Services\SamplesService;
use Illuminate\Auth\Events\Validated;
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
    /**
     * @OA\Post(
     *     path="/sample",
     *     summary="Create a sample to insert into DB",
     *     tags={"Sample"},
     *     @OA\RequestBody(
     *         description="The description should be at least 10 characters.",
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="description", type="string", description="The description of the sample. It should be at least 10 characters and at most 100 characters.", example="test 123456"),
     *             @OA\Property(property="url", type="string", description="The URL where it is stored.", example="nani.com"),
     *             @OA\Property(property="price", type="number", description="The cost. It should be a numeric value with up to 2 decimal places.", example=2),
     *             @OA\Property(property="group_id", type="integer", description="The Group's ID which it belongs to. This is an optional field.", example=1, nullable=true),
     *             @OA\Property(property="type_id", type="integer", description="The Type's ID which it belongs to. This is an optional field.", example=1, nullable=true),
     *             @OA\Property(property="gender_id", type="integer", description="The Gender's ID which it belongs to. This is an optional field.", example=1, nullable=true),
     *             @OA\Property(property="sound_id", type="integer", description="The Sound's ID which it belongs to. This is an optional field.", example=1, nullable=true)
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
    /**
     * @OA\Get(
     *     path="/sample/",
     *     summary="get all resource",
     *     tags={"Sample"},
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Sample")
     *       ),
     *     @OA\Response(response=400, description="Invalid request"),
     * )
     */
    public function show()
    {
        return $this->sampleService->returnAllSamples();
    }

    /**
     * Show the form for editing the specified resource.
     */
    /**
     * @OA\Put(
     *     path="/sample/{id}",
     *     summary="Edit a sample",
     *     tags={"Sample"},
     *      *      @OA\Parameter(
     *          name="id",
     *          description="Sample's id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer",
     *               example=1
     *          )
     *      ),
     *     @OA\RequestBody(
     *         description="The description should be at least 10 characters.",
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="description", type="string", description="The description of the sample. It should be at least 10 characters and at most 100 characters.", example="test 123456"),
     *             @OA\Property(property="url", type="string", description="The URL where it is stored.", example="nani.com"),
     *             @OA\Property(property="price", type="number", description="The cost. It should be a numeric value with up to 2 decimal places.", example=2),
     *             @OA\Property(property="group_id", type="integer", description="The Group's ID which it belongs to. This is an optional field.", example=1, nullable=true),
     *             @OA\Property(property="type_id", type="integer", description="The Type's ID which it belongs to. This is an optional field.", example=1, nullable=true),
     *             @OA\Property(property="gender_id", type="integer", description="The Gender's ID which it belongs to. This is an optional field.", example=1, nullable=true),
     *             @OA\Property(property="sound_id", type="integer", description="The Sound's ID which it belongs to. This is an optional field.", example=1, nullable=true)
     *         )
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request"),
     *     @OA\Response(response=422, description="Unprocessable Content")
     * )
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

        $updateSample = $this->sampleService->updateSample($request->all(), $Id);

        if ($updateSample) {
            return response()->json($updateSample);
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }

        /**
     * @OA\Post(
     *     path="/sample/byfilter",
     *     summary="Fetch a sample from DB",
     *     tags={"Sample"},
     *     @OA\RequestBody(
     *         description="The description should be at least 10 characters.",
     *         required=true,
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="group_id", type="integer", description="The Group's ID which it belongs to. This is an optional field.", example=1, nullable=true),
     *             @OA\Property(property="type_id", type="integer", description="The Type's ID which it belongs to. This is an optional field.", example=1, nullable=true),
     *             @OA\Property(property="gender_id", type="integer", description="The Gender's ID which it belongs to. This is an optional field.", example=1, nullable=true),
     *             @OA\Property(property="sound_id", type="integer", description="The Sound's ID which it belongs to. This is an optional field.", example=1, nullable=true)
     *         )
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Invalid request"),
     *     @OA\Response(response=422, description="Unprocessable Content")
     * )
     */

    public function showByFilter(Request $request)
    {

        return $this->sampleService->findSamples($request->all());
    }
}
