<?php

// 入力チェック
var_dump($_POST);
if (
  !isset($_POST['select_parent']) || $_POST['select_parent'] == '' ||
  !isset($_POST['child1']) || $_POST['child1'] == ''
) {
  exit('ParamError');
}

//POSTデータ取得

$select_parent = $_POST['select_parent'];
$child1 = $_POST['child1'];

//DB接続名前変える
$dbn = 'mysql:dbname=gsacfd04_19;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  exit('dbError:' . $e->getMessage());
}

// データ登録SQL作成


$sql = 'INSERT INTO gs_bm_table(id, name, url, comment, indate, genre, parent,child1,child2)VALUES(NULL, :a1, :a2, :a3,sysdate(), :a4,:a5,:a6,:a7)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(":a1", "a", PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(":a2", "a", PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(":a3", "a", PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(":a4", "a", PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(":a5", $select_parent, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(":a6", $child1, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(":a7", "a", PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  exit('sqlError:' . $error[2]);
} else {
  //５．index.phpへリダイレクト
  header('Location: select.php');
}

// とりま

// <!DOCTYPE html>
// <html lang="ja">

// <head>
//   <meta charset="UTF-8">
//   <meta name="viewport" content="width=device-width, initial-scale=1.0">
//   <meta http-equiv="X-UA-Compatible" content="ie=edge">
//   <!-- //JQuery読み込み -->
//   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
//   <!-- //外部javascript呼び出し -->
//   <!-- //ここでid属性を記述して、スクリプトタグに変数を埋め込みます -->
//   <script id="script" type="text/javascript" src="js/main.js" data-param='<?php echo json_safe_encode($view5); 
