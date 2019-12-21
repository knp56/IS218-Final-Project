<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<main>
    <div class="loginForm">
        <form action="index.php" method="post">

            <h1>Login Form</h1>
            <div>
                <input type="hidden" name="action" value="validate_display">
                <class="form-group">
                <label for="email">Email </label>
                <input type="email" class="form-control" name="email" id="email">
                <br><br>
                <class="form-group">
                <label for="password"> Password </label>
                <input type="password" class="form-control" name="password" id="password">
                <button type="submit" value="login"> Submit </button>
                <p> Click below to Register </p>
                <button type="button"><a href="registration.php">Registration</a></button>
                <br><br><br><br>
                <label> &nbsp;</label>
                <button type="button"><a href="display.php">Login Page</a></button>
                <br>
                <button type="button"><a href="question.php">Questions</a></button>
                <br>
            </div>
        </form>


    </div>
</main>
</body>
</html>
