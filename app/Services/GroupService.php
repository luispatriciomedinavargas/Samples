<?php



namespace App\Services;

use App\Models\Group;

class GroupService
{


    protected $groupModel;

    public function __construct(Group $groupModel)
    {
        $this->groupModel = $groupModel;
    }

    
    public function deleteGroup($id)
    {
        $group = Group::find($id);
        $group->delete();
        return $group;
    }

    public function returnAllGroups()
    {

        return Group::All();
    }

    public function createGroup($request): Group | bool
    {
        return Group::create($request);
    }

    public function findById($id): Group | null 
    {
        return Group::find($id);
    }

    public function updateGroup($data,Group $groupId)
    {
        return $groupId->update($data);
    }
}