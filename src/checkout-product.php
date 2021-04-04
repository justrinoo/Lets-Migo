<?php

require('../app.php');
session_start();
if (empty($_SESSION["cart"]) || !isset($_SESSION["cart"])) {
    echo "<script>
        alert('Keranjang anda kosong nih, belanja dulu yuk!');
        location='index.php';
    </script>";
}

if (!isset($_SESSION["signin"])) {
    header("Location: index.php");
}

?>

<?php require('./layouts/header.php'); ?>
<?php require('./layouts/navigation.php'); ?>


<div class="container">

    <div class="content-title">
        <h2 class="title">Silahkan Lengkapi Pembayaran Berikut, untuk membeli produk</h2>
        <p class="child-title">Perhatikan setiap pengisian form, karena jika salah bukan kesalahan kami</p>
    </div>

    <div class="content-checkout">
        <div class="card-form">
            <h3>Form Billings</h3>

            <form method="post">
                <div class="form-group">
                    <label for="nama_penerima">Nama Penerima</label>
                    <input type="text" class="form-control" value="<?= strtoupper($_SESSION["username"]); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="pengiriman">Pengiriman</label>
                    <select name="pengiriman" id="pengiriman" class="form-control">
                        <option hidden>Pilih Pengiriman</option>
                        <option value="instan">instan</option>
                        <option value="medium">medium</option>
                        <option value="premium">premium</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pembayaran">Pembayaran</label>
                    <select name="pembayaran" id="pembayaran" class="form-control">
                        <option hidden>Pilih Pembayaran</option>
                        <option value="COD">COD</option>
                        <option value="Alfamart">Alfamart</option>
                        <option value="Indomart">Indomart</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="20" rows="0" class="form-control"></textarea>
                </div>
                <button type="submit" name="checkout" class="btn-checkout">Checkout</button>
            </form>
        </div>




        <div class="card-billings">
            <h3>Summary</h3>
            <div class=" content-billings">
                <?php $totalBelanja = 0; ?>
                <?php foreach ($_SESSION["cart"] as $product_id => $result) : ?>

                    <?php $data = queryData("SELECT * FROM products WHERE id_migo = '$product_id'")[0];
                    $totalHarga =  $result * $data["harga"];
                    ?>
                    <div class="price-billings">
                        <span>
                            <p style="  width: 300px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis"><?= $data["nama"]; ?></p> (<?= $result; ?> Produk)
                        </span>
                        <span>Rp <?= number_format($totalHarga); ?></span>

                    </div>
                    <hr style="margin-top: 20px;">
                    <?php $totalBelanja += $totalHarga; ?>
                <?php endforeach; ?>
                <div class="price-billings" style="font-weight: bold;">
                    <span>Total Bayar</span>
                    <span>Rp <?= number_format($totalBelanja); ?></span>
                </div>

                <!-- Logic Checkout -->
                <?php
                if (isset($_POST["checkout"])) {
                    if (checkoutProduct($_POST) > 0) {
                        echo "
                                <script>
                                    alert('Pembelian sukses!');
                                    location='index.php';
                                </script>
                            ";
                    } else {
                        echo mysqli_error($dbconnect);
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>