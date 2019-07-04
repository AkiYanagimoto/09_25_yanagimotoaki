<?php
// var_dump($_POST);
// exit();

//functions.phpの呼び出し
include('functions.php');

// 入力チェック
if (
    !isset($_POST['category']) || $_POST['category'] == '' || // 空入力の場合
    !isset($_POST['hashtag']) || $_POST['hashtag'] == '' || // 空入力の場合
    !isset($_POST['rating']) || $_POST['rating'] == '' || // 空入力の場合
    !isset($_POST['ocrtext']) || $_POST['ocrtext'] == '' // 空入力の場合
) {
    exit('ParamError');
}

//POSTデータ取得
$category = $_POST['category']; // 適当な変数に代入
$hashtag = $_POST['hashtag']; // 適当な変数に代入
$rating = $_POST['rating']; // 適当な変数に代入
$ocrtext = $_POST['ocrtext']; // 適当な変数に代入

//DB接続
$pdo = db_conn();

//データ登録SQL作成
$sql = 'INSERT INTO php02_table(id, category, hashtag, rating, ocrtext, indate)VALUES(NULL, :a1, :a2, :a3, :a4, sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $category, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $hashtag, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $rating, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $ocrtext, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    //５．index.phpへリダイレクト
    header('Location: select.php');
}
