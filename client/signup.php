<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up | qTalk</title>
</head>

<body>
    <section class="container">
        <h2 class="mb-20">Signup</h2>

        <form class="row g-3" method="post" action="./server/requests.php">
            <div class="row g-3">
                <div class="col">
                    <label for="user-first-name" class="form-label">First Name</label>
                    <input type="text" class="form-control" placeholder="First name" id="user-first-name" name="userFname" required>
                </div>
                <div class="col">
                    <label for="user-last-name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" placeholder="Last name" id="user-last-name" name="userLname">
                </div>
            </div>

            <div class="col-md-6">
                <label for="userName" class="form-label">User Name</label>
                <input type="text" class="form-control" placeholder="Enter Your User Name" id="userName" name="username" required>
            </div>
            <div class="col-md-6">
                <label for="userEmailAddress" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Enter Your Email" id="userEmailAddress" name="emailAddress" required>
            </div>
            <div class="col-md-6">
                <label for="userPasswordKey" class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter Your Password" id="userPasswordKey" name="passwordKey" required>
            </div>
            <div class="col-6">
                <label for="userAddress" class="form-label">Address</label>
                <input type="text" class="form-control" placeholder="Enter Your Address" id="userAddress" name="address" placeholder="Address" required>
            </div>
            <div class="col-md-4">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" class="form-control" placeholder="Enter Your Zip Code" id="inputZip" name="zipcode" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary" name="signin-btn">Sign in</button>
            </div>
        </form>
    </section>
</body>

</html>