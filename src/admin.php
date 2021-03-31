<?php
require('../app.php');
session_start();

if (!isset($_SESSION["signin"])) {
    // jika session nya tidak ada
    header("Location: signin.php");
    // echo "SESSION NYA TIDAK ADA!";
}

if (isset($_POST["product"])) {
    if (createProduct($_POST) > 0) {
        echo "
            <script>
                alert('Success Create a Product!');
                location='admin.php';
            </script>
        ";
    } else {
        echo mysqli_error($dbconnect);
    }
}

$product = queryData("SELECT * FROM products");

$level = $_SESSION["level"];

if ($level !== "penjual") {
    echo "<script>alert('You cannot permission!');</script>";
    echo "<script>location='index.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .container {
            padding: 16px;
        }

        .column {
            font-family: "Poppins", sans-serif;
            text-align: center;
        }

        .form-create-product {
            display: flex;
            justify-content: center;
            padding: 12px;
            border-radius: 4px;
        }

        .input_control {
            width: 100%;
            padding: 10px 10px 10px 10px;
            border-radius: 8px;
            border: 1px solid gray;

        }

        .input_control:focus {

            border: none;
        }

        label {
            display: block;
            margin-top: 10px;
            font-family: "Poppins", sans-serif;
        }

        .btn-product {
            margin-top: 10px;
            padding: 8px;
            background: darkslateblue;
            color: #FFFFFF;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .column-card {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .card-product {
            background-color: darkslateblue;
            padding: 10px;
            width: 18rem;
            margin: 4px;
            border-radius: 5px;
            font-family: "Poppins", sans-serif;
            color: #fff;
            cursor: pointer;
        }

        .action-product {
            text-align: center;
            color: #FFFFFF;
            text-decoration: none;
        }

        .action-product a {
            color: #FFFFFF;
            text-decoration: none;
        }

        .action-product .edit-product {
            color: black;
            font-weight: bold;
            text-decoration: none;
        }

        .action-product .hapus-product {
            color: gray;
            font-weight: bold;
            text-decoration: none;
        }
    </style>


    <title>Admin Page</title>
</head>

<body>
    <div class="container">
        <div class="column">
            <h1 class="title-judul">Welcome <?= $_SESSION["username"]; ?></h1>
            <a href="logout.php">Logout</a>
            <p>You Level is: <?= $_SESSION["level"]; ?></p>
            <small>Please Create Product</small>
        </div>

        <div class="form-create-product">
            <form method="post" enctype="multipart/form-data">
                <label for="nama">Product Name</label>
                <input type="text" name="nama" id="nama" class="input_control" placeholder="Migo VOLTA 302">
                <label for="harga">Price</label>
                <input type="text" name="harga" id="harga" class="input_control" placeholder="400.000">
                <label for="stock">Stock Product</label>
                <input type="number" name="stock" id="stock" class="input_control" placeholder="2">
                <label for="image">Image</label>
                <input type="file" name="image" id="image">
                <label for="deskripsi">deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="input_control" cols="20" rows="7" placeholder="lorem ipsum...."></textarea>
                <button type="submit" name="product" class="btn-product">Create Product</button>
            </form>
        </div>

        <h2>Your Product</h2>
        <hr>

        <div class="column-card">
            <?php foreach ($product as $item) : ?>
                <div class="card-product">
                    <a href="detail.php?id=1">
                        <img src="assets/images/<?= $item["image"]; ?>" width="100%" height="50%" style="border-radius: 5px;" alt="Image Cat">
                    </a>
                    <h3><?= $item["nama"]; ?></h3>
                    <p>Rp. <?= $item["harga"]; ?></p>
                    <p><?= $item["deskripsi"]; ?></p>
                    <div class="action-product">
                        <a href="" class="edit-product">Edit</a>
                        <a href="" class="hapus-product">Hapus</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    </div>
</body>

</html>