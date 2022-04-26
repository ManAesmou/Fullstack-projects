<?php
require 'database.php';
session_start(); 
header('Cache-control: no-cache, no-store, must-revalidate');

//Tarkistetaan, onko assosiatiivisia joukko muuttujia perustettu, jotka välitetään nykyiselle skriptille URL-parametrien kautta.
isset($_GET['first_name']) ? $firstName = $_GET['first_name'] : $firstName='';
isset($_GET['last_name']) ? $lastName = $_GET['last_name'] : $lastName='';
isset($_GET['presidentID']) ? $presidentId = $_GET['presidentID'] : $presidentId='';
isset($_GET['page']) ? $page = $_GET['page'] : $page = '';

!empty($_SESSION['userID']) ? $sessionId = $_SESSION['userID'] : $sessionId = '';
!empty($_SESSION['firstname']) ? $sessionFirstname = $_SESSION['firstname'] : $sessionFirstname = '';
!empty($_SESSION['lastname']) ? $sessionLastname = $_SESSION['lastname'] : $sessionLastname = '';
!empty($_SESSION['priviledge']) ? $sessionpriviledge = $_SESSION['priviledge'] : $sessionpriviledge = '';

if ($page == 'home') {

    $sql = "SELECT * 
            FROM yksityistunnit
            INNER JOIN sukupuolet ON yksityistunnit.sukupuoliID = sukupuolet.sukupuoliID
            WHERE ohjaaja = '$sessionFirstname'";

    $result = $conn->query($sql);
    $rowCount = mysqli_num_rows($result);
}

if (isset($_POST['submitChangePassword'])) {
    if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)) {
        echo "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
       } else {
        echo "Your password is strong.";
       }
}

if (isset($_POST['submitLogin'])) {
    
    $email = $_POST['inputEmail'];
    $password = $_POST['inputPassword'];

    if (empty($password) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM kayttajatunnukset WHERE email = ?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror&select-statement");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($password, $row['salasana']);
                if ($passCheck == false) {
                    header("Location: ../index.php?error=wrongpass");
                    exit();
                } elseif ($passCheck == true) {
                    $_SESSION['userID'] = $row['kayttajatunnusID'];
                    $_SESSION['firstname'] = $row['etunimi'];
                    $_SESSION['lastname'] = $row['sukunimi'];
                    $_SESSION['priviledge'] = $row['kayttooikeudet'];
                    header("Location: ../index.php?success=logged_in");
                } else {
                    header("Location: ../index.php?error=wrongpass");
                    exit();
                }
            } else {
                header("Location: ../index.php?error=wrongemail");
                exit();
            }
        }
    }
}



if (isset($_POST['submitRegister'])) {
    if (isset($_SESSION['userID']) && $_SESSION['priviledge'] === 'admin') {

        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPass = $_POST['confirmPassword'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $permissions = $_POST['permissions'];
        $registerDate = $_POST['registerDate'];

        test_input($email);
        test_input($password);
        test_input($confirmPass);
        test_input($firstname);
        test_input($lastname);
        test_input($phone);
        str_pad($phone, 10, "0", STR_PAD_LEFT);
        test_input($permissions);
        test_input($registerDate);

        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            header("Location: ../index.php?page=register&error=password_strength");
        }

        if (empty($email) || empty($password) || empty($confirmPass) || empty($firstname) || empty($lastname) || empty($phone) || empty($permissions) || empty($registerDate)) {
            header("Location: ../index.php?page=register&error=emptyfields");
            exit();
        } elseif (!preg_match("/^[a-zA-ZäöüÄÖÜß' ]*$/", $firstname) || (!preg_match("/^[a-zA-ZäöüÄÖÜß' ]*$/", $lastname))) {
            header("Location: ../index.php?page=register&error=invalid_firstname_or_lastname");
            exit();
        } elseif ($password !== $confirmPass) {
            header("Location: ../index.php?page=register&error=passwords_do_not_match");
            exit();
        } else {
            $sql = "SELECT email FROM kayttajatunnukset WHERE email = ?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../index.php?page=register&error=sqlerror&select-statement");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $rowCount = mysqli_stmt_num_rows($stmt);

                if ($rowCount > 0) {
                    header("Location: ../index.php?page=register&error=email_already_taken");
                    exit();
                } else {
                    $sql = "INSERT INTO kayttajatunnukset (etunimi, sukunimi, email, salasana, puhelin, kayttooikeudet, rekisterointipvm) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../index.php?page=register&error=sqlerror&insert-statement");
                        exit();
                    } else {
                        $hashedPass = password_hash($password, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "sssssss", $firstname, $lastname, $email, $hashedPass, $phone, $permissions, $registerDate);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../index.php?succes=account_registered");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        header('location: index.php?no_permissions');
    }
}

if (isset($_GET['submit']) == 'logout') {
    //setcookie('nimi','',-60); //vanhenemisaika negatiivinen -> selain hävittää cookien
    //setcookie('email','',-60);
    //setcookie('laskuri','',-60);

    //session-tiedot myös
    session_start();
    session_unset();
    session_destroy();

    header('location: /Curriculumvitae/backend/index.php?page=login');
}

?>