<?php

function get_history_lists($dbh, $user_id){
    try{
        $stmt = $dbh->prepare(
            "SELECT
                history_ids.order_id,
                history_ids.created,
                SUM(history_details.price * history_details.amount) AS total
            FROM
                history_ids
            JOIN
                history_details
            ON
                history_ids.order_id = history_details.order_id
            WHERE
                history_ids.user_id = ?
            GROUP BY
                order_id
            ORDER BY
                created desc
            ");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        set_error("テーブル情報の取得に失敗しました");
    }
    return false;
}

function get_history_details($dbh, $order_id){
    try{
        $stmt = $dbh->prepare(
            "SELECT
                history_details.item_id,
                history_details.price,
                history_details.amount,
                items.item_name,
                items.image
            FROM
                history_details
            JOIN
                items
            ON
                history_details.item_id = items.item_id
            WHERE
                history_details.order_id = ?
            ");
        $stmt->execute([$order_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        set_error("テーブル情報の取得に失敗しました");
    }
    return false;
}
?>