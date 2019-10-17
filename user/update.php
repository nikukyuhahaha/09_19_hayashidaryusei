<?php
// exit('error');   //これを色々な箇所に入れてみてどこまで動いているのかを見るのも手

// 関数ファイル読み込み
// var_dump($_POST);
include('functions.php'); //追加
//入力チェック(受信確認処理追加)
if (
  !isset($_POST['name']) || $_POST['name'] == '' || //空っぽでは困るのでチェック
  !isset($_POST['lid']) || $_POST['lid'] == '' ||
  !isset($_POST['lpw']) || $_POST['lpw'] == '' || //空っぽでは困るのでチェック
  !isset($_POST['kanri_flg']) || $_POST['kanri_flg'] == '' ||
  !isset($_POST['life_flg']) || $_POST['life_flg'] == ''
) {
  exit('ParamError');
}

//POSTデータ取得
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$kanri_flg = $_POST['kanri_flg'];
$life_flg = $_POST['life_flg'];
$id = $_POST['id'];       //追加

//DB接続します(エラー処理追加)
$pdo = connectToDb();  //functionに置いているDB接続の関数

//データ登録SQL作成
$sql = 'UPDATE user_table SET name=:a1,lid=:a2,lpw=:a3,kanri_flg=:a4,life_flg=:a5 WHERE id=:id'; //何番目？を指定する**WHEREを忘れると全て更新される！！
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $task, PDO::PARAM_STR);
$stmt->bindValue(':a2', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':a3', $comment, PDO::PARAM_STR);
$stmt->bindValue(':a4', $kanri_flg, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a5', $life_flg, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if ($status == false) {
  showSqlErrorMsg($stmt);
} else {
  header('Location: select.php'); //ここに戻る
  exit;
}
