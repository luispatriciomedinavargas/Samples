<?php

namespace App\Services;

use App\Models\PlayList;

class PlayListService
{

    protected $playListModel;


    public function __construct(PlayList $playListModel)
    {
        $this->playListModel = $playListModel;
    }




    public function newPlayList($data): PlayList | null
    {
        return PlayList::create($data);
    }


    public function findByUser($idUser)
    {
        return PlayList::where('user_id', $idUser)->with('user')->get();
    }

    public function updateName($data, PlayList $playlistID)
    {
        return $playlistID->update($data);
    }

    public function deletePlayList($id)
    {
        $playList = PlayList::find($id);
        $playList->delete();
        return $playList;
    }

}
