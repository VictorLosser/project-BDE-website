<?php

namespace App\Http\Controllers;

use App\LikeBDE;
use App\ImageBDE;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userID = Auth::user()->id;
        $return = array();

        $likeExists = LikeBDE::where([
            ['likeable_id', '=', $request->imgId],
            ['likeable_type', '=', $request->likeType],
            ['user_id', '=', $userID]
        ])->first();

        if ($likeExists) {
            $return['likeExists'] = $likeExists->id;
        }

        /*echo "Bonjour user ".$userID.", lancement firstOrNew : ";*/
        $like = LikeBDE::firstOrCreate([
            'likeable_id' => $request->imgId,
            'likeable_type' => $request->likeType,
            'user_id' => $userID
        ]);
        /*echo "Lancement where 1: ";*/
        $newLikeCount = LikeBDE::where([
            ['likeable_id', '=', $request->imgId],
            ['likeable_type', '=', $request->likeType]
        ])->count();

        if (!empty($like)) {

            $return['likeId'] = $like->id;
        }

        $return['likeCount'] = $newLikeCount;
        echo json_encode($return);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        LikeBDE::find($id)->delete();
    }
}
