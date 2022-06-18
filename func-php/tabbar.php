<nav class="navbar navbar-expand-lg bg-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand border-end px-2 fw-bold" href="#">Administracija</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
            <ul class="nav nav-pills navbar-nav blue" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 m-1 fw-bold active" id="pills-dashboard-tab" data-bs-toggle="pill" data-bs-target="#pills-dashboard" type="button" role="tab" aria-controls="pills-dashboard" aria-selected="true">Kontrolna ploča</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 m-1 fw-bold" id="pills-users-tab" data-bs-toggle="pill" data-bs-target="#pills-users" type="button" role="tab" aria-controls="pills-users" aria-selected="false">Korisnici</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link p-2 m-1 fw-bold" id="pills-news-tab" data-bs-toggle="pill" data-bs-target="#pills-news" type="button" role="tab" aria-controls="pills-news" aria-selected="false">Vijesti</button>
                </li>
                <!-- <li class="nav-item" role="presentation">
                        <button class="nav-link p-2 m-1 fw-bold" id="pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#pills-disabled" type="button" role="tab" aria-controls="pills-disabled" aria-selected="false" disabled>Disabled</button>
                    </li> -->
            </ul>
            <?php
            session_start();
            if (isset($_SESSION['username'])) {
                echo '
                            <div class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase fw-bold" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ' . $_SESSION['username'] . '
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="admin.php"><i class="fa-solid fa-table-columns"></i> Administracija</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> Korisnički račun</a></li>
                                <li><a class="dropdown-item" href="func-php/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Odjava</a></li>
                            </ul>
                            </div>
                            ';
            } else {
                header("refresh:0; url=index.php");
            }
            ?>
        </div>
    </div>
</nav>