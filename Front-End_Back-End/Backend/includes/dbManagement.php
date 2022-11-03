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

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Yksityistunnin varauksen lähetys tietokantaan.
if (isset($_POST['bookLesson'])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = test_input($_POST["fullname"]);
        $email = test_input($_POST["email"]);
        $instructor = test_input($_POST["instructor"]);
        $lessontopic = test_input($_POST["lessontopic"]);
        $accept = test_input($_POST["accept"]);
    }
    
    if (isset($_POST["phone"])) {
        $phone = test_input($_POST["phone"]);
        str_pad($phone, 10, "0", STR_PAD_LEFT);
    } else {
        $phone = "";
    }

    if (isset($_POST["gender"])) {
        $gender = test_input($_POST["gender"]);
    } else {
        $gender = "";
    }

    if (isset($_POST["belt"])) {
        $belt = test_input($_POST["belt"]);
    } else {
        $belt = "";
    }
    if (isset($_POST["marketing"])) {
        $marketing = test_input($_POST["marketing"]);
    } else {
        $marketing = "";
    }

    if (empty($fullname) || empty($email) || empty($phone) || empty($instructor) || empty($lessontopic)) {
        header("Location: /Curriculumvitae/bookLesson.html?error=emptyfields&fullname=$fullname");
        exit();
    } else {
        if (!preg_match("/^[a-zA-ZäöüÄÖÜß' ]*$/", $fullname)) {
            header('location: /Curriculumvitae/bookLesson.html?error=only_letters_and_white_space_allowed&fullname=' .$fullname);
        }
    }

    $sql = "SELECT * FROM varaukset WHERE nimi = ? AND email = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: /Curriculumvitae/bookLesson.html?error=sqlerror&select-statement");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "ss", $fullname, $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $rowCount = mysqli_stmt_num_rows($stmt);

        if ($rowCount > 0) {
            header("Location: /bookedLesson.html?error=already_booked_a_lesson");
            exit();
        } else {
            $sql = "INSERT INTO varaukset (nimi, email, puhelin, oppituntiaihe, ohjaaja, sukupuoliID, vyoarvo, tietohyvaksyminen, markkinointi) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: /Curriculumvitae/bookLesson.html?error=sqlerror&insert-statement");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "sssssisii", $fullname, $email, $phone, $lessontopic, $instructor, $gender, $belt, $accept, $marketing);
                mysqli_stmt_execute($stmt);
                header("Location: /Curriculumvitae/bookLesson.html?succes=lesson_reservation_saved");
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}

//Kirjautuminen ismomanninen-tietokantaan.
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
            header("Location: ../index.php?error=sql_select-statement");
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

