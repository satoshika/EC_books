<?php $page_title = "ログイン"; ?>
<?php include_once "head.php"; ?>
<?php include_once "header.php"; ?>
<?php include_once "messages.php"; ?>
<section>
    <h2>ログイン</h2>
    <form  action="" method="post">
        <input type="text" name="user_id" placeholder="ID"><br>
        <input type="password" name="password" placeholder="パスワード">
        <input type="submit" value="ログイン">
    </form>
    <a href="../Controllers/signup.php">新規登録</a>
</section>
<?php include_once("footer.php"); ?>