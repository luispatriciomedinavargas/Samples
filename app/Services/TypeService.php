<?php



namespace App\Services;

use App\Models\type;

class TypeService
{


    protected $typeModel;

    public function __construct(type $typeModel)
    {
        $this->typeModel = $typeModel;
    }

    
    public function deleteType($id)
    {
        $type = type::find($id);
        $type->delete();
        return $type;
    }

    public function returnAllTypes()
    {

        return type::All();
    }

    public function createType($request): type | bool
    {
        return type::create($request);
    }

    public function findById($id): type | null 
    {
        return type::find($id);
    }

    public function updateType($data,type $typeId)
    {
        return $typeId->update($data);
    }
}