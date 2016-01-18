<?php
namespace App\Repositories;

use App\User;
use App\Pet;
use App\Record;

class RecordRepository
{
    /**
     * Get all of the records for a given pet.
     *
     * @param  Pet  $pet
     * @return Collection
     */
    public function forPet(Pet $pet)
    {
        return Record::where('pet_id', $pet->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}