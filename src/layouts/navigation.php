<nav class="nav">
    <div class="child-nav">
        <a href="index.php" class="nav-brand">Lets Migo</a>
    </div>
    <div class="child-nav">
        <ul class="list-nav">
            <li class="item-nav">
            <li class="item-nav">
                <a href="about.php" class="nav-brand">About</a>
            </li>
            <li class="item-nav">
                <a href="contact.php" class="nav-brand">Contact</a>
            </li>
            <li class="item-nav">
                <a href="tech.php" class="nav-brand">Tech</a>
            </li>
            </li>
        </ul>
    </div>
    <div class="child-nav">
        <?php if (isset($_SESSION["signin"])) : ?>
            <ul class="list-nav">
                <li class="item-nav">
                    Keranjang: <span id="count-cart"></span>
                </li>
                <li class="item-nav">
                    <a href="logout.php" class="nav-brand-auth-masuk">Logout</a>
                </li>
                <li class="item-nav">
                    <h3><?= $_SESSION["username"]; ?></h3>
                </li>
            </ul>
        <?php endif; ?>
        <?php if (!isset($_SESSION["signin"])) : ?>
            <ul class="list-nav">
                <li class="item-nav">
                    Keranjang: <span id="count-cart"></span>
                </li>
                <li class="item-nav">
                    <a href="signin.php" class="nav-brand-auth-masuk">Masuk</a>
                </li>
                <li class="item-nav">
                    <a href="signup.php" class="nav-brand-auth-masuk">Daftar</a>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</nav>