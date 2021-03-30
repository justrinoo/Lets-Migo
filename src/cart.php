<?php
session_start();
require("../app.php");
$id = $_GET["cartId"];

$migoDetail = queryData("SELECT * FROM products WHERE id_migo = $id")[0];

require("./layouts/header.php");
require("./layouts/navigation.php");
?>

<div class="container">
    <h2 class="title-cart">Keranjang: </h2>
    <hr style="margin-top: 10px; width: 50%;">

    <div style="display: flex; justify-content: space-between;">
        <div>
            <img src="./assets/images/<?= $cartDetail["image"]; ?>" alt="">
        </div>
        <div>2</div>
    </div>
</div>