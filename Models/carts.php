<?php 

function select_carts($dbh, $user_id, $item_id){
    try{
        $stmt = $dbh->prepare("SELECT * FROM carts WHERE user_id = ? AND item_id = ?");
        $stmt->execute([$user_id, $item_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        set_error("テーブル情報の取得に失敗しました");
    }
    return false;
}

//カート追加（既にカートにある場合は数量を+1）
function valid_add_cart($dbh, $cart){
    try{
        if(isset($cart) && $cart !== false){
            $stmt = $dbh->prepare("UPDATE carts SET amount = ? WHERE cart_id = ?");
            return $stmt->execute([$cart['amount'] + 1, $cart['cart_id']]);
        } else{
            $stmt = $dbh->prepare("INSERT INTO carts(user_id, item_id, amount) VALUES (?, ?, ?)");
            return $stmt->execute([$_SESSION['user_id'], $_POST['item_id'], 1]);
        }
    }catch(PDOException $e){
        set_error("カートの更新に失敗しました");
    }
    return false;
}

function select_user_cart($dbh, $user_id){
    try{
        $stmt = $dbh->prepare(
            "SELECT
                items.item_id,
                items.item_name,
                items.image,
                items.price,
                items.stock,
                carts.cart_id,
                carts.user_id,
                carts.amount
            FROM
                carts
            JOIN
                items
            ON
                carts.item_id = items.item_id
            WHERE
                carts.user_id = ?
        ");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        set_error("カート情報の取得に失敗しました");
    }
    return false;
}

function delete_cart($dbh, $cart_id){
    try{
        $stmt = $dbh->prepare("DELETE FROM carts WHERE cart_id = ?");
        return $stmt->execute([$cart_id]);
    } catch(PDOException $e) {
        set_error("データの削除に失敗しました");
    }
    return false;
}

function sum_carts($carts){
    $total_price = 0;
    foreach($carts as $price){
        $total_price += $price['price'] * $price['amount'];
    }
    return $total_price;
}

function valid_carts($carts){
    if(count($carts) === 0){
        set_error("カートに商品が入っていません");
        return false;
    }
    foreach($carts as $cart){
        if($cart['stock'] - $cart['amount'] < 0){
            set_error($cart['item_name'] . 'は在庫が足りません');
            return false;
        }
    }
    return true;
}

function purchase_carts($dbh, $carts){
    $dbh->beginTransaction();
    try{
        $stmt = $dbh->prepare("INSERT INTO history_ids(user_id) VALUES (?)");
        $stmt->execute([$carts[0]['user_id']]);
        $order_id = $dbh->lastInsertId();
        foreach($carts as $cart){
            $stmt2 = $dbh->prepare("INSERT INTO history_details(order_id, item_id, price, amount) VALUES (?, ?, ?, ?)");
            $stmt2->execute([$order_id, $cart['item_id'], $cart['price'], $cart['amount']]);

            $stmt3 = $dbh->prepare("UPDATE items SET stock = ? WHERE item_id = ?");
            $stmt3->execute([$cart['stock'] - $cart['amount'], $cart['item_id']]);
        }
        $stmt4 = $dbh->prepare("DELETE FROM carts WHERE user_id = ?");
        $stmt4->execute([$carts[0]['user_id']]);
        $dbh->commit();
    }catch(PDOException $e){
        $dbh->rollback();
        throw $e;
    }
}
?>