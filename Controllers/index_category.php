<?php require_once "../Models/db.php"; ?>
<?php require_once "../Models/functions.php"; ?>
<?php require_once "../Models/items.php"; ?>
<?php session_start(); ?>
<?php
$category = get_get("id");
if($category === "" && $category !== false){
    set_error("値を入力してください");
}else{
    $row_item = search_category($dbh, $category);
}
?>

<?php include_once "../Views/index_category_view.php"; ?>