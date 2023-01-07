<?php require_once "../Models/db.php"; ?>
<?php require_once "../Models/functions.php"; ?>
<?php require_once "../Models/carts.php"; ?>
<?php session_start(); ?>
<?php 
if(isset($_POST['item_id'])){
    $cart = select_carts($dbh, $_SESSION['user_id'], $_POST['item_id']);
    $result = valid_add_cart($dbh, $cart);
    if($result !== false){
        set_message("商品を追加しました");
    }
}

header("Location: cart.php");