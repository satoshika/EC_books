<?php require_once "../Models/db.php"; ?>
<?php require_once "../Models/functions.php"; ?>
<?php require_once "../Models/items.php"; ?>
<?php session_start(); ?>
<?php
$item_name = get_post("item_name");
$image = get_uploaded_image();
$category = get_post("category");
$price = get_post("price");
$stock = get_post("stock");
if(valid_inserts($item_name, $image, $category, $price, $stock) === true){
    $result = insert_as($dbh, $item_name, $image, $category, $price, $stock);
    if($result !== false){
        set_message("登録に成功しました");
    }
}
?>

<?php include_once "../Views/admin_create_view.php"; ?>