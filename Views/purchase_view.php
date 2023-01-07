<?php $page_title = "購入完了"; ?>
<?php include_once "head.php"; ?>
<?php include_once "header.php"; ?>
<section>
<?php if(count($row_item) > 0){ ?>
<h2>購入した商品</h2>
<?php include_once "messages.php"; ?>
    <table>
        <tr>
            <th>名前</th>
            <th>画像</th>
            <th>価格</th>
            <th>数量</th>
            <th>小計</th>
        </tr>
<?php foreach($row_item as $item){ ?>
        <tr>
            <td><?php print(he($item['item_name'])); ?></td>
            <td><img src="<?php echo $item['image'];?>"></td>
            <td><?php print(he($item['price'])); ?>円</td>
            <td><?php print(he($item['amount'])); ?></td>
            <td><?php print(he($item['price'] * $item['amount'])); ?></td>
        </tr>
<?php }; ?>
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
    </table>
<?php }else{ ?>
    <p>カートに商品はありません。</p>
<?php } ?>
</section>
<?php include_once "footer.php"; ?>