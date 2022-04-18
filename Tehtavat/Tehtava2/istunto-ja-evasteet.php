<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tulokset</title>
</head>
<body>

<p><a href="./lopeta.php">Takaisin</a></p>  

<?php
session_start();

$_SESSION['alkuaika'] = date('H:i:s', time());

if (!empty($_POST['luku1'])) {
    if (empty($_POST)) {
        header('location: php-perusteita-osa-2.php?error');
    } else {
        $error = false;
        
        if (empty($_POST['luku1'])) {$error = true;} else {$a = $_POST['luku1'];}
        if (empty($_POST['operaattori'])) {$error = true;} else { $operator = $_POST['operaattori'];}
        if (empty($_POST['luku2'])) {$error = true;} else {$b = $_POST['luku2'];}

        if ($error) {
            header('location: php-perusteita-osa-2.php?empty_fields=calculator');
        } else {
            setcookie('luku1', $a, time()+30*24*60*60);
            setcookie('operaattori', $operator, time()+30*24*60*60);
            setcookie('luku2', $b, time()+30*24*60*60);
        }
    }

    switch ($operator) {
    case "1":
        $result = $a + $b;
        break;
    case "2":
        $result = $a - $b;
        break;
    case "3":
        $result = $a * $b;
        break;
    case "4":
        $result = $a / $b;
        break;
    case "5":
        $result = $a % $b;
        break;
    default:
        header('Location: php-perusteita-osa-2.php?choose_operator');
    }

    echo '<h1>Tulos: ' . number_format($result, 0, ",", " ") . '</h1>';
    echo '<h3>Aloitit toiminnon klo: ' . $_SESSION['alkuaika'] . '.</h3>';


    } elseif (empty($_POST['luku1']) && empty($_POST['ika'])) {
        
            if (empty($_POST)) {
                header('location: php-perusteita-osa-2.php?error');
            } else {
                $error = false;
                
                if (empty($_POST['lukuKertotaulu'])) {$error = true;} else {$multiplicationTable = $_POST['lukuKertotaulu'];}

                if ($error) {
                    header('location: php-perusteita-osa-2.php?empty_field=multiplication_table');
                } else {
                    setcookie('lukuKertotaulu', $multiplicationTable, time()+30*24*60*60);
                }

                echo '<h1>Tulos: </h1>';

                for ($i = 1; $i < 11; $i++) {
                    $income = $i * $multiplicationTable;
                    echo '<h2>' . $i . ' * ' . number_format($multiplicationTable, 0, ",", " ") . ' = ' . number_format($income, 0, ",", " ") . ' </h2>';
                }
                echo '<h3>Aloitit toiminnon klo: ' . $_SESSION['alkuaika'] . '.</h3>';
            } 
    } else {
        if (empty($_POST)) {
            header('location: php-perusteita-osa-2.php?error');
        } else {
            
            $name = $_POST['nimi'];
            $age = $_POST['ika'];

            if (empty($name) || empty($age)) {
                header("location: php-perusteita-osa-2.php?error=empty_field=check_class");
            } elseif (!preg_match("/^[a-zA-ZäöüÄÖÜß' ]*$/", $name)) {
                header("Location: php-perusteita-osa-2.php?error=only_letter_and_spaces_are_allowed_in_the_name");
            } else {

                function test_input($data){
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                
                test_input($name);
                
                setcookie('nimi', $name, time()+30*24*60*60);
                setcookie('ika', $age, time()+30*24*60*60);
            
                if ($age < 18) {
                    echo "<h2>Tulos: $name on $age-vuotias, eli hän kuuluu alaikäisten luokkaan.</h2>";
                } elseif ($age < 65) {
                    echo "<h2>Tulos: $name on $age-vuotias, eli hän kuuluu työikäisten luokkaan.</h2>";
                } else {
                    echo "<h2>Tulos: $name on $age-vuotias, eli hän kuuluu eläkeläisten luokkaan.</h2>";
                }

                echo '<h3>Aloitit toiminnon klo: ' . $_SESSION['alkuaika'] . '.</h3>';
            }   
        } 
    }

?>
</body>
</html>

