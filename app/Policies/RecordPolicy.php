<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Record;

class RecordPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function destroy(User $user, Record $record)
    {
        $pet = $record->pet()->first();
//        dd($pet);
        return $user->id === $pet->user_id;
    }
}
