<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<main>
    <div class="registrationform">
        <h1> Registration Form </h1>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="create_user">
            <div class="form-group">
                <label for="fname">First Name</label>
                <input type="text" class="form-control" name="fname" id="fname">
                <br><br>
                <class="form-group">
                <label for="lname"> Last Name</label>
                <input type="text" class="form-control" name="lname" id="lname">
                <br><br>
                <class="form-group">
                <label for="birthday">Birthday </label>
                <input type="date" class="form-control" name="birthday" id="birthday">
                <br><br>
                <class="form-group">
                <label for="email"> Email </label>
                <input type="email" class="form-control" name="email" id="email">
                <br><br>
                <class="form-group">
                <label for="password"> Password </label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" value="register">Register</button>
            <br><br><br><br>
            <label> &nbsp;</label>
            <button type="button"><a href="login.html">Login Page</a></button>
            <br>
            <button type="button"><a href="questions.html">Questions</a></button>
            <br>
            <button type="button"><a href="registration.php">Registration</a></button>
        </form>
    </div>
</main>
</body>
</html>
