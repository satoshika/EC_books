<?php require_once "../Models/db.php"; ?>
<?php require_once "../Models/functions.php"; ?>
<?php require_once "../Models/items.php"; ?>
<?php session_start(); ?>
<?php
$id = get_get("id");
$row_user = select_item($dbh, $id);
?>

<?php include_once "../Views/index_item_view.php"; ?>