<?php require_once "../Models/db.php"; ?>
<?php require_once "../Models/functions.php"; ?>
<?php require_once "../Models/items.php"; ?>
<?php session_start(); ?>
<?php
$item_id = get_post("item_id");
if($item_id !== false){
    $result = delete_item($dbh, $item_id);
    if($result !== false){
        set_message("データが削除されました");
    }
}
header("Location: admin_index.php");
?>