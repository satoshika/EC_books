<?php $page_title = "商品管理"; ?>
<?php include_once "head.php"; ?>
<section>
<h2 class="admin_h2">商品管理ページ</h2>
<?php include_once "messages.php"; ?>
    <div class="admin_top">
        <form method="post" action="admin_search.php">
            <input type="text" name="search">
            <input type="submit" value="検索">
        </form><br>
        <a href = "admin_create.php">商品を追加</a>
    </div>
    <table>
        <tr>
            <th>名前</th>
            <th>画像</th>
            <th>カテゴリ</th>
            <th>価格</th>
            <th>在庫</th>
            <th>操作</th>
        </tr>
<?php foreach($row_item as $item){ ?>
        <tr>
            <td><?php echo $item['item_name']; ?></td>
            <td><img src="<?php echo $item['image'];?>"></td>
            <td><?php echo $item['category']; ?></td>
            <td>¥<?php echo number_format($item['price']); ?></td>
            <td><?php echo $item['stock']; ?></td>
            <td>
                <form method="post" action="admin_update.php">
                    <input type="submit" value="編集">
                    <input type="hidden" name="item_id" value="<?php print(he($item['item_id'])); ?>">
                </form>
                <form method="post" action="admin_delete.php">
                    <input type="submit" value="削除">
                    <input type="hidden" name="item_id" value="<?php print(he($item['item_id'])); ?>">
                </form>
            </td>
        </tr>
<?php } ?>
    </table>
</section>
<?php include_once "footer.php"; ?>