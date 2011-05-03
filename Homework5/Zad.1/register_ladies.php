<?php

if (isset($_POST['submit'])) {
    if (isset($_POST['nickname'], $_POST['password'], $_POST['password_rep'],
                    $_POST['name'], $_POST['age'], $_POST['hair_color'], $_POST['bra_size'], $_POST['weight'], $_POST['height'])
            && !empty($_POST['nickname']) && !empty($_POST['password'])
            && !empty($_POST['password_rep']) && !empty($_POST['name'])
            && !empty($_POST['age']) && !empty($_POST['hair_color'])
            && !empty($_POST['bra_size']) && !empty($_POST['weight']) && !empty($_POST['height'])) {

        $submit = $_POST['submit'];
        $nickname = strtolower(strip_tags($_POST['nickname']));
        $password = strip_tags($_POST['password']);
        $password_rep = strip_tags($_POST['password_rep']);
        $name = strip_tags($_POST['name']);
        $age = strip_tags($_POST['age']);
        $hair_color = $_POST['hair_color'];
        $eyes_color = $_POST['eyes_color'];
        $bra_size = strip_tags($_POST['bra_size']);
        $weight = strip_tags($_POST['weight']);
        $height = strip_tags($_POST['height']);

        if ($password == $password_rep) {
            if (is_numeric($age) != TRUE || is_numeric($weight) != TRUE || is_numeric($height) != TRUE) {
                header("Location: women.php?werr=2");
            } else if (strlen($nickname) > 30 || strlen($name) > 50 || strlen($hair_color) > 20 || strlen($bra_size) > 5) {
                header("Location: women.php?werr=3");
            } else {
                if (strlen($password) > 30 || strlen($password) < 6) {
                    header("Location: women.php?werr=4");
                } else {


                    $password = md5($password);
                    $password_rep = md5($password_rep);

                    $file = new DOMDocument();
                    //$file->formatOutput = true;
                    $file->load('f_accounts.xml');
                    
                    //$a = $file->createElement("f_accounts");
                    //$file->appendChild($a);
                    
                    $a= $file->firstChild;
                    
                    $acc= $file->createElement("f_account");
                    $a->appendChild($acc);
                    
					$nk = $file->createElement("nickname");
                    $nk->appendChild($file->createTextNode($nickname));
                    $acc->appendChild($nk);
					
					$pw = $file->createElement("password");
                    $pw->appendChild($file->createTextNode($password));
                    $acc->appendChild($pw);
					
                    $n = $file->createElement("name");
                    $n->appendChild($file->createTextNode($name));
                    $a->appendChild($n);
                    
                    $ag = $file->createElement("age");
                    $ag->appendChild($file->createTextNode($age));
                    $acc->appendChild($ag);
					
					$e = $file->createElement("eyes_color");
                    $e ->appendChild($file->createTextNode($eyes_color));
                    $acc->appendChild($e);
                    
                    $h = $file->createElement("hair_color");
                    $h->appendChild($file->createTextNode($hair_color));
                    $acc->appendChild($h);
					
					$b = $file->createElement("bra_size");
                    $b->appendChild($file->createTextNode($bra_size));
                    $acc->appendChild($b);
					
					$w = $file->createElement("weight");
                    $w->appendChild($file->createTextNode($weight));
                    $acc->appendChild($w);
                    
                    $h = $file->createElement("height");
                    $h->appendChild($file->createTextNode($height));
                    $acc->appendChild($h);
                   $file->save("f_accounts.xml");
				   
                    header("Location: index.php?succ=1");
                }
            }
        } else {
            header("Location: women.php?werr=5");
        }
    } else {
        header("Location: women.php?werr=6");
    }
}
?>

