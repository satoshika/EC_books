<?php $page_title = "新規登録"; ?>
<?php include_once "head.php"; ?>
<?php include_once "header.php"; ?>
<?php include_once "messages.php"; ?>
<section>
    <h1>新規登録</h1>
        <form  action="" method="post">
            <input type="text" name="user_id" placeholder="ID"><br>
            <input type="password" name="password" placeholder="パスワード"><br>
            <input type="password" name="password2" placeholder="パスワード（確認用）">
            <input type="submit" value="登録">
        </form>
        <a href="../Controllers/login.php">ログイン</a>
</section>
<?php include_once "footer.php"; ?>