<?php require_once "../Models/db.php"; ?>
<?php require_once "../Models/functions.php"; ?>
<?php require_once "../Models/carts.php"; ?>
<?php session_start(); ?>
<?php
if(is_logined() === false){
    header("Location: login.php");
}
?>
<?php
$user_id = get_userid();
$row_item = select_user_cart($dbh, $user_id);
?>

<?php include_once "../Views/cart_view.php"; ?>