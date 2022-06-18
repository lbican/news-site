<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav navbar-main mr-auto">
                <a class="nav-link nav-effect text-uppercase fw-bold" href="index.php">Naslovnica</a>
                <a class="nav-link nav-effect text-uppercase fw-bold" href="category.php?category=pol">Politika</a>
                <a class="nav-link nav-effect text-uppercase fw-bold" href="category.php?category=sport">Sport</a>
                <?php
                session_start();

                if (isset($_SESSION['username'])) {
                    echo '
                            <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase fw-bold" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ' . $_SESSION['username'] . '
                            </a>
                            <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">';
                    if ($_SESSION['rights'] >= 1) {
                       echo '<li><a class="dropdown-item" href="admin.php"><i class="fa-solid fa-table-columns"></i> Administracija</a></li>';
                    }
                    echo '
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> Korisnički račun</a></li>
                            <li><a class="dropdown-item" href="func-php/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Odjava</a></li>
                            </ul>
                            </div>';
                } else {
                    echo '<a class="nav-link nav-effect text-uppercase fw-bold" href="login.php">Prijava</a>';
                }
                ?>
            </div>
        </div>
    </div>
</nav>