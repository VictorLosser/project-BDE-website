<?php

namespace App\Http\Controllers;

use App\ImageBDE;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


class ImageController extends Controller
{
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
    public function store(Request $request)
    {
        if (Auth::check()) {
            echo "Requete store recue par le controller 5/5";
            $userID = Auth::user()->id;

            echo "Go storage l'image : ";
            $path = Storage::putFile('events', $request->file('eventImg'));
            echo "La si tu vois ça, alors le fichier a bien upload ;)";

            ImageBDE::create([
                'image_link' => $path,
                'alt' => $request->eventImgAlt,
                'imageable_id' => $request->eventId,
                'imageable_type' => $request->eventImgType,
                'user_id' => $userID
            ]);
            echo "Et la, c'est la requete store entière qui est passé sans erreurs. WP";

            return redirect('/evenement/' . $request->eventId)->with('status', 'Image ajoutée !');
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
    public function destroy($id)
    {
        if (Auth::check()) {
            $image = ImageBDE::find($id)->first();
            $eventId = $image->imageable_id;

            $link = $image->image_link;
            Storage::delete($link);

            ImageBDE::find($id)->delete();

            return back()->with('status', 'Image supprimée !');
        }
    }
}
