<?php namespace App\Policies;

use App\User;
use App\Models\Announcement;
use Illuminate\Auth\Access\HandlesAuthorization;

/**
 * Class AnnouncementPolicy
 * @package App\Policies
 */
class AnnouncementPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Announcement $announcement
     * @return bool
     */
    public function show(User $user, Announcement $announcement){

        return $user->id === $announcement->owner_id;
    }

    /**
     * @param User $user
     * @param Announcement $announcement
     * @return bool
     */
    public function update(User $user, Announcement $announcement) {

        return $user->id === $announcement->owner_id;

    }

    /**
     * @param User $user
     * @param Announcement $announcement
     * @return bool
     */
    public function delete(User $user, Announcement $announcement) {

        return $user->id === $announcement->owner_id;


    }


}
