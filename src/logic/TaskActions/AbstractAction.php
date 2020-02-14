<?php
namespace TaskForce\logic\TaskActions;

use PHPUnit\Framework\Error\Error;

abstract class AbstractAction
{
    /**
     * Вовзвращает id действия.
     *
     * @return string
     */
    abstract public static function getId(): string;

    /**
     * Возвращает название действия.
     *
     * @return string
     */
    abstract public static function getTitle(): string;
    
    /**
     * Проверяет права на исполнение действия.
     * 
     * @param string $contractorId Id исполнителя.
     * @param string $customerId Id заказчика.
     * @param string $userId Id текущего пользователя.
     *
     * @return bool
     */
    abstract public static function isValidUser(
        string $contractorId,
        string $customerId,
        string $userId
    ): bool;
}