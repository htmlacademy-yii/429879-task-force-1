<?php
use TaskForce\logic\Statuses\TaskStatusCompleted;


require_once 'vendor/autoload.php';

$status = new TaskStatusCompleted();

print($status->getId());
