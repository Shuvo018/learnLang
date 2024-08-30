<?php
include("header.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5" style="width: 60vw; min-width: 300px">
        <form action="registration.php" method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="">name :</label>
                    <input type="text" class="form-control" name="name" placeholder="Name:">
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="">Email :</label>
                <input type="emamil" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <label for="">Password :</label>
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-btn mt-3">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
            <div>
                <p>Already Registered <a href="login.php">Login Here</a></p>
            </div>
        </div>
    </div>

</body>

</html>
<?php
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $errors = array();
    if (empty($name) || empty($email) || empty($password)) {
        array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email is not valid");
    }
    if (strlen($password) < 4) {
        array_push($errors, "Password must be at least 5 characters long");
    }
    // require_once "db.php";
    $sql = "SELECT * FROM user_profile WHERE email = '$email'";
    $result = $db->readData($sql);
    if ($result > 0) {
        array_push($errors, "Email already exist !");
    }
    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
    } else {

        $sql = "INSERT INTO user_profile(name,  email, password)
         VALUES ('$name', '$email', '$passwordHash')";
        $result = $db->insertData($sql);
        if ($result) {
            // echo "<div class='alert alert-success'> You are registered sucessfully.</div>";
            header("Location: login.php");
        } else {
            die("Something went wrong");
        }
    }
}
?>