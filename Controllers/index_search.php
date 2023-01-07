<?php require_once "../Models/db.php"; ?>
<?php require_once "../Models/functions.php"; ?>
<?php require_once "../Models/items.php"; ?>
<?php session_start(); ?>
<?php
$search = get_post("search");
if($search === "" && $search !== false){
    set_error("値を入力してください");
}else{
    $row_item = search_as($dbh, $search);
}
?>

<?php include_once "../Views/index_search_view.php"; ?>