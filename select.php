<?php
//1. DB接続 //insertの場合と全く同じ
session_start();
include('functions.php');
chk_ssid();

if ($_SESSION['kanri_flg'] == 1) {
    $menu = '<a class="nav-item nav-link" href="user/user_index.php">ユーザー登録</a><a class="nav-item nav-link" href="user/user_select.php">ユーザー管理</a>';
}

$pdo = db_conn();

//2. データ表示SQL作成
$sql = 'SELECT*FROM php02_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//3. データ表示
$view = ''; // 変数を定義し、タグ内に受け取ったデータを入れる
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('sqlError:' . $error[2]);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<li class="list-group-item">';
        $view .= '<p>' . "CATEGORY :" . "  " . $result['category'] . '</p>';
        if ($result['rating'] == 5) {
            $view .= '<p>' . "★RATING :" . "  " . '★★★★★' . '</p>';
        } elseif ($result['rating'] == 4) {
            $view .= '<p>' . "★RATING :" . "  " . '★★★★' . '</p>';
        } elseif ($result['rating'] == 3) {
            $view .= '<p>' . "★RATING :" . "  " . '★★★' . '</p>';
        } elseif ($result['rating'] == 2) {
            $view .= '<p>' . "★RATING :" . "  " . '★★' . '</p>';
        } else {
            $view .= '<p>' . "★RATING :" . "  " . '★' . '</p>';
        };
        $view .= '<p>' . "OCR TEXT :" . "  " . $result['ocrtext'] . '</p>';
        $view .= '<p>' . "#HASHTAG :" . "  " . $result['hashtag'] . '</p>';
        $view .= '<a href="detail.php?id=' . $result[id] . '" class="badge badge-primary">Edit</a>';
        $view .= '<a href="delete.php?id=' . $result[id] . '" class="badge badge-danger">Delete</a>';
        $view .= '</li>';
    }
};

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Text Memo APP</title>
    <!-- Bootstrap Stylesheet -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Responsive meta tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Customized Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <!-- Google fontes -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
            font-family: 'Noto Sans JP', sans-serif;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">MEMO APP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="select.php">Memo list</a>
                    <?= $menu ?>
                    <a class="nav-item nav-link" href="logout.php">ログアウト</a>
                </div>
            </div>
        </nav>

        <div>
            <ul class="list-group">
                <!-- ここにDBから取得したデータを表示しよう -->
                <?= $view ?>
            </ul>
        </div>

    </div>

</body>

<!-- Footer -->
<footer class="page-footer font-small blue ">
    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2018 Copyright:
        <a href=""> Gs Academy Fukuoka DEV3 No.25</a>
    </div>
</footer>


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!-- Bootstrap core JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>