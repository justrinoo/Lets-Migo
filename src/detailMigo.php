<?php
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
                    <h4>Quantity</h4>
                    <div class="parent-qty">
                        <button class="btn-qty" type="button">+</button>
                        <span style="margin: 5px 5px;">1</span>
                        <button class="btn-qty" type="button">-</button>
                    </div>
                    <h3 style="margin-top: 20px;">Rp. <?= $migoDetail["harga"]; ?></h3>
                    <button type="submit" class="btn-tocart">Tambahkan Keranjang</button>
                </div>
            </div>
        </div>
    </section>
</body>

</html>