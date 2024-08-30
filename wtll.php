<?php
include("header.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Document</title>
    <style>
        body {
            width: 100%;
            background-color: #A3C1AD;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>what language you want to learn</h1>

        <form action="wtll.php" method="post">
            <div id="checkBox">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="lang" data-id=" " value="Bangla" checked>Bangla
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="lang" data-id=" " value="English">English
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="lang" data-id=" " value="Hindi">Hindi
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="lang" data-id=" " value="Japanese">Japanese
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="lang" data-id=" " value="chinese">chinese
                </div>
            </div>
            <div class="form-btn mt-3">
                <input type="submit" class="btn btn-primary" value="next" name="lnext">
            </div>
            <!-- <button><a href="contents.html">Next</a></button> -->
        </form>

    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- <script src="scripts/script.js"></script> -->

</html>
<?php
if (isset($_POST['lnext'])) {
    // echo $_POST['lang'];
    // echo $_SESSION["user_id"];
    $llang = $_POST['lang'];
    $uid = $_SESSION["user_id"];

    $sql = "UPDATE `user_details` SET `learnLang` = '$llang' WHERE `user_profileId` = '$uid' ";
    $db->updataData($sql);
    // echo "updated";

    header("Location: contents.php");
}


?>