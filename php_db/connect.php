<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>PHP+DB</title>
</head>

<body>
    <p>
        <?php
        $dsn = 'mysql:dbname=php_db;host=localhost;charset=utf8mb4';
        $user = 'root';
        $password = '';

        try{
            $pdo = new PDO($dsn, $user, $password);
            echo 'データベースの接続に成功しました。';
        } catch (PDOException $e) {
            exit('データベースの接続に失敗しました。'. $e->getMessage());
        }
        ?>
    </p>
</body>