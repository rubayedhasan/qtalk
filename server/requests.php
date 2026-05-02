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

    $user_id = $user->insert_id;
    if ($dbCupon) {
        // way-1:: redirect and show alert 
        // echo "
        //         <script>alert('Your Signup Process is Successful.');
        //         window.location.href='../index.php';
        //         </script>
        // ";
        $_SESSION["user"] = ["userName" => $setUserName, "email" => $setUserEmailAddress, "user_id" => $user_id];

        // way-2 redirect and show alert 
        $_SESSION['success'] = "signup successful.";
        // header("location:../index.php");
        header("location:/qtalk");
        exit();
    } else {

        $_SESSION['success'] =  "Failed to Signup.";
    }
} else if (isset($_POST["login-btn"])) {
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];
    $userName = null;
    $user_id = null;

    $query = "SELECT * FROM users WHERE email = '$userEmail' and password ='$userPassword'";
    $loginResult = $dbConnect->query($query);

    if ($loginResult->num_rows === 1) {

        foreach ($loginResult as $result) {
            $user_id = $result["id"];
            $userName = $result["userName"];
        }

        $_SESSION["user"] = ["userName" => $userName, "email" => $userEmail, "user_id" => $user_id];

        echo "
        <script>
        alert('Successfully Login..!');
        window.location.href='../index.php';
        </script>
        ";
    }
} else if (isset($_GET["logout"])) {
    session_unset();
    echo
    "
    <script>
    alert('Successfully LOGout...');
    window.location.href='/qtalk';
    </script>
    ";
} else if (isset($_POST["ask-btn"])) {
    $questionTitle = $_POST["title"];
    $questionDescription = $_POST["description"];
    $category_id = $_POST["category"];
    $user_id = $_SESSION["user"]["user_id"];

    $question = $dbConnect->prepare("INSERT INTO question_list (title, description, category_id, user_id) VALUES (?,?,?,?)");
    $qstOutcome = $question->execute([$questionTitle, $questionDescription, $category_id, $user_id]);

    if ($qstOutcome) {
        echo "
        <script>
            alert('Your Question Added.');
            window.location.href = '../index.php';
        </script>
        ";
    } else {
        echo "Somthing is Wrong............";
    }
} else if (isset($_POST['questionAnswer'])) {
    $question_answer = $_POST["questionAnswer"];
    $question_id = $_POST["question_id"];
    $user_id = $_SESSION["user"]["user_id"];

    $insertAnswer = $dbConnect->prepare("INSERT INTO quention_answers(answer,question_id,user_id) VALUES(?,?,?)");
    $answerOutcome = $insertAnswer->execute([$question_answer, $question_id, $user_id]);
    if ($answerOutcome) {
        echo "
        <script>
            //   alert('you answer is submitted.');
              window.location.href='/qtalk/?qst_id=$question_id';
        </script>
        ";
    } else {
        echo "your Answer is Failed to submitted...";
    }
} else if (isset($_GET['delete'])) {
    $qst_id = $_GET["delete"];

    echo $qst_id;
    $delete = $dbConnect->prepare("DELETE FROM question_list WHERE id = ?");
    $deleteOutcome = $delete->execute([$qst_id]);

    if ($deleteOutcome) {
        echo "
        <script> 
        alert('Question has been removed.');
        window.location.href='../index.php';
        </script>
        ";
    }
} else {
    // nothing  
}
