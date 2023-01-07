<?php require_once "../Models/db.php"; ?>
<?php require_once "../Models/functions.php"; ?>
<?php require_once "../Models/carts.php"; ?>
<?php session_start(); ?>
<?php
if(is_logined() === false){
    header("Location: login.php");
}
?>
<?php
$user_id = get_userid();
$row_item = select_user_cart($dbh, $user_id);
$total_price = sum_carts($row_item);

//購入処理：バリデーション、購入履歴への登録、在庫数更新・カート削除
$result = valid_carts($row_item);
if($result === true){
    if(purchase_carts($dbh, $row_item) === false){
        set_error("購入に失敗しました");
        header("Location: cart.php");
    }
}
?>

<?php include_once "../Views/purchase_view.php"; ?>