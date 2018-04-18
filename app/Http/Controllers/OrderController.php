<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ContainProductBDE;
use App\ProductBDE;
use App\OrdersBDE;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;
use Psr\Log\NullLogger;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        $date = now();
        $userID = Auth::id();
        $userorder = OrdersBDE::where('user_id','=',$userID)->where('validated','=',0)->get();


        if ($userorder == '[]'){
            $status = 'produit ajouté à un panier nouvellement crée';
            OrdersBDE::create([
                'validated' => 0,
                'order_date'=>$date,
                'user_id' => $userID,]);

           $orderID = OrdersBDE::select('id')->where('user_id','=',$userID)->where('validated','=',0)->first();

            ContainProductBDE::create([
                'quantity' => 1,
                'order_id' => $orderID->id,
                'product_id' => $request->id_product
            ]);}


        else {
            $orderID = OrdersBDE::select('id')->where('user_id', '=', $userID)->where('validated', '=', 0)->first();
            $orderproduit = DB::table('contain-product-bde')->where('order_id', '=', $orderID->id)->where('product_id', "=", $request->id_product)->first();

            $status = 'produit ajouté à un panier existant';
            OrdersBDE::where('user_id', '=', $userID)->where('validated', '=', 0)->update([
                'order_date' => $date,
            ]);


            if ($orderproduit == [])
                ContainProductBDE::create([
                    'quantity' => 1,
                    'order_id' => $orderID->id,
                    'product_id' => $request->id_product]);
             else
                DB::table('contain-product-bde')->where('order_id', '=', $orderID->id)->where('product_id', "=", $request->id_product)->increment('quantity',1);

        }





        return redirect('produits')->with('status',$status);
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
        //
    }
}
