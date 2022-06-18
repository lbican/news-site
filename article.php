<!DOCTYPE html>
<html>

<head>
    <title>Zagreb Times</title>

    <meta charset="UTF-8" />
    <!--About-->
    <meta name="author" content="Luka Bićan" />
    <meta name="description" content="Zagreb Times - Croatian news portal." />
    <!--Settings-->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--Linkers-->
    <link rel="shortcut icon" href="func-img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/7e9f05e3d3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="assets/font/font.css" />

    <style>
        .container-lg>*,
        .container-lg,
        body {
            background-color: white;
        }

        .sizer {
            max-width: 75% !important;
            width: 75% !important;
        }

        h3 {
            border-left: 1px solid gainsboro;
            font-size: 36px;
        }

        .letter-first {
            font-size: 35px;
            line-height: 70px;
        }

        article img {
            width: 100%;
            height: 30vw;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <main class="container-lg">
        <?php 
        include "func-php/navbar.php";
        ?>


        <!-- NAVBAR PLACEHOLDER -->
        <div id="nav-placeholder"></div>



        <div class="container-lg">
            <h1 class="text-center mb-4 h1-font">Zagreb Times</h1>
            <hr>
        </div>

        <?php
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = $_GET['id'];
            include 'article-echo.php';
            getArticle($id);
        } else {
            echo '<img class="w-100 my-2 " src="func-img/404.png">';
        }

        ?>
    </main>




    <footer class="container-fluid pt-3 pb-3">
        <div class="container-lg bg-transparent">
            <div class="row bg-transparent">
                <div class="col-lg-6">
                    <p class="text-end">Luka Bićan<br>lbican@tvz.hr<br>0246096016</p>
                </div>
                <div class="col-lg-6 border-start border-secondary">
                    <h2 class=" text-start">Zagreb Times</h2>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>