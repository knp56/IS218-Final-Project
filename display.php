<?php

require("pdo.php");

$emailError = $passwordError ="";

$email= filter_input(INPUT_POST, 'email');
$password= filter_input(INPUT_POST, 'password');
$doubleCheck=strpos($email,'@');
$Validate=true;
if ($_SERVER["REQUEST_METHOD"]== "POST")
{
    if (empty($email))
    {
        $emailError="Must type in a valid email.";
        $Validate=false;
    }
    elseif ($doubleCheck == false)
    {
        $emailError = "Email is not valid.";
        $Validate=false;
    }
    if (empty($password))
    {
        $passwordError="Must type in a valid password.";
        $Validate=false;
    }
    elseif (strlen($password)<=8)
    {
        $passwordError="Password must be at least 8 characters long.";
        $Validate=false;
    }

if($Validate==true)
{
    $query = "SELECT * FROM accounts WHERE email = :email AND password = :password" ;

    $statement=$db->prepare($query);

    $statement->bindValue(':email',$email);
    $statement->bindValue(':password',$password);

    $statement->execute();
    $accounts=$statement->fetchAll();
    $statement->closeCursor();


    if ($Validate)

    {
        $userID=$accounts[0]['id'];
        header("Location: ../questList.php?userID=$userID");
    }
    else
        {
        header('Location: ../registration.html');
    }

}

}
?>

<html lang="en">

<head><title> Login Data </title></head>
<body>

<h2>Login Form </h2>
<div>
    Email: <?php echo $email; ?>
    <span <span class="error"> <?php echo $emailError;?></span>
</div>
<div>
    Password: <?php if (!$passwordError) echo $password; ?>
    <span <span class="error"> <?php echo $passwordError;?></span>
</div>

</body>
</html>
