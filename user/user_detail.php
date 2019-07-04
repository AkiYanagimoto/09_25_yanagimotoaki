<?php
// var_dump($_GET);
// exit();
session_start();
include('../functions.php');
chk_ssid();

$id = $_GET['id'];

$pdo = db_conn();

$sql = 'SELECT*FROM php03_user_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    errorMsg($stmt);
} else {
    $rs = $stmt->fetch();

    // var_dump($rs);
    // exit();
}
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
    <link rel="stylesheet" href="../style.css">
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
                    <a class="nav-item nav-link active" href="user_index.php">ユーザー登録<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="user_select.php">メモ一覧</a>

                </div>
            </div>
        </nav>

        <form action="user_update.php" method="POST">
            <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" class="form-control form-control-lg" id="name" name="name" value="<?= $rs['name'] ?>">
            </div>
            <div class="form-group">
                <label for="lid">Login ID</label>
                <input type="text" class="form-control form-control-lg" id="lid" name="lid" value="<?= $rs['lid'] ?>">
            </div>
            <div class="form-group">
                <label for="lpw">Login Password</label>
                <input type="text" class="form-control form-control-lg" id="lpw" name="lpw" value="<?= $rs['lpw'] ?>">
            </div>
            <div class="form-group form-inline">
                <label for=" kanri_flg">Administrator</label>
                <input type="radio" class="form-control form-control-lg" id="kanri_flg" name="kanri_flg" value=0>YES
                <input type="radio" class="form-control form-control-lg" id="kanri_flg" name="kanri_flg" value=1>NO

            </div>
            <div class="form-group form-inline">
                <label for="life_flg">Active User</label>
                <input type="radio" class="form-control form-control-lg" id="life_flg" name="life_flg" value=0>YES
                <input type="radio" class="form-control form-control-lg" id="life_flg" name="life_flg" value=1>NO
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <input type="hidden" name="id" value="<?= $rs['id'] ?>">
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
        $(function() {
            var admin = < ? = $rs['kanri_flg'] ? > ;
            if (admin == '0') {
                $('input[name=kanri_flg]:eq(0)').prop('checked', true);
            } else {
                $('input[name=kanri_flg]:eq(1)').prop('checked', true);
            }
        });

        $(function() {
            var active = < ? = $rs['life_flg'] ? > ;
            if (active == '0') {
                $('input[name=life_flg]:eq(0)').prop('checked', true);
            } else {
                $('input[name=life_flg]:eq(0)').prop('checked', true);
            }
        });
    </script>


</body>

<!-- Footer部の読み込み -->
<?php include(dirname[__FILE__] . '/inc/footer.php'); ?>


<!-- Bootstrap core JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>