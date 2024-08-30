<?php
include("header.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <?php
    $id = $_SESSION["user_id"];
    $sql = "SELECT * FROM user_profile WHERE id = $id";
    $result = $db->readData($sql);
    if ($result) {
        $uname = $result[0]["name"];
        $uemail = $result[0]["email"];
    }

    $sql2 = "SELECT * FROM user_details WHERE user_profileId = $id";
    $result2 = $db->readData($sql2);
    if ($result2) {
        $mlang = $result2[0]["mainLang"];
        $wlang = $result2[0]["learnLang"];
    }
    ?>

    <div class="container mt-5">

        <div class="card" style="width: 80%">
            <div class="card-body p-5">
                <form action="" method="">
                    <div class="form-group mb-3">
                        <label for="" class="mb-2 fs-3">Name: </label> <?php echo $uname;  ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="mb-2 fs-3">Email: </label> <?php echo $uemail;  ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="mb-2 fs-3">Main language: </label> <?php echo $mlang;  ?>
                    </div>
                    <div class="form-group mb-3">
                        <label for="" class="mb-2 fs-3">Want to learn: </label> <?php echo $wlang;  ?>
                    </div>
                </form>

            </div>
        </div>

    </div>
</body>

</html>