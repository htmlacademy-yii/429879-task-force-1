<?php

/**
 * Фаил класса Actions.
 *
 * PHP version 7.3
 *
 * @category  Class
 * @package   TaskForce
 * @author    Deepsick <email@gmail.com>
 * @copyright 2019-2020 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   GIT: 1.0.1
 * @link      http://pear.php.net/package/PackageNam
 */

/**
 * Класс, работающий с действиями.
 * 
 * @category  Class
 * @package   TaskForce
 * @author    Deepsick <email@gmail.com>
 * @copyright 2019-2020 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.0.1
 * @link      http://pear.php.net/package/PackageName
 */
class Actions
{
    public static $ACTIONS = ['Откликнуться', 'Отказаться', 'Отменить', 'Выполнено'];

    /**
     * Конструктор класса.
     *
     * @param string $contractorId Id исполнителя.
     * @param string $customerId   Id заказчика.
     * @param string $deadlineAt   Срок завершения.
     *
     * @return void
     */
    public function __construct(
        string $contractorId,
        string $customerId,
        int $deadlineAt
    ) {
        $this->contractorId = $contractorId;
        $this->customerId = $customerId;
        $this->deadlineAt = $deadlineAt;
        $this->activeStatus = 'Новое';
    }

    /**
     * Возвращает все доступные действия.
     *
     * @return array
     */
    public function getActions(): array
    {
        return self::$ACTIONS;
    }
}
