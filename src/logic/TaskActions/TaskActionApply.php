<?php
namespace TaskForce\logic\TaskActions;

class TaskActionApply extends AbstractAction
{
    protected static $id = 'ACTION_APPLY';
    protected static $title = 'Откликнуться';

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
      return $userId === $contractorId;
    }
}