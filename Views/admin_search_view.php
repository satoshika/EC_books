<?php $page_title = "検索結果"; ?>
<?php require_once "head.php" ?>
<section>
<h2 class="admin_h2">検索結果</h2>
<?php include_once "messages.php"; ?>
    <a href="admin_index.php">一覧へ戻る</a>
    <table>
        <tr>
            <th>名前</th>
            <th>画像</th>
            <th>価格</th>
            <th>在庫</th>
            <th>操作</th>
        </tr>
<?php foreach($row_item as $item){ ?>
        <tr>
            <td><?php print(he($item['item_name'])); ?></td>
            <td><img src="<?php echo $item['image'];?>"></td>
            <td><?php print(he($item['price'])); ?>円</td>
            <td><?php print(he($item['stock'])) ; ?></td>
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