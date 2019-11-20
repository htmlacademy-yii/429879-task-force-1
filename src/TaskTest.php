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
        $task = new Task('contractorId', 'customerId', 1234567);
        $this->assertTrue($task->getNewStatus('TASK_ACTION_CANCEL') === 'TASK_STATUS_CANCELED');
    }

    /**
     * Тестирует действие 'Откликнуться'.
     *
     * @return void
     */
    public function testApplyAction():void
    {
        $task = new Task('contractorId', 'customerId', 1234567);
        $this->assertTrue($task->getNewStatus('TASK_ACTION_APPLY') === 'TASK_STATUS_IN_PROGRESS');
    }

    /**
     * Тестирует действие 'Выполнено'.
     *
     * @return void
     */
    public function testCompleteAction():void
    {
        $task = new Task('contractorId', 'customerId', 1234567, 'TASK_STATUS_IN_PROGRESS');
        $this->assertTrue($task->getNewStatus('TASK_ACTION_COMPLETE') === 'TASK_STATUS_COMPLETED');
    }

    /**
     * Тестирует действие 'Отказаться'.
     *
     * @return void
     */
    public function testRefuseAction():void
    {
        $task = new Task('contractorId', 'customerId', 1234567, 'TASK_STATUS_IN_PROGRESS');
        $this->assertTrue($task->getNewStatus('TASK_ACTION_REFUSE') === 'TASK_STATUS_FAILED');
    }
}

