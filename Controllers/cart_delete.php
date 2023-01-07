<?php require_once "../Models/db.php"; ?>
<?php require_once "../Models/functions.php"; ?>
<?php require_once "../Models/carts.php"; ?>
<?php session_start(); ?>
<?php
$cart_id = get_post('cart_id');
$result = delete_cart($dbh, $cart_id);
if($result !== false){
    set_message("削除されました");
}
header("Location: cart.php");
?>