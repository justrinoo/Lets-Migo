<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/cart.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Your Cart</title>

</head>

<body>
    <?php require('./layouts/navigation.php') ?>

    <section class="content-cart">
        <div class="parent-left">
            <h2>Keranjang</h2>
            <hr>
            <div class="card-cart">
                <img src="assets/images/60667a4e16f6c.png" width="20%" alt="">
                <div class="child-cart">
                    <h5>Title Product</h5>
                    <h5 style="margin-top: 10px;">Rp 100.000</h5>
                    <h5 style="margin-top: 10px;">Pembeli: <?= $_SESSION["username"]; ?></h5>

                    <div class="action-cart">
                        <a href="">Hapus</a>
                        <input type="number" min="1">
                    </div>
                </div>
            </div>
        </div>
        <div class="parent-right">
            <div class="card-rekap">
                <h4>Ringkasan Belanja</h4>
                <div style="font-size: 14px; margin-top: 20px;">
                    <span>Total Harga (2 Barang)</span>

                    <span style="margin-left: 50px;">Rp20.000</span>
                </div>
                <div style="margin-top: 20px; display: flex;">
                    <h4>Total Harga</h4>
                    <span style="margin-left: 7rem;">Rp20.000</span>
                </div>

                <div style="margin-top: 30px;">
                    <a href="checkout.php" class="btn-cart-checkout">Bayar Sekarang</a>
                </div>

            </div>
        </div>
    </section>

</body>

</html>