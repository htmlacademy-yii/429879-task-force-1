<?php
namespace TaskForce\logic\TaskActions;

use PHPUnit\Framework\Error\Error;

abstract class AbstractAction
{
    /* @var string */
    protected static $id;
    /* @var string */
    protected static $title;

    /**
     * Вовзвращает id действия.
     *
     * @return string
     */
    public function getId(): string
    {
      return self::$id;
    }

    /**
     * Возвращает название действия.
     *
     * @return string
     */
    public function getTitle(): string
    {
      return self::$title;
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
      throw new Exception('Should be implemented by children');
      return false;
    }
}