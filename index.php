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

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="assets/font/font.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/7e9f05e3d3.js" crossorigin="anonymous"></script>
</head>

<body>
    <main class="container-lg bg-white">

        <?php 
        include "func-php/navbar.php";
        ?>

        <div class="container-lg">
            <h1 class="text-center mb-4 h1-font">Zagreb Times</h1>
            <hr>
        </div>

        <?php include 'article-echo.php'; ?>

        <section class="row m-0 pb-4 px-3 position-relative" id="pol">
            <!-- Flexbox politics container, add something at the bottom! -->
            <div class="col-lg-2 p-0 title d-flex flex-column justify-content-start">
                <span class="align-text-top">POLITIKA</span>
            </div>

            <div class="col-lg-10 d-flex justify-content-start row">

                <?php
                fetchArticles("pol", true);
                ?>
            </div>
        </section>
        <section class="row m-0 pb-4 px-3 position-relative" id="sport">

            <!-- Flexbox sport container, add something at the bottom! -->
            <div class="col-lg-2 p-0 title d-flex flex-column justify-content-start">
                <span class="align-text-top">SPORT</span>
            </div>

            <div class="col-lg-10 d-flex justify-content-start row">
                <?php
                fetchArticles("sport", true);
                ?>
            </div>
        </section>
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