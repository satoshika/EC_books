<?php $page_title = "商品詳細"; ?>
<?php include_once "head.php"; ?>
<?php include_once "header.php"; ?>
<?php include_once "messages.php"; ?>
<section>
<h2>商品詳細</h2>
    <div class="item_detail">
        <div class="detail_img">
            <img src="<?php echo $row_user['image'];?>">
        </div>
        <div class="detail_info">
            <h3><?php echo $row_user['item_name']; ?></h3>
            <div class="detail_info_p">
                <span>在庫：<?php echo $row_user['stock']; ?><br>ゆうパケットから発送</span>
                <h4>¥<?php echo number_format($row_user['price']); ?></h4>
            </div>
            <form action="index_add_cart.php" method="post">
                <input type="submit" value="カートに入れる">
                <input type="hidden" name="item_id" value="<?php print(he($row_user['item_id'])); ?>">
            </form>
        </div>
    </div>
</section>
<?php include_once "footer.php"; ?>