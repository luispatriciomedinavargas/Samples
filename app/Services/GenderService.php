<?php



namespace App\Services;

use App\Models\Gender;

class GenderService
{


    protected $genderModel;

    public function __construct(Gender $genderModel)
    {
        $this->genderModel = $genderModel;
    }

    
    public function deleteGender($id)
    {
        $gender = Gender::find($id);
        $gender->delete();
        return $gender;
    }

    public function returnAllGenders()
    {

        return Gender::All();
    }

    public function createGender($request): Gender | bool
    {
        return Gender::create($request);
    }

    public function findById($id): Gender | null 
    {
        return Gender::find($id);
    }

    public function updateGender($data,Gender $GenderId)
    {
        return $GenderId->update($data);
    }
}