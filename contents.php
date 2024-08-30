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
    <img src="imgs/langtravel.jpg" style="width: 100%; height: 50%;" alt="">
    <h3><u>Contents : </u></h3>
    <?php

    $sql = "SELECT `id`, `chapterNum`, `chapter` FROM `contents`";
    $result = $db->readData($sql);
    if (!empty($result)) {
        $prevChapterNum = 0;
    ?>
        <ol class="mt-3">
            <?php
            foreach ($result as $k => $v) {
                $cpterNum = $result[$k]["chapterNum"];
                if ($prevChapterNum != $cpterNum) {
                    $prevChapterNum = $cpterNum;
            ?>
                    <li class="fs-3 mb-2"><a href="chapters/chapter.php?cptN=<?php echo $cpterNum; ?>" name="chapter"><?php echo $result[$k]["chapter"]  ?></a></li>

        <?php
                }
            }
        }
        ?>
        <li class="fs-3 mb-2"><a href="chapters/longConversions.php"> Long conversions</a></li>
        </ol>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!-- <script src="scripts/contents.js"></script> -->

</html>

<?php
