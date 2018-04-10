@extends('layouts.template')

@section('title', "Modifier un produit")

@section('content')

    <div class="alert alert-info" role="alert">
        Vous êtes sur une page réservée aux administrateurs. (vous en avez de la chance)
    </div>

    @if (isset($_POST['productName']) AND isset($_POST['productImg']) AND isset($_POST['productDescription']) AND isset($_POST['productPrice']))

        <p>Le produit <strong>{{ $_POST['productName'] }}</strong> a bien été modifié"

    @elseif (isset($_GET['productChoice']))

        <form method="post" action="modifier-un-produit">
            <div class="row">
                <div class="col">
                    <input name="productID" id="productID" type="text" class="form-control"
                           value="{{ $_GET['productChoice'] }}"
                           required
                           readonly="readonly"
                           style="display:none">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input name="productName" id="productName" type="text" class="form-control"
                           value="{{ $product->title }}"
                           required>
                </div>
                <div class="col">
                    <select name="productImg" id="imgChoice" class="form-control" required>
                        <option value="" selected>Choissiez une image</option>
                        <?php
                        if ($dossier = opendir('./dist/products')) {
                            while (false !== ($fichier = readdir($dossier))) {
                                if ($fichier != '.' && $fichier != '..' && $fichier != 'index.php') {
                                    echo "<option value=\"" . $fichier . "\">" . $fichier . "</option>";
                                }
                            }
                            closedir($dossier);
                        }
                        ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <textarea name="productDescription" id="productDescription" class="form-control" rows="3"
                              required>{{ $product->description }}</textarea>
                </div>
                <div class="col">
                    <input name="productPrice" id="productPrice" type="number" class="form-control"
                           value="{{ $product->price }}" step="0.01"
                           required>
                </div>
            </div>
            <br>
            <input type="submit"
                   value="CONFIRMER LES MODIFICATIONS"
                   class="btn btn-sm btn-secondary"/>
        </form>

        <br>

        <div class="row" style="display:flex; justify-content: center;">
            <!-- PRODUCT AT ORIGIN -->
            <div class="col-md-3 product-item">
                <div class="product-header">
                    <h1>{{ $product->title }}</h1>
                </div>
                <div class="product-image"><img src="/dist/products/{{ $product->image }}">
                </div>
                <div class="product-description">
                    <p>{{ $product->description }}</p>
                </div>
                <div class="product-price">
                    <!--                    --><?php //if ($product['old_price'] !== null) { ?>
                <!--                        <p id="old-price">-->
                <? //= htmlspecialchars($product['old_price']) ?><!--€</p>-->
                    <!--                    --><?php //} ?>
                    <p id="price">{{ $product->price }}€</p>
                </div>
            </div>

            <!-- PRODUCT CURRENTLY MODIFIED -->
            <div class="col-md-3 product-item">
                <div class="product-header">
                    <h1 class="rt-title">{{ $product->title }}</h1>
                </div>
                <div class="product-image"><img src="/dist/products/{{ $product->image }}">
                </div>
                <div class="product-description">
                    <p class="rt-description">{{ $product->description }}</p>
                </div>
                <div class="product-price">
                    <!--                    --><?php //if ($product['old_price'] !== null) { ?>
                <!--                        <p id="old-price">-->
                <? //= htmlspecialchars($product['old_price']) ?><!--€</p>-->
                    <!--                    --><?php //} ?>
                    <p class="rt-price" id="price">{{ $product->price }}€</p>
                </div>
            </div>
        </div>

    @else

        <form method="get" action="modifier-un-produit">
            <div class="row">
                <div class="col">
                    <select name="productChoice" id="productChoice" class="form-control" required>
                        <option value="" selected>Choissiez un produit à modifier</option>
                        @foreach($productsList as $product)

                            <option value="{{ $product->id }}">{{ $product->title }}</option>

                        @endforeach

                    </select>

                </div>
                <div class="row">
                    <input type="submit"
                           value="OK"
                           class="btn btn-sm btn-secondary"/>
                </div>
            </div>
        </form>

    @endif

@endsection

@section('scripts')
    <script type="text/javascript">
        $('#productName').on('input', function () {
            $('.rt-title').text($('#productName').val());
        });

        $('#productDescription').on('input', function () {
            $('.rt-description').text($('#productDescription').val());
        });

        $('#productPrice').on('keyup keydown change', function () {
            $('.rt-price').text($('#productPrice').val());
        });
    </script>
@endsection