if (isset($_SESSION['userID'] )&& isset($_SESSION['firstname']) && isset($_SESSION['lastname'])) {

        //Tulostetaan JSON.php sivulle dataa.
        $sql = "SELECT * 
                FROM yksityistunnit
                INNER JOIN varaukset ON yksityistunnit.varausID = varaukset.varausID
                WHERE ohjaaja = '$sessionFirstname'
                ORDER BY ohjauksenpvm";
        $bookingResult = mysqli_query($conn, $sql);
        $rows = [];
        
        if ($page == "reservation") {
            $sql = "SELECT * 
                    FROM varaukset
                    INNER JOIN sukupuolet ON varaukset.sukupuoliID = sukupuolet.sukupuoliID
                    WHERE ohjaaja = '$sessionFirstname'";

            $result = $conn->query($sql); // muuuta => $bookingResult = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
        }

            // $desc = $_POST['resultDescription'];
            // $date = $_POST['resultDateTime'];

            // $sql = "INSERT INTO yksityistunnit(kuvaus, ohjauksenpvm, varausID) VALUES ('$desc', '$date', ) ";


    //Haetaan kaikki presidentti-taulun sarakkeet tietokannasta, ja tallennetaan tulosrivit $row-muuttujaan.
    if ($page == 'ownsettings' && isset($_SESSION['userID'])) {

        $sql = "SELECT * 
                FROM kayttajatunnukset 
                WHERE etunimi = '$sessionFirstname'
                OR sukunimi = '$sessionLastname'";
    
        $result = $conn->query($sql);
    
        if($result->num_rows > 0)
        $row = $result->fetch_assoc();
    }

    if (isset($_POST['submitChangePassword'])) {

            $currentPass = $_POST['currentPassword'];
            $newPass = $_POST['newPassword'];
            $confirmNewPass = $_POST['confirmNewPassword'];
            $userId = $_SESSION['userID'];

            test_input($currentPass);
            test_input($newPass);
            test_input($confirmNewPass);

            if (empty($currentPass) || empty($newPass) || empty($confirmNewPass)) {
                header("Location: ../index.php?page=changepass&error=emptyfields");
                exit();
            } else {
                $sql = "SELECT * FROM kayttajatunnukset WHERE kayttajatunnusID = ?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../index.php?page=changepass&error=sql_select-statement");
                    exit();
                } else {
                    mysqli_stmt_bind_param($stmt, "s", $userId);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $row = mysqli_fetch_assoc($result);

                    $passCheck = password_verify($currentPass, $row['salasana']);
                    $newPassCheck = password_verify($newPass, $row['salasana']);

                    if ($passCheck == false) {
                        header("Location: ../index.php?page=changepass&error=wrong_current_password");
                        exit();
                    } else if ($newPassCheck) {
                        header('Location: ../index.php?page=changepass&error=same_password');
                        exit();
                    } else if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $newPass)) {
                        header("Location: ../index.php?page=changepass&error=password_strength");
                        exit();
                    } else if ($newPass !== $confirmNewPass) {
                        header("Location: ../index.php?page=changepass&error=new_passwords_do_not_match");
                        exit();
                    } else {
                        $sql = "UPDATE kayttajatunnukset SET salasana = ? WHERE kayttajatunnusID = '$userId'";
                        $stmt = mysqli_stmt_init($conn);

                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            header("Location: ../index.php?page=changepass&error=sql_insert-statement");
                            exit();
                        } else {
                            $hashedPass = password_hash($newPass, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "s", $hashedPass);
                            mysqli_stmt_execute($stmt);
                            header("Location: ../index.php?success=password_changed");
                            exit();
                        }
                    }
                }
            }
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        } 

    if (isset($_POST['submitRegister'])) {
        if ($_SESSION['priviledge'] === 'Admin') {

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



            if (empty($email) || empty($password) || empty($confirmPass) || empty($firstname) || empty($lastname) || empty($phone) || empty($permissions) || empty($registerDate)) {
                header("Location: ../index.php?page=register&error=emptyfields");
                exit();
            } elseif (!preg_match("/^[a-zA-ZäöüÄÖÜß' ]*$/", $firstname) || (!preg_match("/^[a-zA-ZäöüÄÖÜß' ]*$/", $lastname))) {
                header("Location: ../index.php?page=register&error=invalid_firstname_or_lastname");
                exit();
            } elseif ($password !== $confirmPass) {
                header("Location: ../index.php?page=register&error=passwords_do_not_match");
                exit();
            } else if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)) {
                header("Location: ../index.php?page=register&error=password_strength");
                exit();
            } else {
                $sql = "SELECT email FROM kayttajatunnukset WHERE email = ?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../index.php?page=register&error=sql_select-statement");
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
                            header("Location: ../index.php?page=register&error=sql_insert-statement");
                            exit();
                        } else {
                            $hashedPass = password_hash($password, PASSWORD_DEFAULT);

                            mysqli_stmt_bind_param($stmt, "sssssss", $firstname, $lastname, $email, $hashedPass, $phone, $permissions, $registerDate);
                            mysqli_stmt_execute($stmt);
                            header("Location: ../index.php?success=account_registered");
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
}   

?>