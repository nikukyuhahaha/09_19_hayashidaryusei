<?php
//1. DB接続
//DB接続
$dbn = 'mysql:dbname=gsacfd04_19;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  exit('dbError:' . $e->getMessage());
}


//2. データ表示SQL作成
$sql = 'SELECT * FROM gs_bm_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//3. データ表示
$view = '';
if ($status == false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  //Selectデータの数だけ自動でループしてくれる
  //http://php.net/manual/ja/pdostatement.fetch.php
  $view .= '<ul>';
  while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if ($result['child2'] == "a") { //urlがaのときに実施される
      continue; //以降の処理をスキップする。
    }
    $view .= '<li class="list-group-item">';
    $view .= '<a href="' . $result['url'] . '">';
    $view .= '<p>' . '<a href="' . $result['url'] . '" target="_blank" >' . $result['name'] . '</a>' . '</p>';
    // . '-' . $result['comment'] 
    $view .= '</li>';
  }
  $view .= '</ul>';
}

// 親ファイルを出す
// 重複データを省く
$sql2 = 'SELECT DISTINCT parent FROM gs_bm_table';
$stmt2 = $pdo->prepare($sql2);
$status2 = $stmt2->execute();

$selection = '';
if ($status2 == false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt2->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  //Selectデータの数だけ自動でループしてくれる
  //http://php.net/manual/ja/pdostatement.fetch.php
  $selection .= '<select id="parent" name="select_parent">';
  $i = 0;
  while ($result2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    $selection .= '<option value="' . $result2['parent'] . '">' . $result2['parent']  . '</option>';
  }
  $selection .= '</select>';
}

// 親ごとに表示 殿堂入り①


$sql3 = 'SELECT * FROM gs_bm_table WHERE ((parent ="殿堂入り" AND child1 is null) OR (parent ="殿堂入り" AND child2 = "a"))';
$stmt3 = $pdo->prepare($sql3);
$status3 = $stmt3->execute();
$list1 = "";

if ($status3 == false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt3->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  //Selectデータの数だけ自動でループしてくれる
  //http://php.net/manual/ja/pdostatement.fetch.php
  $list1 .= '<ul id="accordion_menu01" class="sortable draggable">';
  $loop_count = 0;
  while ($result3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
    if ($result3['url'] == "a") { //urlがaのときに実施される
      // $loop_count .= 1;
      $list1 .= '<li class="list-group-item folder  droppable  child_folder"><a data-toggle="collapse" href="#menu01' . $loop_count . '" aria-controls="#menu01" aria-expanded="false">';
      $list1 .= '<i class="far fa-folder-open"></i>' . $result3['child1'];
      $list1 .= '</a></li>';
      // $list1 .= '<div>';

      $sql333 = 'SELECT * FROM gs_bm_table WHERE parent ="殿堂入り" AND child1 ="' . $result3['child1'] . '" ' . 'AND child2 is null';
      $stmt333 = $pdo->prepare($sql333);
      $status333 = $stmt333->execute();
      // $list1 = "";

      if ($status333 == false) {
        //execute（SQL実行時にエラーがある場合）
        $error = $stmt333->errorInfo();
        exit('sqlError:' . $error[2]);
      } else {
        //Selectデータの数だけ自動でループしてくれる
        //http://php.net/manual/ja/pdostatement.fetch.php
        // $list1 .= '<ul id="imoko">';
        $list1 .= '<ul id="menu01' . $loop_count . '" class="collapse sortable1 draggable1"" data-parent="#accordion_menu01">';
        while ($result333 = $stmt333->fetch(PDO::FETCH_ASSOC)) {
          $list1 .= '<li class="list-group-item">';
          // $list1 .= '<a href="' . $result333['url'] . '">';
          $list1 .= '<p><a href="delete.php?id=' . $result333['id'] . '"><i class="far fa-times-circle"></i></a>' . '<a href="' . $result333['url'] . '" target="_blank" >' . '       ' . $result333['name'] . '</a>'  . '</p>';
          $list1 .= '<a href="detail.php?id=' . $result333['id'] . '" class="badge badge-primary">Edit</a>';
          // . '-' . $result3['comment']
          $list1 .= '</li>';
        }
        $list1 .= '</ul>';
      }
      $loop_count .= 1;
      continue; //以降の処理をスキップする。
    }
    $list1 .= '<li class="list-group-item">';
    // $list1 .= '<a href="' . $result3['url'] . '">';
    $list1 .= '<p><a href="delete.php?id=' . $result3['id'] . '"><i class="far fa-times-circle"></i></a>' . '<a href="' . $result3['url'] . '" target="_blank" >' . $result3['name'] . '</a>'  . '</p>';
    $list1 .= '<a href="detail.php?id=' . $result3['id'] . '" class="badge badge-primary">Edit</a>';
    // $list1 .= '<a href="delete.php?id=' . $result3['id'] . '" class="badge badge-danger">Delete</a>';
    // . '-' . $result3['comment']
    $list1 .= '</li>';
  }
  $list1 .= '</ul>';
}


