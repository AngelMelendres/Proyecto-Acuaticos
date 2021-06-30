<?php

    include "config.php";

    $query="SELECT * FROM inventario ";

    $result=$conection->$query ("SELECT * FROM inventario ")->fetchAll(PDO::FETCH_OBJ);

    foreach($result as $empleado):?>

        <div class="full-width text-center" style="padding: 30px 0;">
        <div class="mdl-card mdl-shadow--2dp full-width product-card">
            <div class="mdl-card__title">
                <img src="assets/img/fontLogin.jpg" alt="product" class="img-responsive">
            </div>
            <div class="mdl-card__supporting-text">
                <small>Stock</small><br>
                <small>Category</small>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                Product name
                <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                    <i class="zmdi zmdi-more"></i>
                </button>
            </div>
        </div>
        
    </div>

<?php
    endforeach;
?>

