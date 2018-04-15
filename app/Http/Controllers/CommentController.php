<?php

namespace App\Http\Controllers;

use App\CommentsBDE;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
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
        if (Auth::user()) {

            $userID = Auth::user()->id;
            $urlType = '';
            switch ($request->urlType) {
                case 'evenement': $urlType='event'; break;
                case 'idee': $urlType='idea'; break;
                case 'produit': $urlType='product'; break;
            }

            CommentsBDE::create([
                'content' => $request->newCommContent,
                'commentable_id' => $request->urlId,
                'commentable_type' => $urlType,
                'user_id' => $userID
            ]);

            return redirect('/'.$request->urlType.'/'.$request->urlId);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
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
    public
    function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        CommentsBDE::find($id)->delete();

        return redirect(url()->previous());
    }
}
