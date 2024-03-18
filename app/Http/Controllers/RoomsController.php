<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Http\Requests\StoreRoomsRequest;
use App\Http\Requests\UpdateRoomsRequest;
use Inertia\Inertia;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Rooms::all();
        return Inertia::render("Room/index", ['data' => $rooms]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $r = Rooms::where('name', '!=', '')->orderByDesc('rcode')->get();
        $code = '6000';
        if ($r->count() > 0) {
            $code = $r->first()->rcode;
        }
        return Inertia::render('Room/create', ['room' => null, 'nextcode' => $code]);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomsRequest $request)
    {
        // return json_encode($request);
        
        Rooms::create([
            'name'=> $request->name,
            'rcode'=> $request->rcode,
        ]);
        
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Rooms $rooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rooms $rooms)
    {
        $rooms = Rooms::where('rcode',$rooms->rcode)->get();
        return Inertia::render('Rooms/cretae', ['room'=>$rooms, 'nextcode'=>null]);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomsRequest $request, Rooms $rooms)
    {
        
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rooms $rooms)
    {
        //
    }
}
