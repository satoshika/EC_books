<?php $page_title = "商品編集"; ?>
<?php require_once "head.php"; ?>
<section>
<div class="create">
<h2 class="admin_h2">商品編集ページ</h2>
<?php include_once "messages.php"; ?>
    <div>
        <a href="admin_index.php">一覧へ戻る</a>
    </div>
        <div>名前<br>
            <form action="" method="post">        
                <input type="text" name="item_name" value="<?php print(he($row_item['item_name'])); ?>">
                <input type="submit" name="send" value="変更">
                <input type="hidden" name="item_id" value="<?php print(he($row_item['item_id'])); ?>">
            </form>
        </dvi>
        <div>画像<br>
            <img class="update_img" src="<?php echo $row_item['image'];?>">
            <form action="" method="post">
                <input type="hidden" name="max_file_size" value="1000000">
                <input type="file" name="upfile">
                <input type="submit" name="send" value="変更">
                <input type="hidden" name="item_id" value="<?php print(he($row_item['item_id'])); ?>">
            </form>
        </div>
        <div>価格<br>
            <form action="" method="post">        
                <input type="text" name="price" value="<?php print(he($row_item['price'])); ?>">
                <input type="submit" name="send" value="変更">
                <input type="hidden" name="item_id" value="<?php print(he($row_item['item_id'])); ?>">
            </form>
        </div>
        <div>在庫<br>
            <form action="" method="post">        
                <input type="text" name="stock" value="<?php print(he($row_item['stock'])); ?>">
                <input type="submit" name="send" value="変更">
                <input type="hidden" name="item_id" value="<?php print(he($row_item['item_id'])); ?>">
            </form>
        </div>
</div>
</section>
<?php include_once "footer.php"; ?>