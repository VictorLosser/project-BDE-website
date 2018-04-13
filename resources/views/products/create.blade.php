@extends('layouts.template')

@section('title', "Ajouter un produit")

@section('content')

    <?php use App\ProductCategoryBDE;
    ?>

    <div id="formProduit">
        <div class="alert alert-info" role="alert">
            Vous êtes sur une page réservée aux administrateurs. (vous en avez de la chance)
        </div>

        <form method="post" action="/produit" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col">
                    <input name="productName" type="text" class="form-control" placeholder="Nom du produit"
                           required>
                </div>
                <div class="col">
                    <select name="productCategory" id="inputState" class="form-control" required>
                        <option value="" selected>Catégorie</option>
                        <?php
                        $category = ProductCategoryBDE::all();
                        foreach ($category as $cat) {
                            echo "<option value=\"" . $cat->id . "\">" . $cat->category_name . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <textarea name="productDescription" class="form-control" rows="3" placeholder="description"
                              required></textarea>
                </div>
                <div class="col">
                    <input name="productPrice" type="number" class="form-control" placeholder="prix" step="0.01"
                           required>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col">
                    <input type="file" name="productImg">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input name="productAlt" type="text" class="form-control" placeholder="Description de l'image" required>
                </div>
            </div>
            <br>
            <br>
                <input type="submit"
                       value="ENVOYER VOTRE NOUVEAU PRODUIT EN APPUYANT SUR CE BOUTON QUI EST BEAUCOUP TROP LONG AHHH"
                       class="btn btn-sm btn-secondary"/>
        </form>
    </div>
    <br>
    <br>



@endsection