<?php session_start();

$title = $_SESSION['nickname']." is logged";

?>

<!DOCTYPE html>
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
                   <h2>Търсене на мъж:</h2>
        <form action="search_gentlemen.php" method="GET">
            <table>
            <tr>
                <td>
                    Височина (cm):
                </td>
                <td>
                    От:<input type="text" name="height_from" size="5" maxlength="3">&nbsp
                    до:<input type="text" name="height_to" size="5" maxlength="3">
                </td>
            </tr>          
            <tr>
                <td>
                    Заплата(левове):
                </td>
                <td>
                    <input type="text" name="salary"> 
                </td>
            </tr>
            <tr>
                <td>
                    Имущество:
                </td>
                <td>
                    Кола<input type="checkbox" name="properties[]" value="car" />
                    Къща<input type="checkbox" name="properties[]" value="villa" />
                    Яхта<input type="checkbox" name="properties[]" value="yacht" />
                </td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Search">    
        </form>
        <br/>
        <h2>Търсене на жена:</h2>
        <form action="search_ladies.php" method="GET">
            <table>
            <tr>
                <td>
                   Височина:
                </td>
                <td>
                    От:<input type="text" name="height_from" size="5" maxlength="3">&nbsp
                    до:<input type="text" name="height_to" size="5" maxlength="3">
                </td>
            </tr>
			<tr>
                <td>
                    Минимална гръдна обиколка:
                </td>
                <td>
                    <input type="text" name="bra_size" maxlength="5"> 
                </td>
            </tr>
			<tr>
                <td>
                   Максимална възраст:
                </td>
                <td>
                    <input type="text" name="age" maxlength="3"> 
                </td>
            </tr>
            </table>
        <input type="submit" name="submit" value="Search">
        </form>

		
		
<?php
echo "<a href='logout.php'>ИЗХОД</a>";
?>
                </div>
        </div>
    </body>
</html>
