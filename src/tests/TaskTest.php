<?php
use TaskForce\logic\Task;
use TaskForce\logic\AvailableTasks;

use PHPUnit\Framework\TestCase;

require_once __DIR__.'/../../vendor/autoload.php';

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
        $this->assertTrue($task->getNewStatus(AvailableTasks::ACTION_CANCEL) === Task::STATUS_CANCELED);
    }

    /**
     * Тестирует действие 'Откликнуться'.
     *
     * @return void
     */
    public function testApplyAction():void
    {
        $task = new Task('contractorId', 'customerId', 1234567, Task::STATUS_NEW);
        $this->assertTrue($task->getNewStatus(AvailableTasks::ACTION_APPLY) === Task::STATUS_IN_PROGRESS);
    }

    /**
     * Тестирует действие 'Выполнено'.
     *
     * @return void
     */
    public function testCompleteAction():void
    {
        $task = new Task('contractorId', 'customerId', 1234567, Task::STATUS_IN_PROGRESS);
        $this->assertTrue($task->getNewStatus(AvailableTasks::ACTION_COMPLETE) === Task::STATUS_COMPLETED);
    }

    /**
     * Тестирует действие 'Отказаться'.
     *
     * @return void
     */
    public function testRefuseAction():void
    {
        $task = new Task('contractorId', 'customerId', 1234567, Task::STATUS_IN_PROGRESS);
        $this->assertTrue($task->getNewStatus(AvailableTasks::ACTION_REFUSE) === Task::STATUS_FAILED);
    }


    /**
     * Тестирует доступное действие при статусе 'Новое' для исполнителя.
     *
     * @return void
     */
    public function testContractorStatusNewAction():void
    {
        $task = new Task('contractorId', 'customerId', 1234567, Task::STATUS_NEW);
        $this->assertTrue($task->getAvailableAction('contractorId') === AvailableTasks::ACTION_APPLY);
    }

    /**
     * Тестирует доступное действие при статусе 'Новое' для заказчика.
     *
     * @return void
     */
    public function testCustomerStatusNewAction():void
    {
        $task = new Task('contractorId', 'customerId', 1234567, Task::STATUS_NEW);
        $this->assertTrue($task->getAvailableAction('customerId') === AvailableTasks::ACTION_CANCEL);
    }

    /**
     * Тестирует доступное действие при статусе 'В работе' для исполнителя.
     *
     * @return void
     */
    public function testContractorStatusInProgressAction():void
    {
        $task = new Task('contractorId', 'customerId', 1234567, Task::STATUS_IN_PROGRESS);
        $this->assertTrue($task->getAvailableAction('contractorId') === AvailableTasks::ACTION_REFUSE);
    }

    /**
     * Тестирует доступное действие при статусе 'В работе' для заказчика.
     *
     * @return void
     */
    public function testCustomerStatusInProgressAction():void
    {
        $task = new Task('contractorId', 'customerId', 1234567, Task::STATUS_IN_PROGRESS);
        $this->assertTrue($task->getAvailableAction('customerId') === AvailableTasks::ACTION_COMPLETE);
    }
}

