<?php

namespace App\Http\Controllers;

use App\EventsBDE;
use App\ParticipatesBDE;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use Storage;
use File;
use PDF;

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


        /* if ($authorisation == 'free' || 'bde' || 'Salarié' ) {
             $participate = ParticipatesBDE::all();
             return view('welcome'); }

         else
             return view('events');
     }*/
    }
    public function downloadPDF($eventID){
        $participantsData = DB::select('SELECT id, name, firstname FROM `participates-bde` LEFT JOIN `users` ON `participates-bde`.`user_id` = `users`.`id`  WHERE `event_id` = ?', [$eventID]);
        $eventData = EventsBDE::find($eventID);

        $pdf = PDF::loadView('participates.pdf', compact('participantsData','eventData'));
        return $pdf->download('participants.pdf');
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $userID = Auth::user()->id;
            $status="";
            $isalready = DB::table('participates-bde')->where('event_id','=',$request->id_event)->where('user_id','=',$userID)->first();
            if ($isalready == []){
            ParticipatesBDE::Create([
                'event_id' => $request->id_event,
                'user_id' => $userID
            ]);
            $status  = "Participation bien enregistrée";}
            else
              $status = "Vous êtes déja inscit à cet évènement.";
            return redirect('/evenements')->with('status', $status);
        } else {
            $userID = 0;
            return redirect('/evenements')->with('status', 'Participation refusée, vous devez être connecté(e)!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()) {
            $authorisation = Auth::user()->isauthorized();

            $eventID = $id;
            $participantsData = DB::select('SELECT id, name, firstname FROM `participates-bde` LEFT JOIN `users` ON `participates-bde`.`user_id` = `users`.`id`  WHERE `event_id` = ?', [$eventID]);

            return view('participates.show', compact('eventID', 'participantsData'));
        } else {
            return redirect('/evenements')->with('status', 'Vous devez être connecté');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
