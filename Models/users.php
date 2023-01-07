<?php
function select_user($dbh, $user_id){
    try{
        $stmt = $dbh->prepare ("SELECT * FROM users WHERE user_id = ? LIMIT 1");
        $stmt->execute([$user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(PDOException $e) {
        set_error("ログイン情報の取得に失敗しました");
    }
    return false;
}

function login_as($db_user, $post_pass){
    if($db_user){
        if(password_verify($post_pass, $db_user['password']) === true){
            $_SESSION['user_id'] =  $db_user['user_id'];
            return true;
        }
        else{
            set_error("IDまたはパスワードが間違っています");
            return false;
        }
    }
    else{
        set_error("ログインに失敗しました");
        return false;
    }
}

//新規登録
function valid_user($user_id, $password, $password2){
    if($user_id !== false && $password !== false && $password2 !== false){
        if($user_id === ""){          
            set_error("ユーザーIDを設定してください");
            return false;
        }elseif($password === ""){   
            set_error("パスワードを設定してください");
            return false;
        }elseif($password2 === ""){  
            set_error("確認のためもう一度パスワードを入力してください");
            return false;
        }elseif($password !== $password2){  
            set_error("パスワードが一致しません");
            return false;
        }else{
            return true;
        }
    }
    return false;
}

function resist_user($dbh, $user_id, $password){
    try{
    $stmt = $dbh->prepare("INSERT INTO users(user_id, password) VALUES (?, ?)");
    return $stmt->execute([$user_id, password_hash($password, PASSWORD_DEFAULT)]);
    }catch(PDOException $e) {
        set_error("ログイン処理に失敗しました");
    }
    return false;
}