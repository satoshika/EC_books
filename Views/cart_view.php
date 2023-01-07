<?php $page_title = "カート"; ?>
<?php include_once "head.php"; ?>
<?php include_once "header.php"; ?>
<section>
<h2>カート一覧</h2>
<?php include_once "messages.php"; ?>
<?php if(count($row_item) > 0){ ?>
    <table>
        <tr>
            <th>名前</th>
            <th>画像</th>
            <th>価格</th>
            <th>数量</th>
            <th>操作</th>
        </tr>
<?php foreach($row_item as $item){ ?>
        <tr>
            <td><?php print(he($item['item_name'])); ?></td>
            <td><img src="<?php echo $item['image'];?>"></td>
            <td><?php print(he($item['price'])); ?></td>
            <td><?php print(he($item['amount'])); ?></td>
            <td>
                <form action="cart_delete.php" method="post">
                    <input type="submit" value="削除">
                    <input type="hidden" name="cart_id" value="<?php print(he($item['cart_id'])); ?>">
                </form>
            </td>
        </tr>
<?php }; ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <?php
                $total = 0;
                foreach($row_item as $subtotal){
                    $total += $subtotal['price'] * $subtotal['amount'];
                } 
                ?>
                合計 ¥<?php print($total); ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <form action="purchase.php" method="post">
                    <input type="submit" value="購入する">
                    <input type="hidden" name="user_id" value="<?php print(he($_SESSION['user_id'])); ?>">
                </form>
            </td>
        </tr>
</section>
<?php }else{ ?>
    <p class="left-p">カートに商品はありません。</p>
<?php } ?>
<?php include_once "footer.php"; ?>