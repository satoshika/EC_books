<?php require_once "../Models/db.php"; ?>
<?php require_once "../Models/functions.php"; ?>
<?php require_once "../Models/histories.php"; ?>
<?php session_start(); ?>
<?php
if(is_logined() === false){
    header("Location: login.php");
}
?>
<?php
$user_id = get_userid();
$row_item = get_history_lists($dbh, $user_id);
?>

<?php include_once "../Views/purchase_histories_view.php"; ?>