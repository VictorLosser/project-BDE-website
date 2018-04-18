<?php

namespace App\Http\Controllers;

use App\ParticipatesBDE;
use Illuminate\Http\Request;
use App\User;
use Storage;
use File;

use Illuminate\Support\Facades\Auth;
class ParticipateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $authorisation = Auth::user()->isauthorized();
        }
        else
            return redirect('/evenements')->with('status', 'Accès refusé');

        if ($authorisation == 'free' || 'bde' || 'Salarié' ) {
            $participate = ParticipatesBDE::all();
            return view('welcome'); }

        else
            return view('events');
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
        if (Auth::check()) {
            $userID = Auth::user()->id;

        ParticipatesBDE::create([
            'event_id' => $request->id_event,
            'user_id' => $userID
        ]);
            return redirect('/evenements');
        }
        else {
            $userID = 0;
            return redirect('/evenements');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
    public function destroy($id)
    {
        //
    }
}
