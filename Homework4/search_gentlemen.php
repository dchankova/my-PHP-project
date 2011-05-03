<?php
session_start();
$title = $_SESSION['nickname'] . " is logged";
$rows = 0;
if (isset($_GET['submit'])) {
    if (isset($_GET['age_from'], $_GET['age_to'], $_GET['salary']) &&
            !empty($_GET['age_from']) && !empty($_GET['age_to']) &&
            !empty($_GET['salary'])) {

        $submit = $_GET['submit'];
        $age_from = $_GET['age_from'];
        $age_to = $_GET['age_to'];
        $salary = $_GET['salary'];

        if (isset($_GET['properties']) && !empty($_GET['properties'])) {
            $properties = serialize($_GET['properties']);
        } else {
            $properties = "NULL";
        }

        //db open
        $connect = mysql_connect("localhost", "root", "")
                or die("Error connecting with the server!");
        mysql_select_db("faces")
                or die("Database not found!");

        if (is_numeric($age_from) != TRUE || is_numeric($age_to) != TRUE || is_numeric($salary) != TRUE) {

            echo "Грешно въведени данни!Опитай пак!";
        } else {

            mysql_query('set names utf8', $connect);

            $querysearch = mysql_query("
                    SELECT nickname, name, age, height, salary, properties
                    FROM mprofil
                    WHERE salary>='$salary'
                    AND properties='$properties' 
					AND age BETWEEN '$age_from' AND '$age_to'
            ");

            if (isset($querysearch) && !empty($querysearch)) {
                $rows = mysql_num_rows($querysearch);
            } else {
                $rows = 0;
            }
        }
    } else {

        echo "Попълни всички полета!";
    }
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
        <meta name="author" content="Diana" />
        <meta name="keywords" content="face" />
        <meta name="description" content="A university project." />
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>FACES</title>
    </head>
    <body>
        <div id="container">

            <div id="content">

                <?php
                if ($rows == 0) {
                    echo '<h2>Няма намерени потребители!</h2>';
                } else if ($rows == 1) {
                    echo'<h2>Един намерен потребител</h2>';
                } else {
                    echo'<h2>' . "$rows " . 'намерени</h2>';
                }
                if ($rows > 0) {
                    echo
                    "<table align='center' cellspacing='0' border='1'>
                <tr>
                    <th>Псевдоним</th><th>Име</th>
                    <th>Години</th><th>Заплата</th>
					<th>Имущество</th><th>Височина</th>
                    
                <tr>";
                    while ($row = mysql_fetch_assoc($querysearch)) {
                        $nickname1 = $row['nickname'];
                        $name1 = $row['name'];
                        $age1 = $row['age'];
                        $height1 = $row['height'];
                        $salary1 = $row['salary'];
                        $properties2 = "Нищо!";
                        $properties1 = $row['properties'];
                        if ($properties1 != "NULL") {
                            $properties2 = "";
                            $properties1 = unserialize($properties1);
                            foreach ($properties1 as $v) {
                                $properties2.= " $v";
                            }
                        }


                        echo '<tr>'.'<td>'.$nickname1.'</td>'.'<td>'.$name1.'</td>' .
                        '<td>'.$age1.'</td>'.
                        '<td>'.$height1.'</td>'.'<td>'.$salary1.'</td>' .
                        '<td>'.$properties2.'</td>'.'</tr>';
                    }
                }

                echo "</table>";
                ?>
            </div>
            
                <a href="user_profile.php">НАЗАД</a>
            
        </div>
    </body>    
</html>
