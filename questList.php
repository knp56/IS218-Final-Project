<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello!</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<main>

    <h1> Question <?php echo get_username($userid); ?>
        $question = get_user_question($userid);
    </h1>


    <a href=".?action=questList&userid=<?php echo $userid ?>"><input type="submit" value="Add a new question"></a>
<a href=".?action=otherQuestions&userid=<?php echo $userid; ?>"> Other Questions </a>
    <table align="center">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Body</th>
            <th>Skills</th>
            <th>View</th>
            <th>Delete</th>
        </tr>
        <?php foreach($question as $question) : ?>
            <tr>
                <td><?php echo $question['id'];?></td>
                <td><?php echo $question['title'];?></td>
                <td><?php echo $question['body'];?></td>
                <td><?php echo $question['skills'];?></td>
                <td>
                    <form>
                        <input type="hidden" name="action" value="singleQuest">
                        <input type="hidden" name="questionId" value="<?php echo $question['id'];?>">
                        <input type="hidden" name="userid" value="<?php echo $userid ?>">

                        <button><input type="submit" class="btn edit" value="View" ></button>

                    </form>
                </td>
                <td>
                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="delete_question">
                        <input type="hidden" name="questionId" value="<?php echo $question['id'];?>">
                        <input type="hidden" name="userid" value="<?php echo $userid?>">

                        <button><input class="btn" type="submit" value="Delete"> </button>
                    </form>

                </td>





            </tr>
        <?php endforeach; ?>
    </table>
    <a href=".?action=display.php"><input type="button" value="LogOut"></a>

    <label> &nbsp;</label>
    <button type="button"><a href="display.php">Login Page</a></button>
    <br>
    <button type="button"><a href="question.php">Questions</a></button>
    <br>
    <button type="button"><a href="registration.php">Registration</a></button>

</main>
</body>
</html>
