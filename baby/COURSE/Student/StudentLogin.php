<?php
session_start();
require_once "connection.php";

if (isset($_SESSION["roll_no"])) {
    header("location: StudentProfile.php");
}

try {
    $connect = new PDO('mysql:host=localhost;dbname=enroll', 'root', '');
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST["submit"])) {
        if (empty($_POST["roll_no"]) || empty($_POST["password"])) {
            $message = '<label>All fields are required</label>';
        } else {
            $query = "SELECT * FROM studentsignup WHERE roll_no = :roll_no AND password = :password";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    'roll_no' => $_POST["roll_no"],
                    'password' => $_POST["password"]
                )
            );
            $count = $statement->rowCount();
            if ($count > 0) {
                $_SESSION["roll_no"] = $_POST["roll_no"];
                header("location: StudentProfile.php");
            } else {
                $message = '<label>Wrong Data</label>';
            }
        }
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
}

if (isset($_POST['register']) && isset($_FILES['img'])) {
    // Your registration code remains the same.
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NWU Student Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <img src="../img/NWU2.webp" alt="NWU Logo" class="card-img-top" style="max-width: 100%; margin: 0 auto;">
                    <div class="card-body">
                        <h5 class="card-title text-center">North-West University</h5>
                        <form action="StudentLogin.php" method="post" autocomplete="off">
                            <?php
                            if (isset($message)) {
                                echo '<p class="text-danger text-center">' . $message . '</p>';
                            }
                            ?>
                            <div class="mb-3">
                                <input type="text" name="roll_no" class="form-control" placeholder="Student Number" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
                            </div>
                            <div class="form-check mt-3">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <div class="text-center mt-3">
                                <a href="#" class="text-body">Forgot Password?</a>
                            </div>
                            <p class="text-center mt-3">Don't have an account? <a href="#exampleModalCenter" data-bs-toggle="modal" class="text-primary">Register</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Registration Modal -->
    <section>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Student Registration Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <form class="inbox" action="StudentLogin.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body modal-xl">
                            <div class="container inbox">
                                <div class="row justify-content-center">
                                    <div class="col-md-7">
                                        <div class="form-group row">
                                            <div class="form-group col-6">
                                                <label for="exampleInput">Full Name :</label>
                                                <input type="name" name="student_name" class="form-control" id="exampleInputname" placeholder="Full Name">
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="exampleInput">Student Number :</label>
                                                <input type="text" name="roll_no" class="form-control" placeholder="Student No.">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="form-group col-6">
                                                <label for="exampleInput">Email :</label>
                                                <input type="email" name="email" class="form-control" id="exampleInputemail" placeholder="Email">
                                            </div>
                                            
                                            <div class="form-group col-6">
                                                <label for="inputdepartment6">Department:</label>
                                                <select class="form-select" name="department" aria-label=".form-select-sm example">
                                                    <option>Choose Department</option>
                                                    <option value="CSE">Information System</option>
                                                    <option value="EEE">Accounting</option>
                                                    <option value="AE">Statistics</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="form-group col-6">
                                                <label for="exampleInput">Father's Name :</label>
                                                <input type="text" name="father_name" class="form-control" placeholder="Father's Name">
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="exampleInput">Mother's Name :</label>
                                                <input type="text" name "mother_name" class="form-control" placeholder="Mother's Name">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="specify">Address</label>
                                            <textarea class="form-control" name="address" id="specify" placeholder="Address"></textarea>
                                        </div>

                                        <div class="form-group row">
                                            <div class="form-group col-6">
                                                <label for="exampleInput">Mobile No :</label>
                                                <input type="number" name="mobile_no" class="form-control" id="exampleInputmobile" placeholder="Mobile No.">
                                            </div>

                                            <div class="form-group col-6">
                                                <label for="exampleInput">Guardian's Name</label>
                                                <input type="text" name="guardian_name" class="form-control" id="exampleInputguardian" placeholder="Guardian's Name">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="form-group col-6">
                                                <label for="exampleInput">Password :</label>
                                                <input type="text" name="password" class="form-control" id="exampleInputpassword" placeholder="Password">
                                            </div>
                                            <div class="form-group col-6">
                                                <label for="exampleInput">Confirm Password :</label>
                                                <input type="password" name="confirm_password" class="form-control" id="exampleInputconfirmpassword" placeholder="Confirm Password">
                                            </div>
                                        </div>

                                        <label for="exampleFormControlFile1">Choose Photo :</label>
                                        <div class="form-group">
                                            <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <div class="form-group mt-2">
                                <div class="col-md-12">
                                    <button type="submit" name="register" class="btn btn-primary" onclick="return validateForm();">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        function validateForm() {
            try {
                eml = document.getElementById('exampleInputemail').value;
                password = document.getElementById('exampleInputpassword').value;
                if (eml == null || eml == "" || password == null || password == "") {
                    alert("All fields must be filled out");
                    return false;
                }
                if (eml.indexOf('@') == -1) {
                    alert("Invalid Email address");
                    return false;
                }
                return true;
            } catch (e) {
                return false;
            }
            return false;
        }
    </script>

    <script src="../bootstrap/dist/js/bootstrap.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

