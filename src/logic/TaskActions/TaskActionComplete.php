<?php
namespace TaskForce\logic\TaskActions;

class TaskActionComplete extends AbstractAction
{
    protected static $id = 'ACTION_COMPLETE';
    protected static $title = 'Выполнено';

    /**
     * Проверяет права на исполнение действия.
     * 
     * @param string $contractorId Id исполнителя.
     * @param string $customerId Id заказчика.
     * @param string $userId Id текущего пользователя.
     *
     * @return bool
     */
    public static function isValidUser(
        string $contractorId,
        string $customerId,
        string $userId
    ): bool
    {
      return $userId === $customerId;
    }
}