<?php
session_start();

require "../app.php";

$id = $_GET["productId"];

$migoDetail = queryData("SELECT * FROM products WHERE id_migo = $id")[0];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/style_detail.css">
    <link rel="stylesheet" href="./assets/css/style.css">

    <style>
        .hidden {
            visibility: hidden;
        }
    </style>

    <title>Lets Migo</title>
</head>

<body>
    <?php
    require_once("./layouts/navigation.php");
    ?>
    <section>
        <div class="container-detail">
            <div class="parent-img">
                <img src="./assets/images/<?= $migoDetail["image"]; ?>" width="80%" alt="Image <?= $migoDetail["nama"]; ?>">
            </div>
            <div class="parent-detail">
                <h2 class="title-detail"><?= $migoDetail["nama"]; ?></h2>
                <p class="paragraph-detail"><?= $migoDetail["deskripsi"]; ?></p>
                <div class="quantity-detail">
                    <h4>Stock</h4>
                    <div class="parent-qty">
                        <button type="button" id="handleplus">+</button>
                        <span class="counter-display">0</span>
                        <button type="button" id="handlemin">-</button>
                    </div>
                    <div style="display: flex;">
                        <span style="margin-top: 22px; font-weight: bold;">Rp.</span>
                        <h3 style="margin-top: 20px;" id="harga"><?= $migoDetail["harga"]; ?></h3>
                    </div>
                    <?php if (isset($_SESSION["signin"])) : ?>
                        <a href="beli.php?id=<?= $migoDetail["id_migo"]; ?>">Beli</a>

                    <?php endif; ?>
                    <?php if (!isset($_SESSION["signin"])) : ?>
                        <a href="signin.php" class="btn-tocart">Login Dulu!</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <script src="./assets/js/counter.js">

    </script>
</body>

</html>