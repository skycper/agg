<?php

namespace App\Http\Controllers;

use App\Pet;
use App\Record;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\RecordRepository;

class RecordController extends Controller
{
    /**
     * The record repository instance.
     *
     * @var RecordRepository
     */
    protected $records;

    public function __construct(RecordRepository $records)
    {
        $this->middleware('auth');

        $this->records = $records;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, Pet $pet)
    {
        //
        $this->validate($request, [
            'content' => 'required',
        ]);

        $pet->records()->create([
            'content' => $request->content,
        ]);

        return redirect('/pet/'.$pet->id);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Record $record)
    {
        //
        $this->authorize('destroy', $record);

        $record->delete();

        $pet = $record->pet()->first();

        return redirect('/pet/'.$pet->id);
    }
}
