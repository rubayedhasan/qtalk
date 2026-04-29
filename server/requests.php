<?php
session_start();
include("../db/dbConnect.php");

$dbConnect = $conn;

if (isset($_POST["userFname"])) {

    $setUserFirstName = $_POST["userFname"];
    $setUserLastName = $_POST["userLname"];
    $setUserName = $_POST["username"];
    $setUserEmailAddress = $_POST["emailAddress"];
    $setUserPassword = $_POST["passwordKey"];
    $setUserAddress = $_POST["address"];
    $setUserZipCode = $_POST["zipcode"];

    $user = $dbConnect->prepare(
        "
    INSERT INTO users
    ( firstName, lastName, userName, email, password, address, zipcode)
VALUES(?,?,?,?,?,?,?)"
    );

    $dbCupon = $user->execute([$setUserFirstName, $setUserLastName, $setUserName, $setUserEmailAddress, $setUserPassword, $setUserAddress, $setUserZipCode]);

    if ($dbCupon) {
        // way-1:: redirect and show alert 
        echo "
                <script>alert('Your Signup Process is Successful.');
                window.location.href='../index.php';
                </script>
        ";
        $_SESSION["user"] = ["userName" => $setUserName, "email" => $setUserEmailAddress];

        // way-2 redirect and show alert 
        $_SESSION['success'] = "signup successful.";
        // header("location:../index.php");
        header("location:/qtalk");
        exit();
    } else {

        $_SESSION['success'] =  "Failed to Signup.";
    }
} elseif (isset($_POST["login-btn"])) {
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];
    $userName = null;

    $query = "SELECT * FROM users WHERE email = '$userEmail' and password ='$userPassword'";
    $loginResult = $dbConnect->query($query);

    if ($loginResult->num_rows === 1) {

        foreach ($loginResult as $result) {
            $userName = $result["userName"];
        }

        $_SESSION["user"] = ["userName" => $userName, "email" => $userEmail];

        echo "
        <script>
        alert('Successfully Login..!');
        window.location.href='../index.php';
        </script>
        ";
    }
} elseif ($_GET["logout"]) {
    session_unset();
    echo
    "
    <script>
    alert('Successfully LOGout...');
    window.location.href='/qtalk';
    </script>
    ";
} else {
    // nothing  
}
