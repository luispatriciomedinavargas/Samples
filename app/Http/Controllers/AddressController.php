<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Services\AddressService;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    protected $addressService;
    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|max:100|min:15',
            'user_id'=> 'required|numeric',
        ]);

        // $address = $this->addressService->createAddress($request->all());
        return response()->json('holi',200);
        // if ($address) {
        // } {
        //     return response()->json('somesthing was bad, check  it', 400);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    

        $address = $this->addressService->findById($id);
        if (!empty($address)) {
            return response()->json($address);
        } {
            return response()->json('somesthing was bad, check it', 400);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,Address $id)
    {

        $request->validate([
            'description' => 'required|max:100|min:15'
        ]);

        $address = $this->addressService->updateAddress($request->all(),$id);
        if ($address) {
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
      
        $address = $this->addressService->deleteAddress($id);

        if ($address) {
            return response()->json('The id ' . $id . ' was deleted correctly');
        } {
            return response()->json('somesthing was bad, check it', 400);
        }
    }

    public function showAll(){
        

        return response()->json($this->addressService->returnAllAddresss());
    }
}
