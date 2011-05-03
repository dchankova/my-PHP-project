<?php
session_start();
$title = $_SESSION['nickname'] . " in logged";
$rows = 0;
if (isset($_GET['submit'])) {
    if (isset($_GET['height_from'], $_GET['height_to'], $_GET['age'], $_GET['bra_size']) &&
            !empty($_GET['height_from']) && !empty($_GET['height_to']) &&
            !empty($_GET['age']) && !empty($_GET['bra_size'])) {

        $submit = $_GET['submit'];
        $height_from = $_GET['height_from'];
        $height_to = $_GET['height_to'];
        $bra_size = $_GET['bra_size'];
        $age = $_GET['age'];


        //db open
        $connect = mysql_connect("localhost", "root", "")
                or die("Error connecting with the server!");
        mysql_select_db("faces")
                or die("Database not found!");

        if (is_numeric($height_from) != TRUE || is_numeric($height_to) != TRUE
                || is_numeric($age) != TRUE || is_numeric($bra_size) != TRUE) {
            echo "Грешно въведени данни!Опитай пак!";
        } else {

            mysql_query('set names utf8', $connect);

            $querysearch = mysql_query("
                    SELECT nickname, name, height, age, eyes_color, hair_color, bra_size, weight, height
                    FROM wprofil
                    WHERE bra_size>='$bra_size'
                    AND age<='$age'
                    AND height BETWEEN '$height_from' AND '$height_to'
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
        <meta name="keywords" content="facе" />
        <meta name="description" content="A university project." />
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>FACES</title>
    </head>
    <body>
        <div id="container">

            <div id="content">
                <div>
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
                    <th>Потребителиско име: </th>
                    <th>Име:</th>
                    <th>Височина:</th>
                    <th>Тегло:</th>
                    <th>Цвят на косата:</th>
                    <th>Гръдка обиколка:</th>
                    <th>Въздраст:</th>
                    <th>Цвят на очите:</th>
                <tr>";
                        while ($row = mysql_fetch_assoc($querysearch)) {
                            $nickname1 = $row['nickname'];
                            $name1 = $row['name'];
                            $height1 = $row['height'];
                            $weight1 = $row['weight'];
                            $hair_color1 = $row['hair_color'];
                            $bra_size1 = $row['bra_size'];
                            $age1 = $row['age'];
                            $eyes_color1 = $row['eyes_color'];

                            echo '<tr>'.'<td>'.$nickname1.'</td>'.'<td>'.$name1.'</td>'.'<td>'.$height1.'</td>'.
                            '<td>'.$weight1.'</td>'.'<td>'.$hair_color1.'</td>'.'<td>'.$bra_size1.'</td>'.'<td>'.$age1.'</td>' . '</tr>';
                        }
                    }
                    
                    echo "</table>";
                    ?>
                </div>
                
                    <a href="user_profile.php">НАЗАД</a>
                
            </div>
        </div>
    </body>    
</html>
