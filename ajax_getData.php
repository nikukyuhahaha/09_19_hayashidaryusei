<?php

// class create_child
// {
// var_dump($_POST);
// $move_info = $_POST['move_info'];
// $get_info = $_POST['get_info'];

$move_info = $_POST['move_info']; // 一郎
$get_info = $_POST['get_info']; // 鈴木 
$result = 'こんにちは、' . $get_info . $move_info . 'さん';
echo $result;

$dbn = 'mysql:dbname=gsacfd04_19;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  exit('dbError:' . $e->getMessage());
}

// sql作成
$sql = 'UPDATE gs_bm_table SET child1="' . $get_info . '" WHERE name = "' . $move_info . '"';
$stmt_fromjs = $pdo->prepare($sql);
$status_fromjs = $stmt_fromjs->execute();

if ($status == false) {
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  exit('sqlError:' . $error[2]);
} else {
  //５．index.phpへリダイレクト
  header('Location: select.php');
}

    // // 親、子ごとに表示
    // $sql4 = 'SELECT * FROM gs_bm_table WHERE parent ="殿堂入り" AND child1 ="実物買いたい" AND child2=null';
    // $stmt4 = $pdo->prepare($sql4);
    // $status4 = $stmt4->execute();
    // $list2 = "";

    // if ($status4 == false) {
    //   //execute（SQL実行時にエラーがある場合）
    //   $error = $stmt4->errorInfo();
    //   exit('sqlError:' . $error[2]);
    // } else {
    //   //Selectデータの数だけ自動でループしてくれる
    //   //http://php.net/manual/ja/pdostatement.fetch.php
    //   $list2 .= '<ul id="imo" class="sortable draggable">';
    //   while ($result4 = $stmt4->fetch(PDO::FETCH_ASSOC)) {
    //     // if ($result4['url'] == "a") { //urlがaのときに実施される
    //     //   $list2 .= '<li class="list-group-item folder  droppable">';
    //     //   $list2 .=  $result4['child1'];
    //     //   $list2 .= '</li>';
    //     //   continue; //以降の処理をスキップする。
    //     // }
    //     $list2 .= '<li class="list-group-item">';
    //     $list2 .= '<a href="' . $result4['url'] . '">';
    //     $list2 .= '<p>' . '<a href="' . $result4['url'] . '" target="_blank" >' . $result4['name'] . '</a>' . '-' . $result4['comment'] . '</p>';
    //     $list2 .= '</li>';
    //   }
    //   $list2 .= '</ul>';
    // }
  
// }
