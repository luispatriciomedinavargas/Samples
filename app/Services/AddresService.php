<?php



namespace App\Services;

use App\Models\Address;

class AddressService
{


    protected $addressModel;

    public function __construct(Address $addressModel)
    {
        $this->addressModel = $addressModel;
    }

    
    public function deleteAddress($id)
    {
        $address = Address::find($id);
        $address->delete();
        return $address;
    }

    public function returnAllAddresss()
    {

        return Address::All();
    }

    public function createAddress($request): Address | bool
    {
        return Address::create($request);
    }

    public function findById($id): Address | null 
    {
        return Address::find($id);
    }

    public function updateAddress($data,Address $AddressId)
    {
        return $AddressId->update($data);
    }
}