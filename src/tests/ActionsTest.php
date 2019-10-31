<?php
namespace TaskForce\tests;

require_once './vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use TaskForce\logic\TaskStatuses\TaskStatusCompleted;

class ActionsTest extends TestCase
{
    /**
     * Тестирует возврат классов.
     *
     * @return void
     */
    public function testReturnStatuses():void
    {
        $completedStatus = new TaskStatusCompleted();
        $this->assertTrue($completedStatus->getTitle(), 'Выполнено');
    }

    /**
     * Тестирует возврат действий.
     *
     * @return void
     */
    public function testReturnActions():void
    {
        $actions = new Actions('12', '13', 1231232);
        $this->assertTrue(
            empty(
                array_diff(
                    $actions->getActions(), 
                    Actions::$ACTIONS
                )
            )
        );
    }

    /**
     * Тестирует возвраст нового статуса после действия.
     *
     * @return void
     */
    public function testReturnNewStatus():void
    {
        $actionsToStatus = new ActionToStatus();
        $this->assertTrue(
            $actionsToStatus->getNewStatus('Новое', 'Отменить') === 'Отменено'
        );
    }
}

