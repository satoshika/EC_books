<?php require_once("../Models/db.php"); ?>
<?php require_once("../Models/functions.php"); ?>
<?php require_once("../Models/users.php"); ?>
<?php session_start(); ?>
<?php 
$user_id = get_post("user_id");
$password = get_post("password");
$password2 = get_post("password2");
//POSTされた情報をバリデーションして登録
if(valid_user($user_id, $password, $password2) === true){
    $db_user = select_user($dbh, $user_id);
    if($db_user === true){
        set_error("既に登録されているIDです");
    }else{
        if(resist_user($dbh, $user_id, $password) === true){
            set_message("登録が完了しました");
        }else{
            set_error("登録に失敗しました");
        }
    }
}
?>

<?php include_once "../Views/signup_view.php"; ?>