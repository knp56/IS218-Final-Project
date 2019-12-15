<?php

function validate_login($email,$password)
{
    global $db;
    $query='SELECT * FROM accounts WHERE email=:email AND password=:password';

    $statement=$db->prepare($query);
    $statement->bindValue(':email',$email);
    $statement->bindValue(':password',$password);
    $statement->execute();

    $user=$statement->fetch();
    $isValidLogin=count($user)>0;

    if(!$isValidLogin)
    {
        $statement->closeCursor();
        return false;
    }
    else
    {
        $userid=$user['id'];
        $statement->closeCursor();
        return $userid;
    }
}

function get_username($userid)
{
global $db;
$query='SELECT fname, lname FROM accounts WHERE id=:userid';
$statement=$db->prepare($query);
$statement->bindValue(':userid',$userid);

$statement->execute();
$names=$statement->fetch();

$statement->closeCursor();
$firstname=$names['fname'];
$secondname=$names['lname'];

return $firstname . '' .$secondname;
}


function new_user($email,$firstname,$lastname,$birthday, $password)
{
    global $db;
    $query = 'INSERT INTO accounts
(email, fname, lname, birthday, password)
VALUES
(:email, :fname, :lname, :birthday, :password)';

    $statement=$db->prepare($query);

    $statement->bindValue(':email',$email);
    $statement->bindValue(':fname',$firstname);
    $statement->bindValue(':lname',$lastname);
    $statement->bindValue('birthday', $birthday);
    $statement->bindValue(':password',$password);

    $statement->execute();
    $statement->closeCursor();
}

