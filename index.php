<?php
require_once 'src/Task.php';

$task = new Task('contractorId', 'customerId', 123456);

print($task->getNewStatus('TASK_ACTION_CANCEL'));