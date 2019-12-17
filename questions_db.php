<?php

function get_users_question ($ownerid)
{
global $db;

    $query = ' SELECT * FROM question WHERE ownerid = :ownerid';

    $statement = $db->prepare($query);

    $statement->bindValue(':ownerid', $ownerid);
    $statement->execute();

    $questions=$statement->fetchAll();
    $statement->closeCursor();

    return $questions;
}

function new_question($userid,$questionName,$questionBody,$questionSkills)
{
    global $db;
    $query='INSERT INTO questions
(ownerid,title,body,skills)
VALUES
(:ownerid,:title,:body,:skills)';

    $statement=$db->prepare($query);

    $statement->bindValue('ownerid',$userid);
    $statement->bindValue(':title',$questionName);
    $statement->bindValue(':body',$questionBody);
    $statement->bindValue(':skills',$questionSkills);

    $statement->execute();
    $statement->closeCursor();

}




function delete_question($id)
{
    global $db;
    $query="DELETE FROM question WHERE id=:id";
    $statement=$db->prepare($query);
    $statement->bindValue(':id',$id);
    $statement->execute();
    $statement->closeCursor();
}
