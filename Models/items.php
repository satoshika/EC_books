<?php

function select_all_items($dbh){
    try{
        $stmt = $dbh->prepare("SELECT * FROM items");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        set_error("テーブル情報の取得に失敗しました");
    }
    return false;
}

function select_item($dbh, $item_id){
    try{
        $stmt = $dbh->prepare("SELECT * FROM items WHERE item_id = ?");
        $stmt->execute([$item_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        set_error("テーブル情報の取得に失敗しました");
    }
    return false;
}

function search_as($dbh, $post){
    try{
        $search = '%' . addcslashes($post, '%_\\') . '%';
        $stmt = $dbh->prepare("SELECT * FROM items WHERE item_name LIKE '$search'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        set_error("検索に失敗しました");
    }
    return false;
}

function search_category($dbh, $category){
    try{
        $search = '%' . addcslashes($category, '%_\\') . '%';
        $stmt = $dbh->prepare("SELECT * FROM items WHERE category LIKE '$search'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOException $e){
        set_error("検索に失敗しました");
    }
    return false;
}

function update_item_name($dbh, $item_id, $item_name){
    try{
        $stmt = $dbh->prepare("UPDATE items SET item_name = ? WHERE item_id = ?");
        return $stmt->execute([$item_name, $item_id]);
    }catch(PDOException $e){
        set_error("更新に失敗しました");
    }
    return false;
}

function update_image($dbh, $item_id, $image){
    try{
        $stmt = $dbh->prepare("UPDATE items SET image = ? WHERE item_id = ?");
        return $stmt->execute([$image, $item_id]);
    }catch(PDOException $e){
        set_error("更新に失敗しました");
    }
    return false;
}

function update_price($dbh, $item_id, $price){
    try{
        $stmt = $dbh->prepare("UPDATE items SET price = ? WHERE item_id = ?");
        return $stmt->execute([$price, $item_id]);
    }catch(PDOException $e){
        set_error("更新に失敗しました");
    }
    return false;
}

function update_stock($dbh, $item_id, $stock){
    try{
        $stmt = $dbh->prepare("UPDATE items SET stock = ? WHERE item_id = ?");
        return $stmt->execute([$stock, $item_id]);
    }catch(PDOException $e){
        set_error("更新に失敗しました");
    }
    return false;
}

function valid_upload_image($name, $tmp_name, $error){
    if($name !== false && $tmp_name !== false && $error !== false){
        return true;
    }else{
        return false;
    }
}

function get_uploaded_image(){
    $name = get_upfile("name");
    $tmp_name = get_upfile("tmp_name");
    $error = get_upfile("error");
    if(valid_upload_image($name, $tmp_name, $error) === true){
        $ext = pathinfo($name);
        $perm = ["gif" , "jpg" , "jpeg" , "png"];
        if($error !== 0){
            set_error("画像のアップロードに失敗しました");
            return false;
        }elseif(!in_array(strtolower($ext["extension"]), $perm) && $ext !== false){
            set_error("画像以外のファイルはアップロードできません");
            return false;
        }elseif(!@getimagesize($tmp_name) && $tmp_name !== false){
            set_error("ファイルの内容が画像ではありません");
            return false;
        }else{
            $dest = mb_convert_encoding($name, "SJIS-WIN" , "UTF-8");
            if(move_uploaded_file($tmp_name, "../item_imgs/" .$dest) === true){
                $path = "../item_imgs/" .$dest;
                return $path;
            }else{
                set_error("アップロード処理に失敗しました");
                return false;
            }
        }
    }
    return false;
}

function insert_as($dbh, $item_name, $image, $category, $price, $stock){
    try{
        $stmt = $dbh->prepare("INSERT INTO items(item_name, image, category, price, stock) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$item_name, $image, $category, $price, $stock]);
    } catch(PDOException $e){
        set_error("登録に失敗しました");
    }
    return false;
}

function valid_inserts($item_name, $image, $category, $price, $stock){
    $valid_err = true;
    if ($item_name === "" && $item_name !== false){          
        set_error("名前を入力してください");
        $valid_err = false;
    }elseif($image === false){
        $valid_err = false;
    }elseif($category === "" && $category !== false){   
        set_error("カテゴリを入力してください");
        $valid_err = false;
    }elseif($price === "" && $price !== false){   
        set_error("価格を入力してください");
        $valid_err = false;
    }elseif($stock === "" && $price !== false){   
        set_error("在庫数を入力してください");
        $valid_err = false;
    }
    if ($valid_err === false){
        return false;
    }
    return true;
}

function delete_item($dbh, $item_id){
    try{
        $stmt = $dbh->prepare("DELETE FROM items WHERE item_id = ?");
        return $stmt->execute([$item_id]);
    }catch(PDOException $e){
        set_error('データの削除に失敗しました');
    }
    return false;
}

?>