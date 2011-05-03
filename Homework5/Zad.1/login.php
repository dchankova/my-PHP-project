<?php

session_start();

$nickname = strtolower($_POST['nickname']);
$password = $_POST['password'];

if ($nickname && $password) {
    $src = new DOMDocument();
    $src->load('m_accounts.xml');
    $maleNicknames = $src->getElementsByTagName('nickname');
    for ($i = 0; $i < $maleNicknames->length; $i++) {
        $current = $maleNicknames->item($i)->nodeValue;
        if ($nickname == $current) {
            $src2 = new DOMDocument();
            $src2->load('ma_accounts.xml');
            $malePasswords = $src2->getElementsByTagName('password');
            $dbpassword = $malePasswords->item($i)->nodeValue;
            if (md5($password) == $dbpassword) {
                  $_SESSION['nickname'] = $nickname;
				   header("Location: user_profile.php");
            } else {
                echo "Грешна парола!";
            }
        }
    }

    $src3 = new DOMDocument();
    $src3->load('f_accounts.xml');
    $femaleNicknames = $src3->getElementsByTagName('nickname');
    for ($i = 0; $i < $femaleNicknames->length; $i++) {
        $currentf = $femaleNicknames->item($i)->nodeValue;
        if($nickname == $currentf){
            $src4 = new DOMDocument();
            $src4->load('f_accounts.xml');
            $femalePasswords = $src4->getElementsByTagName('password');
            $dbpassword = $femalePasswords->item($i)->nodeValue;
            if(md5($password)==$dbpassword){
                 $_SESSION['nickname'] = $nickname;
				 header("Location: user_profile.php");
            } else {
                echo "Грешна парола!";
            }
        }
    }
} else {
    die("Моля въведете валидни Потребителско име и Парола!");
}
?>


