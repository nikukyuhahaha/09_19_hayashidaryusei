<?php


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>todo登録</title>
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
      <a class="navbar-brand" href="#">お気に入り漫画登録</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="select.php">データ一覧</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <form action="insert.php" method="post">
    <div class="form-group">
      <label for="name">書籍名</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
      <label for="url">URL</label>
      <input class="form-control" type="text" id="url" name="url">
    </div>
    <div class="form-group">
      <label for="comment">感想</label>
      <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
    </div>
    <div class="form-group">
      <label for="genre">ジャンル</label>
      <input type="checkbox" name="genre" value="ヒーロー">ヒーロー
      <input type="checkbox" name="genre" value="ラブコメ">ラブコメ
      <input type="checkbox" name="genre" value="ホラー">ホラー
      <input type="checkbox" name="genre" value="学園">学園
      <input type="checkbox" name="genre" value="冒険">冒険
    </div>
    <div class="form-group">
      <label for="parent">フォルダ</label>
      <select id="parent" name="parent">
        <option value="殿堂入り">殿堂入り</option>
        <option value="完結済み">完結済み</option>
        <option value="連載中">連載中</option>
      </select>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>

</body>

</html>