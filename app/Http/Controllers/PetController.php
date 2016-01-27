<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pet;
use App\Record;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\PetRepository;
use App\Repositories\RecordRepository;

use JWTAuth;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * The pet repository instance.
     *
     * @var PetRepository
     */
    protected $pets, $records;

    public function __construct(PetRepository $pets, RecordRepository $records)
    {
        $this->pets = $pets;
        $this->records = $records;
    }

    public function index(Request $request)
    {
        //
        return view('pets.index', [
            'pets' => $this->pets->forUser($request->user()),
        ]);
    }

    public function all(Request $request)
    {
        $token = JWTAuth::getToken();
        $user = JWTAuth::toUser($token);
        return $this->pets->forUser($user);

//        $pets = Pet::all();
//        return $pets;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//        return $request->user()->pets()->create([
//            'name' => $request->petName,
//            'user_id' => 1
//        ]);

//        $pet  = new Pet;
//        $pet->name = $request->petName;
//        $pet->user_id = 1;
//        $pet->birthday = $request->createPetBirthday;
//        $pet->category = $request->createPetCategory;
//        $pet->avatar = $request->avatarData;

        $petData = [
            'name' => $request->petName,
            'user_id' => 1,
            'birthday' => $request->createPetBirthday,
            'category' => $request->createPetCategory,
            'avatar' => $request->avatarData,
        ];

        $pet = Pet::create($petData);
        return $pet;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $pet = Pet::findOrFail($id);
        $records = $this->records->forPet($pet);

        return view('pets.show', [
            'pet' => $pet,
            'records' => $records,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pet = Pet::find($id);

        return view('pets.edit', [
            'pet' => $pet,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pet = Pet::find($id);

        $pet->update($request->except('id'));

        return redirect('/pet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Pet $pet)
    {
        //
        $this->authorize('destroy', $pet);

        $pet->delete();

        return redirect('/pet');
    }
}
