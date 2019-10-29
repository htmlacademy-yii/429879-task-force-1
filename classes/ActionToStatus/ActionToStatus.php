<?php

/**
 * Фаил класса ActionToStatus.
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
 * Класс, возвращающий новый статус задания.
 * 
 * @category  Class
 * @package   TaskForce
 * @author    Deepsick <email@gmail.com>
 * @copyright 2019-2020 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.0.1
 * @link      http://pear.php.net/package/PackageName
 */
class ActionToStatus
{
    private static $_actionToStatus = [
      'Новое' => ['Отменить' => 'Отменено', 'Откликнуться' => 'В работе'],
      'В работе' => ['Выполнено' => 'Выполнено', 'Отказаться' => 'Провалено'],
    ];

    /**
     * Возвращает новый статус задания после выполнения действия $action.
     *
     * @param string $activeStatus Текущий статус задания.
     * @param string $action       Реализованное действие.
     *
     * @return string              Новый статус задания.
     */
    public function getNewStatus(string $activeStatus, string $action): string
    {
        return self::$_actionToStatus[$activeStatus][$action];
    }
}