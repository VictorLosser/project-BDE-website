<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventsBDE;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = EventsBDE::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EventsBDE::create([
            'title' => $request->eventName,
            'description' => $request->eventDescription,
            'date_event' => $request->eventDate,
            'recurrence' => $request->eventRecurrence,
            'price' => $request->eventPrice,
            'id' => $request->eventIdUser
        ]);

        return redirect('/evenements')->with('status', "L'évènement a été ajouté avec succés !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = EventsBDE::find($id);
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = EventsBDE::find($id);

        return view('events.edit', compact('event'));
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
        EventsBDE::find($id)->update([
            'title' => $request->eventName,
            'description' => $request->eventDescription,
            'date_event' => $request->eventDate,
            'recurrence' => $request->eventRecurrence,
            'price' => $request->eventPrice,
            'id' => $request->eventIdUser
        ]);

        return redirect('/evenements')->with('status', "Le produit a bien été modifié !");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EventsBDE::find($id)->delete();
        return redirect('/evenements')->with('status', 'Le produit a bien été supprimé');
    }
}
