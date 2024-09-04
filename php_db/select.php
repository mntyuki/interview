<?php
        $dsn = 'mysql:dbname=php_db;host=localhost;charset=utf8mb4';
        $user = 'root';
        $password = '';

        try {
            $pdo = new PDO($dsn,$user,$password);

            $sql = 'SELECT id,name FROM users';
            
            $stmt = $pdo->query($sql);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        ?>

<!DOCTYPE html>
<html lang='ja'>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP+DB</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>氏名</th>
        </tr>
        <?php

        foreach($results as $result) {
            echo "<tr><td>{$result['id']}</td><td>{$result['name']}</td></tr>";
        }
        ?>
    </table>
</body>

</html>