<?php
session_start();

if (!isset($_SESSION["signin"])) {
    // jika session nya tidak ada
    header("Location: signin.php");
    // echo "SESSION NYA TIDAK ADA!";
}
$level = $_SESSION["level"];

if ($level !== "penjual") {
    echo "<script>alert('You cannot permission!');</script>";
    echo "<script>location='index.php'</script>";
}
?>
<h1>Halo <?= $_SESSION["username"]; ?> kamu sebagai <?= $_SESSION["level"]; ?></h1>
<a href="logout.php">Logout</a>