// 親ごとに表示 完結済み②

$sql31 = 'SELECT * FROM gs_bm_table WHERE ((parent ="完結済み" AND child1 is null) OR (parent ="完結済み" AND child2 = "a"))';
$stmt31 = $pdo->prepare($sql31);
$status31 = $stmt31->execute();
$list11 = "";

if ($status31 == false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt31->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  //Selectデータの数だけ自動でループしてくれる
  //http://php.net/manual/ja/pdostatement.fetch.php
  $list11 .= '<ul id="accordion_menu02" class="sortable draggable">';
  $loop_count1 = 0;
  while ($result31 = $stmt31->fetch(PDO::FETCH_ASSOC)) {
    if ($result31['url'] == "a") { //urlがaのときに実施される
      // $loop_count1 .= 1;
      $list11 .= '<li class="list-group-item folder  droppable  child_folder"><a data-toggle="collapse" href="#menu11' . $loop_count1 . '" aria-controls="#menu11" aria-expanded="false">';
      $list11 .= '<i class="far fa-folder-open"></i>' . $result31['child1'];
      $list11 .= '</a></li>';

      $sql444 = 'SELECT * FROM gs_bm_table WHERE parent ="完結済み" AND child1 ="' . $result31['child1'] . '" ' . 'AND child2 is null';
      $stmt444 = $pdo->prepare($sql444);
      $status444 = $stmt444->execute();
      // $list1 = "";

      if ($status444 == false) {
        //execute（SQL実行時にエラーがある場合）
        $error = $stmt444->errorInfo();
        exit('sqlError:' . $error[2]);
      } else {
        //Selectデータの数だけ自動でループしてくれる
        //http://php.net/manual/ja/pdostatement.fetch.php
        // $list11 .= '<ul id="imoko" class="sortable draggable">';
        $list11 .= '<ul id="menu11' . $loop_count1 . '" class="collapse sortable1 draggable1"" data-parent="#accordion_menu02">';
        while ($result444 = $stmt444->fetch(PDO::FETCH_ASSOC)) {
          $list11 .= '<li class="list-group-item">';
          // $list11 .= '<a href="' . $result444['url'] . '">';
          $list11 .= '<p><a href="delete.php?id=' . $result444['id'] . '"><i class="far fa-times-circle"></i></a>' . '<a href="' . $result444['url'] . '" target="_blank" >' . '       ' . $result444['name'] . '</a>'  . '</p>';
          $list11 .= '<a href="detail.php?id=' . $result444['id'] . '" class="badge badge-primary">Edit</a>';
          // $list11 .= '<a href="delete.php?id=' . $result444['id'] . '" class="badge badge-danger">Delete</a>';
          // . '-' . $result3['comment']
          $list11 .= '</li>';
        }
        $list11 .= '</ul>';
      }
      $loop_count1 .= 1;
      continue; //以降の処理をスキップする。
    }
    $list11 .= '<li class="list-group-item">';
    // $list11 .= '<a href="' . $result31['url'] . '">';
    $list11 .= '<p><a href="delete.php?id=' . $result31['id'] . '"><i class="far fa-times-circle"></i></a>' . '<a href="' . $result31['url'] . '" target="_blank" >' . $result31['name'] . '</a>'  . '</p>';
    $list11 .= '<a href="detail.php?id=' . $result31['id'] . '" class="badge badge-primary">Edit</a>';
    // $list11 .= '<a href="delete.php?id=' . $result31['id'] . '" class="badge badge-danger">Delete</a>';
    // . '-' . $result3['comment']
    $list11 .= '</li>';
  }
  $list11 .= '</ul>';
}



// 親ごとに表示 連載中③

$sql32 = 'SELECT * FROM gs_bm_table WHERE ((parent ="連載中" AND child1 is null) OR (parent ="連載中" AND child2 = "a"))';
$stmt32 = $pdo->prepare($sql32);
$status32 = $stmt32->execute();
$list12 = "";

