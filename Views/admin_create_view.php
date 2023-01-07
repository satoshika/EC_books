<?php $page_title = "商品登録" ?>
<?php include_once "head.php"; ?>
<section>
<div class="create">
    <h2 class="admin_h2">商品登録ページ</h2>
<?php include_once "messages.php"; ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div>名前<br>
                <input type="text" name="item_name">
            </div>
            <div>カテゴリ<br>
                <input type="text" name="category">
            </div>
            <div>価格<br>
                <input type="number" name="price">
            </div>
            <div>在庫<br>
                <input type="number" name="stock">
            </div>
            <div>画像<br>
                <input type="hidden" name="max_file_size" value="1000000">
                <input type="file" name="upfile">
            </div>
            <div>
            <input type="submit" name="send" value="登録">
            </div>
        </form>
        <div>
            <a href="admin_index.php">一覧へ戻る</a>
        </div>
</div>
</section>
<?php include_once "footer.php"; ?>