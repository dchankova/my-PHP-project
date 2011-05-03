<?php
session_start();
$title = $_SESSION['nickname'] . " in logged";
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
                <?php 
				if (isset($_GET['submit'])) {
			if (isset($_GET['height_from'], $_GET['height_to'], $_GET['age'], $_GET['bra_size']) &&
            !empty($_GET['height_from']) && !empty($_GET['height_to']) &&
            !empty($_GET['age']) && !empty($_GET['bra_size'])) {

        $submit = $_GET['submit'];
        $height_from = $_GET['height_from'];
        $height_to = $_GET['height_to'];
        $bra_size = $_GET['bra_size'];
        $age = $_GET['age'];

        if (is_numeric($height_from) != TRUE || is_numeric($height_to) != TRUE
                || is_numeric($age) != TRUE || is_numeric($bra_size) != TRUE) {
            echo "Грешно въведени данни!Опитай пак!";
        } else {
							$file = new DOMDocument();
                            $file->load('f_accounts.xml');
                            echo '<h2>Вашето търсене върна следните резултати</h2>';
                            echo "<table align='center' cellspacing='0' border='1'>
                                <tr>
                                    <th>Потребителско име:</th><th>Име:</th>
                                    <th>Въздраст:</th><th>Цвят на очите</th>
									<th>Цвят на косата</th><th>Гръдна обиколка</th>
                                    <th>Тегло</th><th>Височина:</th>
                                <tr>";

                            $list = $file->getElementsByTagName("f_account");
                            foreach ($list as $profile) {
							
								$nicknames = $profile->getElementsByTagName("nickname");
                                $username1 = $nicknames->item(0)->nodeValue;
								
                                $names = $profile->getElementsByTagName("name");
                                $name1 = $names->item(0)->nodeValue;

                                $ages = $profile->getElementsByTagName("age");
                                $age1 = $ages->item(0)->nodeValue;

                                $eyes_colors = $profile->getElementsByTagName("eyes_color");
                                $eyes_color1 = $eyes_colors->item(0)->nodeValue;

                                $hair_colors = $profile->getElementsByTagName("hair_color");
                                $hair_color1 = $hair_colors->item(0)->nodeValue;

                                $bra_size = $profile->getElementsByTagName("bra_size");
                                $bra_size1 = $bra_sizes->item(0)->nodeValue;

                                $weights = $profile->getElementsByTagName("weight");
                                $weight1 = $weights->item(0)->nodeValue;
								
								$heights = $profile->getElementsByTagName("height");
                                $height1 = $heights->item(0)->nodeValue;

                                if ($height1 >= $height_from && $height1 <= $height_to &&
                                        $bra_size1 <= $bra_size && $age1 >= $age) {
                                    
                                 echo '<tr>'.'<td>'.$nickname1.'</td>'.
                                             '<td>'.$name1.'</td>'.
                                             '<td>'.$age1.'</td>'.
											 '<td>'.$eyes_color1.'</td>'.
											 '<td>'.$hair_color1.'</td>'.
											 '<td>'.$bra_size1.'</td>'.
                                             '<td>'.$weight1.'</td>'.
                                             '<td>'.$height1.'</td>'.
                                      '</tr>';    
                                }
                            }
                        }
    } else {
        echo "Попълни всички полета!";
    }
}
?>
              </table>  
                    <a href="user_profile.php">НАЗАД</a>
                
            </div>
        </div>
    </body>    
</html>
