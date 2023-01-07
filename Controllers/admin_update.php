<?php require_once "../Models/db.php"; ?>
<?php require_once "../Models/functions.php"; ?>
<?php require_once "../Models/items.php"; ?>
<?php session_start(); ?>
<?php
if(isset($_POST['send'])){
    if(isset($_POST['item_name'])){
        $result = update_item_name($dbh, $_POST['item_id'], $_POST['item_name']);
    }elseif(isset($_POST['image'])){
        $image = get_uploaded_image();
        $result = update_item_name($dbh, $_POST['item_id'], $image);
    }elseif(isset($_POST['price'])){
        $result = update_price($dbh, $_POST['item_id'], $_POST['price']);               
    }elseif(isset($_POST['stock'])){
        $result = update_stock($dbh, $_POST['item_id'], $_POST['stock']);           
    }
    if($result !== false){
        set_message("更新に成功しました");
    }
}
?>
<?php
$item_id = get_post("item_id");
$row_item = select_item($dbh, $item_id);
?>

<?php include_once "../Views/admin_update_view.php"; ?>