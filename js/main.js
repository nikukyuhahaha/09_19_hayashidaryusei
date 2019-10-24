
$(function () {

  $(".sortable").sortable({
    revert: true
  });
  $(".draggable").draggable({
    connectToSortable: '.sortable',
    // helper: 'clone',
    revert: 'invalid',
  });

  $(".droppable").droppable({
    tolerance: "intersect",
    drop: function (event, ui) {

      var postData = { "move_info": ui.draggable.text().replace('Edit', ''), "get_info": $(this).text() };
      $.post(
        "ajax_getData.php",
        postData,
        // エラーチェックで結構使えるこいつ
        // function (data) {
        //   alert(data); //結果をアラートで表示
        // }
      );
      console.log(ui.draggable.text().replace('Edit', ''));
      console.log($(this).text());

      // ui.draggable.fadeOut(1000);
      window.location.reload();

      // $.ajax({
      //   type: 'GET',
      //   url: '../show_folder.php',
      //   data: {
      //     contentss: $("#reload").html()
      //   },
      //   success: function (data) {
      //     $('#reload').html(data);
      //   },
      //   error: function (data) {
      //     alert('error');
      //   }

      // });

      // $.ajax('ajax_getData.php',
      //   {
      //     type: 'post',
      //     data: {
      //       "move_info": ui.draggable.text(),
      //       "get_info": $(this).text()
      //     },
      //     dataType: 'json'
      //   }
      // )
      //   // 検索成功時にはページに結果を反映
      //   .done(function (data) {
      //     alert("成功");
      //     // 結果リストをクリア
      //     // $('#result').empty();
      //     // // <Question>要素（個々の質問情報）を順番に処理
      //     // $('Question', data).each(function () {
      //     //   // <Url>（詳細ページ）、<Content>（質問本文）を基にリンクリストを生成
      //     //   $('#result').append(
      //     //     $('<li></li>').append(
      //     //       $('<a></a>')
      //     //         .attr({
      //     //           href: $('Url', this).text(),
      //     //           target: '_blank'
      //     //         })
      //     //         .text($('Content', this).text().substring(0, 255) + '...')
      //     //     )
      //     //   );
      //     // });
      //   })
      //データを取得した後の処理を書く
    }
  }
  );

  // 古い書き方？
  // $.ajax({
  //   type: "post",
  //   url: "select.php",
  //   data: datas,
  //   //Ajax通信が成功した場合
  //   success: function (data, dataType) {
  //     //PHPから返ってきたデータの表示
  //     alert();

  //     //送信完了後フォームの内容をリセット
  //     if (data == "送信が完了しました") {
  //       document.forms[0].elements[0].value = "";
  //       document.forms[0].elements[1].value = "";
  //       document.forms[0].elements[2].value = "";
  //     }
  //   },
  //   //Ajax通信が失敗した場合のメッセージ
  //   error: function () {
  //     alert('メールの送信が失敗しました。');
  //   }
  // });
  // return false;
  // $(".child_folder").on("click", function () {
  //   var click_child_folder_name = $(this).text();
  //   console.log(click_child_folder_name);
  //   // return click_child_folder_name;
  //   var postData2 = { "click_child_folder_name": click_child_folder_name };
  //   $.post(
  //     "child_folder_open.php",
  //     postData2,
  //     // エラーチェックで結構使えるこいつ
  //     // function (data) {
  //     //   alert(data); //結果をアラートで表示
  //     // }
  //   );
  //   //JQuery使って属性を取得する、JSON.parseで扱える形に変換

  // });

  // var $script = $('#script');
  // var results = JSON.parse($script.attr('data-param'));
  // //確認
  // console.log($script);
  // console.log(results);
  // // console.log(click_child_folder_name);

  // var $script = $('#script');
  // var result = JSON.parse($script.attr('data-param'));
  // //確認
  // console.log(result);
}
);

// $(function () {
//   $(".sortable1").sortable({
//     revert: true
//   });
//   $(".draggable1").draggable({
//     connectToSortable: '.sortable1',
//     // helper: 'clone',
//     revert: 'invalid',
//   });


//   $(".droppable1").droppable({
//     tolerance: "intersect",
//     drop: function (event, ui) {

//       var postData = { "move_info": ui.draggable.text(), "get_info": $(this).text() };
//       $.post(
//         "ajax_getData.php",
//         postData,
//         // エラーチェックで結構使えるこいつ
//         // function (data) {
//         //   alert(data); //結果をアラートで表示
//         // }
//       );
//       console.log(ui.draggable.text());
//       console.log($(this).text());

//       // ui.draggable.fadeOut(1000);
//       // window.location.reload();
//     }
//   }
//   );
// }
// );




