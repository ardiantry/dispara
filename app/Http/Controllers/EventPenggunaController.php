<?php

namespace App\Http\Controllers;

use App\Models\EventPengguna;
use App\Http\Requests\StoreEventPenggunaRequest;
use App\Http\Requests\UpdateEventPenggunaRequest;

class EventPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventPengguna = EventPengguna::query()
            ->latest()
            ->get();
        return view('dashboard.eventPengguna.index', compact('eventPengguna'));
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
     * @param  \App\Http\Requests\StoreEventPenggunaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventPenggunaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventPengguna  $eventPengguna
     * @return \Illuminate\Http\Response
     */
    public function show(EventPengguna $eventPengguna)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventPengguna  $eventPengguna
     * @return \Illuminate\Http\Response
     */
    public function edit(EventPengguna $eventPengguna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEventPenggunaRequest  $request
     * @param  \App\Models\EventPengguna  $eventPengguna
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventPenggunaRequest $request, EventPengguna $eventPengguna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventPengguna  $eventPengguna
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventPengguna $eventPengguna)
    {
        //
    }
}
