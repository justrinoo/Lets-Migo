<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/style_auth.css">


    <title>Login</title>
</head>

<body>

    <div class="container">
        <div class="card">
            <h4 style="text-align: center;"><a href="index.php" style="text-decoration: none; color: #000;">Lets Migo</a></h4>
            <h2 style="text-align: center;">Login Dulu</h2>
            <form action="">
                <div class="parent">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="input-control" placeholder="Jhon Doe">
                </div>
                <div class="parent">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="input-control" placeholder="*********">
                </div>

                <div class="parent-btn">
                    <button type="submit" name="signup" class="btn-signup">Login</button>
                    <p style="margin-top: 13px; margin-left: 20px;">Belum punya akun? <a href="signup.php" style="text-decoration: none; color: blue;">Daftar disini</a></p>
                </div>
            </form>
        </div>
    </div>

</body>

</html>