<?php

session_start();

$nickname = strtolower($_POST['nickname']);
$password = $_POST['password'];

if ($nickname && $password) {

    $connect = mysql_connect("localhost", "root", "")
            or die("Error connecting with the server!");
    mysql_select_db("faces")
            or die("Database not found!");

    $query = mysql_query("
             SELECT nickname, password
             FROM mprofil
             WHERE nickname='$nickname'
            UNION
             SELECT nickname, password
             FROM wprofil
             WHERE nickname='$nickname'
                          ");

    $numrows = mysql_num_rows($query);
    $_SESSION['numrows'] = $numrows;
    if ($numrows != 0) {

        while ($row = mysql_fetch_assoc($query)) {
            $dbnickname = $row['nickname'];
            $dbpassword = $row['password'];
        }

        if ($nickname == $dbnickname && md5($password) == $dbpassword) {
            $_SESSION['nickname'] = $dbnickname;
            header("Location: user_profile.php");
        } else {
            header("Location: index.php?error=1");
        }
    } else {
        header("Location: index.php?error=2");
    }
} else {
    header("Location: index.php?error=3");
}
?>

