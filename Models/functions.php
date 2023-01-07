<?php
// htmlentitiesのショートカット
function he($str){
    return htmlentities($str, ENT_QUOTES, "UTF-8");
}

function get_post($name){
  if(isset($_POST[$name]) === true){
    return $_POST[$name];
  }
  return false;
} 

function get_get($name){
  if(isset($_GET[$name]) === true){
    return $_GET[$name];
  }
  return false;
}

function get_session($name){
  if(isset($_SESSION[$name]) === true){
    return $_SESSION[$name];
  }
  return false;
}

function get_upfile($name){
    if(isset($_FILES["upfile"][$name]) === true){
        return $_FILES["upfile"][$name];
    }
    return false;
}

//ログインフラグ
function is_logined(){
    return isset($_SESSION['user_id']);
}

//エラーメッセージ
function set_error($error){
    $_SESSION['__errors'][] = $error;
}
  
function get_errors(){
    $errors = get_session('__errors');
    if($errors === ''){
        return array();
    }else{
        $_SESSION['__errors'] = array();
        return $errors;
    }
}

//メッセージ
function set_message($message){
    $_SESSION['__messages'][] = $message;
  }
  
function get_messages(){
    $messages = get_session('__messages');
    if($messages === ''){
        return array();
    }else{
        $_SESSION['__messages'] = array();
        return $messages;
    }
}

function get_userid(){
    $user_id = get_session("user_id");
    if($user_id === ""){
        return false;
    }else{
        return $user_id;
    }
}

?>