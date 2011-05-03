<?php
session_start();
$title = $_SESSION['nickname'] . " is logged";
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

               <?php if (isset($_GET['submit'])) {
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

         if (is_numeric($age_from) != TRUE || is_numeric($age_to) != TRUE || is_numeric($salary) != TRUE) {

            echo "Грешно въведени данни!Опитай пак!";
        } else {
							$file = new DOMDocument();
                            $file->load('f_accounts.xml');
                            echo '<h2>Вашето търсене върна следните резултати</h2>';
                            echo "<table align='center' cellspacing='0' border='1'>
                                <tr>
                                    <th>Потребителско име:</th><th>Име:</th>
                                    <th>Възраст:</th><th>Заплата</th>
                                    <th>Имущество</th><th>Височина</th>
                                <tr>";

                            $list = $file->getElementsByTagName("m_account");
                            foreach ($list as $profile) {
							
								$nicknames = $profile->getElementsByTagName("nickname");
                                $username1 = $nicknames->item(0)->nodeValue;
								
                                $names = $profile->getElementsByTagName("name");
                                $name1 = $names->item(0)->nodeValue;

                                $ages = $profile->getElementsByTagName("age");
                                $age1 = $ages->item(0)->nodeValue;

                                $salarys = $profile->getElementsByTagName("salary");
                                $salary1 = $salarys->item(0)->nodeValue;

                               	$propertys = $profile->getElementsByTagName("properties");
                                $properties1 = $propertyes->item(0)->nodeValue;
								
								$heights = $profile->getElementsByTagName("height");
                                $height1 = $heights->item(0)->nodeValue;

                                if ($age1 >= $age_from && $age1 <= $age_to &&
                                    $salary1 <= $salary && $properties1==$properties) {
                                    
                                    $properties2="Нищо!";
                                    if ($properties!="Нищо!"){
                                        $properties2="";
                                        $properties1 = unserialize($properties1);
                                        foreach($properties as $v){
                                            $properties2.= " $v";
                                            }
                                    }
                                    
                                    echo '<tr>' . '<td>' . $nickname1 . '</td>' .
                                                  '<td>' . $name1 . '</td>' .
                                                  '<td>' . $age1 . '</td>' .
                                                  '<td>' . $salary1 . '</td>' .
                                                  '<td>' . $properties2 . '</td>' .
                                                  '<td>' . $height1 . '</td>' .
                                        '</tr>';
                                    
                                }
                            }
                        }
    } else {

        echo "Попълни всички полета!";
    }
}
?>
            </div>
            
                <a href="user_profile.php">НАЗАД</a>
            
        </div>
    </body>    
</html>
