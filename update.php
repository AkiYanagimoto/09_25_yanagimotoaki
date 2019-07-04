<?php
// var_dump($_POST);
// exit();

include('functions.php');

if (
    !isset($_POST['category']) || $_POST['category'] == '' || // 空入力の場合
    !isset($_POST['hashtag']) || $_POST['hashtag'] == '' || // 空入力の場合
    !isset($_POST['rating']) || $_POST['rating'] == '' || // 空入力の場合
    !isset($_POST['ocrtext']) || $_POST['ocrtext'] == '' // 空入力の場合
) {
    exit('ParamError');
}

$id = $_POST['id'];
$category = $_POST['category']; // 適当な変数に代入
$hashtag = $_POST['hashtag']; // 適当な変数に代入
$rating = $_POST['rating']; // 適当な変数に代入
$ocrtext = $_POST['ocrtext']; // 適当な変数に代入
// var_dump($ocrtext);
// exit();
$pdo = db_conn();

$sql = 'UPDATE php02_table SET category=:a1, hashtag=:a2, rating=:a3, ocrtext=:a4 WHERE id=:id';
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':a1', $category, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $hashtag, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $rating, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $ocrtext, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute();

if ($status == false) {
    errorMsg($stmt);
} else {
    header('Location: select.php');
    exit();
}
