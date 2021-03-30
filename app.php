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

    $query = "SELECT * FROM users WHERE nama = '$username'";
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
