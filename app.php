<?php
$dbconnect = mysqli_connect("localhost", "root", "root", "lets-migo");

/**
 * Semua Fungsi CRUD disini :D
 */


function queryData($query)
{
    global $dbconnect;
    $data = mysqli_query($dbconnect, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($data)) {
        $rows[] = $row;
    }
    return $rows;
}

function signup($data)
{

    global $dbconnect;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($dbconnect, $data["password"]);
    $email = htmlspecialchars($data["email"]);
    $no_telp = htmlspecialchars($data["no_telp"]);
    $umur = htmlspecialchars($data["umur"]);

    $query = "SELECT * FROM users WHERE username = '$username'";
    $resultNama =  mysqli_query($dbconnect, $query);


    if (mysqli_fetch_assoc($resultNama)) {
        echo "
        <script>
            alert('username sudah ada!');
        </script>
    ";
        return false;
    }

    if (empty($username)) {
        echo "Username tidak boleh kosong";
    } else if (empty($password)) {
        echo "Password tidak boleh kosong";
    } else if (empty($email)) {
        echo "Email tidak boleh kosong";
    } else if (empty($no_telp)) {
        echo "no telphone tidak boleh kosong";
    } else if (empty($umur)) {
        echo "umur tidak boleh kosong";
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users VALUES (id,'$username', '$password', '$email', '$no_telp', 2, '$umur')";
        mysqli_query($dbconnect, $query);
        return mysqli_affected_rows($dbconnect);
    }
}

function createProduct($data)
{
    global $dbconnect;
    $nama = $data["nama"];
    $harga = $data["harga"];
    $image = uploadImage();
    $stock = $data["stock"];
    $deskripsi = $data["deskripsi"];

    if (!$image) {
        return false;
    }

    $queryCreateProduct = "INSERT INTO products VALUES(id_migo,'$nama','$harga','$image','$stock','$deskripsi',createdAt)";

    mysqli_query($dbconnect, $queryCreateProduct);
    return mysqli_affected_rows($dbconnect);
}


function uploadImage()
{
    /**
     * $_FILES: punya beberapa syarat
     * 1. namafile
     * 2.ukuranFile
     * 3. error
     * 4. tmpName
     * 5. dll
     *  */

    $namaFileImage = $_FILES["image"]["name"];
    $ukuranFileImage = $_FILES["image"]["size"];
    $error = $_FILES["image"]["error"];
    $tmpName = $_FILES["image"]["tmp_name"];

    // ketika gambarnya(file form) nya kosong
    if ($error === 4) {
        echo "
            <script>
                alert('Upload Image Required!');
            </script>
        ";
        return false;
    }

    // cek jenis file gambar, jenis file yang wajib adalah: jpg,jpeg,png
    $ekstensiImageValid = ["jpg", "png", "jpeg"];
    $ekstensiImage = explode('.', $namaFileImage); // yourfile.jpg => ["yourfile", "jpg"];
    $ekstensiImage = strtolower(end($ekstensiImage)); //yourfile.jpg

    if (!in_array($ekstensiImage, $ekstensiImageValid)) {
        echo "
            <script>
                alert('You uploaded is not type image!');
            </script>
        ";
        return false;
    }

    if ($ukuranFileImage > 1000000) {
        echo "
            <script>
                alert('Your Files is to long!');
            </script>
        ";
        return false;
    }

    // generate file unik use uniqid()
    $newFileImage = uniqid();
    $newFileImage .= '.';
    // 287398278duuy2qdyq.jpg
    $newFileImage .= $ekstensiImage;

    // ketika filenya berhasil lolos semua validasi
    move_uploaded_file($tmpName, 'assets/images/' . $newFileImage);
    return $newFileImage;
}
