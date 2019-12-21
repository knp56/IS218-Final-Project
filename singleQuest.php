<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> One Question </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<main>
    <h1> Questions <?php echo get_username($userid);?></h1>

    <table align="center">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Body</th>
            <th>Skills</th>
            <th>Go back</th>
        </tr>

        <?php foreach($questionId as $question) : ?>

        <tr>
            <td><?php echo $question['id'];?></td>
            <td><?php echo $question['title'];?></td>
            <td><?php echo $question['body'];?></td>
            <td><?php echo $question['skills'];?></td>
            <td>
                <form>
                <input type="hidden" name="action" value="display_question">
                <input type="hidden" name="questionId" value="<?php echo $question['id'];?>">
                <input type="hidden" name="userid" value="<?php echo $userid ?>">
                <button><input type="submit" class="btn edit" value="Go Back"></button>
                </form>
            </td>
        </tr>
<?php endforeach;?>
    </table>
    <a href=".?action=display"><input type="button" value="LogOut"></a>


    <label> &nbsp;</label>
    <button type="button"><a href="display.php">Login Page</a></button>
    <br>
    <button type="button"><a href="question.php">Questions</a></button>
    <br>
    <button type="button"><a href="registration.php">Registration</a></button>
</main>
</body>
</html>
