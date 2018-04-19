<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventsBDE;
use App\ImageBDE;
use App\LikeBDE;
use App\CommentsBDE;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

use Illuminate\Support\Facades\Auth;

class EventController extends Controller
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
            return redirect('/evenements')->with('status', 'Accès refusé');

        if ($authorisation == 'Bde' || 'Salarié') {
            $events = EventsBDE::all();
            return view('events.index', compact('events'));
        } else
            return redirect('/evenements')->with('status', 'Accès refusé');
    }

    public function indexData()
    {
        $events = EventsBDE::all()->toJson();
        echo $events;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $authorisation = Auth::user()->isauthorized();
        } else
            return redirect('/evenements')->with('status', 'Accès refusé');

        if ($authorisation == 'Bde') {
            return view('events.create');
        } else
            return redirect('/evenements')->with('status', 'Accès refusé');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userID = Auth::user()->id;

        $path = Storage::putFile('events', $request->file('eventImg'));

        EventsBDE::create([
            'title' => $request->eventName,
            'description' => $request->eventDescription,
            'date_event' => $request->eventDate,
            'repeat_interval' => $request->eventRecurrence,
            'price' => $request->eventPrice,
            'user_id' => $userID
        ]);

        $lastEventId = EventsBDE::orderBy('id', 'DESC')->first()->id;

        ImageBDE::create([
            'image_link' => $path,
            'alt' => $request->eventAlt,
            'imageable_id' => $lastEventId,
            'imageable_type' => 'event',
            'user_id' => $userID
        ]);


        return redirect('/evenements')->with('status', "Nouvel évènement ajouté avec succès !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = EventsBDE::find($id);

        if (Auth::check()) {
            $status = Auth::user()->status_id;
            if ($status == 2)
                return view('events.edit', compact('event'));
        } else {
            return redirect('/evenements')->with('status', 'Accès refusé');
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
        $userID = Auth::user()->id;

        EventsBDE::find($id)->update([
            'title' => $request->eventName,
            'description' => $request->eventDescription,
            'date_event' => $request->eventDate,
            'repeat_interval' => $request->eventRecurrence,
            'price' => $request->eventPrice,
            'user_id' => $userID
        ]);
        $lastEventId = EventsBDE::orderBy('id', 'DESC')->first()->id;

        if ($request->has('eventImg')) {
            /*$path = 'storage/events/'.$random_name=rand(5, 10).$request->eventImg;
            Storage::disk('public')->put($path, $request->file('eventImg'));*/
            $path = Storage::putFile('events', $request->file('eventImg'));


            ImageBDE::where([
                ['imageable_id', '=', $id],
                ['imageable_type', '=', 'event']
            ])->update([
                'image_link' => $path,
                'alt' => $request->eventAlt,
                'imageable_id' => $lastEventId,
                'imageable_type' => 'event',
                'user_id' => $userID
            ]);
        }
        return redirect('/evenements')->with('status', "L'événement a bien été modifié !");
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = EventsBDE::find($id);

        echo "Go supp imgs : ";
        $event->images->each(function ($img, $key) {
            $link = $img->image_link;
            Storage::delete($link);
        });
        /*foreach ($product->imsages as $img) {
            $link = $img->image_link;
            Storage::disk('public')->delete('products/'.$link);
        }*/

        echo "Yeah img supp. ";
        CommentsBDE::where([
            ['commentable_id', '=', $id],
            ['commentable_type', '=', 'event']
        ])->delete();
        ImageBDE::where([
            ['imageable_id', '=', $id],
            ['imageable_type', '=', 'event']
        ])->delete();
        LikeBDE::where([
            ['likeable_id', '=', $id],
            ['likeable_type', '=', 'event']
        ])->delete();
        EventsBDE::find($id)->delete();

        // DON'T USE THIS LINE WHEN AJAX IS WORKING
        //return redirect('/evenements')->with('status', "L'événement a bien été supprimé");
    }
}
