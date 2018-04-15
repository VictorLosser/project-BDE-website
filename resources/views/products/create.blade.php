@extends('layouts.template')

@section('title', "Ajouter un produit")

@section('content')

    <?php
        use App\ProductCategoryBDE;
    ?>

    <div id="formProduit">
        <div class="alert alert-info" role="alert">
            Vous êtes sur une page réservée aux administrateurs. (vous en avez de la chance)
        </div>

        <form method="post" action="/produit" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="col">
                    <input id="productName" name="productName" type="text" class="form-control" placeholder="Nom du produit"
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
                    <textarea id="productDescription" name="productDescription" class="form-control" rows="3" placeholder="description"
                              required></textarea>
                </div>
                <div class="col">
                    <input id="productPrice" name="productPrice" type="number" class="form-control" placeholder="prix" step="0.01"
                           required>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col">
                    <input id="productImg" type="file" name="productImg">
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
    <div class="row" style="display:flex; justify-content: center;">

        <!-- PRODUCT CURRENTLY MODIFIED -->
        <h3>Apparence : </h3>
        <div class="col-md-3 product-item">
            <div class="product-header">
                <h1 class="rt-title"><i>Titre</i></h1>
            </div>
            <div class="product-image"><img id="rt-image">
            </div>
            <div class="product-description">
                <p class="rt-description"><i>Description</i></p>
            </div>
            <div class="product-price">
                <p class="rt-price" id="price"><i>Prix</i></p>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $('#productName').on('input change', function () {
            $('.rt-title').text($('#productName').val());
        });

        $('#productDescription').on('input change', function () {
            $('.rt-description').text($('#productDescription').val());
        });

        $('#productPrice').on('keyup keydown change', function () {
            $('.rt-price').text($('#productPrice').val()+"€");
        });

        $('#productImg').on('change', function (event) {
            var output = document.getElementById('rt-image');
            output.src = URL.createObjectURL(event.target.files[0]);
        });
    </script>
@endsection