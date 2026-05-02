<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>qTalk with PHP</title>
    <!-- Linked fav icon  -->
    <link rel="shortcut icon" href="./public/earlybirds-brands-solid-full.svg" type="image/x-icon">

    <!-- Linked commone files  -->
    <?php require_once("./client/commonFiles.php") ?>
</head>

<body>
    <!-- Linked section:: Header   -->
    <?php
    session_start();

    include_once("./client/header.php");

    // section: Main 
    echo "<main>";
    // $user = $_SESSION["user"]["userName"]; //$user declare and set in header.php file

    // conditional including 
    if (isset($_GET["login"]) && !$user) {
        include("./client/login.php");
    } else if (isset($_GET["signup"]) && !$user) {
        include("./client/signup.php");
    } else if (isset($_GET["ask"])) {
        include("./client/ask-question.php");
    } else if (isset($_GET['qst_id'])) {
        $question_id = $_GET['qst_id'];
        include('./client/questioin-detail.php');
    } else if (isset($_GET['category_id'])) {
        $cat_id = $_GET['category_id'];
        include("./client/question-display.php");
    } else if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];
        include("./client/question-display.php");
    } else if (isset($_GET['latest'])) {
        include("./client/question-display.php");
    } else if (isset($_GET['search'])) {
        $search_key = $_GET['search'];
        include("./client/question-display.php");
    } else {
        include("./client/question-display.php");
    }


    if (isset($_SESSION['success'])) {
        echo "
            <script>
            alert('$_SESSION[success]');
            </script>
            ";

        unset($_SESSION['success']);
    }

    echo "</main>";
    ?>



</body>

</html>