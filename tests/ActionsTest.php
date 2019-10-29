<?php
/**
 * Фаил класса ActionsTest.
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
use PHPUnit\Framework\TestCase;

/**
 * Фаил класса ActionsTest.
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
 * Класс, тестирующий действия.
 * 
 * @category  Class
 * @package   TaskForce
 * @author    Deepsick <email@gmail.com>
 * @copyright 2019-2020 The PHP Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   Release: 1.0.1
 * @link      http://pear.php.net/package/PackageName
 */
class ActionsTest extends TestCase
{
    /**
     * Тестирует возврат классов.
     *
     * @return void
     */
    public function testReturnStatuses():void
    {
        $statuses = new Statuses();
        $this->assertTrue(
            empty(
                array_diff(
                    Statuses::$STATUSES, 
                    $statuses->getStatuses()
                )
            )
        );
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

