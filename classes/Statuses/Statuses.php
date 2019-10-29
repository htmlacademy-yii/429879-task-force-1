<?php

/**
 * Фаил класса Statuses.
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
 * Класс, работающий со статусами.
 * 
 * @category  Class
 * @package   TaskForce
 * @author    Deepsick <email@gmail.com>
 * @copyright 2019-2020 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.0.1
 * @link      http://pear.php.net/package/PackageName
 */
class Statuses
{
    public static $STATUSES = [
      'Новое',
      'Выполнено',
      'Провалено',
      'Отменено',
      'В работе'
    ];

    /**
     * Возвращает все доступные статусы.
     *
     * @return array
     */
    public function getStatuses(): array
    {
        return self::$STATUSES;
    }
}