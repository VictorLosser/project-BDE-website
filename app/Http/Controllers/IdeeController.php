<?php

namespace App\Http\Controllers;

use App\IdeaBoxBDE;
use Illuminate\Http\Request;
use App\User;
use Storage;
use File;

use Illuminate\Support\Facades\Auth;

class IdeeController extends Controller
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
        } else
            return redirect('/idees')->with('status', 'Accès refusé');

        if ($authorisation == 'Bde' || 'Salarié') {
            $idees = IdeaBoxBDE::all();
            return view('idees.index', compact('idees'));
        } else
            return redirect('/idees')->with('status', 'Accès refusé');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('idees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user())
            $userID = Auth::user()->id;
        else
            $userID = 0;


        IdeaBoxBDE::create([
            'title' => $request->eventName,
            'description' => $request->eventDescription,
            'user_id' => $userID
        ]);

        return redirect('/idees')->with('status', "L'évènement a été ajouté avec succés !");

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $idee = IdeaBoxBDE::find($id);
        return view('idees.show', compact('idee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idee = IdeaBoxBDE::find($id);

        if (Auth::check()) {
            return view('idees.edit', compact('idee'));
        } else {
            return redirect('/idees')->with('status', 'Accès refusé');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        IdeaBoxBDE::find($id)->update([
            'title' => $request->eventName,
            'description' => $request->eventDescription,
        ]);

        return redirect('/idees')->with('status', "L'évènement a bien été modifié !");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        IdeaBoxBDE::find($id)->delete();

        return redirect('/idees')->with('status', "L'événement a bien été supprimé");
    }
}
