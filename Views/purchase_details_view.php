<?php $page_title = "購入明細"; ?>
<?php include_once "head.php"; ?>
<?php include_once "header.php"; ?>
<?php include_once "messages.php"; ?>
<section>
<?php if(!empty($row_item)){ ?>
<h2>購入明細</h2>
    <table>
        <tr>
            <th>商品名</th>
            <th>画像</th>
            <th>価格</th>
            <th>数量</th>
            <th>小計</th>
        </tr>
<?php foreach($row_item as $item){ ?>
        <tr>
            <td><?php echo $item['item_name']; ?></td>
            <td><img src="<?php echo $item['image'];?>"></td>
            <td>¥<?php echo number_format($item['price']); ?></td>
            <td><?php echo $item['amount']; ?></td>
            <td>¥<?php echo number_format($item['price'] * $item['amount']); ?></td>
        </tr>
<?php } ?>
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
<?php }else{ ?> 
    <p>購入履歴がありません</p>
<?php } ?>
</section>
<?php include_once "footer.php"; ?>