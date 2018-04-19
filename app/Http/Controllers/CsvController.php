<?php

namespace App\Http\Controllers;

use App\ParticipatesBDE;
use Illuminate\Support\Facades\Auth;

class CsvController extends Controller
{
    public function downloadCSV($id)
    {
        if (Auth::check()) {
            $authorisation = Auth::user()->isauthorized();

            $eventID = $id;

            $participantsData = ParticipatesBDE::leftJoin('users', 'participates-bde.user_id', 'users.id')
                ->where('event_id', $eventID)
                ->select('name', 'firstname')->get();

            $csvparticipants = new \Laracsv\Export();
            $csvparticipants->build($participantsData, ['name', 'firstname'], false)->download('liste_des_participants.csv');

        } else {
            return redirect('/evenements')->with('status', 'Vous devez être connecté');
        }
    }

}
