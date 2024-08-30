<?php
include("header2.php");

session_start();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <?php
    // echo $_SESSION["user_id"];
    $uid = $_SESSION["user_id"];
    $sql = "SELECT * FROM `user_details` WHERE user_profileId = $uid ";
    $result = $db->readData($sql);
    $mlang = $result[0]['mainLang'];
    $lLang = $result[0]['learnLang'];

    // echo $mlang;
    // echo $lLang;
    $ML = languageCode($mlang);
    $LL = languageCode($lLang);


    $wordList = "SELECT `$mlang`, `$lLang`, `chapter` FROM `word` WHERE chapter = $cpterN";
    $result = $db->readData($wordList);
    ?>
    <h2 class="fs-3 mb-4">Word list : </h2>
    <input type="hidden" class="mLcode" data-id="<?php echo $ML ?>">
    <input type="hidden" class="lLcode" data-id="<?php echo $LL ?>">
    <?php
    if (!empty($result)) {
    ?>
        <table class="table2 table-bordered" style="width: 80%; margin:auto;">
            <tbody id="wordList">
                <?php
                foreach ($result as $k => $v) {
                ?>
                    <tr class="">
                        <td class="fs-3 p-1"><span class="leftSide"><i id="from" class="fas fa-volume-up m-2"></i><input type="text" style="width: <?php echo (strlen($result[$k][$mlang]) * 16) . 'px'; ?> " name="lword" data-id="" value="<?php echo $result[$k][$mlang]; ?>" readOnly></span> :
                            <span class="rightSide"><i id="from" class="fas fa-volume-up m-2"></i><input type="text" style="width: <?php echo (strlen($result[$k][$lLang]) * 10) . 'px'; ?> " name="rword" data-id="" value="<?php echo $result[$k][$lLang]; ?>" readOnly></span>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
            </tbody>
        </table>

</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script src="word.js"></script>

</html>

<?php
function languageCode($lan)
{
    if ($lan == 'english') {
        $lan = "en-GB";
    } else if ($lan == 'bangla') {
        $lan = "bn-IN";
    } else if ($lan == 'Hindi') {
        $lan = "hi-IN";
    } else if ($lan == "japanese") {
        $lan = "ja-JP";
    } else if ($lan == "chinese") {
        $lan = "zh-CN";
    }
    return $lan;
}
