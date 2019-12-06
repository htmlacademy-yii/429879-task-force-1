<?php
require_once 'Task.php';

use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    /**
     * Тестирует действие 'Отменить'.
     *
     * @return void
     */
    public function testCancelAction():void
    {
        $task = new Task('contractorId', 'customerId', 1234567, Task::STATUS_NEW);
        $this->assertTrue($task->getNewStatus(Task::ACTION_CANCEL) === Task::STATUS_CANCELED);
    }

    /**
     * Тестирует действие 'Откликнуться'.
     *
     * @return void
     */
    public function testApplyAction():void
    {
        $task = new Task('contractorId', 'customerId', 1234567, Task::STATUS_NEW);
        $this->assertTrue($task->getNewStatus(Task::ACTION_APPLY) === Task::STATUS_IN_PROGRESS);
    }

    /**
     * Тестирует действие 'Выполнено'.
     *
     * @return void
     */
    public function testCompleteAction():void
    {
        $task = new Task('contractorId', 'customerId', 1234567, Task::STATUS_IN_PROGRESS);
        $this->assertTrue($task->getNewStatus(Task::ACTION_COMPLETE) === Task::STATUS_COMPLETED);
    }

    /**
     * Тестирует действие 'Отказаться'.
     *
     * @return void
     */
    public function testRefuseAction():void
    {
        $task = new Task('contractorId', 'customerId', 1234567, Task::STATUS_IN_PROGRESS);
        $this->assertTrue($task->getNewStatus(Task::ACTION_REFUSE) === Task::STATUS_FAILED);
    }
}

