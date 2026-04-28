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
    } elseif (isset($_GET["signup"]) && !$user) {
        include("./client/signup.php");
    } else {
        // noting 
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