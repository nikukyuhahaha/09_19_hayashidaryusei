<?php
// 関数ファイルの読み込み
include('functions.php'); //function.php に置いている関数を呼び出す

// getで送信されたidを取得
$id = $_GET['id']; //送られてきたid番号

//DB接続します
$pdo = connectToDb(); //関数

//データ登録SQL作成，指定したidのみ表示する
$sql = 'SELECT*FROM gs_bm_table WHERE id=:id'; //追加、ここスペルミス注意！！
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//データ表示
if ($status == false) {
  // エラーのとき
  showSqlErrorMsg($stmt);
} else {
  // エラーでないとき
  $rs = $stmt->fetch(); // fetch()で1レコードを取得して$rsに入れる
  // $rsは配列で返ってくる．$rs["id"], $rs["task"]などで値をとれる
  // var_dump()で見てみよう
  // var_dump($rs);

  //データを取れたらinputタグの中にvalueで入れる。入れるのはすでにDBに入っている内容。
}

// if文でいいってかまるごと挿入か
switch ($rs['genre']) {
  case "ヒーロー":
    $checked0 = 'checked';
    $checked1 = '';
    $checked2 = '';
    $checked3 = '';
    $checked4 = '';
    break;
  case "ラブコメ":
    $checked0 = '';
    $checked1 = 'checked';
    $checked2 = '';
    $checked3 = '';
    $checked4 = '';
    break;
  case "ホラー":
    $checked0 = '';
    $checked1 = '';
    $checked2 = 'checked';
    $checked3 = '';
    $checked4 = '';
    break;
  case "学園":
    $checked0 = '';
    $checked1 = '';
    $checked2 = '';
    $checked3 = 'checked';
    $checked4 = '';
    break;
  case "冒険":
    $checked0 = '';
    $checked1 = '';
    $checked2 = '';
    $checked3 = '';
    $checked4 = 'checked';
    break;
}


switch ($rs['parent']) {
  case "殿堂入り":
    $selected0 = 'selected';
    $selected1 = '';
    $selected2 = '';
    break;
  case "完結済み":
    $selected0 = '';
    $selected1 = 'selected';
    $selected2 = '';
    break;
  case "連載中":
    $selected0 = '';
    $selected1 = '';
    $selected2 = 'selected';
    break;
}
// あいう
?>


    <!DOCTYPE html>
    <html lang="ja">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>todo更新ページ</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
      <style>
        div {
          padding: 10px;
          font-size: 16px;
        }
      </style>
    </head>

    <body>

      <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#">漫画情報更新</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="login.php">ログイン</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="select_nologin.php">お気に入り漫画一覧</a>
              </li>
            </ul>
          </div>
        </nav>
      </header>



      <form action="update.php" method="post">
        <div class="form-group">
          <label for="name">書籍名</label>
          <input type="text" class="form-control" id="name" name="name" value="<?= $rs['name'] ?>" disabled="disabled">
        </div>
        <div class="form-group">
          <label for="url">URL</label>
          <input class="form-control" type="text" id="url" name="url" value="<?= $rs['url'] ?>" disabled="disabled">
        </div>
        <div class="form-group">
          <label for="comment">感想</label>
          <textarea class="form-control" id="comment" name="comment" rows="3" disabled="disabled"><?= $rs['comment'] ?></textarea>
        </div>
        <div class="form-group">
          <label for="genre">ジャンル</label>
          <input type="hidden" name="cur_genre">
          <input type="checkbox" name="genre" value="ヒーロー" <?= $checked0 ?> disabled="disabled">ヒーロー
          <input type="checkbox" name="genre" value="ラブコメ" <?= $checked1 ?> disabled="disabled">ラブコメ
          <input type="checkbox" name="genre" value="ホラー" <?= $checked2 ?> disabled="disabled">ホラー
          <input type="checkbox" name="genre" value="学園" <?= $checked3 ?> disabled="disabled">学園
          <input type="checkbox" name="genre" value="冒険" <?= $checked4 ?> disabled="disabled">冒険
        </div>
        <div class=" form-group">
          <label for="parent">フォルダ</label>
          <select id="parent" name="parent" value="<?= $rs['parent'] ?>" disabled="disabled">
            <option <?= $selected0 ?> value="殿堂入り">殿堂入り</option>
            <option <?= $selected1 ?> value="完結済み">完結済み</option>
            <option <?= $selected2 ?> value="連載中">連載中</option>
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <!-- idは変えたくない = ユーザーから見えないようにする-->
        <!-- 実は一番下に出ているがユーザーに見えないようにhidden.-->
        <input type="hidden" name="id" value="<?= $rs['id'] ?>">
      </form>

    </body>

    </html>