<!DOCTYPE html>

<html>
<head>

    <link rel="stylesheet" href="/resources/css/admin/stylelogin.css">


</head>
<body>
<form method="post" class="login">
    <input type="text" name="username" class="username">
    <input type="password" name="password" class="password">

    <input type="submit">
</form>
</body>
</html>

<?php
$password = $_POST["password"];
$username = $_POST["username"];


try{
    $db  = new PDO("mysql:host=localhost;dbname=school", "root", "");
    $passworddb = $db->prepare("SELECT * FROM adminpanel");
    $passworddb->execute();

    $result = $passworddb->fetchAll();
    foreach($result as $data) {
        if ($password === $data["Password"] and $username === $data["User_name"]) {
            header("location: aanvragen.php");



        }
    }
}catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}





?>
