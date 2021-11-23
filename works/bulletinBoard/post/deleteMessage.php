<?php 
session_start();

//クリックジャッキング対策
header('X-FRAME-OPTIONS: DENY');

require('dbconnect.php');

if(isset($_SESSION['id'])) { // ログインしているか
  $id = $_REQUEST['id'];
  // 投稿を検査
  $messages = $db->prepare('SELECT * FROM posts WHERE id=?');
  $messages->execute(array($id));
  $message = $messages->fetch();

  if($message['member_id'] == $_SESSION['id']) {
    // 削除する
    $del = $db->prepare('DELETE FROM posts WHERE id=?');
    $del->execute(array($id));
  }
}

header('Location: index.php');
exit();
?>