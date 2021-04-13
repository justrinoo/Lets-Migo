<?php

session_start();
require('../../app.php');
$id = $_GET["id"];

if (deleteProduct($id) > 0) {
    echo "
        <script>
            alert('Success Delete a Product!');
            location = 'index.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Failed Delete a Product!');
            location = 'index.php';
        </script>
    ";
}
