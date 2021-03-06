<?php

namespace App\Http\Controllers;

use App\ContainProductBDE;
use App\ProductBDE;
use App\ImageBDE;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

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
        } else
            return view('products.index', compact('products'));

        if ($authorisation == 'Bde') {

            $products = ProductBDE::all();
            return view('products.index', compact('products'));
        } else
            return view('products.index', compact('products'));

    }

    public function indexData()
    {
        $products = ProductBDE::all()->toJson();
        echo $products;
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
        $userID = Auth::user()->id;

        $path = Storage::putFile('products', $request->file('productImg'));

        ProductBDE::create([
            'title' => $request->productName,
            'category_id' => $request->productCategory,
            'description' => $request->productDescription,
            'price' => $request->productPrice
        ]);

        $lastProductId = ProductBDE::orderBy('id', 'DESC')->first()->id;

        ImageBDE::create([
            'image_link' => $path,
            'alt' => $request->productAlt,
            'imageable_id' => $lastProductId,
            'imageable_type' => 'product',
            'user_id' => $userID
        ]);

        return redirect('/produits')->with('status', 'Nouveau produit ajouté avec succès !');
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

    public function shows()
    {
        $products = ProductBDE::all();

        $categories = \App\ProductCategoryBDE::all();

        return view('products',
            compact('products', 'categories')
        );
    }

    public function productsData(Request $request)
    {
        $products = ProductBDE::
        when($request->category, function ($query) use ($request) {
            return $query->where('category_id', $request->category);
        })
            ->when($request->orderBy, function ($query) use ($request) {
                return $query->orderBy($request->orderBy);
            })
            ->when($request->prices, function ($query) use ($request) {
                return $query->whereBetween('price', [$request->prices[0], $request->prices[1]]);
            })
            ->get();

        foreach ($products as $key => $product) { ?>
            <div class="col-md-3 product-item" onclick="document.location.href='/produit/<?php echo $product->id?>';">
                <div class="product-header">
                    <?php echo "<a href=\"/produit/" . $product->id . "\">" ?>
                    <h2><?php echo $product->title ?></h2></a>
                </div>
                <div class="product-image"><img
                            src="<?php echo asset('storage/' . $products[$key]->images[0]->image_link) ?>"
                            alt="<?php echo $products[$key]->images[0]->alt ?>">
                </div>
                <div class="product-description">
                    <p><?php echo $product->description ?></p>
                </div>
                <div class="product-price">
                    <p id="price"><?php echo $product->price ?>€</p>
                </div>
            </div>
        <?php }
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
        } else
            return redirect('/produits')->with('status', 'Accès refusé');

        if ($authorisation == 'Bde') {

            $product = ProductBDE::find($id);

            return view('products.edit', compact('product'));
        } else
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
            $userID = Auth::user()->id;
        } else
            return redirect('/produits')->with('status', 'Accès refusé');

        if ($authorisation == 'Bde') {

            ProductBDE::find($id)->update([
                'title' => $request->productName,
                /*'image' => $request->productImg,*/
                'description' => $request->productDescription,
                'price' => $request->productPrice
            ]);

            $lastProductId = ProductBDE::orderBy('id', 'DESC')->first()->id;

            if ($request->has('productImg')) {
                /*$path = 'storage/products/'.$random_name=rand(5, 10).$request->productImg;
                Storage::disk('public')->put($path, $request->file('productImg'));*/
                $path = Storage::putFile('products', $request->file('productImg'));


                ImageBDE::where([
                    ['imageable_id', '=', $id],
                    ['imageable_type', '=', 'product']
                ])->update([
                    'image_link' => $path,
                    'alt' => $request->productAlt,
                    'imageable_id' => $lastProductId,
                    'imageable_type' => 'product',
                    'user_id' => $userID
                ]);
            }

            return redirect('/produits')->with('status', 'Le produit a bien été modifié');
        } else
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
        if (Auth::check()) {
            if (Auth::user()->isAuthorized() == 'Bde') {
                $product = ProductBDE::find($id);

                $product->images->each(function ($img, $key) {
                    $link = $img->image_link;
                    Storage::delete($link);
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

                // DON'T USE THIS LINE WHEN AJAX IS WORKING
                //return redirect('/produits')->with('status', 'Le produit a bien été supprimé');
            }
        }
    }
}
