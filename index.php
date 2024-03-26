<?php
    session_start();
    if (!isset($_SESSION['tasks'])) {
        $_SESSION['tasks'] = [];
    }
    if ($_POST['newTODO_text'] != '') {
        array_push($_SESSION['tasks'], $_POST['newTODO_text']);
    }
    foreach ($_SESSION['tasks'] as $index => $task) {
        if (isset($_POST["deleteTODO_i{$index}"])) {
            unset($_SESSION['tasks'][$index]);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>✅ To-Do Application | 🐘 PHP Journey</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="icon.ico" type="image/x-icon">
</head>
<body>
    <form action="index.php" method="post">
    <div class="ui">
        <ul>
        <ul class="todoActors">
            <input class="todoInput" type="text" name="newTODO_text" placeholder="❔ Think of a new task to complete...">
            <br><br>
            <center><input class="todoButton" type="submit" name="newTODO_action" value="➕ Add"></center>
        </ul>
        <ol class="todoList">
            <a class="todoListTitle">
                📚 Things that you need to do (TODOs):
            </a>
            <br>
            <?php 
            if ($_SESSION['tasks'] == []) {
                echo '❌ Oops! You haven\'t added anything to the list yet.';
            } else {
                $i = 0;
                foreach ($_SESSION['tasks'] as $index => $task) {
                    echo "<input class=\"todoCheckbox\" type=\"submit\" name=\"deleteTODO_i{$index}\" value=\"✅\">{$i}. {$task}<br>";
                    $i++;
                }
                unset($i);
            }
            ?>
        </ol>
        </ul>
    </div>
    </form>
</body>
</html>