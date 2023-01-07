<?php $page_title = "購入履歴"; ?>
<?php include_once "head.php"; ?>
<?php include_once "header.php"; ?>
<?php include_once "messages.php"; ?>
<section>
<?php if(!empty($row_item)){ ?>
<h2><?php echo get_session("user_id"); ?>さんの購入履歴</h2>
    <table>
        <tr>
            <th>注文番号</th>
            <th>購入日時</th>
            <th>小計</th>
            <th></th>
        </tr>
<?php foreach($row_item as $item){ ?>
        <tr>
            <td><?php echo $item['order_id']; ?></td>
            <td><?php echo $item['created']; ?></td>
            <td>¥<?php echo number_format($item['total']); ?></td>
            <td>
                <form action="purchase_details.php" method="post">
                    <input type="submit" value="詳細">
                    <input type="hidden" name="order_id" value="<?php print($item['order_id']); ?>">
                </form>
            </td>
        </tr>
<?php } ?>
<?php }else{ ?> 
    <p>購入履歴がありません</p>
<?php } ?>
    </table>
<a href="logout.php">ログアウト</a>
</section>
<?php include_once "footer.php"; ?>