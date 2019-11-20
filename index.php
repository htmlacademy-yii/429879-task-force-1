<?php
use TaskForce\logic\Task\Task;

require_once 'vendor/autoload.php';

$task = new Task('contractorId', 'customerId', 123456);

print($task->getNewStatus('TASK_ACTION_CANCEL'));
