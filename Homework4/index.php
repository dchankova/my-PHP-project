<!DOCTYPE html>
<?php
session_start();
if (!isset($_GET['error']) && empty($_GET['error'])) {
    $_GET['error'] = 0;
}
if (!isset($_GET['succ']) && empty($_GET['succ'])) {
    $_GET['succ'] = 0;
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
                <h1>Добре дошли!</h1>
                <p> За да можете да разглеждате информацията в сайта трябва да имате необходимата
                    регистрация. </p>
                <?php
                if ($_GET['succ'] ==1 ){

                                        echo "Браво! Сега можете да влезете в сайта!";
                }
                if ($_GET['error'] == 1) {
                    echo '<br/>'."Грешна парола!".'<br/>';
                    echo '<pre>'.var_dump(true,$_SESSION['numrows']).'</pre>';
                } else if ($_GET['error'] == 2) {
                    echo '<br/>'."Не съществуващ потребител!".'<br/>';
                } else if ($_GET['error'] == 3) {
                    echo '<br/>'."Въведете потребителиско име/парола!".'<br/>';
                }
                ?>
                <form action="login.php" method="POST">

                    <table id="login">
                        <th>Вход за регистрирани:</th>

                        <tr>
                            <td>Потребителско име:</td><td><input type="text" name="nickname"></td>
                        </tr>
                        <tr>
                            <td>Парола :</td><td><input type="password" name="password"></td>
                        </tr>
                        <tr>
                            <td></td><td><input type="submit" value="Log in"></td>
                        </tr>

                        <tr><a href="register.php">Регистрирай се</a></tr>
                    </table>
                </form>

                <br/>


            </div>

        </div>
    </body>

</html>

