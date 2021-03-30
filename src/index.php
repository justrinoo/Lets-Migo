<?php
session_start();


require_once("../app.php");

$productMigo = queryData("SELECT * FROM products");


?>
<?php
require_once("../src/layouts/header.php");
require_once("../src/layouts/navigation.php");
?>


<section>
    <div class="container">
        <h2>Migo Favorite</h2>

        <div style="display: flex; ">
            <?php foreach ($productMigo as $migo) : ?>

                <div class=" card-favorite-migo">
                    <a href="detailMigo.php?productId=<?= $migo["id_migo"]; ?>">
                        <img src="./assets/images/<?= $migo["image"]; ?>" width="100%" alt="" style="border: 1px solid #ddd; border-radius: 5px;">
                    </a>
                    <div style="padding: 10px; display: flex; align-items: center;justify-content: space-between;">
                        <h3><?= $migo["nama"]; ?></h3>
                        <h3>Rp <?= $migo["harga"]; ?></h3>
                    </div>
                    <div style="padding: 0px 10px 0px 10px; margin-top: 10px; ">
                        <h4>Stok Migo Tersedia: <?= $migo["stock"]; ?></h4>
                        <p style="margin-top: 10px;">Deskripsi:<?= $migo["deskripsi"]; ?></p>
                    </div>

                </div>

            <?php endforeach; ?>

        </div>

    </div>
</section>


<?php
require_once("../src/layouts/footer.php");
?>