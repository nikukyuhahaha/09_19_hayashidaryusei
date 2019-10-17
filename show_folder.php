<?php

header("Location: " . $_SERVER['PHP_SELF']);
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
  $list1 .= '<ul id="imo" class="sortable draggable">';
  while ($result3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
    if ($result3['url'] == "a") { //urlがaのときに実施される
      $list1 .= '<li class="list-group-item folder  droppable  child_folder">';
      $list1 .= '<i class="far fa-folder-open"></i>' . $result3['child1'];
      $list1 .= '</li>';
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
        $list1 .= '<ul id="imoko" class="sortable draggable">';
        while ($result333 = $stmt333->fetch(PDO::FETCH_ASSOC)) {
          $list1 .= '<li class="list-group-item">';
          $list1 .= '<a href="' . $result333['url'] . '">';
          $list1 .= '<p>' . '<a href="' . $result333['url'] . '" target="_blank" >' . '       ' . $result333['name'] . '</a>'  . '</p>';
          // . '-' . $result3['comment']
          $list1 .= '</li>';
        }
        $list1 .= '</ul>';
      }

      continue; //以降の処理をスキップする。
    }
    $list1 .= '<li class="list-group-item">';
    $list1 .= '<a href="' . $result3['url'] . '">';
    $list1 .= '<p>' . '<a href="' . $result3['url'] . '" target="_blank" >' . $result3['name'] . '</a>'  . '</p>';
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
  $list11 .= '<ul id="imo" class="sortable draggable">';
  while ($result31 = $stmt31->fetch(PDO::FETCH_ASSOC)) {
    if ($result31['url'] == "a") { //urlがaのときに実施される
      $list11 .= '<li class="list-group-item folder  droppable  child_folder">';
      $list11 .=   '<i class="far fa-folder-open"></i>' . $result31['child1'];
      $list11 .= '</li>';

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
        $list11 .= '<ul id="imoko" class="sortable draggable">';
        while ($result444 = $stmt444->fetch(PDO::FETCH_ASSOC)) {
          $list11 .= '<li class="list-group-item">';
          $list11 .= '<a href="' . $result444['url'] . '">';
          $list11 .= '<p>' . '<a href="' . $result444['url'] . '" target="_blank" >' . '       ' . $result444['name'] . '</a>'  . '</p>';
          // . '-' . $result3['comment']
          $list11 .= '</li>';
        }
        $list11 .= '</ul>';
      }

      continue; //以降の処理をスキップする。
    }
    $list11 .= '<li class="list-group-item">';
    $list11 .= '<a href="' . $result31['url'] . '">';
    $list11 .= '<p>' . '<a href="' . $result31['url'] . '" target="_blank" >' . $result31['name'] . '</a>'  . '</p>';
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
  $list12 .= '<ul id="imo" class="sortable draggable">';
  while ($result32 = $stmt32->fetch(PDO::FETCH_ASSOC)) {
    if ($result32['url'] == "a") { //urlがaのときに実施される
      $list12 .= '<li class="list-group-item folder  droppable child_folder" data-parent="#collapse-accordion">';
      $list12 .=  '<i class="far fa-folder-open"></i>' . $result32['child1'];
      $list12 .= '</li>';

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
        $list12 .= '<ul id="imoko" class="sortable draggable">';
        while ($result555 = $stmt555->fetch(PDO::FETCH_ASSOC)) {
          $list12 .= '<li class="list-group-item">';
          $list12 .= '<a href="' . $result555['url'] . '">';
          $list12 .= '<p>' . '<a href="' . $result555['url'] . '" target="_blank" >' . '       ' . $result555['name'] . '</a>'  . '</p>';
          // . '-' . $result3['comment']
          $list12 .= '</li>';
        }
        $list12 .= '</ul>';
      }


      continue; //以降の処理をスキップする。
    }
    $list12 .= '<li class="list-group-item">';
    $list12 .= '<a href="' . $result32['url'] . '">';
    $list12 .= '<p>' . '<a href="' . $result32['url'] . '" target="_blank" >' . $result32['name'] . '</a>'  . '</p>';
    // . '-' . $result3['comment']
    $list12 .= '</li>';
  }
  $list12 .= '</ul>';
}


// // ボツ → 親、子ごとに表示
// $sql4 = 'SELECT * FROM gs_bm_table WHERE parent ="殿堂入り" AND child1 ="実物買いたい" AND child2 is null';
// $stmt4 = $pdo->prepare($sql4);
// $status4 = $stmt4->execute();
// $list4 = "";

// if ($status4 == false) {
//   //execute（SQL実行時にエラーがある場合）
//   $error = $stmt4->errorInfo();
//   exit('sqlError:' . $error[2]);
// } else {
//   //Selectデータの数だけ自動でループしてくれる
//   //http://php.net/manual/ja/pdostatement.fetch.php
//   $list4 .= '<ul id="imo" class="sortable draggable">';
//   while ($result4 = $stmt4->fetch(PDO::FETCH_ASSOC)) {
//     // if ($result4['url'] == "a") { //urlがaのときに実施される
//     //   $list2 .= '<li class="list-group-item folder  droppable">';
//     //   $list2 .=  $result4['child1'];
//     //   $list2 .= '</li>';
//     //   continue; //以降の処理をスキップする。
//     // }
//     $list4 .= '<li class="list-group-item">';
//     $list4 .= '<a href="' . $result4['url'] . '">';
//     $list4 .= '<p>' . '<a href="' . $result4['url'] . '" target="_blank" >' . $result4['name'] . '</a>' . '-' . $result4['comment'] . '</p>';
//     $list4 .= '</li>';
//   }
//   $list4 .= '</ul>';
// }

// // require('child_folder_open.php');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>todoリスト表示</title>
  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script src="js/main.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <style>
    div {
      padding: 10px;
      font-size: 16px;
    }
  </style>
</head>

<body>

  <div id="reload">

    <div class="reload">
      <h3>殿堂入り（indexで登録したものを「実物買いたい」フォルダにドラッグ＆ドロップしてみてください。）</h3>
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

    </ul>
  </div>

</body>

</html>