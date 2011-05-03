    
<?php

if (isset($_POST['submit'])) {
    if (isset($_POST['nickname'], $_POST['password'], $_POST['password_rep'],
                    $_POST['name'], $_POST['age'], $_POST['salary'], $_POST['height'])
            && !empty($_POST['nickname']) && !empty($_POST['password']) && !empty($_POST['password_rep'])
            && !empty($_POST['name']) && !empty($_POST['age'])
            && !empty($_POST['salary']) && !empty($_POST['height'])) {

        $submit = $_POST['submit'];
        $nickname = strtolower(strip_tags($_POST['nickname']));
        $password = strip_tags($_POST['password']);
        $password_rep = strip_tags($_POST['password_rep']);
        $name = strip_tags($_POST['name']);
        $age = strip_tags($_POST['age']);
        $salary = strip_tags($_POST['salary']);
        $height = strip_tags($_POST['height']);

        if (isset($_POST['properties']) && !empty($_POST['properties'])) {
            $properties = serialize($_POST['properties']);
        } else {
            $properties = "";
        }

         if ($password == $password_rep) {
            if (is_numeric($height) != TRUE || is_numeric($salary) != TRUE || is_numeric($age)!=TRUE) {

                header("Location: men.php?menerr=2");
                
            } else if (strlen($nickname) > 30 || strlen($name) > 50) {

                header("Location: men.php?menerr=3");
            } else if (strlen($password) > 30 || strlen($password) < 6) {

                header("Location: men.php?menerr=4");
            } else {

                //password encrypting
                $password = md5($password);
                $password_rep = md5($password_rep);


					$file = new DOMDocument();
                    //$file->formatOutput = true;
                    $file->load('m_accounts.xml');
                    
                    //$a = $file->createElement("m_accounts");
                    //$file->appendChild($a);
                    
                    $a= $file->firstChild;
                    
                    $acc= $file->createElement("m_account");
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
					
					$s = $file->createElement("salary");
                    $s ->appendChild($file->createTextNode($salary));
                    $acc->appendChild($s);
                    
                    $p = $file->createElement("properties");
                    $p->appendChild($file->createTextNode($properties));
                    $acc->appendChild($h);
				               
                    $h = $file->createElement("height");
                    $h->appendChild($file->createTextNode($height));
                    $acc->appendChild($h);
                   $file->save("m_accounts.xml");

                header("Location: index.php?succ=1");
            }
        } else {
            header("Location: men.php?menerr=5");
        }
    } else {
        header("Location: men.php?menerr=6");
    }
}
?>