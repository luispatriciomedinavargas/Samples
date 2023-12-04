<?php



namespace App\Services;

use App\Models\Sound;

class SoundService
{


    protected $soundModel;

    public function __construct(Sound $soundModel)
    {
        $this->soundModel = $soundModel;
    }

    
    public function deleteSound($id)
    {
        $sound = Sound::find($id);
        $sound->delete();
        return $sound;
    }

    public function returnAllSounds()
    {

        return Sound::All();
    }

    public function createSound($request): Sound | bool
    {
        return Sound::create($request);
    }

    public function findById($id): Sound | null 
    {
        return Sound::find($id);
    }

    public function updateSound($data,Sound $soundId)
    {
        return $soundId->update($data);
    }
}