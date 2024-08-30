<?php
include("header.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $sql = "SELECT * FROM user_profile WHERE email = '$email'";
            $result = $db->readData($sql);
            if ($result) {
                if (password_verify($password, $result[0]["password"])) {
                    $_SESSION["user"] = true;
                    $_SESSION["user_id"] = $result[0]['id'];
                    header("Location: index.php");
                    die();
                } else {
                    echo "<div class='alert alert-danger'>Password does not match </div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Email does not match </div>";
            }
        }
        ?>
        <div class="card" style="width: 80%">
            <div class="card-body p-5">
                <form action="login.php" method="post">
                    <div class="form-group mb-3">
                        <label for="" class="mb-2 fs-3">Email: </label>
                        <input type="email" placeholder="Enter Email:" name="email" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="mb-2 fs-3">Password: </label>
                        <input type="password" placeholder="Enter password:" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" value="login" class="btn btn-primary">
                    </div>
                </form>

            </div>
            <div>
                <p>Not registered yet <a href="registration.php">Registration here</a></p>
            </div>
        </div>
</body>

</html>