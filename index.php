<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <style></style>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
require('database.php');
require('accounts_db.php');
require('questions_db.php');


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL)
{
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL)
    {
        $action = 'show_display';
    }
}

switch ($action)
{

    case 'show_display': {
        include('display.php');
        break;
    }


    case 'validate_display': {
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        if ($email == NULL || $password == NULL) {
            $error = "Email/Password not used";
            include('error.php');
        }
        else
            {
            $userid = validate_display($email, $password);
            echo "USER ID IS: $userid";
            if ($userid == false)
            {
                echo "Go to Registration";
                header("Location: .?action=display_registration.php");
            } else {
                header("Location: .?action=display_question&userid=$userid");
            }
        }
        break;
    }
    case 'display_registration': {
        include('registration.php');
        break;
    }
    case 'create_user':{
        $email = filter_input(INPUT_POST, 'email');
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $birthday = filter_input(INPUT_POST, 'birthday');
        $password = filter_input(INPUT_POST, 'password');


        if($email == NULL|| $fname == NULL || $lname == NULL || $birthday == NULL|| ($password == NULL || strlen($password) <= 8))
        {
            $error = "Information is incorrect.";
            echo $error;
        }

        else
            {
            new_user($email, $fname, $lname, $birthday, $password);
            header("Location: .?action=show_display");
        }
        break;
    }
    case 'display_questList': {
        $userid = filter_input(INPUT_GET, 'userid');
        if ($userid == NULL || $userid < 0) {
            header('Location: .?action=display_display');
        }
        else
            {
            $question = get_user_question($userid);
            include('questList.php');
        }
        break;
    }
    case 'display_question': {
        $userid = filter_input(INPUT_GET, 'userid');
        session_start();
        $_SESSION['userid'] = $userid;
        include('questList.php');
        break;
    }
    case 'create_new_question':{
        session_start();
        $userid = $_SESSION['userid'];

        $questionName = filter_input(INPUT_POST, 'questionName');
        $questionBody = filter_input(INPUT_POST, 'questionBody');
        $questionSkills = filter_input(INPUT_POST, 'questionSkills');

        $CheckSkills = explode(',', $questionSkills);

        if ($questionName == NULL || ($questionBody == NULL || strlen($questionBody) >= 500) || ($questionSkills == NULL || count($CheckSkills) < 2))
        {
            $error = "Information is incorrect!";
            echo $error;
        }
        else{
            new_question($userid, $questionName, $questionBody, $questionSkills);
            header("Location: .?action=questList&userid=$userid");
        }
        break;
    }
    case 'delete_question':{
        $userid = $_SESSION['userid'];
        $questionId = filter_input(INPUT_POST, 'questionId');
        $userid = filter_input(INPUT_POST, 'userid');
        delete_question($questionId);
        header("Location: .?action=questList&userid=$userid");
        break;
    }

    case 'singleQuest':{
        $userid = $_SESSION['userid'];
        $questionId = filter_input(INPUT_GET,'questionId');
        $userid = filter_input(INPUT_GET, 'userid');
            if ($questionId == NULL )
            {
                $error = 'User ID not registered';
                echo $error;
            }
            else
            {
                $question= singleQuest($questionId);
                include ('singleQuest.php');
            }
            break;
    }


    case 'otherQuestions':
    {
        $userid = $_SESSION['userid'];
        $userid = filter_input(INPUT_GET,'userid');
        if ($userid == NULL )
        {
            $error = 'User ID is not available';
            echo $error;
            }
        else
        {
            $question = all_user_question($userid);
            include('allQuest.php');
        }
        break;
    }



    default: {
        $error = 'Unknown Action';
        include('error.php');
    }
}?>
</body>
</html>

