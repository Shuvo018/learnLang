<?php
require_once '../db.php';
session_start();
if (isset($_GET['part'])) {
    $partNum = $_GET['part'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="speeach.css">

    <title>Document</title>
</head>

<body>
    <h2>Short dialogs</h2>
    <?php
    $uid = $_SESSION["user_id"];
    $sql = "SELECT * FROM `user_details` WHERE user_profileId = $uid ";
    $result = $db->readData($sql);
    $mlang = $result[0]['mainLang'];
    $lLang = $result[0]['learnLang'];

    $ML = languageCode($mlang);
    $LL = languageCode($lLang);

    $sql = "SELECT `$mlang`,`$lLang`,`dia_link` FROM `short_dialog` WHERE `partNum` = '$partNum' ";
    $result = $db->readData($sql);
    ?>
    <input type="hidden" class="mLcode" data-id="<?php echo $ML ?>">
    <input type="hidden" class="lLcode" data-id="<?php echo $LL ?>">
    <?php
    if (!empty($result)) {
    ?>
        <table class="table2 table-bordered" style="width: 100%;">
            <tbody id="dialList">
                <?php
                $flag = true;
                foreach ($result as $k => $v) {
                ?>
                    <tr>
                        <?php
                        if ($flag) {
                        ?>
                            <td>A : <span class="leftside"><input type="text" name="lword" data-id="" value="<?php echo $result[$k][$lLang]; ?>"><i id="from" class="fas fa-volume-up"></i></span>
                                <span class="rightside">(<input type="text" name="rword" data-id="" value="<?php echo $result[$k][$mlang]; ?>">) <i id="from" class="fas fa-volume-up"></i></span>
                            </td>
                        <?php
                        } else {
                        ?>
                            <td>B : <span class="leftside"><input type="text" name="lword" data-id="" value="<?php echo $result[$k][$lLang]; ?>"><i id="from" class="fas fa-volume-up"></i></span>
                                <span class="rightside">(<input type="text" name="rword" data-id="" value="<?php echo $result[$k][$mlang]; ?>" )> <i id="from" class="fas fa-volume-up"></i></span>
                            </td>

                        <?php
                        }
                        $flag = !$flag;
                        ?>

                    </tr>

            <?php
                }
            }
            ?>
            </tbody>
        </table>
        <h2>You can try above dialogs:</h2>
        <div class="o-container">
            <div class="container">
                <p class="heading">Speech to Text</p>
                <div class="options">
                    <div class="anguage">
                        <p>Language</p>
                        <select name="input-language" id="language"></select>
                    </div>
                </div>
                <div class="line"></div>
                <button class="btn record">
                    <div class="icon">
                        <ion-icon name="mic-outline"></ion-icon>
                        <img src="bars.svg" alt="" />
                    </div>
                    <p>Start Listening</p>
                </button>
                <p class="heading">Result :</p>
                <div class="result" spellcheck="false" placeholder="Text will be shown here">
                    <p class="interim"></p>
                </div>
                <div class="buttons">
                    <button class="btn clear">
                        <ion-icon name="trash-outline"></ion-icon>
                        <p>Clear</p>
                    </button>
                    <button class="btn download" disabled>
                        <ion-icon name="cloud-download-outline"></ion-icon>
                        <p>Download</p>
                    </button>
                </div>
            </div>
        </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="part.js"></script>

<!-- IONICONS -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<!-- LANGUAGES -->
<script src="languages.js"></script>

<!-- SCRIPT -->
<script src="speeach.js"></script>

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
