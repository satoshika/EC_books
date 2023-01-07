<?php require_once "../Models/db.php"; ?>
<?php require_once "../Models/functions.php"; ?>
<?php require_once "../Models/items.php"; ?>
<?php session_start(); ?>
<?php
$row_item = select_all_items($dbh);
?>

<?php include_once "../Views/admin_index_view.php"; ?>