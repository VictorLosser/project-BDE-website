<?php

namespace App\Http\Controllers;

use App\Mail\Orderpross;
use Illuminate\Http\Request;
use App\User;
use App\ContainProductBDE;
use App\ProductBDE;
use App\OrdersBDE;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $date = now();
            $userID = Auth::id();
            $userorder = OrdersBDE::where('user_id', '=', $userID)->where('validated', '=', 0)->get();


            if ($userorder == '[]') {
                $status = 'produit ajouté à un panier nouvellement crée';
                OrdersBDE::create([
                    'validated' => 0,
                    'order_date' => $date,
                    'user_id' => $userID,
                ]);

                $orderID = OrdersBDE::select('id')->where('user_id', '=', $userID)->where('validated', '=', 0)->first();

                ContainProductBDE::create([
                    'quantity' => 1,
                    'order_id' => $orderID->id,
                    'product_id' => $request->id_product
                ]);
                $total_price = DB::select('SELECT SUM(quantity*price) as totaux FROM `orders-bde` LEFT JOIN `contain-product-bde` ON `orders-bde`.id = `contain-product-bde`.order_id LEFT JOIN `product-bde` ON `product-bde`.id = `contain-product-bde`.product_id WHERE `orders-bde`.validated = 0 AND `orders-bde`.`user_id`= ?', [$userID]);

                OrdersBDE::where('user_id', '=', $userID)->where('validated', '=', 0)->update([
                    'total_price' => $total_price[0]->totaux,
                ]);
            } else {
                $orderID = OrdersBDE::select('id')->where('user_id', '=', $userID)->where('validated', '=', 0)->first();
                $orderproduit = DB::table('contain-product-bde')->where('order_id', '=', $orderID->id)->where('product_id', "=", $request->id_product)->first();
                $status = 'produit ajouté à un panier existant';

                if ($orderproduit == []) {
                    ContainProductBDE::create([
                        'quantity' => 1,
                        'order_id' => $orderID->id,
                        'product_id' => $request->id_product]);

                    $total_price = DB::select('SELECT SUM(quantity*price) as totaux FROM `orders-bde` LEFT JOIN `contain-product-bde` ON `orders-bde`.id = `contain-product-bde`.order_id LEFT JOIN `product-bde` ON `product-bde`.id = `contain-product-bde`.product_id WHERE `orders-bde`.validated = 0 AND `orders-bde`.`user_id`= ?', [$userID]);

                    OrdersBDE::where('user_id', '=', $userID)->where('validated', '=', 0)->update([
                        'order_date' => $date,
                        'total_price' => $total_price[0]->totaux
                    ]);
                } else {

                    DB::table('contain-product-bde')->where('order_id', '=', $orderID->id)->where('product_id', "=", $request->id_product)->increment('quantity', 1);
                    $total_price = DB::select('SELECT SUM(quantity*price) as totaux FROM `orders-bde` LEFT JOIN `contain-product-bde` ON `orders-bde`.id = `contain-product-bde`.order_id LEFT JOIN `product-bde` ON `product-bde`.id = `contain-product-bde`.product_id WHERE `orders-bde`.validated = 0 AND `orders-bde`.`user_id`= ?', [$userID]);


                    OrdersBDE::where('user_id', '=', $userID)->where('validated', '=', 0)->update([
                        'order_date' => $date,
                        'total_price' => $total_price[0]->totaux
                    ]);
                }

            }


            return redirect('produits')->with('status', $status);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        if (Auth::check()) {
            $userID = Auth::id();
            $order = DB::table('orders-bde')->where('user_id', $userID)->where('validated', '=', 0)->get();
            if ($order == '[]')
                return redirect('produits')->with('status', "Votre Panier est vide");

            else {
                $order = OrdersBDE::where('user_id', Auth::id())->where('validated', 0)->first();


                return view('Basket', compact('order'));
            }
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
    public function update()
    {
        if (Auth::check()) {
            OrdersBDE::where('user_id', '=', Auth::id())->where('validated', '=', 0)->update([
                'validated' => 1,
            ]);

            //Mail::to(Auth::user())->send(new Orderpross);
            return redirect('produits')->with('status', "Merci de votre commande, elle sera traitée dans les meilleurs délais par un membre du BDE");
        }
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
