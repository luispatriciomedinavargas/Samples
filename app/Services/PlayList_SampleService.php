<?php



namespace App\Services;

use App\Models\PlayList;
use App\Models\Sample;
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
}