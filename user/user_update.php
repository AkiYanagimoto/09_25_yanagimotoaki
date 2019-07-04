<?php
// var_dump($_POST);
// exit();

include('../functions.php');

if (
    !isset($_POST['name']) || $_POST['name'] == '' || // 空入力の場合
    !isset($_POST['lid']) || $_POST['lid'] == '' || // 空入力の場合
    !isset($_POST['lpw']) || $_POST['lpw'] == '' || // 空入力の場合
    !isset($_POST['kanri_flg']) || $_POST['kanri_flg'] == '' || // 空入力の場合
    !isset($_POST['life_flg']) || $_POST['life_flg'] == '' // 空入力の場合
) {
    exit('ParamError');
}

$id = $_POST['id'];
$name = $_POST['name']; // 適当な変数に代入
$lid = $_POST['lid']; // 適当な変数に代入
$lpw = $_POST['lpw']; // 適当な変数に代入
$kanri_flg = $_POST['kanri_flg']; // 適当な変数に代入
$life_flg = $_POST['life_flg']; // 適当な変数に代入

// var_dump($id);
// var_dump($life_flg);
// exit();

$pdo = db_conn();

$sql = 'UPDATE php03_user_table SET name=:a1, lid=:a2, lpw=:a3, kanri_flg=:a4, life_flg=:a5 WHERE id=:id';
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':a1', $name, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $lid, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a5', $life_flg, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute();

if ($status == false) {
    errorMsg($stmt);
} else {
    header('Location: user_select.php');
    exit();
}
