<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | qTalk</title>
</head>

<body>
    <section class="container">
        <h2 class="mb-20">Login</h2>

        <form class="row g-3" action="./server/requests.php" method="post">
            <div class="col-md-12">
                <label for="user-email" class="form-label">Email</label>
                <input type="email" class="form-control" id="user-email" name="userEmail" placeholder="Enter Your Email" required>
            </div>
            <div class="col-md-12">
                <label for="user-password" class="form-label">Password</label>
                <input type="password" class="form-control" id="user-password" name="userPassword" placeholder="Ener Your Password" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="login-btn">Login</button>
            </div>
        </form>
    </section>
</body>

</html>