<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\pet;
use App\Repositories\PetRepository;

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
    protected $pets;

    public function __construct(PetRepository $pets)
    {
        $this->middleware('auth');

        $this->pets = $pets;
    }

    public function index(Request $request)
    {
        //


        return view('pets.index', [
            'pets' => $this->pets->forUser($request->user()),
        ]);
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
        $this->validate($request, [
            'name' => 'required|max:25',
        ]);

        $request->user()->pets()->create([
            'name' => $request->name,
        ]);

        return redirect('/pet');
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

        $pet->name = $request->name;

        $pet->save();

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
