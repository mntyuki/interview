<!DOCTYPE html>
<html lang='ja'>

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

        try {
            $pdo = new PDO($dsn, $user, $password);

            $sql = 'CREATE TABLE IF NOT EXISTS users (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(60) NOT NULL,
            furigana VARCHAR(60) NOT NULL,
            email VARCHAR(255) NOT NULL,
            age INT(11),
            address VARCHAR(255)
            )';

            $pdo->query($sql); //SQL実行コード
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        ?>
    </p>
</body>

</html>