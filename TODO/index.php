<?php

declare(strict_types=1);

require_once 'Task.php';
require_once 'TaskStorage.php';

$tasks = new TaskStorage();

if (isset($_POST['task'], $_POST['record'])) {
    $record = $_POST['record'];
    $micro = microtime();
    $task = new Task($_POST['task'], (float)$micro);
    $arrayTasks = $task->toArray();
    $tasks->saveToFile($arrayTasks, $record);
}

$alltasks = $tasks->getTasks();

if (isset($_POST['record'])) {
    $record = $_POST['record'];
    $id = $_POST['record'];
    $tasks->removeTask((float)$id);
    Header('Location: ' . $_SERVER['PHP_SELF']);
}

?>

<html>
<body>
<form action="/" method="post">
    <label for="task">Enter a task</label>
    <input type="text" id="task" name="task"/>
    <input type="hidden" name="record" value="addtask" ?>
    <input type="submit" value="Add task">
</form>
<table>
    <?php foreach ($alltasks as $task): ?>
        <tr>
            <th>
                <form method="post" action="/">
                    <input name="record" value="<?php echo $task->getTime() ?>" type="hidden">
                    <input type="submit" value="X">
                </form>
            </th>
            <th><?php echo $task->getName() ?></th>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
