<?php
// DB接続設定
$dsn = 'mysql:dbname=tb240497db;host=localhost';
$user = 'tb-240497';
$password = 'ke7nffydkh';
try{
    $dbh = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
}catch(PDOException $e){
    exit("データベースへの接続に失敗しました:" .$e->getMessage());
}
?>