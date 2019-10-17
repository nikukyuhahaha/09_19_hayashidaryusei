<?php

// 入力チェック
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

//DB接続→名前変える
$dbn = 'mysql:dbname=gsacfd04_19;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  exit('dbError:' . $e->getMessage());
}

// データ登録SQL作成


$sql = 'INSERT INTO gs_bm_table(id, name, url, comment, indate, genre, parent)VALUES(NULL, :a1, :a2, :a3,sysdate(), :a4,:a5)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":a1", $name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(":a2", $url, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(":a3", $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(":a4", $genre, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(":a5", $parent, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  exit('sqlError:' . $error[2]);
} else {
  //５．index.phpへリダイレクト
  header('Location: index.php');
}
