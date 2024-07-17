<?php

require_once "../db.php";
session_start();
if (isset($_POST['action']) && $_POST['action'] == 'content') {
    $_SESSION['chpater'] = $_POST['chapter'];;
    // echo $_POST['chapter'];
}
