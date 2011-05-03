<?php

if (isset($_POST['submit'])) {
    if (isset($_POST['nickname'], $_POST['password'], $_POST['password_rep'],
                    $_POST['name'], $_POST['age'], $_POST['hair_color'], $_POST['bra_size'], $_POST['weight'], $_POST['height'])
            && !empty($_POST['nickname']) && !empty($_POST['password'])
            && !empty($_POST['password_rep']) && !empty($_POST['name'])
            && !empty($_POST['age']) && !empty($_POST['hair_color'])
            && !empty($_POST['bra_size']) && !empty($_POST['weight']) && !empty($_POST['height'])) {

        $submit = $_POST['submit'];
        $nickname = strtolower(strip_tags($_POST['nickname']));
        $password = strip_tags($_POST['password']);
        $password_rep = strip_tags($_POST['password_rep']);
        $name = strip_tags($_POST['name']);
        $age = strip_tags($_POST['age']);
        $hair_color = $_POST['hair_color'];
        $eyes_color = $_POST['eyes_color'];
        $bra_size = strip_tags($_POST['bra_size']);
        $weight = strip_tags($_POST['weight']);
        $height = strip_tags($_POST['height']);
        //db open
        $connect = mysql_connect("localhost", "root", "")
                or die("Error connecting with the server!");
        mysql_select_db("faces") or die("Database not found!");

        //user availability check
        $nnamecheck = mysql_query("
                SELECT nickname
                FROM wprofil
                WHERE nickname='$nickname'
                UNION
                SELECT nickname
                FROM mprofil
                WHERE nickname='$nickname'
                ");
        $count = mysql_num_rows($nnamecheck);

        if ($count != 0) {
            header("Location: women.php?werr=1");
        }

        if ($password == $password_rep) {
            if (is_numeric($age) != TRUE || is_numeric($weight) != TRUE || is_numeric($height) != TRUE) {
                header("Location: women.php?werr=2");
            } else if (strlen($nickname) > 30 || strlen($name) > 50 || strlen($hair_color) > 20 || strlen($bra_size) > 5) {
                header("Location: women.php?werr=3");
            } else {
                if (strlen($password) > 30 || strlen($password) < 6) {
                    header("Location: women.php?werr=4");
                } else {


                    $password = md5($password);
                    $password_rep = md5($password_rep);

                    mysql_query('set names utf8', $connect);

                    $queryreg = mysql_query("
                        INSERT INTO wprofil (nickname, password, name, age, eyes_color, hair_color, bra_size, weight, height)
                        VALUES ('$nickname' , '$password', '$name', '$age', '$eyes_color', '$hair_color', '$bra_size', '$weight', '$height' );  
                        ");
                    header("Location: index.php?succ=1");
                }
            }
        } else {
            header("Location: women.php?werr=5");
        }
    } else {
        header("Location: women.php?werr=6");
    }
}
?>

