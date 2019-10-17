<?php
// exit('error');   //これを色々な箇所に入れてみてどこまで動いているのかを見るのも手

// 関数ファイル読み込み
// var_dump($_POST);
//入力チェック(受信確認処理追加)


include('functions.php'); //追加

var_dump($_POST);
if (
  !isset($_POST['name']) || $_POST['name'] == '' ||
  !isset($_POST['url']) || $_POST['url'] == '' ||
  !isset($_POST['genre']) || $_POST['genre'] == '' ||
  !isset($_POST['parent']) || $_POST['parent'] == ''
) {
  exit('ParamError');
}

//POSTデータ取得

$name = $_POST['name'];
$url = $_POST['url'];
$comment = $_POST['comment'];
$genre = $_POST['genre'];
$parent = $_POST['parent'];
$id = $_POST['id'];       //追加

//DB接続→名前変える
//DB接続します(エラー処理追加)
$pdo = connectToDb();  //functionに置いているDB接続の関数

// データ登録SQL作成

$sql = 'UPDATE gs_bm_table SET name=:a1,url=:a2,comment=:a3,comment=:a4,parent=:a5 WHERE id=:id'; //何番目？を指定する**WHEREを忘れると全て更新される！！


$stmt = $pdo->prepare($sql);
$stmt->bindValue(":a1", $name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(":a2", $url, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(":a3", $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(":a4", $genre, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(":a5", $parent, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  exit('sqlError:' . $error[2]);
} else {
  //５．index.phpへリダイレクト
  header('Location: select.php');
}
