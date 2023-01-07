<?php $page_title = "カテゴリ"; ?>
<?php include_once "head.php" ?>
<?php include_once "header.php"; ?>
<section>
    <h2>"<?php echo $category; ?>" カテゴリの検索結果</h2>
    <p class="left-p"><?php echo count($row_item); ?>件</p>
<?php include_once "messages.php"; ?>
    <div class="items">
<?php foreach($row_item as $item){ ?>
        <div>
            <a href="index_item.php?id=<?php echo $item['item_id']; ?>"><img src="<?php echo $item['image'];?>"><br>
            <?php echo$item['item_name']; ?></a>
            <p><a href="index_category.php?id=<?php echo $item['category']; ?>"><?php echo $item['category']; ?></a></p>
            <p>¥<?php echo number_format($item['price']); ?></p>
        </div>
<?php } ?>
    </div>
</section>
<?php include_once "footer.php"; ?>