<!DOCTYPE html>
<html>

<head>
    <title>Zagreb Times - ADMIN</title>

    <meta charset="UTF-8" />
    <!--About-->
    <meta name="author" content="Luka Bićan" />
    <meta name="description" content="Zagreb Times - Croatian news portal." />
    <!--Settings-->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--Linkers-->
    <link rel="shortcut icon" href="func-img/favicon.ico" type="image/x-icon" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="stylesheet" type="text/css" href="assets/font/font.css" />
    <link rel="stylesheet" type="text/css" href="styles/table.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/7e9f05e3d3.js" crossorigin="anonymous"></script>

    <style>
        
    </style>
</head>

<body>
    <!--Admin TABBAR-->
    <?php
    include "func-php/tabbar.php"; 
    include "admin-echo.php";

    if($_SESSION['rights'] < 1){
        echo "
        <script>
        alert('Nemate dovoljna prava za pristup ovoj stranici.');
        window.location = 'index.php';
        </script>";
    }
    ?>

    <div class="tab-content m-2" id="pills-tabContent">
        <!-- Dashboard TAB -->
        <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel" aria-labelledby="pills-dashboard-tab" tabindex="0">
            <div class="bg-white rounded border p-5 shadow-sm">
                <h3 class="px-2">Kontrolna ploča</h3>
                <p class="text-muted">Ovdje možete vidjeti statistiku stranice, broj članaka, korisnika, kategorija itd.</p>
                <div class="row d-flex justify-content-start">
                    <?php generateDashboard(); ?>
                </div>
                <hr class="mb-3 border-dark">
                <a href="index.php" class="btn btn-primary p-3"><i class="fa-solid fa-arrow-left"></i> Vrati se na naslovnicu</a>
            </div>
        </div>

        <!-- Users TAB -->
        <div class="tab-pane fade" id="pills-users" role="tabpanel" aria-labelledby="pills-users-tab" tabindex="0">
            <div class="bg-white rounded border p-5 shadow-sm">
                <h3 class="px-2">Korisnici</h3>
                <p class="text-muted">Ovdje možete vidjeti sve korisnike koji su registrirani na ovoj web-stranici.</p>

                <div class="d-flex justify-content-start m-2">
                    <?php showUsers(); ?>
                </div>
            </div>
        </div>
        
        <!-- News TAB -->
        <div class="tab-pane fade" id="pills-news" role="tabpanel" aria-labelledby="pills-news-tab" tabindex="0">
            <div class="bg-white rounded border p-5 shadow-sm">
                <h3 class="px-2">Vijesti</h3>
                <p class="text-muted">Ovdje možete vidjeti sve objavljene vijesti.</p>
                <a href = "add-news.php" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Dodaj novu vijest</a>
                <div class="d-flex justify-content-start m-2">
                    <?php showNews(); ?>
                </div>
            </div>
        </div>
        <!-- Disabled TAB -->
        <div class="tab-pane fade" id="pills-disabled" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">...</div>
    </div>


</body>

</html>