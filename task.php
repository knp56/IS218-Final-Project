<?php
function get_username($userid)
{
    global $db;
    $query = 'SELECT fname, lname FROM accounts where id=:userid';
    $statement = $db->prepare($query);
    $statement->bindValue(':userid', $userid);

    $statement->execute();
    $names=$statement->fetch();

    $statement->closeCursor();
    $firstName=$names['fname'];
    $lastName=$names['lname'];
    return $firstName . ' ' .$lastName;
}

function get_user_question($userid)
{
    global $db;
    $query = 'SELECT * FROM questions where ownerid=:id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $userid);

    $statement->execute();
    $question=$statement->fetchAll();

    $statement->closeCursor();
    return $question;
}
