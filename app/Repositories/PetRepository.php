<?php
namespace App\Repositories;

use App\User;
use App\Pet;

class PetRepository
{
    /**
     * Get all of the pets for a given user.
     *
     * @param  User  $user
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Pet::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}