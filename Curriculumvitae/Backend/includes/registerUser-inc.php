<?php
session_start();
//if (!isset($_SESSION['userID']) && !isset($_SESSION['priviledge']) === true) {
  //  header('location: index.php?no_permissions');
//} else {
    if (isset($_POST['submitRegister'])) {
        require 'database.php';

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
        str_pad($phone, 10, "0",STR_PAD_LEFT);
        test_input($permissions);
        test_input($registerDate);

        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            header("Location: ../registerUser.php?error=password_strength");
        }

        if (empty($email) || empty($password) || empty($confirmPass) || empty($firstname) || empty($lastname) || empty($phone) || empty($permissions) || empty($registerDate)) {
            header("Location: ../registerUser.php?error=emptyfields");
            //exit();
        } elseif (!preg_match("/^[a-zA-ZäöüÄÖÜß' ]*$/", $firstname) || (!preg_match("/^[a-zA-ZäöüÄÖÜß' ]*$/", $lastname))) {
            // $_SESSION['test1'] = $firstname;
            // $_SESSION['test2'] = $lastname;
            header("Location: ../registerUser.php?error=invalid_firstname_or_lastname");
            //exit();
        } elseif ($password !== $confirmPass) {
            header("Location: ../registerUser.php?error=passwords_do_not_match");
            //exit();
        } else {
            $sql = "SELECT email FROM kayttajatunnukset WHERE email = ?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../registerUser.php?error=sqlerror&select-statement");
                //exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $rowCount = mysqli_stmt_num_rows($stmt);

                if ($rowCount > 0) {
                    header("Location: ../registerUser.php?error=email_already_taken");
                    //exit();
                } else {
                    $sql = "INSERT INTO kayttajatunnukset (etunimi, sukunimi, email, salasana, puhelin, kayttooikeudet, rekisterointipvm) VALUES (?, ?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../registerUser.php?error=sqlerror&insert-statement");
                        //exit();
                    } else {
                        $hashedPass = password_hash($password, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "sssssss", $firstname, $lastname, $email, $hashedPass, $phone, $permissions, $registerDate);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../registerUser.php?succes=account_registered");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
?>
