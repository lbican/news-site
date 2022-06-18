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

    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- custom styles -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="assets/font/font.css" />
    <link rel="stylesheet" type="text/css" href="styles/table.css" />

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="news-validate.js"></script>

    <!-- Summernote -->
    <script src="assets/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea#tiny'
        });
    </script>

</head>

<body>
    <!--Admin TABBAR-->
    <div class="container-fluid bg-light shadow-sm py-2 d-flex justify-content-start">
        <a class="btn btn-primary" href="admin.php"><i class="fa-solid fa-circle-caret-left"></i>Povratak</a>
        <span class="border-start mx-3 px-3 my-0"></span>
    </div>

    <!-- Dodavanje nove vijesti -->
    <?php include "admin-echo.php";
    ?>
    <div class="bg-white rounded border p-5 shadow-sm m-2">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <form action="" method="post" name="addnews" id="addnews" enctype="multipart/form-data">
                    <?php
                    session_start();
                    if ($_SESSION['rights'] < 1) {
                        echo "
                        <script>
                        alert('Nemate dovoljna prava za pristup ovoj stranici.');
                        window.location = 'index.php';
                        </script>";
                    }

                    $id = null;
                    $title = "";
                    $content = "";
                    $shortDesc = "";
                    $category = "";
                    $photo = "";
                    $archive = 0;

                    if (isset($_GET['id'])) {
                        echo '<h3 class="px-2">Ažuriranje vijesti</h3>';
                        $id = $_GET['id'];
                        $dbc = connectToDatabase();
                        if ($dbc && is_numeric($id)) {
                            $query = "SELECT * FROM news WHERE id = $id";
                            $result = mysqli_query($dbc, $query);
                            if ($result) {
                                if ($row = mysqli_fetch_array($result)) {
                                    $title = $row['title'];
                                    $shortDesc = $row['short_desc'];
                                    $content = $row['content'];
                                    $photo = $row['photo'];
                                    $category = $row['category'];
                                    $archive = $row['archive'];
                                }
                            }
                        }
                    } else {
                        echo '<h3 class="px-2">Dodaj novu vijest</h3>';
                    }


                    echo "<p class='text-muted'>Kreator objave: " . $_SESSION['username'] . "</p>";

                    ?>

                    <label for="newsTitle" class="form-label">Naslov</label>
                    <input type="text" class="form-control mb-2" name="newsTitle" aria-describedby="titleHelp" <?php
                                                                                                                if (isset($id)) {
                                                                                                                    echo "value='$title'";
                                                                                                                }
                                                                                                                ?>>

                    <label for="newsCategory" class="form-label">Kategorija</label>
                    <select class="form-select mb-2" name="newsCategory" aria-label="newsCategory" aria-describedby="categoryHelp">
                        <option value="pol" <?php if (isset($id)) {
                                                if ($category == "pol")
                                                    echo "selected";
                                            } ?>>Politika</option>
                        <option value="sport" <?php if (isset($id)) {
                                                    if ($category == "sport")
                                                        echo "selected";
                                                } ?>>Sport</option>
                    </select>

                    <label for="formFile" class="form-label">Naslovna slika</label>
                    <input class="form-control mb-2" accept="image/*" type="file" id="formFile" name="formFile" aria-describedby="imgHelp">

                    <label for="newsDesc" class="form-label">Kratki opis</label>
                    <input type="text" class="form-control mb-2" name="newsDesc" aria-describedby="descHelp" <?php
                                                                                                                if (isset($id)) {
                                                                                                                    echo "value='$shortDesc'";
                                                                                                                }
                                                                                                                ?>>
                    <div class="form-check mb-2">
                        <label class="form-check-label" for="archiveCheck">Stavi vijest u arhivu</label>
                        <input type="checkbox" class="form-check-input" id="archiveCheck" name="archiveCheck" aria-describedby="tosHelp"<?php
                                                                                                                if ($archive == 1) {
                                                                                                                    echo "checked";
                                                                                                                }
                                                                                                                ?>>
                    </div>

                    <label for="content" class="form-label">Sadržaj</label>
                    <textarea id="tiny" class="mb-2" name="content" aria-describedby="contentHelp"><?php
                                                                                                    if (isset($id)) {
                                                                                                        echo $content;
                                                                                                    }
                                                                                                    ?></textarea>



                    <?php
                    if (isset($id)) {
                        echo '<input type="submit" name="update" class="btn btn-primary my-2" value="Ažuriraj vijest">';
                    } else {
                        echo '<input type="submit" name="submit" class="btn btn-primary my-2" value="Dodaj vijest">';
                    }
                    ?>

                </form>
            </div>
            <img class="col-lg-6 d-none d-lg-block" id="preview" src="func-img/news-creator.svg">
        </div>

        <!-- SCRIPT to DISPLAY UPLOADED IMAGE! -->
        <script>
            formFile.onchange = evt => {
                const [file] = formFile.files
                if (file) {
                    preview.src = URL.createObjectURL(file)
                }
            }
        </script>

        <?php
        if (isset($_POST['submit']) || isset($_POST['update'])) {
            $fileName = $_FILES['formFile']['name'];
            $tempName = $_FILES['formFile']['tmp_name'];

            $title = $_POST['newsTitle'];
            $category = $_POST['newsCategory'];
            $content = $_POST['content'];
            $shortDesc = $_POST['newsDesc'];
            $date = date("Y-m-d H:i:s");
            $author = $_SESSION['username'];
            $location = $category . "-img/";
            $archive = 0;
            if(isset($_POST['archiveCheck'])){
                $archive = 1;
            }


            if (isset($fileName)) {
                if (!empty($fileName)) {
                    if (move_uploaded_file($tempName, $location . $fileName)) {
                        echo '<p class="text-success">Slika uspješno prenesena!</p>';
                        $location = $location . $fileName;
                    }
                }
            }

            $imgLocation = $location;
            $dbc = connectToDatabase();

            if ($dbc) {
                if (isset($_POST['submit'])) {
                    $sql = "INSERT INTO news(title, short_desc, content, author, date, category, photo, archive) values (?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($dbc);
                    if (mysqli_stmt_prepare($stmt, $sql)) {
                        mysqli_stmt_bind_param($stmt, 'sssssssi', $title, $shortDesc, $content, $author, $date, $category, $location, $archive);
                        mysqli_stmt_execute($stmt);

                        echo "<p class='text-success'> Vijest uspješno dodana! </p>";
                    }
                } else if (isset($_POST['update'])) {
                    $sql = "UPDATE news
                            SET
                            title = ?,
                            short_desc = ?,
                            content = ?,
                            author = ?,
                            date = ?,
                            category = ?,
                            photo = ?,
                            archive = ?
                            WHERE id = $id";
                    $stmt = mysqli_stmt_init($dbc);
                    if (mysqli_stmt_prepare($stmt, $sql)) {
                        mysqli_stmt_bind_param($stmt, 'sssssssi', $title, $shortDesc, $content, $author, $date, $category ,$location, $archive);
                        mysqli_stmt_execute($stmt);

                        echo "<p class='text-success'> Vijest uspješno ažurirana! </p>";
                    }
                }
            }

            mysqli_close($dbc);
        }
        ?>

        <!-- Visual border -->
        <hr class="border-dark">
    </div>
</body>

</html>