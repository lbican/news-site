<!DOCTYPE html>
<html>

<head>
    <title>ZT - Login</title>

    <meta charset="UTF-8" />
    <!--About-->
    <meta name="author" content="Luka Bićan" />
    <meta name="description" content="Zagreb Times - Croatian news portal." />
    <!--Settings-->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--Linkers-->
    <link rel="shortcut icon" href="func-img/favicon.ico" type="image/x-icon" />

    <!-- Assets -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>


    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="assets/font/font.css" />

    <style>
        .container-lg>*,
        .container-lg {
            background-color: white;
        }
    </style>
</head>

<body>
    <?php include "functions.php" ?>
    <div class="container-fluid text-start bg-white p-3 shadow-sm">
        <a href="index.php" class="text-decoration-none text-dark">
            <h1 class="border-start px-2">Zagreb Times</h1>
        </a>
    </div>

    <div class="container col col-md-6 col-lg-4  mx-auto p-5 mt-5 mb-5 bg-white rounded shadow-sm">
        <h3 class="mb-3">Prijava</h3>
        <hr class="mb-3">
        <form method="POST">
            <div class="mb-3">
                <label for="loginID" class="form-label">Email adresa ili korisničko ime</label>
                <input type="text" class="form-control" name="loginID" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="loginPassword" class="form-label">Lozinka</label>
                <input type="password" class="form-control" name="loginPassword">
            </div>
            <input type="submit" name="submit" class="btn btn-primary mb-2" value="Prijavi se">
            <p>Nemate račun? <a href="register.php">Registrirajte se.</a></p>

        </form>

        <?php
        session_start();
        if (isset($_POST['submit'])) {
            $dbc = connectToDatabase();

            if ($dbc) {
                $loginID = $_POST['loginID'];
                $password = $_POST['loginPassword'];
                $sql = "";

                if (filter_var($loginID, FILTER_VALIDATE_EMAIL)) {
                    $sql = "SELECT * FROM users WHERE email = ?";
                } else {
                    $sql = "SELECT * FROM users WHERE username = ?";
                }

                $stmt = mysqli_stmt_init($dbc);
                if (mysqli_stmt_prepare($stmt, $sql)) {
                    mysqli_stmt_bind_param($stmt, 's', $loginID);
                    mysqli_stmt_execute($stmt);

                    $result = $stmt->get_result();

                    if ($row = $result->fetch_assoc()) {
                        if (password_verify($password, $row['password'])) {
                            echo "<p class = 'text-success'>Uspješna prijava!</p>";
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['rights'] = $row['rights'];

                            if ($_SESSION['rights'] < 1) {
                                header("refresh:0; url=index.php");
                            } else {
                                header("refresh:0; url=admin.php");
                            }
                        } else {
                            echo "<p class = 'text-danger'>Pogrešno korisničko ime ili lozinka!</p>";
                        }
                    } else {
                        echo "<p class = 'text-danger'>Pogrešno korisničko ime ili lozinka!</p>";
                    }
                }
            }
        }

        ?>
    </div>


</body>

</html>