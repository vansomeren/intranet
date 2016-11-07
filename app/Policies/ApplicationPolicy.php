<?php namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Applications;
use App\Models\Training;

/**
 * Class TrainingPolicy
 * @package App\Policies
 */
class ApplicationPolicy
{
    use HandlesAuthorization;


    /**
     * @param User $user
     * @param applications $applications
     * @return bool
     */
    public function update(Applications $applications, Training $training) {

        return $applications->training_id === $training->id;


    }


}
