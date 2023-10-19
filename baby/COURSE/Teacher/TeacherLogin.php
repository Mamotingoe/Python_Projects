<!-- <?php
session_start();
require_once "connection.php";

if (isset($_SESSION["emai"])) {
    header("location: teacherProfile.php");
}

try {
    $connect = new PDO('mysql:host=localhost;dbname=enroll', 'root', '');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST["submit"])) {
        if (empty($_POST["email"]) || empty($_POST["password"])) {
            $message = '<label>All fields are required</label>';
        } else {
            $query = "SELECT * FROM teachersignup WHERE email = :email AND password = :password";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    'email' => $_POST["email"],
                    'password' => $_POST["password"],
                )
            );
            $count = $statement->rowCount();
            if ($count > 0) {
                $_SESSION["emai"] = $_POST["email"];
                header("location: teacherProfile.php");
            } else {
                $message = '<label>Wrong Data</label>';
            }
        }
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
}
?>
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="TeacherLogin.css">
    <title>Login</title>
</head>
<body>
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="../index.html">Home</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <p class="mt-2">For Faculty of EMS</p>
                    </div>
                </div>
            </div>
        </nav>
    </section>
    <section>
        <div class="container">
            <div class="box">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <div class="content">
                    <h1 class="mt-4">NWU</h1>
                    <form action="TeacherLogin.php" method="post" autocomplete="off">
                        <div class="login-form">
                        <?php
                            if (isset($message)) {
                                echo $message;
                            }
                            ?>
                            <div class="form-group row mb-2">
                                <label class="col-md-4 col-form-label text-md-right h4">Email</label>
                                <div class="col-md-8">
                                    <input type="text" name="email" class="form-control" placeholder="Email" required="required">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-md-4 col-form-label text-md-right h3">Password</label>
                                <div class="col-md-8">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required="required">
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
                            </div>
                            <div class="clearfix">
                                <label class="float-left form-check-label mb-2"><input type="checkbox"> Remember me</label>
                            </div>
                            <div class="text-dark">
                                <a href="#" class="text-center text-white">Forgot Password?</a>
                                <p>
                                    <a class="text-white" data-toggle="modal" href="#exampleModalCenter">Create an Account</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <!-- Your registration form modal code goes here -->
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="TeacherLogin.css">
    <title>Login</title>
</head>
<body>
    <section>
        <nav class="navbar navbar-expand-lg navbar-light gradient1">
            <div class="container" style="color: white">
                <a href="../index.html" style="font-weight: bold; font-size: 20px; color: black; text-decoration: none;">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <p class="mt-2">For Faculty of EMS</p>
                    </div>
                </div>
            </div>
        </nav>
    </section>
    <section>
        <div class="container gradient1 container1">
            <div class="box">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <div class="content" style="background-color: purple">
                    <h1 class="mt-4">NWU</h1>
                    <form action="TeacherLogin.php" method="post" autocomplete="off">
                        <div class="login-form">
                            <?php
                            if (isset($message)) {
                                echo '<label class="text-danger">' . $message . '<label>';
                            }
                            ?>
                            <div class="form-group row mb-2" style="text-align: left;">
                                <label class="col-md-4 col-form-label text-md-right h4">Email</label>
                                <input type="text" name="email" class="form-control2" placeholder="Email" required="required">
                            </div>
                            <div class="form-group row mb-2" style="text-align: left;">
                                <label class="col-md-4 col-form-label text-md-right h3">Password</label>
                                <input type="password" name="password" class="form-control2" placeholder="Password" required="required">
                            </div>
                            <div class="mb-2">
                                <input type="submit" name="submit" value="Sign In" style="height:30px;width:70px">
                            </div>
                            <div class="clearfix">
                                <label class="float-left form-check-label mb-2"><input type="checkbox"> Remember me</label>
                            </div>
                            <div class="text-dark">
                                <a href="#" class="text-center text-white ">Forgot Password?</a>
                                <p>
                                    <a class="text-white" data-toggle="modal" href="#exampleModalCenter">Create an Account</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <!-- Your registration form modal code goes here -->
    </section>
    <script>
        // Your JavaScript code goes here
    </script>
    <script src="../bootstrap/dist/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html> -->
<?php

require_once "connection.php";


try {
    $connect = new PDO('mysql:host=localhost;dbname=enroll', 'root', '');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST["submit"])) {
        if (empty($_POST["email"]) || empty($_POST["password"])) {
            $message = '<label class="text-danger">All fields are required</label>';
        } else {
            $query = "SELECT * FROM teachersignup WHERE email = :email AND password = :password";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    'email' => $_POST["email"],
                    'password' => $_POST["password"],
                )
            );
            $count = $statement->rowCount();
            if ($count > 0) {
                $_SESSION["email"] = $_POST["email"];
                header("location: teacherProfile.php");
            } else {
                $message = '<label class="text-danger">Wrong Data</label>';
            }
        }
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="TeacherLogin.css">
    <title>Login</title>
</head>
<body>
    <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="../index.html">Home</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <p class="mt-2">For Faculty of EMS</p>
                    </div>
                </div>
            </div>
        </nav>
    </section>
    <section>
        <div class="container">
            <div class="box">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <div class="content">
                    <h1 class="mt-4">NWU</h1>
                    <form action="TeacherLogin.php" method="post" autocomplete="off">
                        <div class="login-form">
                            <?php
                            if (isset($message)) {
                                echo $message;
                            }
                            ?>
                            <div class="form-group row mb-2">
                                <label class="col-md-4 col-form-label text-md-right h4">Email</label>
                                <div class="col-md-8">
                                    <input type="text" name="email" class="form-control" placeholder="Email" required="required">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-md-4 col-form-label text-md-right h3">Password</label>
                                <div class="col-md-8">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required="required">
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
                            </div>
                            <div class="clearfix">
                                <label class="float-left form-check-label mb-2"><input type="checkbox"> Remember me</label>
                            </div>
                            <div class="text-dark">
                                <a href="#" class="text-center text-white">Forgot Password?</a>
                                <p>
                                    <a class="text-white" data-toggle="modal" href="#exampleModalCenter">Create an Account</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section>
        <!-- Your registration form modal code goes here -->
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
