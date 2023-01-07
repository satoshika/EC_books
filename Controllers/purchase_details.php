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
$order_id = get_post("order_id");
$row_item = get_history_details($dbh, $order_id);
?>

<?php include_once "../Views/purchase_details_view.php"; ?>