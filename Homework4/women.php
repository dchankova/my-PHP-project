
<?php
session_start();

if (!isset($_GET['werr']) && empty($_GET['werr'])) {
    $_GET['werr'] = 0;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
        <meta name="author" content="Diana" />
        <meta name="keywords" content="faces" />
        <meta name="description" content="A university project." />
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>FACES</title>
    </head>
    <body>
        <div id="container">

            <div id="content">

                <h2>Регистрация на профил</h2>

                <p> Въведенете всички данни.Моля, не поставяйте лъжлива информация!</p>

                <?php
                if ($_GET['werr'] == 1) {
                    echo "Потребителското име е заето. Моля, изберете друго!";
                    } else if ($_GET['werr'] == 2) {
                        echo "Грешка при въвеждането на заплата или височина!";
                    } else if ($_GET['werr'] == 3) {
                        echo "Грешка при въвеждането на потребителското име или името!Моля, опитайте пак!";
                    } else if ($_GET['werr'] == 4) {
                        echo "Грешна дължина на паролата!";
                    } else if ($_GET['werr'] == 5) {
                        echo "Повторената парола не съвпада!";
                    } else if ($_GET['werr'] == 6) {
                        echo "Моля, въведете всички полета!";
                    }
                ?>
                <form action="register_ladies.php" method="POST">
                    <table align='center' cellspacing='0' border='1'>
                        <tr>
                            <td>
				Потребителско име (до 30 символа):
                            </td>
                            <td>
                                <input type="text" name="nickname">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Парола (от 6 до 30 символа):
                            </td>
                            <td>
                                <input type="password" name="password">
                            </td>
                        </tr>
                        <tr>
                            <td>
				Повторете паролата:
                            </td>
                            <td>
                                <input type="password" name="password_rep">
                            </td>
                        </tr>
                        <tr>
                            <td>
				Име (до 50 символа):
                            </td>
                            <td>
                                <input type="text" name="name" >
                            </td>
                        </tr>
                        <tr>
                            <td>
				Възраст:
                            </td>
                            <td>
                                <input type="text" name="age" maxlength="3">
                            </td>
                        </tr>
                        <tr>
                            <td>
				Цвят на очите:
                            </td>
                            <td>
                                <select name="eyes_color">
                                    <option value="blue">син</option>
                                    <option value="green">зелен</option>
                                    <option value="brown">кафяв</option>
                                    <option value="yellow">жълт</option>
                                    <option value="motrey">пъстър</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
				Цвят на косата:
                            </td>
                            <td>
                                <input type="text" name="hair_color" maxlength="50">
                            </td>
                        </tr>
                        <tr>
                            <td>
				Гръдна обиколка в (см):
                            </td>
                            <td>
                                <input type="text" name="bra_size" maxlength="5">
                            </td>
                        </tr>
                        <tr>
                            <td>
				Тегло (кг):
                            </td>
                            <td>
                                <input type="text" name="weight" maxlength="3">
                            </td>
                        </tr>
                        <tr>
                            <td>
				Височина (см):
                            </td>
                            <td>
                                <input type="text" name="height" maxlength="3">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit" value="Register">
                            </td>
                        </tr>
                    </table>
                </form>
                <img src="image/female_symbol-1.png"  style="float:right" height="150" width="150" alt="symbol"/>

                <p>Върнете се <a href='register.php'>назад</a>!</p>
            </div>
        </div>
    </body>
</html>