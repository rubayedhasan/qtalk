<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>qtalk header</title>
</head>

<body>
    <header>
        <!-- section:: Navbar  -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <h4>
                        <span><i class="fa-brands fa-earlybirds"></i></span>
                        <span>qTalk</span>
                    </h4>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./">Home</a>
                        </li>

                        <?php
                        $user = $_SESSION["user"]["userName"] ?? null;
                        if ($user) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="./server/requests.php?logout=true">Logout</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?ask=true">Ask Question</a>
                            </li>
                        <?php } ?>

                        <?php

                        if (!$user) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="?login=true">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?signup=true">Signup</a>
                            </li>
                        <?php } ?>


                        <li class="nav-item">
                            <a class="nav-link" href="#">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Latest Questions</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>