<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello!</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<main>




<?php ?>


    <h1> Question <?php echo get_username($userid); ?>
        $question = get_users_question($userid);
    </h1>


<a href=".?action=questList&userid=<?php echo $userid ?>"><input type="submit" value="Add a new question"></a>

    <table align="center">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Body</th>
        <th>Skills</th>
        <th>Delete</th>
    </tr>
    <?php foreach($questionId as $question) : ?>
    <tr>
        <td><?php echo $question['id'];?></td>
        <td><?php echo $question['title'];?></td>
        <td><?php echo $question['body'];?></td>
        <td><?php echo $question['skills'];?></td>
        <td>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="deleteQuestion">
                <input type="hidden" name="questionId" value="<?php echo $question['id'];?>">
                <input type="hidden" name="userid" value="<?php echo $userid ?>">

                <button><input class="btn" type="submit" value="Delete" ></button>

             </form>
        </td>
    </tr>
<?php endforeach; ?>
        </table>
<a href=".?action=show_login"><input type="button" value="LogOut"></a>


</main>
</body>
</html>
