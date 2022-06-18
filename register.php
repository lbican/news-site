<!DOCTYPE html>
<html>

<head>
    <title>ZT - Register</title>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="register-validate.js"></script>

</head>

<body>
    <?php include "functions.php" ?>

    <div class="container-fluid text-start bg-white p-3 shadow-sm">
        <a href="index.php" class="text-decoration-none text-dark">
            <h1 class="border-start px-2">Zagreb Times</h1>
        </a>
    </div>

    <div class="container col col-md-6 col-lg-4  mx-auto p-5 mt-5 mb-5 bg-white rounded shadow-sm">
        <h3 class="mb-3 px-2">Registracija</h3>
        <hr class="mb-3">
        <form method="POST" name="register" id="register">
            <div class="mb-3">
                <label for="loginUsername" class="form-label">Korisničko ime</label>
                <input type="text" class="form-control" name="loginUsername" aria-describedby="usernameHelp">
            </div>

            <div class="mb-3">
                <label for="loginMail" class="form-label">Email adresa</label>
                <input type="email" class="form-control" name="loginMail" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="loginPassword" class="form-label">Lozinka</label>
                <input type="password" class="form-control" name="loginPassword" id="loginPass" aria-describedby="passwordHelp">
            </div>

            <div class="mb-3">
                <label for="loginPasswordCheck" class="form-label">Ponovljena lozinka</label>
                <input type="password" class="form-control" name="loginPasswordCheck" aria-describedby="checkHelp">
            </div>

            <div class="mb-3 form-check">
                <label class="form-check-label" for="tosCheck">Slažem se s uvjetima korištenja stranice</label>
                <input type="checkbox" class="form-check-input" id="tosCheck" name="tosBox" aria-describedby="tosHelp">

            </div>

            <input type="submit" name="submit" class="btn btn-primary mb-2" value="Registriraj me">
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $dbc = connectToDatabase();

            if ($dbc) {
                $username = $_POST['loginUsername'];
                $email = $_POST['loginMail'];
                $password = $_POST['loginPassword'];
                $permit = true;

                $hashPassword = password_hash($password, CRYPT_BLOWFISH);

                //Check if username available
                $checkUsername = "SELECT * FROM users WHERE username = ?";
                $usrStmt = mysqli_stmt_init($dbc);
                if (mysqli_stmt_prepare($usrStmt, $checkUsername)) {
                    mysqli_stmt_bind_param($usrStmt, 's', $username);
                    mysqli_stmt_execute($usrStmt);
                    $usrStmt->store_result();
                    if ($usrStmt->num_rows() > 0) {
                        $permit = false;
                        echo "<p class='text-danger'> Već postoji korisnik s istim korisničkim imenom! </p>";
                    }
                }

                //Check if email available
                $checkEmail = "SELECT * FROM users WHERE email = ?";
                $usrStmt = mysqli_stmt_init($dbc);
                if (mysqli_stmt_prepare($usrStmt, $checkEmail)) {
                    mysqli_stmt_bind_param($usrStmt, 's', $email);
                    mysqli_stmt_execute($usrStmt);
                    $usrStmt->store_result();
                    if ($usrStmt->num_rows() > 0) {
                        $permit = false;
                        echo "<p class='text-danger'> Već postoji korisnik s istom e-mail adresom! </p>";
                    }
                }

                //If all is ok add new user.
                if ($permit) {
                    $sql = "INSERT INTO users(username, email, password) values (?, ?, ?)";
                    $stmt = mysqli_stmt_init($dbc);
                    if (mysqli_stmt_prepare($stmt, $sql) && $permit) {
                        mysqli_stmt_bind_param($stmt, 'sss', $username, $email, $hashPassword);
                        mysqli_stmt_execute($stmt);

                        echo "<p class='text-success'> Uspješna registracija! </p>";
                        echo "<a href ='login.php'>Povratak na prijavu</a>";
                    }
                }
            }
            mysqli_close($dbc);
        }

        ?>

    </div>




</body>

</html>