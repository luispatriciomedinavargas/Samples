<?php



namespace App\Services;

use App\Models\PlayListSample;

class PlayList_SampleService
{


    public function createRelationship(int $playlist_id, int $samples_id)
    {
        return PlayListSample::create([
            'playlist_id' => $playlist_id,
            'samples_id' => $samples_id,
        ]);
    }

    public function findByPlayList($idPlaylist)
    {
        return PlayListSample::where('playlist_id', $idPlaylist)->get();
    }

    public function findBySample($idSample)
    {
        return  PlayListSample::where('samples_id', $idSample)->get();
       
         
    }
}
