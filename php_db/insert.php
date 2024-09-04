<?php
$dsn = 'mysql:dbname=php_db;host=localhost;charset=utf8mb4';
$user = 'root';
$password = '';

if (isset($_POST['submit'])) {
    try {
        $pdo = new PDO($dsn, $user, $password);

        $sql ='
            INSERT INTO users (name, furigana, email, age, address)
            VALUES (:name, :furigana, :email, :age, :address)';

        $stmt = $pdo->prepare($sql);    

        $stmt->bindvalue(':name', $_POST['user_name'], PDO::PARAM_STR);
        $stmt->bindvalue(':furigana', $_POST['user_furigana'], PDO::PARAM_STR);
        $stmt->bindvalue(':email', $_POST['user_email'], PDO::PARAM_STR);
        $stmt->bindvalue(':age', $_POST['user_age'], PDO::PARAM_INT);
        $stmt->bindvalue(':address', $_POST['user_address'], PDO::PARAM_STR);

        $stmt->execute();

        header('Location: select.php');
    } catch (PDOExeption $e) {
        exit($e->getmessage());
    }


}

?>


<!DOCTYPE html>
 <html lang="ja">
 
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>PHP+DB</title>
     <link rel="stylesheet" href="css/style.css">
 </head>
 
 <body>
     <h1>ユーザー登録</h1>
     <p>ユーザー情報を入力してください。</p>
     <form action="insert.php" method="post">
         <div>
             <label for="user_name">お名前<span>【必須】</span></label>
             <input type="text" id="user_name" name="user_name" maxlength="60" required>
 
             <label for="user_furigana">ふりがな<span>【必須】</span></label>
             <input type="text" id="user_furigana" name="user_furigana" maxlength="60" required>
 
             <label for="user_email">メールアドレス<span>【必須】</span></label>
             <input type="email" id="user_email" name="user_email" maxlength="255" required>
 
             <label for="user_age">年齢</label>
             <input type="number" id="user_age" name="user_age" min="13" max="130">
 
             <label for="user_address">住所</label>
             <input type="text" id="user_address" name="user_address" maxlength="255">
         </div>
         <button type="submit" name="submit" value="insert">登録</button>
     </form>
 </body>
 
 </html>