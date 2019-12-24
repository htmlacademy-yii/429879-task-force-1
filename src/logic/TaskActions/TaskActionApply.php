<?php
namespace TaskForce\logic\TaskActions;

class TaskActionApply extends AbstractAction
{
    /**
     * Вовзвращает id действия.
     *
     * @return string
     */
    public static function getId(): string
    {
      return 'ACTION_APPLY';
    }

    /**
     * Возвращает название действия.
     *
     * @return string
     */
    public static function getTitle(): string
    {
      return 'Откликнуться';
    }

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