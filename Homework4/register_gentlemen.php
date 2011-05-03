    
<?php

if (isset($_POST['submit'])) {
    if (isset($_POST['nickname'], $_POST['password'], $_POST['password_rep'],
                    $_POST['name'], $_POST['age'], $_POST['salary'], $_POST['height'])
            && !empty($_POST['nickname']) && !empty($_POST['password']) && !empty($_POST['password_rep'])
            && !empty($_POST['name']) && !empty($_POST['age'])
            && !empty($_POST['salary']) && !empty($_POST['height'])) {

        $submit = $_POST['submit'];
        $nickname = strtolower(strip_tags($_POST['nickname']));
        $password = strip_tags($_POST['password']);
        $password_rep = strip_tags($_POST['password_rep']);
        $name = strip_tags($_POST['name']);
        $age = strip_tags($_POST['age']);
        $salary = strip_tags($_POST['salary']);
        $height = strip_tags($_POST['height']);

        if (isset($_POST['properties']) && !empty($_POST['properties'])) {
            $properties = serialize($_POST['properties']);
        } else {
            $properties = "";
        }

        //db open
        $connect = mysql_connect("localhost", "root", "")
                or die("Error connecting with the server!");
        mysql_select_db("faces") or die("Database not found!");

        //user availability check
        $nnamecheck = mysql_query("
                SELECT nickname
                FROM mprofil
                WHERE nickname='$nickname'
                UNION
                SELECT nickname
                FROM wprofil
                WHERE nickname='$nickname'
                ");

        $count = mysql_num_rows($nnamecheck);

        if ($count != 0) {

            header("Location: men.php?menerr=1");
        }

        if ($password == $password_rep) {
            if (is_numeric($height) != TRUE || is_numeric($salary) != TRUE || is_numeric($age)!=TRUE) {

                header("Location: men.php?menerr=2");
                
            } else if (strlen($nickname) > 30 || strlen($name) > 50) {

                header("Location: men.php?menerr=3");
            } else if (strlen($password) > 30 || strlen($password) < 6) {

                header("Location: men.php?menerr=4");
            } else {

                //password encrypting
                $password = md5($password);
                $password_rep = md5($password_rep);


                mysql_query('set names utf8', $connect);
                $queryreg = mysql_query("
					INSERT INTO mprofil(nickname, password, name, age, salary, properties, height)
					VALUES ('$nickname', '$password', '$name', '$age', '$salary', '$properties', '$height');  
					");

                header("Location: index.php?succ=1");
            }
        } else {
            header("Location: men.php?menerr=5");
        }
    } else {
        header("Location: men.php?menerr=6");
    }
}
?>