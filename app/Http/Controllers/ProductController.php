<?php

namespace App\Http\Controllers;

use App\ProductBDE;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductBDE::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $request->validate([
//            'title' => 'required',
//            'image' => 'required',
//            'description' => 'required',
//            'price' => 'required'
//        ]);

        ProductBDE::create([
            'title' => $request->productName,
            'image' => $request->productImg,
            'description' => $request->productDescription,
            'price' => $request->productPrice
        ]);

        return redirect('/produits')->with('status', 'Nouveau produit ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = ProductBDE::where('product_id', $id)->first();
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = ProductBDE::where('product_id', $id)->first();

        return view('products.edit', compact('product'));
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
        ProductBDE::where('product_id', $id)->update([
            'title' => $request->productName,
            /*'image' => $request->productImg,*/
            'description' => $request->productDescription,
            'price' => $request->productPrice
        ]);
        return redirect('/produits')->with('status', 'Le produit a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductBDE::where('product_id', $id)->delete();
        return redirect('/produits')->with('status', 'Le produit a bien été supprimé');
    }
}