if ($status32 == false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt32->errorInfo();
  exit('sqlError:' . $error[2]);
} else {
  //Selectデータの数だけ自動でループしてくれる
  //http://php.net/manual/ja/pdostatement.fetch.php
  $list12 .= '<ul id="accordion_menu03" class="sortable draggable">';
  $loop_count2 = 0;
  while ($result32 = $stmt32->fetch(PDO::FETCH_ASSOC)) {
    if ($result32['url'] == "a") { //urlがaのときに実施される
      $list12 .= '<li class="list-group-item folder  droppable  child_folder"><a data-toggle="collapse" href="#menu21' . $loop_count2 . '" aria-controls="#menu21" aria-expanded="false">';
      $list12 .=  '<i class="far fa-folder-open"></i>' . $result32['child1'];
      $list12 .= '</a></li>';

      $sql555 = 'SELECT * FROM gs_bm_table WHERE parent ="連載中" AND child1 ="' . $result32['child1'] . '" ' . 'AND child2 is null';
      $stmt555 = $pdo->prepare($sql555);
      $status555 = $stmt555->execute();
      // $list1 = "";

      if ($status555 == false) {
        //execute（SQL実行時にエラーがある場合）
        $error = $stmt555->errorInfo();
        exit('sqlError:' . $error[2]);
      } else {
        //Selectデータの数だけ自動でループしてくれる
        //http://php.net/manual/ja/pdostatement.fetch.php
        $list12 .= '<ul id="menu21' . $loop_count2 . '" class="collapse sortable1 draggable1"" data-parent="#accordion_menu03">';
        while ($result555 = $stmt555->fetch(PDO::FETCH_ASSOC)) {
          $list12 .= '<li class="list-group-item flex_man">';
          // $list12 .= '<a href="' . $result555['url'] . '">';
          $list12 .= '<p><a href="delete.php?id=' . $result555['id'] . '"><i class="far fa-times-circle"></i></a>' . '<a href="' . $result555['url'] . '" target="_blank" >' . '       ' . $result555['name'] . '</a>'  . '</p>';
          $list12 .= '<a href="detail.php?id=' . $result555['id'] . '" class="badge badge-primary">Edit</a>';
          // . '-' . $result3['comment']
          $list12 .= '</li>';
        }
        $list12 .= '</ul>';
      }

      $loop_count2 .= 1;
      continue; //以降の処理をスキップする。
    }
    $list12 .= '<li class="list-group-item">';
    // $list12 .= '<a href="' . $result32['url'] . '">';
    $list12 .= '<p><a href="delete.php?id=' . $result32['id'] . '"><i class="far fa-times-circle"></i></a>' . '<a href="' . $result32['url'] . '" target="_blank" >' . $result32['name'] . '</a>'  . '</p>';
    $list12 .= '<a href="detail.php?id=' . $result32['id'] . '" class="badge badge-primary">Edit</a>';
    // $list12 .= '<a href="delete.php?id=' . $result32['id'] . '" class="badge badge-danger">Delete</a>';
    // . '-' . $result3['comment']
    $list12 .= '</li>';
  }
  $list12 .= '</ul>';
}


?>



<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>お気に入り漫画一覧</title>
  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/main.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
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
      <a class="navbar-brand" href="#">お気に入り漫画一覧</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">データ登録</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <div>
    <ul class="list-group">
      <!-- ここにDBから取得したデータを表示しよう -->
      <!-- <h3>すべて見る</h3>
      <?= $view ?> -->

      <div>
        <form action="insert_child.php" method="post">
          <div class="select_parent">
            <div>フォルダ作成</div>
            <?= $selection ?>
          </div>
          <input type="text" name="child1">
          <button type="submit" class="btn btn-primary">追加</button>
        </form>
      </div>
      <div id="delete_button" class="btn-danger">
        削除モード
      </div>
      <div id="delete_button_back" class="btn-success">
        削除モード解除
      </div>
      <div id="reload">
        <div class="reload">
          <h3>殿堂入り</h3>
          <?= $list1 ?>
        </div>
        <div class="reload">
          <h3>完結済み</h3>
          <?= $list11 ?>
        </div>

        <div class="reload">
          <h3>連載中</h3>
          <?= $list12 ?>
        </div>

      </div>


    </ul>

  </div>
  </div>
  <script>
    $("#delete_button").on("click", function() {
      $(".fa-times-circle").css("display", "inline-block");
      $("#delete_button_back").css("display", "inline-block");
      $("#delete_button").css("display", "none");
    });
    $("#delete_button_back").on("click", function() {
      $(".fa-times-circle").css("display", "none");
      $("#delete_button").css("display", "inline-block");
      $("#delete_button_back").css("display", "none");

    });
  </script>
</body>

</html>