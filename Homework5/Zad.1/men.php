<!DOCTYPE html>
<?php
session_start();

if (!isset($_GET['menerr']) && empty($_GET['menerr'])) {
    $_GET['menerr'] = 0;
}
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=uft8"/>
        <meta name="author" content="Diana" />
        <meta name="keywords" content="face" />
        <meta name="description" content="A university project." />
        <link rel="stylesheet" type="text/css" href="style.css"/>
        <title>FACES</title>
    </head>
    <body>
        <div id="container">
            <div id="content">
                <h2>Регистрация на профил:</h2>

                <p> Въведенете всички данни.Моля, не поставяйте лъжлива информация!</p>
                
                    <?php
                    if ($_GET['menerr'] == 1) {
                        echo "Потребителското име е заето. Моля, изберете друго!";
                    } else if ($_GET['menerr'] == 2) {
                        echo "Грешка при въвеждането на заплата или височина!";
                    } else if ($_GET['menerr'] == 3) {
                        echo "Грешка при въвеждането на потребителското име или името!Моля, опитайте пак!";
                    } else if ($_GET['menerr'] == 4) {
                        echo "Грешна дължина на паролата!";
                    } else if ($_GET['menerr'] == 5) {
                        echo "Повторената парола не съвпада!";
                    } else if ($_GET['menerr'] == 6) {
                        echo "Моля, въведете всички полета!";
                    }
                    ?>
                    <form action="register_gentlemen.php" method="POST">
                        <table align='center' cellspacing='0' border='1'>
                            <tr>
                                <td>
					Потребителско име (до 30 символа):
                                </td>
                                <td>
                                    <input type="text" name="nickname" >
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
				Заплата (лв):
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
                                    <p>
					Кола<input type="checkbox" name="properties[]" value="car" />
					Къща<input type="checkbox" name="properties[]" value="house" />
                                         Яхта<input type="checkbox" name="properties[]" value="yacht" />
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Височина (cm):
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
                    <img src="image/man_symbol.gif" height="150" width="150" style="float:right" alt="symbol"/>
                    <p>Върнете се <a href='register.php'>НАЗАД</a>! </p>
                </div>

            </div>
        
    </body>

</html>




