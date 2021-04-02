<?php
require('../app.php');

if (isset($_POST["signup"])) {
    if (signup($_POST) > 0) {
        echo "
        <script>
          alert('User Berhasil Ditambahkan!');
        document.location.href = 'signin.php';
        </script>
    ";
    }
} else if (isset($_POST["signupAdmin"])) {
    if (createAdmin($_POST) > 0) {
        echo "
            <script>
              alert('Admin Berhasil Ditambahkan!');
            document.location.href = 'signin.php';
            </script>
        ";
    }
} else {
    echo mysqli_error($dbconnect);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/style_auth.css">

    <style>
        .btn-admin {
            border-radius: 6px;
            background: darkslateblue;
            color: #FFF;
            border: none;
            padding: 8px 10px 8px 10px;
            cursor: pointer;
        }
    </style>

    <title>Sign Up</title>
</head>

<body>

    <div class="container">
        <div class="card">
            <h2 style="text-align: center;">Silahkan Daftar Terlebih Dahulu</h2>
            <??>
            <form action="" method="POST">
                <div class="parent">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="input-control" placeholder="Jhon Doe">
                </div>
                <div class="parent">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="input-control" placeholder="*********">
                </div>
                <div class="parent">
                    <label for="no_telp">No Telphone</label>
                    <input type="text" name="no_telp" id="no_telp" class="input-control" placeholder="+6284729347197">
                </div>
                <div class="parent">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="input-control" placeholder="email@mail.com">
                </div>
                <div class="parent">
                    <label for="umur">Umur</label>
                    <input type="number" name="umur" id="umur" class="input-control" placeholder="17">
                </div>
                <div class="parent-btn">
                    <button type="submit" name="signup" style="margin-left: 10px;" class="btn-signup">Sign Up</button>
                    <span onclick="adminFunc()" style="margin-left: 10px; color: gray; cursor: default;">.</span>
                    <button type="submit" name="signupAdmin" style="margin-left: 10px; display:none;" id="btn-admin" class="btn-admin">Create Admin :V</button>
                    <p style="margin-top: 13px; margin-left: 20px;">Sudah punya akun? <a href="signin.php" style="text-decoration: none; color: blue;">Login disini</a></p>
                </div>
            </form>
        </div>
    </div>


    <script type="text/javascript">
        function adminFunc() {
            const btnAdmin = document.getElementById('btn-admin');
            if (btnAdmin.style.display === "block") {
                btnAdmin.style.display = "none";
            } else {
                btnAdmin.style.display = "block";
            }

        }
    </script>

</body>

</html>