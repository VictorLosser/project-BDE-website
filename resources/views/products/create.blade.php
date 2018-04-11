@extends('layouts.template')

@section('title', "Ajouter un produit")

@section('content')

    <div id="formProduit">
        <div class="alert alert-info" role="alert">
            Vous êtes sur une page réservée aux administrateurs. (vous en avez de la chance)
        </div>

        <form method="post" action="/produit">
            {{ csrf_field() }}
            <div class="row">
                <div class="col">
                    <input name="productName" type="text" class="form-control" placeholder="Nom du produit"
                           required>
                </div>
                <div class="col">
                    <select name="productImg" id="inputState" class="form-control" required>
                        <option value="" selected>Choissiez une image</option>
                        <?php
                        if ($dossier = opendir(public_path('/products'))) {
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
                    <textarea name="productDescription" class="form-control" rows="3" placeholder="description"
                              required></textarea>
                </div>
                <div class="col">
                    <input name="productPrice" type="number" class="form-control" placeholder="prix" step="0.01"
                           required>
                </div>
            </div>
            <br>
            <input type="submit"
                   value="ENVOYER VOTRE NOUVEAU PRODUIT EN APPUYANT SUR CE BOUTON QUI EST BEAUCOUP TROP LONG AHHH"
                   class="btn btn-sm btn-secondary"/>
        </form>
    </div>

    <br>
    <br>

    @if (!isset($_FILES['img_recu']))
        <form action="ajouter-un-produit" method="post" enctype="multipart/form-data">
            <input type="file" name="img_recu">
            <br>
            <br>
            <input type="submit" value="Envoyer le fichier" class="btn btn-sm btn-secondary"/>
        </form>
    @else
        L'envoi a bien été effectué !
    @endif

@endsection