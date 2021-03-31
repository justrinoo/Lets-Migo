<?php
session_start();
require("../app.php");
print_r($_SESSION['keranjang']);

require("./layouts/header.php");
require("./layouts/navigation.php");
?>

<div class="container">
    <h2 class="title-cart">Keranjang: </h2>
    <hr style="margin-top: 10px; width: 50%;">

    <div style="display: flex; justify-content: space-between;">
        <div>
            <img src="./assets/images/<?= $migoDetail["image"]; ?>" alt="">
        </div>
        <div>2</div>
    </div>
</div>