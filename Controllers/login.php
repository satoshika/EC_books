<?php require_once("../Models/db.php"); ?>
<?php require_once("../Models/functions.php"); ?>
<?php require_once("../Models/users.php"); ?>
<?php session_start(); ?>
<?php
if(!empty($_POST["user_id"]) && !empty($_POST["password"])){
    $row_user = select_user($dbh, $_POST["user_id"]);
    $login = login_as($row_user, $_POST["password"]);
    if($login === true){
        header("Location: index.php");
    }
}

?>

<?php include_once("../Views/login_view.php"); ?>