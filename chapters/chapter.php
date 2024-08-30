<?php
// require_once '../db.php';
include("header2.php");
if (isset($_GET['cptN'])) {
    $cpterN = $_GET['cptN'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title></title>
</head>

<body>
    <?php
    $sql = "SELECT `chapter`,`part`, `partNum`  FROM `contents` WHERE `chapterNum`= $cpterN";
    $result = $db->readData($sql);
    if (!empty($result)) {
    ?>
        <h2 class="text-center mt-3 mb-3">Chapter: <?php echo $result[0]['chapter']; ?></h2>
        <ol style="margin-left: 30px;">
            <li class="fs-3 mb-2"><a href="words.php?cptN=<?php echo $cpterN; ?>">Words</a></li>

            <?php
            foreach ($result as $k => $v) {
            ?>
                <li class="fs-3 mb-2"><a href="part.php?part=<?php echo $result[$k]['partNum']; ?>"><?php echo $result[$k]['part']; ?></a></li>
            <?php
            }
            ?>
            <li class="fs-3 mb-2"><a href=""> Videos</a></li>
        </ol>
    <?php

    }
    ?>


</body>

</html>