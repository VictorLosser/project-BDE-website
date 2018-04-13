<?php

namespace App\Http\Controllers;

use App\ProductBDE;
use App\ImageBDE;
use Illuminate\Http\Request;
use App\User;
use Storage;
use File;

use Illuminate\Support\Facades\Auth;
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
        if (Auth::check()) {
            $authorisation = Auth::user()->isauthorized();
        }
        else
            return view('products.index', compact('products'));

        if ($authorisation == 'Bde'){

            $products = ProductBDE::all();
            return view('products.index', compact('products'));}

        else
            return view('products.index', compact('products'));

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
        }
        else
            return redirect('/produits')->with('status', 'Accès refusé');

            if ($authorisation == 'Bde')
                return view('products.create');
            else
                return redirect('/produits')->with('status', 'Accès refusé');


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

        $lastImageId = ImageBDE::orderBy('id', 'DESC')->first()->id;

        Storage::disk('public')->putFileAs('products', $request->productImg, ($lastImageId+1).'.png');

        ProductBDE::create([
            'title' => $request->productName,
            'category_id' => $request->productCategory,
            'description' => $request->productDescription,
            'price' => $request->productPrice
        ]);

        $lastProductId = ProductBDE::orderBy('id', 'DESC')->first()->id;

        ImageBDE::create([
            'image_link' => ($lastImageId+1).'.png',
            'alt' => $request->productAlt,
            'imageable_id' => $lastProductId,
            'imageable_type' => 'product',
            'user_id' => 1
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
        $product = ProductBDE::find($id);
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
        if (Auth::check()) {
            $authorisation = Auth::user()->isauthorized();
        }
        else
            return redirect('/produits')->with('status', 'Accès refusé');

        if ($authorisation == 'Bde'){

           $product = ProductBDE::find($id);

        return view('products.edit', compact('product'));}

        else
            return redirect('/produits')->with('status', 'Accès refusé');

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
        if (Auth::check()) {
            $authorisation = Auth::user()->isauthorized();
        }
        else
            return redirect('/produits')->with('status', 'Accès refusé');

        if ($authorisation == 'Bde'){

            ProductBDE::find($id)->update([
                'title' => $request->productName,
                /*'image' => $request->productImg,*/
                'description' => $request->productDescription,
                'price' => $request->productPrice
            ]);

            return redirect('/produits')->with('status', 'Le produit a bien été modifié');}
        else
            return redirect('/produits')->with('status', 'Accès refusé');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = ProductBDE::find($id);

        $product->images->each(function ($img, $key) {
            $link = $img->image_link;
            Storage::disk('public')->delete('products/'.$link);
        });
        /*foreach ($product->images as $img) {
            $link = $img->image_link;
            Storage::disk('public')->delete('products/'.$link);
        }*/

        ImageBDE::where([
            ['imageable_id', '=', $id],
            ['imageable_type', '=', 'product'],
        ])->delete();
        ProductBDE::find($id)->delete();

        return redirect('/produits')->with('status', 'Le produit a bien été supprimé');
    }
}
