<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Question Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="questionForm">
    <h1> Question Form </h1>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="create_new_question">
        <div>
            <class="form-group">
            <label for="questionName"> Question Name </label>
            <input type="text" class="form-control" name="questionName" id="questionName">
            <br><br>
            <class="form-group">
            <label for="questionBody"> Question Body </label>
            <input type="text" class="form-control" name="questionBody" id="questionBody">
            <br><br>
            <class="form-group">
            <label for="questionSkills"> Question Skills </label>
            <input type="text" class="form-control" name="questionSkills" id="questionSkills">
        </div>
    </form>
    <label> &nbsp;</label>
    <button type="button"><a href="display.php">Login Page</a></button>
    <br>
    <button type="button"><a href="question.php">Questions</a></button>
    <br>
    <button type="button"><a href="registration.php">Registration</a></button>
</div>
</body>
</html>
